<?php

/**
 * Project form base class.
 *
 * @package    uerr
 * @subpackage form
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends ahBaseFormDoctrine
{
    public function setup()
    {
        unset(
            $this['created_at'],
            $this['updated_at'],
            $this['created_by'],
            $this['updated_by']
        );
    }

    public function saveEmbeddedForms($con = null, $forms = null)
    {
        $this->saveEmbeddedFormsWithValues($this->taintedValues, $con, $forms);
    }

    public function saveEmbeddedFormsWithValues($taintedValues, $con = null, $forms = null)
    {
        if (null === $con)
        {
            $con = $this->getConnection();
        }

        if (null === $forms)
        {
            $forms = $this->embeddedForms;
        }

        foreach ($forms as $key=>$form)
        {
            if ($form instanceof sfFormObject)
            {
                unset($form[self::$CSRFFieldName]);
                if($taintedValues[$key]['delete_object']):
                  $form->getObject()->delete($con);
                else:
                  $form->bindAndSave($taintedValues[$key], $this->taintedFiles, $con);
                endif;
            }
            else
            {
                $this->saveEmbeddedFormsWithValues($taintedValues[$key], $con, $form->getEmbeddedForms());
            }
        }
    }
}

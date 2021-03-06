<?php

/**
 * TbLocalProva form base class.
 *
 * @method TbLocalProva getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbLocalProvaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'id_certame'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => false)),
      'id_prova'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'), 'add_empty' => false)),
      'id_responsavel' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbColaborador'), 'add_empty' => false)),
      'id_local'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbLocal'), 'add_empty' => false)),
      'status'         => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_certame'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'))),
      'id_prova'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'))),
      'id_responsavel' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbColaborador'))),
      'id_local'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbLocal'))),
      'status'         => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'created_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_local_prova[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbLocalProva';
  }

}

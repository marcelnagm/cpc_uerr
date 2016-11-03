<?php

/**
 * TbProvaVaga form base class.
 *
 * @method TbProvaVaga getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbProvaVagaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'id_prova' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'), 'add_empty' => false)),
      'id_vaga'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVaga'), 'add_empty' => false)),
      'gabarito' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_prova' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'))),
      'id_vaga'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbVaga'))),
      'gabarito' => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TbProvaVaga', 'column' => array('id_prova', 'id_vaga')))
    );

    $this->widgetSchema->setNameFormat('tb_prova_vaga[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbProvaVaga';
  }

}

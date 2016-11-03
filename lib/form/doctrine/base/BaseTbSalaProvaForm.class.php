<?php

/**
 * TbSalaProva form base class.
 *
 * @method TbSalaProva getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbSalaProvaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'id_local_prova' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbLocalProva'), 'add_empty' => false)),
      'especial'       => new sfWidgetFormInputText(),
      'numero_sala'    => new sfWidgetFormInputText(),
      'vagas'          => new sfWidgetFormInputText(),
      'status'         => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_local_prova' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbLocalProva'))),
      'especial'       => new sfValidatorString(array('max_length' => 255)),
      'numero_sala'    => new sfValidatorString(array('max_length' => 255)),
      'vagas'          => new sfValidatorInteger(),
      'status'         => new sfValidatorBoolean(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'created_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_sala_prova[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbSalaProva';
  }

}

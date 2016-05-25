<?php

/**
 * TbLocal form base class.
 *
 * @method TbLocal getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbLocalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nome'       => new sfWidgetFormInputText(),
      'id_cidade'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'add_empty' => false)),
      'sigla'      => new sfWidgetFormInputText(),
      'telefone'   => new sfWidgetFormInputText(),
      'endereco'   => new sfWidgetFormInputText(),
      'nsalas'     => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'created_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_cidade'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'))),
      'sigla'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefone'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'endereco'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nsalas'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'     => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'created_by' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_local[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbLocal';
  }

}

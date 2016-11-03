<?php

/**
 * TbCandidato form base class.
 *
 * @method TbCandidato getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbCandidatoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nome'              => new sfWidgetFormInputText(),
      'sexo'              => new sfWidgetFormInputText(),
      'rg'                => new sfWidgetFormInputText(),
      'rgtipo'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgtipo'), 'add_empty' => false)),
      'rguf'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbEstado'), 'add_empty' => false)),
      'rgemissor'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgemissor'), 'add_empty' => false)),
      'cpf'               => new sfWidgetFormInputText(),
      'pai'               => new sfWidgetFormInputText(),
      'mae'               => new sfWidgetFormInputText(),
      'data_nascimento'   => new sfWidgetFormDate(),
      'cidade_nascimento' => new sfWidgetFormInputText(),
      'cep'               => new sfWidgetFormInputText(),
      'endereco'          => new sfWidgetFormInputText(),
      'numero'            => new sfWidgetFormInputText(),
      'complemento'       => new sfWidgetFormInputText(),
      'bairro'            => new sfWidgetFormInputText(),
      'id_cidade'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'add_empty' => true)),
      'tel1'              => new sfWidgetFormInputText(),
      'tel2'              => new sfWidgetFormInputText(),
      'tel3'              => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'user_id'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'              => new sfValidatorString(array('max_length' => 255)),
      'sexo'              => new sfValidatorString(array('max_length' => 1)),
      'rg'                => new sfValidatorString(array('max_length' => 255)),
      'rgtipo'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgtipo'))),
      'rguf'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbEstado'))),
      'rgemissor'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgemissor'))),
      'cpf'               => new sfValidatorString(array('max_length' => 255)),
      'pai'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mae'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'data_nascimento'   => new sfValidatorDate(array('required' => false)),
      'cidade_nascimento' => new sfValidatorInteger(),
      'cep'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'endereco'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'numero'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'complemento'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bairro'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_cidade'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'required' => false)),
      'tel1'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel2'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel3'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'           => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TbCandidato', 'column' => array('cpf')))
    );

    $this->widgetSchema->setNameFormat('tb_candidato[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCandidato';
  }

}

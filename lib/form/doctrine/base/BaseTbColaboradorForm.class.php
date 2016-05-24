<?php

/**
 * TbColaborador form base class.
 *
 * @method TbColaborador getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbColaboradorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nome'         => new sfWidgetFormInputText(),
      'sexo'         => new sfWidgetFormInputText(),
      'rg'           => new sfWidgetFormInputText(),
      'rgtipo'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgtipo'), 'add_empty' => false)),
      'rguf'         => new sfWidgetFormInputText(),
      'rgemissor'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgemissor'), 'add_empty' => false)),
      'cpf'          => new sfWidgetFormInputText(),
      'pispasep'     => new sfWidgetFormInputText(),
      'cep'          => new sfWidgetFormInputText(),
      'logradouro'   => new sfWidgetFormInputText(),
      'endereco'     => new sfWidgetFormInputText(),
      'bairro'       => new sfWidgetFormInputText(),
      'id_cidade'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'add_empty' => true)),
      'telefone'     => new sfWidgetFormInputText(),
      'celular'      => new sfWidgetFormInputText(),
      'tipo_conta'   => new sfWidgetFormInputText(),
      'contabanco'   => new sfWidgetFormInputText(),
      'agenciabanco' => new sfWidgetFormInputText(),
      'id_banco'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbBanco'), 'add_empty' => true)),
      'localidade'   => new sfWidgetFormInputText(),
      'experiencia'  => new sfWidgetFormInputText(),
      'profissao'    => new sfWidgetFormInputText(),
      'observacao'   => new sfWidgetFormInputText(),
      'email'        => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'created_by'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'         => new sfValidatorString(array('max_length' => 255)),
      'sexo'         => new sfValidatorString(array('max_length' => 1)),
      'rg'           => new sfValidatorString(array('max_length' => 255)),
      'rgtipo'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgtipo'))),
      'rguf'         => new sfValidatorInteger(),
      'rgemissor'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgemissor'))),
      'cpf'          => new sfValidatorString(array('max_length' => 255)),
      'pispasep'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cep'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'logradouro'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'endereco'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bairro'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_cidade'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'required' => false)),
      'telefone'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'celular'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo_conta'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contabanco'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'agenciabanco' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_banco'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbBanco'), 'required' => false)),
      'localidade'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'experiencia'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'profissao'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observacao'   => new sfValidatorPass(array('required' => false)),
      'email'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'created_by'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TbColaborador', 'column' => array('cpf')))
    );

    $this->widgetSchema->setNameFormat('tb_colaborador[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbColaborador';
  }

}

<?php

/**
 * TbCandidato filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbCandidatoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sexo'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rg'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rgtipo'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgtipo'), 'add_empty' => true)),
      'rguf'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbEstado'), 'add_empty' => true)),
      'rgemissor'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgemissor'), 'add_empty' => true)),
      'cpf'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pai'               => new sfWidgetFormFilterInput(),
      'mae'               => new sfWidgetFormFilterInput(),
      'data_nascimento'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cidade_nascimento' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cep'               => new sfWidgetFormFilterInput(),
      'endereco'          => new sfWidgetFormFilterInput(),
      'numero'            => new sfWidgetFormFilterInput(),
      'complemento'       => new sfWidgetFormFilterInput(),
      'bairro'            => new sfWidgetFormFilterInput(),
      'id_cidade'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'add_empty' => true)),
      'tel1'              => new sfWidgetFormFilterInput(),
      'tel2'              => new sfWidgetFormFilterInput(),
      'tel3'              => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'user_id'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nome'              => new sfValidatorPass(array('required' => false)),
      'sexo'              => new sfValidatorPass(array('required' => false)),
      'rg'                => new sfValidatorPass(array('required' => false)),
      'rgtipo'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbRgtipo'), 'column' => 'id')),
      'rguf'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbEstado'), 'column' => 'id')),
      'rgemissor'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbRgemissor'), 'column' => 'id')),
      'cpf'               => new sfValidatorPass(array('required' => false)),
      'pai'               => new sfValidatorPass(array('required' => false)),
      'mae'               => new sfValidatorPass(array('required' => false)),
      'data_nascimento'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'cidade_nascimento' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cep'               => new sfValidatorPass(array('required' => false)),
      'endereco'          => new sfValidatorPass(array('required' => false)),
      'numero'            => new sfValidatorPass(array('required' => false)),
      'complemento'       => new sfValidatorPass(array('required' => false)),
      'bairro'            => new sfValidatorPass(array('required' => false)),
      'id_cidade'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCidade'), 'column' => 'id')),
      'tel1'              => new sfValidatorPass(array('required' => false)),
      'tel2'              => new sfValidatorPass(array('required' => false)),
      'tel3'              => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'user_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_candidato_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCandidato';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'nome'              => 'Text',
      'sexo'              => 'Text',
      'rg'                => 'Text',
      'rgtipo'            => 'ForeignKey',
      'rguf'              => 'ForeignKey',
      'rgemissor'         => 'ForeignKey',
      'cpf'               => 'Text',
      'pai'               => 'Text',
      'mae'               => 'Text',
      'data_nascimento'   => 'Date',
      'cidade_nascimento' => 'Number',
      'cep'               => 'Text',
      'endereco'          => 'Text',
      'numero'            => 'Text',
      'complemento'       => 'Text',
      'bairro'            => 'Text',
      'id_cidade'         => 'ForeignKey',
      'tel1'              => 'Text',
      'tel2'              => 'Text',
      'tel3'              => 'Text',
      'email'             => 'Text',
      'user_id'           => 'Number',
    );
  }
}

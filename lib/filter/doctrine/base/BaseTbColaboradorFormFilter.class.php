<?php

/**
 * TbColaborador filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbColaboradorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sexo'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rg'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rgtipo'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgtipo'), 'add_empty' => true)),
      'rguf'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbEstado'), 'add_empty' => true)),
      'rgemissor'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRgemissor'), 'add_empty' => true)),
      'cpf'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pispasep'     => new sfWidgetFormFilterInput(),
      'cep'          => new sfWidgetFormFilterInput(),
      'endereco'     => new sfWidgetFormFilterInput(),
      'bairro'       => new sfWidgetFormFilterInput(),
      'id_cidade'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'add_empty' => true)),
      'telefone'     => new sfWidgetFormFilterInput(),
      'celular'      => new sfWidgetFormFilterInput(),
      'tipo_conta'   => new sfWidgetFormFilterInput(),
      'contabanco'   => new sfWidgetFormFilterInput(),
      'agenciabanco' => new sfWidgetFormFilterInput(),
      'id_banco'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbBanco'), 'add_empty' => true)),
      'localidade'   => new sfWidgetFormFilterInput(),
      'experiencia'  => new sfWidgetFormFilterInput(),
      'profissao'    => new sfWidgetFormFilterInput(),
      'observacao'   => new sfWidgetFormFilterInput(),
      'email'        => new sfWidgetFormFilterInput(),
      'user_id'      => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nome'         => new sfValidatorPass(array('required' => false)),
      'sexo'         => new sfValidatorPass(array('required' => false)),
      'rg'           => new sfValidatorPass(array('required' => false)),
      'rgtipo'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbRgtipo'), 'column' => 'id')),
      'rguf'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbEstado'), 'column' => 'id')),
      'rgemissor'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbRgemissor'), 'column' => 'id')),
      'cpf'          => new sfValidatorPass(array('required' => false)),
      'pispasep'     => new sfValidatorPass(array('required' => false)),
      'cep'          => new sfValidatorPass(array('required' => false)),
      'endereco'     => new sfValidatorPass(array('required' => false)),
      'bairro'       => new sfValidatorPass(array('required' => false)),
      'id_cidade'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCidade'), 'column' => 'id')),
      'telefone'     => new sfValidatorPass(array('required' => false)),
      'celular'      => new sfValidatorPass(array('required' => false)),
      'tipo_conta'   => new sfValidatorPass(array('required' => false)),
      'contabanco'   => new sfValidatorPass(array('required' => false)),
      'agenciabanco' => new sfValidatorPass(array('required' => false)),
      'id_banco'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbBanco'), 'column' => 'id')),
      'localidade'   => new sfValidatorPass(array('required' => false)),
      'experiencia'  => new sfValidatorPass(array('required' => false)),
      'profissao'    => new sfValidatorPass(array('required' => false)),
      'observacao'   => new sfValidatorPass(array('required' => false)),
      'email'        => new sfValidatorPass(array('required' => false)),
      'user_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tb_colaborador_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbColaborador';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nome'         => 'Text',
      'sexo'         => 'Text',
      'rg'           => 'Text',
      'rgtipo'       => 'ForeignKey',
      'rguf'         => 'ForeignKey',
      'rgemissor'    => 'ForeignKey',
      'cpf'          => 'Text',
      'pispasep'     => 'Text',
      'cep'          => 'Text',
      'endereco'     => 'Text',
      'bairro'       => 'Text',
      'id_cidade'    => 'ForeignKey',
      'telefone'     => 'Text',
      'celular'      => 'Text',
      'tipo_conta'   => 'Text',
      'contabanco'   => 'Text',
      'agenciabanco' => 'Text',
      'id_banco'     => 'ForeignKey',
      'localidade'   => 'Text',
      'experiencia'  => 'Text',
      'profissao'    => 'Text',
      'observacao'   => 'Text',
      'email'        => 'Text',
      'user_id'      => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'created_by'   => 'ForeignKey',
      'updated_by'   => 'ForeignKey',
    );
  }
}

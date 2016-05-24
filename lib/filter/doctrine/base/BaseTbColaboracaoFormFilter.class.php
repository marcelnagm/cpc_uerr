<?php

/**
 * TbColaboracao filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbColaboracaoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_certame'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => true)),
      'id_colaborador' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbColaborador'), 'add_empty' => true)),
      'id_funcao'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_local'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sala'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'servidor'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'presente'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'listagem'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_certame'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCertame'), 'column' => 'id')),
      'id_colaborador' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbColaborador'), 'column' => 'id')),
      'id_funcao'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_local'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sala'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'servidor'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'presente'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'listagem'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tb_colaboracao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbColaboracao';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'id_certame'     => 'ForeignKey',
      'id_colaborador' => 'ForeignKey',
      'id_funcao'      => 'Number',
      'id_local'       => 'Number',
      'sala'           => 'Number',
      'servidor'       => 'Boolean',
      'presente'       => 'Boolean',
      'listagem'       => 'Boolean',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'created_by'     => 'ForeignKey',
      'updated_by'     => 'ForeignKey',
    );
  }
}

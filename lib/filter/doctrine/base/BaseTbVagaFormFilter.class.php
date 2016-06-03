<?php

/**
 * TbVaga filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbVagaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_certame'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => true)),
      'id_cargo'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCargo'), 'add_empty' => true)),
      'id_escolaridade' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbEscolaridade'), 'add_empty' => true)),
      'id_cidade'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'add_empty' => true)),
      'quantidade'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vaga_deficiente' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valor'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'data_vencimento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_certame'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCertame'), 'column' => 'id')),
      'id_cargo'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCargo'), 'column' => 'id')),
      'id_escolaridade' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbEscolaridade'), 'column' => 'id')),
      'id_cidade'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCidade'), 'column' => 'id')),
      'quantidade'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vaga_deficiente' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'valor'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'data_vencimento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tb_vaga_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbVaga';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'id_certame'      => 'ForeignKey',
      'id_cargo'        => 'ForeignKey',
      'id_escolaridade' => 'ForeignKey',
      'id_cidade'       => 'ForeignKey',
      'quantidade'      => 'Number',
      'vaga_deficiente' => 'Number',
      'valor'           => 'Number',
      'data_vencimento' => 'Date',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'created_by'      => 'ForeignKey',
      'updated_by'      => 'ForeignKey',
    );
  }
}

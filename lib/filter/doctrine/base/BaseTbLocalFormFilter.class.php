<?php

/**
 * TbLocal filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbLocalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'       => new sfWidgetFormFilterInput(),
      'id_cidade'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'add_empty' => true)),
      'sigla'      => new sfWidgetFormFilterInput(),
      'telefone'   => new sfWidgetFormFilterInput(),
      'endereco'   => new sfWidgetFormFilterInput(),
      'nsalas'     => new sfWidgetFormFilterInput(),
      'status'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nome'       => new sfValidatorPass(array('required' => false)),
      'id_cidade'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCidade'), 'column' => 'id')),
      'sigla'      => new sfValidatorPass(array('required' => false)),
      'telefone'   => new sfValidatorPass(array('required' => false)),
      'endereco'   => new sfValidatorPass(array('required' => false)),
      'nsalas'     => new sfValidatorPass(array('required' => false)),
      'status'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tb_local_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbLocal';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'nome'       => 'Text',
      'id_cidade'  => 'ForeignKey',
      'sigla'      => 'Text',
      'telefone'   => 'Text',
      'endereco'   => 'Text',
      'nsalas'     => 'Text',
      'status'     => 'Boolean',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'created_by' => 'ForeignKey',
      'updated_by' => 'ForeignKey',
    );
  }
}

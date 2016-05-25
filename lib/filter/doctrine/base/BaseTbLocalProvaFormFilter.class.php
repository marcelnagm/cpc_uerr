<?php

/**
 * TbLocalProva filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbLocalProvaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_certame'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => true)),
      'id_prova'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'), 'add_empty' => true)),
      'id_responsavel' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbColaborador'), 'add_empty' => true)),
      'id_local'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbLocal'), 'add_empty' => true)),
      'status'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_certame'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCertame'), 'column' => 'id')),
      'id_prova'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbProva'), 'column' => 'id')),
      'id_responsavel' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbColaborador'), 'column' => 'id')),
      'id_local'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbLocal'), 'column' => 'id')),
      'status'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tb_local_prova_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbLocalProva';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'id_certame'     => 'ForeignKey',
      'id_prova'       => 'ForeignKey',
      'id_responsavel' => 'ForeignKey',
      'id_local'       => 'ForeignKey',
      'status'         => 'Boolean',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'created_by'     => 'ForeignKey',
      'updated_by'     => 'ForeignKey',
    );
  }
}

<?php

/**
 * DisciplineMatriculation filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDisciplineMatriculationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'discipline_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Discipline'), 'add_empty' => true)),
      'matriculation_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Matriculation'), 'add_empty' => true)),
      'semester_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Semester'), 'add_empty' => true)),
      'offer_matriculation_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OfferMatriculation'), 'add_empty' => true)),
      'aggregation_type'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'AE' => 'AE', 'DC' => 'DC', 'AI' => 'AI'))),
      'average'                => new sfWidgetFormFilterInput(),
      'absences'               => new sfWidgetFormFilterInput(),
      'situation'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'AP' => 'AP', 'RM' => 'RM', 'RF' => 'RF', 'TR' => 'TR'))),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'discipline_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Discipline'), 'column' => 'id')),
      'matriculation_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Matriculation'), 'column' => 'id')),
      'semester_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Semester'), 'column' => 'id')),
      'offer_matriculation_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OfferMatriculation'), 'column' => 'id')),
      'aggregation_type'       => new sfValidatorChoice(array('required' => false, 'choices' => array('AE' => 'AE', 'DC' => 'DC', 'AI' => 'AI'))),
      'average'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'absences'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'situation'              => new sfValidatorChoice(array('required' => false, 'choices' => array('AP' => 'AP', 'RM' => 'RM', 'RF' => 'RF', 'TR' => 'TR'))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('discipline_matriculation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DisciplineMatriculation';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'discipline_id'          => 'ForeignKey',
      'matriculation_id'       => 'ForeignKey',
      'semester_id'            => 'ForeignKey',
      'offer_matriculation_id' => 'ForeignKey',
      'aggregation_type'       => 'Enum',
      'average'                => 'Number',
      'absences'               => 'Number',
      'situation'              => 'Enum',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'created_by'             => 'ForeignKey',
      'updated_by'             => 'ForeignKey',
    );
  }
}

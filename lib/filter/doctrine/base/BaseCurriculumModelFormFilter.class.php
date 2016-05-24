<?php

/**
 * CurriculumModel filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCurriculumModelFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'course_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Course'), 'add_empty' => true)),
      'hours'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'total_semesters'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'required_disciplines' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'optative_disciplines' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'elective_disciplines' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'minimum_period'       => new sfWidgetFormFilterInput(),
      'maximum_period'       => new sfWidgetFormFilterInput(),
      'active'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'course_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Course'), 'column' => 'id')),
      'hours'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_semesters'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'required_disciplines' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'optative_disciplines' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'elective_disciplines' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'minimum_period'       => new sfValidatorPass(array('required' => false)),
      'maximum_period'       => new sfValidatorPass(array('required' => false)),
      'active'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('curriculum_model_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CurriculumModel';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'name'                 => 'Text',
      'course_id'            => 'ForeignKey',
      'hours'                => 'Number',
      'total_semesters'      => 'Number',
      'required_disciplines' => 'Number',
      'optative_disciplines' => 'Number',
      'elective_disciplines' => 'Number',
      'minimum_period'       => 'Text',
      'maximum_period'       => 'Text',
      'active'               => 'Boolean',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'created_by'           => 'ForeignKey',
      'updated_by'           => 'ForeignKey',
    );
  }
}

<?php

/**
 * Matriculation filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMatriculationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'campus_id'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'course_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Course'), 'add_empty' => true)),
      'curriculum_model_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CurriculumModel'), 'add_empty' => true)),
      'email'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'student_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Student'), 'add_empty' => true)),
      'id_entry_method'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EntryMethod'), 'add_empty' => true)),
      'semester_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Semester'), 'add_empty' => true)),
      'vacancy_reserve'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'student_finance'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_support'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'complementary_training' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'disabled_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'reason_disabled'        => new sfWidgetFormFilterInput(),
      'status_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MatriculationStatus'), 'add_empty' => true)),
      'enad_made'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'enad_made_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'conclude_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'is_active'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'code'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'campus_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'course_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Course'), 'column' => 'id')),
      'curriculum_model_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CurriculumModel'), 'column' => 'id')),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'student_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Student'), 'column' => 'id')),
      'id_entry_method'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EntryMethod'), 'column' => 'id')),
      'semester_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Semester'), 'column' => 'id')),
      'vacancy_reserve'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'student_finance'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_support'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'complementary_training' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'disabled_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'reason_disabled'        => new sfValidatorPass(array('required' => false)),
      'status_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MatriculationStatus'), 'column' => 'id')),
      'enad_made'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'enad_made_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'conclude_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'user_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'is_active'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('matriculation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Matriculation';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'code'                   => 'Number',
      'campus_id'              => 'Number',
      'course_id'              => 'ForeignKey',
      'curriculum_model_id'    => 'ForeignKey',
      'email'                  => 'Text',
      'student_id'             => 'ForeignKey',
      'id_entry_method'        => 'ForeignKey',
      'semester_id'            => 'ForeignKey',
      'vacancy_reserve'        => 'Boolean',
      'student_finance'        => 'Boolean',
      'social_support'         => 'Boolean',
      'complementary_training' => 'Boolean',
      'disabled_at'            => 'Date',
      'reason_disabled'        => 'Text',
      'status_id'              => 'ForeignKey',
      'enad_made'              => 'Boolean',
      'enad_made_at'           => 'Date',
      'conclude_at'            => 'Date',
      'user_id'                => 'ForeignKey',
      'is_active'              => 'Boolean',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'created_by'             => 'ForeignKey',
      'updated_by'             => 'ForeignKey',
    );
  }
}

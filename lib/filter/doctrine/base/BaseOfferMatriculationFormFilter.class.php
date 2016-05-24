<?php

/**
 * OfferMatriculation filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOfferMatriculationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'offer_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Offer'), 'add_empty' => true)),
      'matriculation_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Matriculation'), 'add_empty' => true)),
      'semester_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Semester'), 'add_empty' => true)),
      'note1'            => new sfWidgetFormFilterInput(),
      'note2'            => new sfWidgetFormFilterInput(),
      'note3'            => new sfWidgetFormFilterInput(),
      'note4'            => new sfWidgetFormFilterInput(),
      'absences'         => new sfWidgetFormFilterInput(),
      'locked'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'offer_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Offer'), 'column' => 'id')),
      'matriculation_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Matriculation'), 'column' => 'id')),
      'semester_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Semester'), 'column' => 'id')),
      'note1'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'note2'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'note3'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'note4'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'absences'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'locked'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('offer_matriculation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OfferMatriculation';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'offer_id'         => 'ForeignKey',
      'matriculation_id' => 'ForeignKey',
      'semester_id'      => 'ForeignKey',
      'note1'            => 'Number',
      'note2'            => 'Number',
      'note3'            => 'Number',
      'note4'            => 'Number',
      'absences'         => 'Number',
      'locked'           => 'Boolean',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'created_by'       => 'ForeignKey',
      'updated_by'       => 'ForeignKey',
    );
  }
}

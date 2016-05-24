<?php

/**
 * OfferRequisition filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOfferRequisitionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'offer_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Offer'), 'add_empty' => true)),
      'matriculation_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Matriculation'), 'add_empty' => true)),
      'semester_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Semester'), 'add_empty' => true)),
      'stage'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'situation'        => new sfWidgetFormFilterInput(),
      'score'            => new sfWidgetFormFilterInput(),
      'process_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'offer_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Offer'), 'column' => 'id')),
      'matriculation_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Matriculation'), 'column' => 'id')),
      'semester_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Semester'), 'column' => 'id')),
      'stage'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'situation'        => new sfValidatorPass(array('required' => false)),
      'score'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'process_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('offer_requisition_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OfferRequisition';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'offer_id'         => 'ForeignKey',
      'matriculation_id' => 'ForeignKey',
      'semester_id'      => 'ForeignKey',
      'stage'            => 'Number',
      'situation'        => 'Text',
      'score'            => 'Number',
      'process_date'     => 'Date',
    );
  }
}

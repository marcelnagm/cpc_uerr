<?php

/**
 * OfferSchedule filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOfferScheduleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'room_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => true)),
      'day'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'schedule_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Schedule'), 'add_empty' => true)),
      'offer_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Offer'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'room_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Room'), 'column' => 'id')),
      'day'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'schedule_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Schedule'), 'column' => 'id')),
      'offer_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Offer'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('offer_schedule_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OfferSchedule';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'room_id'     => 'ForeignKey',
      'day'         => 'Number',
      'schedule_id' => 'ForeignKey',
      'offer_id'    => 'ForeignKey',
    );
  }
}

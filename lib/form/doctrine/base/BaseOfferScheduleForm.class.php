<?php

/**
 * OfferSchedule form base class.
 *
 * @method OfferSchedule getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOfferScheduleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'room_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => true)),
      'day'         => new sfWidgetFormInputText(),
      'schedule_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Schedule'), 'add_empty' => false)),
      'offer_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Offer'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'room_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'required' => false)),
      'day'         => new sfValidatorInteger(),
      'schedule_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Schedule'))),
      'offer_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Offer'))),
    ));

    $this->widgetSchema->setNameFormat('offer_schedule[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OfferSchedule';
  }

}

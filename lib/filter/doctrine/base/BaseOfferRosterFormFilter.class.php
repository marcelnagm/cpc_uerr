<?php

/**
 * OfferRoster filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOfferRosterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'offer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Offer'), 'add_empty' => true)),
      'professor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Professor'), 'add_empty' => true)),
      'date'         => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'hours'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'offer_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Offer'), 'column' => 'id')),
      'professor_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Professor'), 'column' => 'id')),
      'date'         => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'hours'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('offer_roster_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OfferRoster';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'offer_id'     => 'ForeignKey',
      'professor_id' => 'ForeignKey',
      'date'         => 'Text',
      'description'  => 'Text',
      'hours'        => 'Number',
    );
  }
}

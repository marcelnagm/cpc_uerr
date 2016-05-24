<?php

/**
 * OfferProfessor filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOfferProfessorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'offer_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Offer'), 'add_empty' => true)),
      'professor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Professor'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'offer_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Offer'), 'column' => 'id')),
      'professor_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Professor'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('offer_professor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OfferProfessor';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'offer_id'     => 'ForeignKey',
      'professor_id' => 'ForeignKey',
    );
  }
}

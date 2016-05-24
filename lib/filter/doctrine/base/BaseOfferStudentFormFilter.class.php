<?php

/**
 * OfferStudent filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOfferStudentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'offer_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Offer'), 'add_empty' => true)),
      'student_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Student'), 'add_empty' => true)),
      'note1'      => new sfWidgetFormFilterInput(),
      'note2'      => new sfWidgetFormFilterInput(),
      'note3'      => new sfWidgetFormFilterInput(),
      'note4'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'offer_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Offer'), 'column' => 'id')),
      'student_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Student'), 'column' => 'id')),
      'note1'      => new sfValidatorPass(array('required' => false)),
      'note2'      => new sfValidatorPass(array('required' => false)),
      'note3'      => new sfValidatorPass(array('required' => false)),
      'note4'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('offer_student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OfferStudent';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'offer_id'   => 'ForeignKey',
      'student_id' => 'ForeignKey',
      'note1'      => 'Text',
      'note2'      => 'Text',
      'note3'      => 'Text',
      'note4'      => 'Text',
    );
  }
}

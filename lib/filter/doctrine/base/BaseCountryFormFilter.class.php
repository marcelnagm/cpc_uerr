<?php

/**
 * Country filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCountryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'acronym2' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'acronym3' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'acronym2' => new sfValidatorPass(array('required' => false)),
      'acronym3' => new sfValidatorPass(array('required' => false)),
      'code'     => new sfValidatorPass(array('required' => false)),
      'name'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('country_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Country';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'acronym2' => 'Text',
      'acronym3' => 'Text',
      'code'     => 'Text',
      'name'     => 'Text',
    );
  }
}

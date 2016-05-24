<?php

/**
 * Degree form base class.
 *
 * @method Degree getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDegreeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'matriculation_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Matriculation'), 'add_empty' => false)),
      'dt_delivery'         => new sfWidgetFormDate(),
      'dt_delivery_history' => new sfWidgetFormDate(),
      'dt_enade'            => new sfWidgetFormDate(),
      'dt_registry'         => new sfWidgetFormDate(),
      'n_registry'          => new sfWidgetFormInputText(),
      'n_process'           => new sfWidgetFormInputText(),
      'book'                => new sfWidgetFormInputText(),
      'page'                => new sfWidgetFormInputText(),
      'obs'                 => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'created_by'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'matriculation_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Matriculation'))),
      'dt_delivery'         => new sfValidatorDate(),
      'dt_delivery_history' => new sfValidatorDate(),
      'dt_enade'            => new sfValidatorDate(),
      'dt_registry'         => new sfValidatorDate(),
      'n_registry'          => new sfValidatorInteger(),
      'n_process'           => new sfValidatorInteger(),
      'book'                => new sfValidatorInteger(),
      'page'                => new sfValidatorInteger(),
      'obs'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
      'created_by'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('degree[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Degree';
  }

}

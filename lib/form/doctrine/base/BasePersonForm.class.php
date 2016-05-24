<?php

/**
 * Person form base class.
 *
 * @method Person getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePersonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'birth'         => new sfWidgetFormDate(),
      'phone'         => new sfWidgetFormInputText(),
      'cel'           => new sfWidgetFormInputText(),
      'civil_status'  => new sfWidgetFormInputText(),
      'sex'           => new sfWidgetFormInputText(),
      'deficiency'    => new sfWidgetFormInputText(),
      'rg'            => new sfWidgetFormInputText(),
      'rg_organ'      => new sfWidgetFormInputText(),
      'rg_expedition' => new sfWidgetFormDate(),
      'is_stranger'   => new sfWidgetFormInputCheckbox(),
      'voter'         => new sfWidgetFormInputText(),
      'passport'      => new sfWidgetFormInputText(),
      'mother'        => new sfWidgetFormInputText(),
      'father'        => new sfWidgetFormInputText(),
      'nacionality'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => false)),
      'naturally'     => new sfWidgetFormInputText(),
      'race'          => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'created_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'birth'         => new sfValidatorDate(),
      'phone'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cel'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'civil_status'  => new sfValidatorString(array('max_length' => 255)),
      'sex'           => new sfValidatorString(array('max_length' => 1)),
      'deficiency'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rg'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rg_organ'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rg_expedition' => new sfValidatorDate(array('required' => false)),
      'is_stranger'   => new sfValidatorBoolean(array('required' => false)),
      'voter'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'passport'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mother'        => new sfValidatorString(array('max_length' => 255)),
      'father'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nacionality'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'required' => false)),
      'naturally'     => new sfValidatorString(array('max_length' => 255)),
      'race'          => new sfValidatorString(array('max_length' => 255)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'created_by'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }

}

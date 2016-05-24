<?php

/**
 * Person filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePersonFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'birth'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'phone'         => new sfWidgetFormFilterInput(),
      'cel'           => new sfWidgetFormFilterInput(),
      'civil_status'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sex'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'deficiency'    => new sfWidgetFormFilterInput(),
      'rg'            => new sfWidgetFormFilterInput(),
      'rg_organ'      => new sfWidgetFormFilterInput(),
      'rg_expedition' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'is_stranger'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'voter'         => new sfWidgetFormFilterInput(),
      'passport'      => new sfWidgetFormFilterInput(),
      'mother'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'father'        => new sfWidgetFormFilterInput(),
      'nacionality'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'naturally'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'race'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'birth'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'phone'         => new sfValidatorPass(array('required' => false)),
      'cel'           => new sfValidatorPass(array('required' => false)),
      'civil_status'  => new sfValidatorPass(array('required' => false)),
      'sex'           => new sfValidatorPass(array('required' => false)),
      'deficiency'    => new sfValidatorPass(array('required' => false)),
      'rg'            => new sfValidatorPass(array('required' => false)),
      'rg_organ'      => new sfValidatorPass(array('required' => false)),
      'rg_expedition' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'is_stranger'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'voter'         => new sfValidatorPass(array('required' => false)),
      'passport'      => new sfValidatorPass(array('required' => false)),
      'mother'        => new sfValidatorPass(array('required' => false)),
      'father'        => new sfValidatorPass(array('required' => false)),
      'nacionality'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'id')),
      'naturally'     => new sfValidatorPass(array('required' => false)),
      'race'          => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('person_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'birth'         => 'Date',
      'phone'         => 'Text',
      'cel'           => 'Text',
      'civil_status'  => 'Text',
      'sex'           => 'Text',
      'deficiency'    => 'Text',
      'rg'            => 'Text',
      'rg_organ'      => 'Text',
      'rg_expedition' => 'Date',
      'is_stranger'   => 'Boolean',
      'voter'         => 'Text',
      'passport'      => 'Text',
      'mother'        => 'Text',
      'father'        => 'Text',
      'nacionality'   => 'ForeignKey',
      'naturally'     => 'Text',
      'race'          => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'created_by'    => 'ForeignKey',
      'updated_by'    => 'ForeignKey',
    );
  }
}

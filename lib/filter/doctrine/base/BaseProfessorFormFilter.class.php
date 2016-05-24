<?php

/**
 * Professor filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProfessorFormFilter extends PersonFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true));
    $this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id'));

    $this->widgetSchema   ['department_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Department'), 'add_empty' => true));
    $this->validatorSchema['department_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Department'), 'column' => 'id'));

    $this->widgetSchema   ['course_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Course'), 'add_empty' => true));
    $this->validatorSchema['course_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Course'), 'column' => 'id'));

    $this->widgetSchema   ['cpf'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['cpf'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['email'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->validatorSchema['email'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['is_active'] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));
    $this->validatorSchema['is_active'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));

    $this->widgetSchema->setNameFormat('professor_filters[%s]');
  }

  public function getModelName()
  {
    return 'Professor';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'user_id' => 'ForeignKey',
      'department_id' => 'ForeignKey',
      'course_id' => 'ForeignKey',
      'cpf' => 'Text',
      'email' => 'Text',
      'is_active' => 'Boolean',
    ));
  }
}

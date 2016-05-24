<?php

/**
 * Student filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStudentFormFilter extends PersonFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['cpf'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['cpf'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['instituitions_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Instituition'));
    $this->validatorSchema['instituitions_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Instituition', 'required' => false));

    $this->widgetSchema->setNameFormat('student_filters[%s]');
  }

  public function addInstituitionsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.StudentInstituition StudentInstituition')
      ->andWhereIn('StudentInstituition.instituition_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Student';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'cpf' => 'Text',
      'instituitions_list' => 'ManyKey',
    ));
  }
}

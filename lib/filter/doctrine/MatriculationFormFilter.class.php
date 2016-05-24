<?php

/**
 * Matriculation filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MatriculationFormFilter extends BaseMatriculationFormFilter
{
    public function configure()
    {
      $this->widgetSchema['student_name'] =  new sfWidgetFormInputText(
        array(
        'label' => 'Aluno',
        )
       # array('placeholder' => 'Aluno')
      );

      $this->validatorSchema['student_name'] = new sfValidatorPass(array ('required' => false));

      $this->widgetSchema['campus_id'] = new sfWidgetFormDoctrineChoice(array(
        'model'     => 'Campus',
        'add_empty' => '',
        'order_by' => array('name', 'asc'),
      ));

      $this->widgetSchema['course_id'] = new sfWidgetFormDoctrineChoice(array(
        'model'     => 'Course',
        'add_empty' => '',
        'order_by' => array('name', 'asc'),
      ));

      $this->widgetSchema['enad_made'] = new sfWidgetFormChoice(array(
        'choices' => array(
          ''  => '',
          1   => 'sim',
          0   => 'não'),
      ));
    
      
    }

    public function getFields()
    {
      $fields = parent::getFields();

      $fields['student_name'] = 'student_name';

      return $fields;
    }

    public function addStudentNameColumnQuery($query, $field, $value)
    {
      $rootAlias = $query->getRootAlias();
      $query->innerJoin($rootAlias . '.Student d')
        ->andWhere('d.name like ?', "%$value%");

      return $query;
    }
}

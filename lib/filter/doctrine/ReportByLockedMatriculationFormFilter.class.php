<?php

/**
 * Matriculation filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReportByLockedMatriculationFormFilter extends BaseMatriculationFormFilter
{
    public function configure()
    {
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

      $this->widgetSchema['semester_id'] = new sfWidgetFormDoctrineChoice(array(
        'model'     => 'Semester',
        'add_empty' => '',
        'order_by' => array('year', 'asc'),
      ));
    }

    public function addSemesterIdColumnQuery($query, $field, $value)
    {
      $semester = Doctrine::getTable('Semester')
        ->createQuery('o')
        ->where('o.id =?', $value)
        ->fetchOne();

      $rootAlias = $query->getRootAlias();
      $query->leftJoin("{$rootAlias}.Semester f ON f.id = {$semester->getId()}")
        ->andWhere($rootAlias . '.conclude_at between f.start_date and f.end_date');

      return $query;
    }
}

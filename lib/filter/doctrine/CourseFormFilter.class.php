<?php

/**
 * Course filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CourseFormFilter extends BaseCourseFormFilter
{
  public function configure()
  {
    $this->widgetSchema['department_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Department',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));

    $this->widgetSchema['type_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'CourseType',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));

    $this->widgetSchema['round_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'CourseRound',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));
  }
}

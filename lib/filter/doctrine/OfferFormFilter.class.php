<?php

/**
 * Offer filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OfferFormFilter extends BaseOfferFormFilter
{
  public function configure()
  {
    $this->widgetSchema['semester_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'Semester',
      'add_empty' => '',
      'table_method' => 'getSemesterOrderByNameAndPeriod'
    ));

    $this->widgetSchema['course_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Course',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));

    $this->widgetSchema['campus_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Campus',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));

    $this->widgetSchema['discipline_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Discipline',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));
  }
}

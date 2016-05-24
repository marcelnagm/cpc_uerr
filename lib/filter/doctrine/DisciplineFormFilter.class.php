<?php

/**
 * Discipline filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DisciplineFormFilter extends BaseDisciplineFormFilter
{
  public function configure()
  {
    $this->widgetSchema['department_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Department',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));
  }
}

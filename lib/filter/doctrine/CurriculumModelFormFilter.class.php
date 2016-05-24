<?php

/**
 * CurriculumModel filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CurriculumModelFormFilter extends BaseCurriculumModelFormFilter
{
  public function configure()
  {
    $this->widgetSchema['course_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Course',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));
  }
}

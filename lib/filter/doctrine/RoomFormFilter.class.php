<?php

/**
 * Room filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RoomFormFilter extends BaseRoomFormFilter
{
  public function configure()
  {
    $this->widgetSchema['campus_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Campus',
      'add_empty' => '',
      'order_by' => array('name', 'asc'),
    ));
  }
}

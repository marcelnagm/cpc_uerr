<?php

/**
 * SfMessages filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SfMessagesFormFilter extends BaseSfMessagesFormFilter
{
  public function configure()
  {
        $this->widgetSchema['enviroment'] = new sfWidgetFormChoice(array('choices' => ARRAY( 'Admin','Professor','Student')));
      
  }
}

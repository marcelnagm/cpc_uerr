<?php

/**
 * Degree filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DegreeFormFilter extends BaseDegreeFormFilter
{
  public function configure()
  {
      $this->widgetSchema['matriculation_id'] = new sfWidgetFormInputText();
      
  }
  
  
}

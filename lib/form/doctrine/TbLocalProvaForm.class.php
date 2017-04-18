<?php

/**
 * TbLocalProva form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbLocalProvaForm extends BaseTbLocalProvaForm
{
  public function configure()
  {
      
       $this->widgetSchema['id_certame'] = new sfWidgetFormInputHidden();   
       $this->widgetSchema['id_prova'] = new sfWidgetFormInputHidden();   
      
  }
}

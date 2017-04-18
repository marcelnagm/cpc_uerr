<?php

/**
 * TbQuestoes form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbQuestoesForm extends BaseTbQuestoesForm
{
  public function configure()
  {
       $this->widgetSchema['id_prova'] = new sfWidgetFormInputHidden();   
      
  }
}

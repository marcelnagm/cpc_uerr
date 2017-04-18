<?php

/**
 * TbSalaProva form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbSalaProvaForm extends BaseTbSalaProvaForm
{
  public function configure()
  {
      $this->widgetSchema['id_local_prova'] = new sfWidgetFormInputHidden();   
      $this->widgetSchema['especial']->setLabel('Vagas Reservadas p/ deficientes');   
      
  }
}

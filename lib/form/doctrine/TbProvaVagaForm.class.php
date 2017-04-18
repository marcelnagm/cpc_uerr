<?php

/**
 * TbProvaVaga form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbProvaVagaForm extends BaseTbProvaVagaForm
{
  public function configure()
  {
           $this->widgetSchema['id_prova'] = new sfWidgetFormInputHidden();   
           $this->widgetSchema['id_vaga'] = new sfWidgetFormDoctrineDependentSelect(array(                
                 'model' => 'TbVaga', 
                'table_method' => 'getPorCertame',                
            ));
      
  }
}

<?php

/**
 * TbProva form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbProvaForm extends BaseTbProvaForm
{
  public function configure()
  {
   $this->widgetSchema['id_certame'] = new sfWidgetFormInputHidden();   
     $this->widgetSchema['id_vaga'] = new sfWidgetFormDoctrineDependentSelect(array(                
                 'model' => 'TbVaga', 
                'table_method' => 'getPorCertameNaoIncluido',                
            ));   
     $this->widgetSchema['id_cidade_prova'] = new sfWidgetFormDoctrineDependentSelect(array(                
                 'model' => 'TbCidadeProva', 
                'table_method' => 'getPorCertame',                
            ));   
  }
}

<?php

/**
 * TbInscricao form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbInscricaoForm extends BaseTbInscricaoForm
{
  public function configure()
  {
      unset($this->widgetSchema['boleto']);
      unset($this->widgetSchema['pago']);
      if(!$this->isNew()){
          unset($this['id_vaga']);
          unset($this['id_idioma']);
      }
      
      $this->widgetSchema['id_certame'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['id_candidato'] = new sfWidgetFormInputHidden();    
      $this->widgetSchema['id_condicao_especial']->setDefault(15);
      $this->widgetSchema['id_tipo_isencao']->setDefault(1);
        $this->widgetSchema['id_vaga'] = new sfWidgetFormDoctrineDependentSelect(array(                
                 'model' => 'TbVaga', 
                'table_method' => 'getPorCertame',                
            )); 
  }
  
  public function configureForCertameNoIdioma(){
        $this->widgetSchema['id_idioma'] = new sfWidgetFormInputHidden();
        $this->setDefault('id_idioma', 5);
  }
}

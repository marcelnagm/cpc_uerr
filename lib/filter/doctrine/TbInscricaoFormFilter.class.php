<?php

/**
 * TbInscricao filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbInscricaoFormFilter extends BaseTbInscricaoFormFilter
{
  public function configure()
  {
       $this->widgetSchema['id_vaga'] = new sfWidgetFormDoctrineDependentSelect(array(                
                 'model' => 'TbVaga', 
                'table_method' => 'getPorCertame',                
            )); 
      
  }
}

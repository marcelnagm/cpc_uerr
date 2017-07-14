<?php

/**
 * TbColaborador form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbColaboradorForm extends BaseTbColaboradorForm
{
  public function configure()
  {
      
         $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
       $this->widgetSchema['id_cidade'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
            'label' => 'Cidade',          
            'model' => 'TbCidade',
            'url'   => '/registrar/cidadesAjax',
            'config' => '{ max: 10 }'
        ),array('placeholder' => 'Inicie digitação e selecione a cidade'));
     
        $this->widgetSchema['sexo'] =  new sfWidgetFormChoice(array('choices' => array('1' => 'Masculino','2' => 'Feminino')));
      
      
  }
}

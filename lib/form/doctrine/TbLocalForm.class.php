<?php

/**
 * TbLocal form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbLocalForm extends BaseTbLocalForm
{
  public function configure()
  {
      
       $this->widgetSchema['id_cidade'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
            'label' => 'Cidade',          
            'model' => 'TbCidade',
            'url'   => '/candidato/registrar/cidadesAjax',
            'config' => '{ max: 10 }'
        ),array('placeholder' => 'Inicie digitação e selecione a cidade'));
     
  }
}

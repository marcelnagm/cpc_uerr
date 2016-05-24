<?php

/**
 * TbVaga form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbVagaForm extends BaseTbVagaForm
{
  public function configure()
  {
      $this->widgetSchema['id_cidade'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
            'label' => 'Cidade',          
            'model' => 'TbCidade',
            'url'   => '/candidato/registrar/cidadesAjax',
            'config' => '{ max: 30 }'
        ),array('placeholder' => 'Inicie digitação e selecione a cidade'));
      
  }
}

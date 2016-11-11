<?php

/**
 * TbCidadeProva form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbCidadeProvaForm extends BaseTbCidadeProvaForm
{
  public function configure()
  {
        $this->widgetSchema['id_cidade'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
            'label' => 'Cidade de Prova',
            'model' => 'TbCidade',
            'url' => '/registrar/cidadesAjax',
            'config' => '{ max: 10 }'
                ), array('placeholder' => 'Inicie digitação e selecione a cidade'));

      
  }
}

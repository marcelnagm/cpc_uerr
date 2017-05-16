<?php

require_once dirname(__FILE__).'/../lib/cidade_provaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/cidade_provaGeneratorHelper.class.php';

/**
 * cidade_prova actions.
 *
 * @package    uerr
 * @subpackage cidade_prova
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cidade_provaActions extends autoCidade_provaActions
{
     public function executeListCertames(\sfWebRequest $request) {    
        $this->redirect('certame/index');
    }
    
    public function executeCidadesAjax($request)
    {
        $this->getResponse()->setContentType('application/json');

        $disciplines = TbCidadeTable::retrieveForSelect($request->getParameter('q'));

        return $this->renderText(json_encode($disciplines));
    }
    
      public function executeNew(sfWebRequest $request) {
    
        $this->form = $this->configuration->getForm();
        $this->form->setDefault('id_certame', sfContext::getInstance()->getUser()->getAttribute('certame'));                
    }
    
}

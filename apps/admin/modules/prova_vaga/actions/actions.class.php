<?php

require_once dirname(__FILE__).'/../lib/prova_vagaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/prova_vagaGeneratorHelper.class.php';

/**
 * prova_vaga actions.
 *
 * @package    uerr
 * @subpackage prova_vaga
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class prova_vagaActions extends autoProva_vagaActions
{
      public function executeNew(sfWebRequest $request) {
    
        $this->form = $this->configuration->getForm();
        $this->form->setDefault('id_prova', sfContext::getInstance()->getUser()->getAttribute('prova'));        
        $this->tb_prova_vaga = $this->form->getObject();
    }
    
      public function executeListProvas(\sfWebRequest $request) {    
        $this->redirect('prova/index');
    }
    
}

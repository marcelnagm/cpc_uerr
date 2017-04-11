<?php

require_once dirname(__FILE__).'/../lib/provaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/provaGeneratorHelper.class.php';

/**
 * prova actions.
 *
 * @package    uerr
 * @subpackage prova
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class provaActions extends autoProvaActions
{
     public function executeListVagas(\sfWebRequest $request) {
        $prova =$this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('prova', $prova->getId());
        $this->forward('prova_vaga','index');
    }
    
     public function executeListCertames(\sfWebRequest $request) {    
        $this->redirect('certame/index');
    }
    
     public function executeListLocais(\sfWebRequest $request) {     
        $this->forward('local_prova','index');
    }
}

<?php

require_once dirname(__FILE__).'/../lib/certameGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/certameGeneratorHelper.class.php';

/**
 * certame actions.
 *
 * @package    uerr
 * @subpackage certame
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class certameActions extends autoCertameActions
{
    
    public function executeListVagas(\sfWebRequest $request) {
        $certame =$this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('certame', $certame->getId());
        $this->forward('vaga','index');
    }
    
    public function executeListProvas(\sfWebRequest $request) {
        $certame =$this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('certame', $certame->getId());
        $this->forward('prova','index');
    }
    
    public function executeListLocais(\sfWebRequest $request) {
        $certame =$this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('certame', $certame->getId());
        $this->forward('local_prova','index');
    }
    
    public function executeListColaboracao(\sfWebRequest $request) {
        $certame =$this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('certame', $certame->getId());
        $this->forward('colaboracao','index');
    }
    
}

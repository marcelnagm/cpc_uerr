<?php

require_once dirname(__FILE__).'/../lib/questoesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/questoesGeneratorHelper.class.php';

/**
 * questoes actions.
 *
 * @package    uerr
 * @subpackage questoes
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class questoesActions extends autoQuestoesActions
{
       public function executeNew(sfWebRequest $request) {
    
        $this->form = $this->configuration->getForm();
        $this->form->setDefault('id_prova', sfContext::getInstance()->getUser()->getAttribute('prova'));        
        $this->tb_questoes = $this->form->getObject();
    }
    
    public function executeListGabarito($request) {
        $this->prova = TbProvaTable::getInstance()->find(sfContext::getInstance()->getUser()->getAttribute('prova'));
        $this->questoes = TbQuestoesTable::getInstance()->findBy('id_prova', sfContext::getInstance()->getUser()->getAttribute('prova'));
    }
    
    
      public function executeListProvas(\sfWebRequest $request) {
        $this->forward('prova','index');
    }
}

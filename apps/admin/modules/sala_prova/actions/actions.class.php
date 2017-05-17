<?php

require_once dirname(__FILE__) . '/../lib/sala_provaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/sala_provaGeneratorHelper.class.php';

/**
 * sala_prova actions.
 *
 * @package    uerr
 * @subpackage sala_prova
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sala_provaActions extends autoSala_provaActions {

    public function executeListLocalProva(sfWebRequest $request) {
        $this->redirect('local_prova/index');
    }

    public function executeListPresenca(sfWebRequest $request) {
        $this->setLayout('print');
        $this->salas = TbSalaProvaTable::getInstance()->getPorLocalProva()->execute();
        
    }

    public function executeListProvaDiscursiva(sfWebRequest $request) {
        $this->setLayout('print');
        $this->salas = TbSalaProvaTable::getInstance()->getPorLocalProva()->execute();
    }

    public function executeListPresencaPorta(sfWebRequest $request) {
        $this->setLayout('print');
        $this->local_prova = TbLocalProvaTable::getInstance()->find(sfContext::getInstance()->getUser()->getAttribute('local_prova'));
        $this->salas = TbSalaProvaTable::getInstance()->getPorLocalProva()->execute();
    }

    public function executeNew(sfWebRequest $request) {

        $this->form = $this->configuration->getForm();
        $this->form->setDefault('id_local_prova', sfContext::getInstance()->getUser()->getAttribute('local_prova'));
        $this->tb_local_prova = $this->form->getObject();
    }

}

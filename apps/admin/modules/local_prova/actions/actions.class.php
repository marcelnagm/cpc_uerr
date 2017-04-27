<?php

require_once dirname(__FILE__) . '/../lib/local_provaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/local_provaGeneratorHelper.class.php';

/**
 * local_prova actions.
 *
 * @package    uerr
 * @subpackage local_prova
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class local_provaActions extends autoLocal_provaActions {

    public function executeListLocal(\sfWebRequest $request) {
        $this->redirect('local/index');
    }

    public function executeListPresenca(\sfWebRequest $request) {
        $local_prova = $this->getRoute()->getObject();
        $this->setLayout('print');
        sfContext::getInstance()->getUser()->setAttribute('local_prova', $local_prova->getId());
        $this->salas = TbSalaProvaTable::getInstance()->getPorLocalProva()->execute();
        $this->local_prova = $local_prova;
    }

    public function executeListSalaProva(\sfWebRequest $request) {
        $local_prova = $this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('local_prova', $local_prova->getId());
        $this->forward('sala_prova', 'index');
    }

    public function executeIndex(\sfWebRequest $request) {
        $this->certame = TbCertameTable::getInstance()->find(sfContext::getInstance()->getUser()->getAttribute('certame'));
        parent::executeIndex($request);
    }

    public function executeListCertames(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

    public function executeListProvas(\sfWebRequest $request) {
        $this->forward('prova', 'index');
    }

    public function executeNew(sfWebRequest $request) {

        $this->form = $this->configuration->getForm();
        $this->form->setDefault('id_certame', sfContext::getInstance()->getUser()->getAttribute('certame'));
        $this->form->setDefault('id_prova', sfContext::getInstance()->getUser()->getAttribute('prova'));
        $this->tb_local_prova = $this->form->getObject();
    }

}

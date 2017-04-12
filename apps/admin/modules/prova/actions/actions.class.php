<?php

require_once dirname(__FILE__) . '/../lib/provaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/provaGeneratorHelper.class.php';

/**
 * prova actions.
 *
 * @package    uerr
 * @subpackage prova
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class provaActions extends autoProvaActions {

    public function executeListVagas(\sfWebRequest $request) {
        $prova = $this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('prova', $prova->getId());
        $this->forward('prova_vaga', 'index');
    }

    public function executeListCertames(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

    public function executeListLocais(\sfWebRequest $request) {
        $this->forward('local_prova', 'index');
    }

    public function executeListGenerate(\sfWebRequest $request) {
        $prova = $this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('prova', $prova->getId());
        $this->prova = $prova;
        $local_prova = TbLocalProvaTable::getInstance()->findBy('id_prova', $prova->getId());
        $inscritos = TbInscricaoTable::getInstance()->findByDql('id_certame = ? and pago = 1', array('1' => $prova->getTbCertame()->getId()));
        $this->totalinscritos = count($inscritos);
        $j = 0;
        $status = array();
        foreach ($local_prova as $local):
            $salas = TbSalaProvaTable::getInstance()->findByDql('id_local_prova = ? and status = 1', array('1' => $local->getId()));
            $sala = new TbSalaProva();
            foreach ($salas as $sala):
                for($i =0 ;$i<$sala->getVagas();$i++){
                    
                    $alocacao = new TbLotacaoProva();
                    $alocacao->setTbInscricao($inscritos->get($j));
                    $alocacao->setTbSalaProva($sala);
                    try{
                    $alocacao->save();
                    $j++;
                    }  catch (Doctrine_Connection_Mysql_Exception $ex){
                        $j++;
                    }
                }
            endforeach;
        endforeach;
        $this->j = $j;
    }

    public function executeListAlocacao(\sfWebRequest $request) {
        $prova = $this->getRoute()->getObject();
        sfContext::getInstance()->getUser()->setAttribute('prova', $prova->getId());
        $this->prova = $prova;
        $this->local_prova = TbLocalProvaTable::getInstance()->findBy('id_prova', $prova->getId());
    }

}

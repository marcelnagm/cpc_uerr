<?php

require_once dirname(__FILE__) . '/../lib/certameGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/certameGeneratorHelper.class.php';

/**
 * certame actions.
 *
 * @package    uerr
 * @subpackage certame
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class certameActions extends autoCertameActions {

    public function executeNew(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

    public function executeCreate(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

    public function executeEdit(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

    public function executeDelete(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

    protected function executeBatchDelete(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

    public function executeBatch(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

    public function executeListInscricao(\sfWebRequest $request) {
            $this->redirect('inscricao/index');
    }
    
    
    public function executeListInscrever(\sfWebRequest $request) {
        $certame = new TbCertame();
        $certame = $this->getRoute()->getObject();
        $data = date('Y-m-d H:s');
        
        if(!$certame->getPublicado() ){
            $this->getUser()->setFlash('error','Certame inexistente');
            $this->redirect('@homepage');
        }
        
         $this->data = $data;
         $this->certame = $certame;
          if (( $data >= $certame->getDataInicioInscricao()) && ( $data <= $certame->getDataFimInscricao() )) {
            sfContext::getInstance()->getUser()->setAttribute('certame', $certame);                       
            
            $this->redirect('inscricao/new');
        }else{
            $this->getUser()->setFlash('error','Certame Fechado para inscrição');            
            $this->redirect('@homepage');
        }
        
    }

    public function executeUpdate(\sfWebRequest $request) {
        $this->redirect('certame/index');
    }

}

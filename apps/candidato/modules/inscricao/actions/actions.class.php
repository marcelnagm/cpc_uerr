<?php

require_once dirname(__FILE__) . '/../lib/inscricaoGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/inscricaoGeneratorHelper.class.php';

/**
 * inscricao actions.
 *
 * @package    uerr
 * @subpackage inscricao
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inscricaoActions extends autoInscricaoActions {

    public function executeNew(\sfWebRequest $request) {
        $certame = sfContext::getInstance()->getUser()->getAttribute('certame');
        $data = date('Y-m-d H:s');
        if (!$certame->getPublicado()) {
            $this->getUser()->setFlash('error', 'Certame inexistente');
            $this->redirect('@homepage');
        }
        if (!(( $data >= $certame->getDataInicioInscricao()) && ( $data <= $certame->getDataFimInscricao() ))) {
            sfContext::getInstance()->getUser()->setAttribute('certame', $certame);
            $this->getUser()->setFlash('error', 'Certame Fechado para inscrição');
            $this->redirect('@homepage');
        }
        parent::executeNew($request);
        $this->form->setDefault('id_certame', sfContext::getInstance()->getUser()->getAttribute('certame')->getId());
        $this->form->setDefault('id_candidato', sfContext::getInstance()->getUser()->getTbCandidato());
        
         if (!$certame->getTemIdioma()) {
             $this->form->configureForCertameNoIdioma();
         }
        
    }

      public function executeFilter(sfWebRequest $request)
  {
            $this->redirect('certame/index');
      }
    
    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $certame = sfContext::getInstance()->getUser()->getAttribute('certame');
                $values = $form->getValues();
                $tb_inscricao = new TbInscricao();
                $tb_inscricao->setArray($values);
                $tb_inscricao->setTbCertame($certame);
                $candidato = TbCandidatoTable::getInstance()->findOneBy('user_id', sfContext::getInstance()->getUser()->getId());
                $tb_inscricao->setTbCandidato($candidato);

                $tb_inscricao->save();
                $tb_inscricao->generateBoleto();
                $tb_inscricao->save();
            } catch (Doctrine_Validator_Exception $e) {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tb_inscricao)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@tb_inscricao_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect(array('sf_route' => 'tb_inscricao'));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeIndex(sfWebRequest $request) {
        parent::executeIndex($request);
        $this->certame = sfContext::getInstance()->getUser()->getAttribute('certame');
    }

    public function executeShow(\sfWebRequest $request) {
        try {
            $this->tb_inscricao = $this->getRoute()->getObject();
        } catch (sfError404Exception $ex) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Inscricao não encontrada');
            $this->redirect('certame/index');
        }
        

        if ($this->tb_inscricao ->getCreatedBy() != sfContext::getInstance()->getUser()->getId()) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Inscricao não pertence ao usuario, Evento reportado!!');
            $this->redirect('certame/index');
        }
        $this->setLayout(false);

        $this->setLayout('print');
    }

    public function executeListBoleto(\sfWebRequest $request) {
        try{
        $this->inscricao = $this->getRoute()->getObject();
        } catch(sfError404Exception $ex) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Inscricao não encontrada');
            $this->redirect('certame/index');
        }


        if ($this->inscricao->getCreatedBy() != sfContext::getInstance()->getUser()->getId()) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Inscricao não pertence ao usuario, Evento reportado!!');
            $this->redirect('certame/index');
        }
        $this->setLayout(false);
    }
    public function executeListCartao(\sfWebRequest $request) {
        try{
        $this->inscricao = $this->getRoute()->getObject();
        } catch(sfError404Exception $ex) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Inscricao não encontrada');
            $this->redirect('certame/index');
        }


        if ($this->inscricao->getCreatedBy() != sfContext::getInstance()->getUser()->getId()) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Inscricao não pertence ao usuario, Evento reportado!!');
            $this->redirect('certame/index');
        }
        $cartao = TbLotacaoProvaTable::getInstance()->findOneBy('id_inscricao',$this->inscricao->getId());
        if($cartao == null){
            sfContext::getInstance()->getUser()->setFlash('error', 'Cartão ainda não disponivel');
            $this->redirect('certame/index');
        }
        $this->cartao = $cartao;
        $this->setLayout(false);
    }

    public function executeEdit(\sfWebRequest $request) {
          sfContext::getInstance()->getUser()->setFlash('error', 'Você não pode exitar inscrições feitas');
           $this->redirect('certame/index');
       
        
    }
      public function executeListCertames(\sfWebRequest $request) {    
        $this->redirect('certame/index');
    }
    
    public function executeDelete(sfWebRequest $request){
         $this->redirect('certame/index');
    }
    
}

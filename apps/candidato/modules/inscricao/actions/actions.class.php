<?php

require_once dirname(__FILE__).'/../lib/inscricaoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/inscricaoGeneratorHelper.class.php';

/**
 * inscricao actions.
 *
 * @package    uerr
 * @subpackage inscricao
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inscricaoActions extends autoInscricaoActions
{
    public function executeNew(\sfWebRequest $request) {
        parent::executeNew($request);
        $this->form->setDefault('id_certame', sfContext::getInstance()->getUser()->getAttribute('certame')->getId());
        $this->form->setDefault('id_candidato',  sfContext::getInstance()->getUser()->getTbCandidato() );
    }
    
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $tb_inscricao = $form->save();
        $tb_inscricao->setBoleto($tb_inscricao->getId());
        $tb_inscricao->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tb_inscricao)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@tb_inscricao_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'tb_inscricao'));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
    
  public function executeIndex(sfWebRequest $request) {
      parent::executeIndex($request);
      $this->certame = sfContext::getInstance()->getUser()->getAttribute('certame');
  }
  
  public function executeShow(\sfWebRequest $request) {
      parent::executeShow($request);
      $this->setLayout('print');
  }
 
  public function executeListBoleto(\sfWebRequest $request) {
      $this->inscricao = new TbInscricao();
      $this->inscricao = $this->getRoute()->getObject();
        $this->setLayout(false);
  }
  
}

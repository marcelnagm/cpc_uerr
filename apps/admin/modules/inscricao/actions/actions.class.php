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
      public function executeGenerate(\sfWebRequest $request) {
          $this->query = TbInscricaoTable::generateReport($request);
          $this->inscricoes = $this->query->execute();  
          $this->vaga = TbVagaTable::getInstance()->find($request->getParameter('id_vaga')) ;
          $this->cidade = TbCidadeProvaTable::getInstance()->find($request->getParameter('id_cidade')) ;
          $this->setLayout('print');
      }
      
      
      public function executeListRelatorio(\sfWebRequest $request) {
          $this->form = new RelatorioInscricaoForm();       
      }
      
      public function executeShow(\sfWebRequest $request) {
      parent::executeShow($request);
      $this->setLayout('print');
  }
 
  public function executeListBoleto(\sfWebRequest $request) {
//      $this->inscricao = new TbInscricao();
      $this->inscricao = $this->getRoute()->getObject();
        $this->setLayout(false);
  }
    
}

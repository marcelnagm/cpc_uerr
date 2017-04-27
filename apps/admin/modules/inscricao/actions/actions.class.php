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
      public function executeListRelatorio(\sfWebRequest $request) {
          $this->setFilters($this->configuration->getFilterDefaults());
          $this->filters = $this->configuration->getFilterForm($this->getFilters());

         $this->filters->bind($request->getParameter($this->filters->getName()));
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

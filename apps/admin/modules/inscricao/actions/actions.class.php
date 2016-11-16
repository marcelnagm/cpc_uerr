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

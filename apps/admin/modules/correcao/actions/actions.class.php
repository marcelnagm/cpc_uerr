<?php

require_once dirname(__FILE__).'/../lib/correcaoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/correcaoGeneratorHelper.class.php';

/**
 * correcao actions.
 *
 * @package    uerr
 * @subpackage correcao
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class correcaoActions extends autoCorrecaoActions
{
    
      public function executeListProvas(\sfWebRequest $request) {
        $this->forward('prova','index');
    }
    
}

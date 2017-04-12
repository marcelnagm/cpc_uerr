<?php

require_once dirname(__FILE__).'/../lib/sala_provaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sala_provaGeneratorHelper.class.php';

/**
 * sala_prova actions.
 *
 * @package    uerr
 * @subpackage sala_prova
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sala_provaActions extends autoSala_provaActions
{
     public function executeListLocalProva(sfWebRequest $request) {    
        $this->redirect('local_prova/index');
    }
    
}

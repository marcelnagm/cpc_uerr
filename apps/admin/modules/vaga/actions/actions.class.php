<?php

require_once dirname(__FILE__).'/../lib/vagaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/vagaGeneratorHelper.class.php';

/**
 * vaga actions.
 *
 * @package    uerr
 * @subpackage vaga
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vagaActions extends autoVagaActions
{
     public function executeListCertames(\sfWebRequest $request) {    
        $this->redirect('certame/index');
    }
    
}

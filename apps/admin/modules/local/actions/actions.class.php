<?php

require_once dirname(__FILE__).'/../lib/localGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/localGeneratorHelper.class.php';

/**
 * local actions.
 *
 * @package    uerr
 * @subpackage local
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class localActions extends autoLocalActions
{
    public function executeListCertames(\sfWebRequest $request) {    
        $this->redirect('certame/index');
    }
    
}

<?php

/**
 * registrar actions.
 *
 * @package    uerr
 * @subpackage registrar
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registrarActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('reg', 'new');
        
  }
  
   public function executeCidadesAjax($request)
    {
        $this->getResponse()->setContentType('application/json');

        $disciplines = TbCidadeTable::retrieveForSelect($request->getParameter('q'));

        return $this->renderText(json_encode($disciplines));
    }
  
    public function processar(sfWebRequest $request) {
         $form  = new TbCandidatoForm();
    } 
    
}

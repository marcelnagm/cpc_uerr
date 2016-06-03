<?php

require_once dirname(__FILE__) . '/../lib/regGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/regGeneratorHelper.class.php';

/**
 * reg actions.
 *
 * @package    uerr
 * @subpackage reg
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class regActions extends autoRegActions {

    public function executeCidadesAjax($request) {
        $this->getResponse()->setContentType('application/json');

        $disciplines = Discipline::retrieveForSelect($request->getParameter('q'));

        return $this->renderText(json_encode($disciplines));
    }

    public function executeNew(sfWebRequest $request) {
        parent::executeNew($request);
        $this->form->setDefault('user_id', '0');
    }

    public function executeIndex(\sfWebRequest $request) {
        $this->forward('reg', 'new');
    }

    public function executeOk(\sfWebRequest $request) {
       
    }

    public function executeEdit(\sfWebRequest $request) {
        parent::executeEdit($request);
    }

    public function executeBatch(sfWebRequest $request) {
        $this->forward('dashboard', 'index');
    }

    protected function executeBatchDelete(sfWebRequest $request) {
        $this->forward('dashboard', 'index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
//            $tb_candidato = new TbCandidato();
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            $conn = Doctrine_Manager::connection();

            $conn->beginTransaction();

            try {
                $tb_candidato = new TbCandidato();
                $tb_candidato = $form->save($conn);
                
                $user = new sfGuardUser();
                $nome = explode(' ', $tb_candidato->getNome());
                $user->setFirstName(array_shift($nome));
                $user->setLastName(array_pop($nome));
                $user->setUsername($tb_candidato->getCpf());
                $user->setEmailAddress($tb_candidato->getEmail());
                $user->setPassword($tb_candidato->getCpf());
                $user->addGroupByName('candidato');
                $user->save($conn);
//                $form['user_id']->setDefault('user_id', $user->getId());
//                $tb_candidato->setUserId($user->getId());
//                $tb_candidato->save($conn);
                $tb_candidato->setUserId($user->getIncremented());
                $tb_candidato->save($conn);

                $conn->commit();                
                $this->forward('reg','ok');
            } catch (Doctrine_Validator_Exception $e) {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');
                $conn->rollback();
                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}

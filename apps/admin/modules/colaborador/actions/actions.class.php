<?php

require_once dirname(__FILE__) . '/../lib/colaboradorGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/colaboradorGeneratorHelper.class.php';

/**
 * colaborador actions.
 *
 * @package    uerr
 * @subpackage colaborador
 * @author     Marcel Nagm
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class colaboradorActions extends autoColaboradorActions {

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $conn = Doctrine_Manager::connection();

            $conn->beginTransaction();

            try {
                $tb_candidato = new TbCandidato();
                $senha = $form->getValue('password');
                $tb_candidato = $form->save($conn);

                $user = new sfGuardUser();
                $nome = explode(' ', $tb_candidato->getNome());
                $user->setFirstName(array_shift($nome));
                $user->setLastName(array_pop($nome));
                $user->setUsername($tb_candidato->getCpf());
                $user->setEmailAddress($tb_candidato->getEmail());
                $user->setPassword($senha);
                $user->addGroupByName('candidato');
                $user->save($conn);
//                $form['user_id']->setDefault('user_id', $user->getId());
//                $tb_candidato->setUserId($user->getId());
//                $tb_candidato->save($conn);
                $tb_candidato->setUserId($user->getIncremented());
                $tb_candidato->save($conn);

                $conn->commit();
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

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tb_colaborador)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@tb_colaborador_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect('@tb_colaborador');
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}

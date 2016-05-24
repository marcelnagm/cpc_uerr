<?php

/**
 * dashboard actions.
 *
 * @package    uerr
 * @subpackage dashboard
 * @author     Matheus Oliveira
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
   
      if(sfContext::getInstance()->getUser()->isStudent()){
          $this->messages = Doctrine_Core::getTable('SfMessages')-> getMessagesByEnvirement(2);
      }
      if(sfContext::getInstance()->getUser()->isProfessor()){
          $this->messages = Doctrine_Core::getTable('SfMessages')-> getMessagesByEnvirement(1);
      }
      if(sfContext::getInstance()->getUser()->isAdmin()){
          $this->messages = Doctrine_Core::getTable('SfMessages')-> getMessagesByEnvirement(0);
      }
      
      
  }

  public function executeSender(sfWebRequest $request)
  {
    if($this->getUser()->isSuperAdmin()) {
      $matriculations = Doctrine_Query::create()->from('Matriculation m')
        ->leftJoin('m.User u')
        ->where('u.password is NULL')
        ->execute();

      $count = 0;
      foreach($matriculations as $matriculation) {
        $user = $matriculation->getUser();

        $password = substr(md5(rand().rand()), 0, 8);
        $user->setPassword($password);

        $message = Swift_Message::newInstance()
          ->setFrom(sfConfig::get('app_emails_sender'))
          ->setTo($matriculation->getStudent()->getEmail())
          ->setSubject('Uerr - Acesso ao sistema de matrícula online')
          ->setBody($this->getPartial('send_email', array('user' => $matriculation->getCode(), 'password' => $password)))
          ->setContentType('text/html');

        if($this->getMailer()->send($message))
        {
          $user->save();
          $count++;
        }
      }
      $message = Swift_Message::newInstance()
            ->setFrom(sfConfig::get('app_emails_sender'))
            ->setTo('ti@acertenamidia.com')
            ->setSubject('Uerr - Quantidade de Envios')
            ->setBody("Foram enviados $count e-mails.")
            ->setContentType('text/html');

      $this->getMailer()->send($message);

    }
  }
}

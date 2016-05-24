  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    try {
        $this->getRoute()->getObject()->delete();
        $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    } catch (Doctrine_Connection_Exception $e) {
        $this->getUser()->setFlash('error', 'The item can not be deleted.');
    }

    $this->redirect('@<?php echo $this->getUrlForAction('list') ?>');
  }

<?php

/**
 * sfGuardUser form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
      $this->widgetSchema['username']->setHelper('Digite o Usuario');
     
  }
}

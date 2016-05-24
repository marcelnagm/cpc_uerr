<?php

/**
 * sfGuardGroup filter form.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Matheus Oliveira
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardGroupFormFilter extends PluginsfGuardGroupFormFilter
{
  public function configure()
  {
    $this->widgetSchema['name']->setOption( 'with_empty', false ); 
  }
}

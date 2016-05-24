<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfDoctrineActAsSignablePlugin');
    $this->enablePlugins('sfErrorNotifierPlugin');
    $this->enablePlugins('sfDoctrineAdminGeneratorWithShowPlugin');
    $this->enablePlugins('sfDependentSelectPlugin');
    $this->enablePlugins('brFormExtraPlugin');
    $this->enablePlugins('ahDoctrineEasyEmbeddedRelationsPlugin');
    $this->enablePlugins('sfGuardExtraPlugin');
    $this->enablePlugins('cxFormExtraPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfJQueryUIPlugin');
  }
}

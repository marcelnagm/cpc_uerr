<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
    $this->widgetSchema['groups_list'] = new sfWidgetFormDoctrineChoice(array(
      'multiple' => true, 
      'expanded' => true,
      'model' => 'sfGuardGroup'
    ));

    $this->widgetSchema['permissions_list'] = new sfWidgetFormDoctrineChoiceGrouped(array(
      'multiple' => true,
      'expanded' => true,
      'group_by' => 'module', 
      'method' => 'getDescription', 
      'model' => 'sfGuardPermission',
      'renderer_options' => array('template' => '<fieldset class="sf_grouped"><legend>%group%</legend> %options%</fieldset>')
    ));
  }
}

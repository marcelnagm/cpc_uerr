<?php

/**
 * PluginsfGuardGroup form.
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: PluginsfGuardGroupForm.class.php 24629 2009-12-01 00:34:36Z Jonathan.Wage $
 */
abstract class PluginsfGuardGroupForm extends BasesfGuardGroupForm
{
  /**
   * @see sfForm
   */
  public function setupInheritance()
  {
    parent::setupInheritance();

    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['users_list']
    );

    $this->widgetSchema['permissions_list'] = new sfWidgetFormDoctrineChoiceGrouped(array(
      'multiple' => true,
      'expanded' => true,
      'group_by' => 'module', 
      'method' => 'getDescription', 
      'model' => 'sfGuardPermission',
      'renderer_options' => array('template' => '<fieldset class="sf_grouped"><legend>%group%</legend> %options%</fieldset>')
    ));
  }

  protected function doSave($con = null)
  {
    $this->saveUsersList($con);
    parent::doSave($con);
  }

  public function saveUsersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['users_list']))
    {
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Users->getPrimaryKeys();

    $values = $this->getValue('users_list');

    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);

    if (count($unlink))
    {
      $this->object->unlink('Users', array_values($unlink));
    }

    $link = array_diff($values, $existing);

    if (count($link))
    {
      $this->object->link('Users', array_values($link));
    }

  }
}

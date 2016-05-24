<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserAdminForm2 extends BasesfGuardUserAdminForm
{
    /**
     * @see sfForm
     */
    public function configure()
    {
        parent::configure();

        $student = sfContext::getInstance()->getUser()->getAttribute('student');

        $this->widgetSchema['first_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['last_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['username'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['email_address'] = new sfWidgetFormInputHidden();

        unset(
            $this['groups_list'],
            $this['permissions_list'],
            $this['is_active'],
            $this['is_super_admin'],
            $this['password'],
            $this['password_again']
        );

        $code = $this->codeGenerate();

        if($this->isNew())
        {
            $this->setDefault('username', $code);
            if($student)
            {
                $name = explode(' ', $student->getName());
                $this->setDefault('first_name', array_shift($name));
                $this->setDefault('last_name', array_pop($name));
            }
            $this->setDefault('email_address', $code."@uerr.edu.br");
        }

        $this->embedRelations(array(
            'Matriculations' => array(
                #'considerNewFormEmptyFields'    => array('state_id', 'city_id', 'district', 'street', 'cep' ),
                'newFormLabel'                  => ' ',
                'formClassArgs'                 => array(array('ah_add_delete_checkbox' => false)),
                'newFormClassArgs'              => array(
                    array(
                        'code' => $code,
                        'student_id' => $student->getId()
                    ),
                ),
            ),
        ));
    }

    public function codeGenerate()
    {
        $code = date("y").rand('111111', '999999');

        $user = Doctrine_Core::getTable('sfGuardUser')->findOneByUsername($code);

        if($user)
        {
            return $this->codeGenerate();
        }

        return $code;
    }

    public function save($con = null)
    {
        $user = parent::save($con);

        if (!$user->hasGroup('aluno'))
        {
            $user->addGroupByName('aluno');
            $user->save();
        }

        return $user;
    }
}

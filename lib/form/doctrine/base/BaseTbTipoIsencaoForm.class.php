<?php

/**
 * TbTipoIsencao form base class.
 *
 * @method TbTipoIsencao getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbTipoIsencaoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'descricao' => new sfWidgetFormInputText(),
      'ativo'     => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descricao' => new sfValidatorString(array('max_length' => 255)),
      'ativo'     => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('tb_tipo_isencao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTipoIsencao';
  }

}

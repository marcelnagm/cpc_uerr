<?php

/**
 * TbVaga form base class.
 *
 * @method TbVaga getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbVagaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'id_certame'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => false)),
      'id_cargo'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCargo'), 'add_empty' => false)),
      'id_escolaridade' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbEscolaridade'), 'add_empty' => false)),
      'id_cidade'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'), 'add_empty' => false)),
      'quantidade'      => new sfWidgetFormInputText(),
      'vaga_deficiente' => new sfWidgetFormInputText(),
      'valor'           => new sfWidgetFormInputText(),
      'data_vencimento' => new sfWidgetFormDate(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_certame'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'))),
      'id_cargo'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCargo'))),
      'id_escolaridade' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbEscolaridade'))),
      'id_cidade'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidade'))),
      'quantidade'      => new sfValidatorInteger(),
      'vaga_deficiente' => new sfValidatorInteger(),
      'valor'           => new sfValidatorInteger(),
      'data_vencimento' => new sfValidatorDate(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'created_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_vaga[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbVaga';
  }

}

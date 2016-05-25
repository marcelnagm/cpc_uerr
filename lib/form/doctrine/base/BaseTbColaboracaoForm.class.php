<?php

/**
 * TbColaboracao form base class.
 *
 * @method TbColaboracao getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbColaboracaoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'id_certame'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => false)),
      'id_colaborador' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbColaborador'), 'add_empty' => false)),
      'id_funcao'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbFuncao'), 'add_empty' => false)),
      'id_local_prova' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbLocalProva'), 'add_empty' => false)),
      'sala'           => new sfWidgetFormInputText(),
      'servidor'       => new sfWidgetFormInputCheckbox(),
      'presente'       => new sfWidgetFormInputCheckbox(),
      'listagem'       => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_certame'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'))),
      'id_colaborador' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbColaborador'))),
      'id_funcao'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbFuncao'))),
      'id_local_prova' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbLocalProva'))),
      'sala'           => new sfValidatorInteger(),
      'servidor'       => new sfValidatorBoolean(array('required' => false)),
      'presente'       => new sfValidatorBoolean(array('required' => false)),
      'listagem'       => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'created_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_colaboracao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbColaboracao';
  }

}

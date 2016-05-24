<?php

/**
 * TbResponsavelSala form base class.
 *
 * @method TbResponsavelSala getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbResponsavelSalaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'id_colaborador' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbColaborador'), 'add_empty' => false)),
      'id_sala_prova'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbSalaProva'), 'add_empty' => false)),
      'id_funcao'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbFuncao'), 'add_empty' => false)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_colaborador' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbColaborador'))),
      'id_sala_prova'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbSalaProva'))),
      'id_funcao'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbFuncao'))),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'created_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_responsavel_sala[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbResponsavelSala';
  }

}

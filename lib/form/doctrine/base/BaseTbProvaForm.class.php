<?php

/**
 * TbProva form base class.
 *
 * @method TbProva getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbProvaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_certame'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => false)),
      'id_vaga'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVaga'), 'add_empty' => false)),
      'data_inicio' => new sfWidgetFormDate(),
      'hora_inicio' => new sfWidgetFormTime(),
      'duracao'     => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'created_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_certame'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'))),
      'id_vaga'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbVaga'))),
      'data_inicio' => new sfValidatorDate(),
      'hora_inicio' => new sfValidatorTime(),
      'duracao'     => new sfValidatorString(array('max_length' => 10)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'created_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TbProva', 'column' => array('id_prova')))
    );

    $this->widgetSchema->setNameFormat('tb_prova[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbProva';
  }

}

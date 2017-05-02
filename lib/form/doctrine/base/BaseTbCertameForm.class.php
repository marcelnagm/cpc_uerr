<?php

/**
 * TbCertame form base class.
 *
 * @method TbCertame getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbCertameForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'nome'                  => new sfWidgetFormInputText(),
      'id_tipo_certame'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTipoCertame'), 'add_empty' => false)),
      'entidade_nome'         => new sfWidgetFormInputText(),
      'entidade_sigla'        => new sfWidgetFormInputText(),
      'data_inicio'           => new sfWidgetFormDate(),
      'data_fim'              => new sfWidgetFormDate(),
      'hora_inicio'           => new sfWidgetFormTime(),
      'hora_fim'              => new sfWidgetFormTime(),
      'data_inicio_isencao'   => new sfWidgetFormDate(),
      'data_fim_isencao'      => new sfWidgetFormDate(),
      'publicado'             => new sfWidgetFormInputCheckbox(),
      'tem_redacao'           => new sfWidgetFormInputCheckbox(),
      'tem_idioma'            => new sfWidgetFormInputCheckbox(),
      'data_inicio_inscricao' => new sfWidgetFormDate(),
      'data_fim_inscricao'    => new sfWidgetFormDate(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'created_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'                  => new sfValidatorString(array('max_length' => 255)),
      'id_tipo_certame'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTipoCertame'))),
      'entidade_nome'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'entidade_sigla'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'data_inicio'           => new sfValidatorDate(array('required' => false)),
      'data_fim'              => new sfValidatorDate(array('required' => false)),
      'hora_inicio'           => new sfValidatorTime(array('required' => false)),
      'hora_fim'              => new sfValidatorTime(array('required' => false)),
      'data_inicio_isencao'   => new sfValidatorDate(array('required' => false)),
      'data_fim_isencao'      => new sfValidatorDate(array('required' => false)),
      'publicado'             => new sfValidatorBoolean(),
      'tem_redacao'           => new sfValidatorBoolean(),
      'tem_idioma'            => new sfValidatorBoolean(),
      'data_inicio_inscricao' => new sfValidatorDate(array('required' => false)),
      'data_fim_inscricao'    => new sfValidatorDate(array('required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'created_by'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_certame[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCertame';
  }

}

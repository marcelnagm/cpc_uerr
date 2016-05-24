<?php

/**
 * TbInscricao form base class.
 *
 * @method TbInscricao getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbInscricaoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'id_candidato'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCandidato'), 'add_empty' => false)),
      'id_certame'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => false)),
      'id_vaga'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVaga'), 'add_empty' => false)),
      'id_condicao_especial' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCondicaoEspecial'), 'add_empty' => false)),
      'id_cidade_prova'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidadeProva'), 'add_empty' => false)),
      'boleto'               => new sfWidgetFormInputText(),
      'pago'                 => new sfWidgetFormInputText(),
      'vaga_deficiente'      => new sfWidgetFormInputText(),
      'id_idioma'            => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'created_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_candidato'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCandidato'))),
      'id_certame'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'))),
      'id_vaga'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbVaga'))),
      'id_condicao_especial' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCondicaoEspecial'))),
      'id_cidade_prova'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidadeProva'))),
      'boleto'               => new sfValidatorInteger(),
      'pago'                 => new sfValidatorInteger(array('required' => false)),
      'vaga_deficiente'      => new sfValidatorInteger(array('required' => false)),
      'id_idioma'            => new sfValidatorInteger(),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'created_by'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_inscricao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbInscricao';
  }

}

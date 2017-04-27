<?php

/**
 * TbInscricao filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbInscricaoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_candidato'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCandidato'), 'add_empty' => true)),
      'id_certame'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => true)),
      'id_vaga'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVaga'), 'add_empty' => true)),
      'id_condicao_especial' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCondicaoEspecial'), 'add_empty' => true)),
      'id_cidade_prova'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCidadeProva'), 'add_empty' => true)),
      'boleto'               => new sfWidgetFormFilterInput(),
      'pago'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'vaga_deficiente'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'id_idioma'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbIdioma'), 'add_empty' => true)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_candidato'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCandidato'), 'column' => 'id')),
      'id_certame'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCertame'), 'column' => 'id')),
      'id_vaga'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbVaga'), 'column' => 'id')),
      'id_condicao_especial' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCondicaoEspecial'), 'column' => 'id')),
      'id_cidade_prova'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCidadeProva'), 'column' => 'id')),
      'boleto'               => new sfValidatorPass(array('required' => false)),
      'pago'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'vaga_deficiente'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'id_idioma'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbIdioma'), 'column' => 'id')),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tb_inscricao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbInscricao';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'id_candidato'         => 'ForeignKey',
      'id_certame'           => 'ForeignKey',
      'id_vaga'              => 'ForeignKey',
      'id_condicao_especial' => 'ForeignKey',
      'id_cidade_prova'      => 'ForeignKey',
      'boleto'               => 'Text',
      'pago'                 => 'Boolean',
      'vaga_deficiente'      => 'Boolean',
      'id_idioma'            => 'ForeignKey',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'created_by'           => 'ForeignKey',
      'updated_by'           => 'ForeignKey',
    );
  }
}

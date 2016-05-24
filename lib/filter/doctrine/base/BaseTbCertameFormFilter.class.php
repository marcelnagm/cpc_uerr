<?php

/**
 * TbCertame filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbCertameFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_tipo_certame'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTipoCertame'), 'add_empty' => true)),
      'entidade_nome'         => new sfWidgetFormFilterInput(),
      'entidade_sigla'        => new sfWidgetFormFilterInput(),
      'data_inicio'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'data_fim'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora_inicio'           => new sfWidgetFormFilterInput(),
      'hora_fim'              => new sfWidgetFormFilterInput(),
      'data_inicio_isencao'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'data_fim_isencao'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'publicado'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'data_inicio_inscricao' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'data_fim_inscricao'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nome'                  => new sfValidatorPass(array('required' => false)),
      'id_tipo_certame'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbTipoCertame'), 'column' => 'id')),
      'entidade_nome'         => new sfValidatorPass(array('required' => false)),
      'entidade_sigla'        => new sfValidatorPass(array('required' => false)),
      'data_inicio'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'data_fim'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'hora_inicio'           => new sfValidatorPass(array('required' => false)),
      'hora_fim'              => new sfValidatorPass(array('required' => false)),
      'data_inicio_isencao'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'data_fim_isencao'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'publicado'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'data_inicio_inscricao' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'data_fim_inscricao'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tb_certame_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCertame';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'nome'                  => 'Text',
      'id_tipo_certame'       => 'ForeignKey',
      'entidade_nome'         => 'Text',
      'entidade_sigla'        => 'Text',
      'data_inicio'           => 'Date',
      'data_fim'              => 'Date',
      'hora_inicio'           => 'Text',
      'hora_fim'              => 'Text',
      'data_inicio_isencao'   => 'Date',
      'data_fim_isencao'      => 'Date',
      'publicado'             => 'Boolean',
      'data_inicio_inscricao' => 'Date',
      'data_fim_inscricao'    => 'Date',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'created_by'            => 'ForeignKey',
      'updated_by'            => 'ForeignKey',
    );
  }
}

<?php

/**
 * TbCorrecao filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbCorrecaoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_prova'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'), 'add_empty' => true)),
      'id_inscricao'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInscricao'), 'add_empty' => true)),
      'gabarito'              => new sfWidgetFormFilterInput(),
      'nota'                  => new sfWidgetFormFilterInput(),
      'nota_redacao_1'        => new sfWidgetFormFilterInput(),
      'nota_redacao_2'        => new sfWidgetFormFilterInput(),
      'nota_final_redacao'    => new sfWidgetFormFilterInput(),
      'obs'                   => new sfWidgetFormFilterInput(),
      'id_eliminacao_redacao' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_prova'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbProva'), 'column' => 'id')),
      'id_inscricao'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbInscricao'), 'column' => 'id')),
      'gabarito'              => new sfValidatorPass(array('required' => false)),
      'nota'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_redacao_1'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_redacao_2'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_final_redacao'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'obs'                   => new sfValidatorPass(array('required' => false)),
      'id_eliminacao_redacao' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Updator'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tb_correcao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCorrecao';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'id_prova'              => 'ForeignKey',
      'id_inscricao'          => 'ForeignKey',
      'gabarito'              => 'Text',
      'nota'                  => 'Number',
      'nota_redacao_1'        => 'Number',
      'nota_redacao_2'        => 'Number',
      'nota_final_redacao'    => 'Number',
      'obs'                   => 'Text',
      'id_eliminacao_redacao' => 'Number',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'created_by'            => 'ForeignKey',
      'updated_by'            => 'ForeignKey',
    );
  }
}

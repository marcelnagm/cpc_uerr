<?php

/**
 * TbNoticia filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbNoticiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_certame'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCertame'), 'add_empty' => true)),
      'descricao'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'arquivo'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'exibe_data'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'data_publicacao' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'hora_publicacao' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'publicado'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ordem'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_certame'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCertame'), 'column' => 'id')),
      'descricao'       => new sfValidatorPass(array('required' => false)),
      'arquivo'         => new sfValidatorPass(array('required' => false)),
      'tipo'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'exibe_data'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'data_publicacao' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'hora_publicacao' => new sfValidatorPass(array('required' => false)),
      'publicado'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ordem'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_noticia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbNoticia';
  }

  public function getFields()
  {
    return array(
      'id_noticia'      => 'Number',
      'id_certame'      => 'ForeignKey',
      'descricao'       => 'Text',
      'arquivo'         => 'Text',
      'tipo'            => 'Number',
      'exibe_data'      => 'Number',
      'data_publicacao' => 'Date',
      'hora_publicacao' => 'Text',
      'publicado'       => 'Number',
      'ordem'           => 'Number',
    );
  }
}

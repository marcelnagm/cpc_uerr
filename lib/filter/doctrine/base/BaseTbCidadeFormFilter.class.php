<?php

/**
 * TbCidade filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbCidadeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'estado' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbEstado'), 'add_empty' => true)),
      'nome'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'estado' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbEstado'), 'column' => 'id')),
      'nome'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_cidade_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCidade';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'estado' => 'ForeignKey',
      'nome'   => 'Text',
    );
  }
}

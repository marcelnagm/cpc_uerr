<?php

/**
 * TbTipoIsencao filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbTipoIsencaoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ativo'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'descricao' => new sfValidatorPass(array('required' => false)),
      'ativo'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('tb_tipo_isencao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTipoIsencao';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'descricao' => 'Text',
      'ativo'     => 'Boolean',
    );
  }
}

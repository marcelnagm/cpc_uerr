<?php

/**
 * TbFuncao filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbFuncaoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'      => new sfWidgetFormFilterInput(),
      'valor'     => new sfWidgetFormFilterInput(),
      'descricao' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nome'      => new sfValidatorPass(array('required' => false)),
      'valor'     => new sfValidatorPass(array('required' => false)),
      'descricao' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_funcao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbFuncao';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nome'      => 'Text',
      'valor'     => 'Text',
      'descricao' => 'Text',
    );
  }
}

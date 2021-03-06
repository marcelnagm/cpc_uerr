<?php

/**
 * TbEscolaridade filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbEscolaridadeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descricao' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_escolaridade_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbEscolaridade';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'descricao' => 'Text',
    );
  }
}

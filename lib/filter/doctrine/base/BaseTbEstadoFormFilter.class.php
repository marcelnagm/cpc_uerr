<?php

/**
 * TbEstado filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbEstadoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'uf'   => new sfWidgetFormFilterInput(),
      'nome' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'uf'   => new sfValidatorPass(array('required' => false)),
      'nome' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_estado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbEstado';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'uf'   => 'Text',
      'nome' => 'Text',
    );
  }
}

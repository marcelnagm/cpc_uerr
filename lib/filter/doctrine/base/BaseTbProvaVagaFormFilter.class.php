<?php

/**
 * TbProvaVaga filter form base class.
 *
 * @package    uerr
 * @subpackage filter
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbProvaVagaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_prova' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'), 'add_empty' => true)),
      'id_vaga'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVaga'), 'add_empty' => true)),
      'gabarito' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_prova' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbProva'), 'column' => 'id')),
      'id_vaga'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbVaga'), 'column' => 'id')),
      'gabarito' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_prova_vaga_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbProvaVaga';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'id_prova' => 'ForeignKey',
      'id_vaga'  => 'ForeignKey',
      'gabarito' => 'Text',
    );
  }
}

<?php

/**
 * TbCorrecao form base class.
 *
 * @method TbCorrecao getObject() Returns the current form's model object
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbCorrecaoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'id_prova'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'), 'add_empty' => false)),
      'id_inscricao'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInscricao'), 'add_empty' => false)),
      'gabarito'              => new sfWidgetFormTextarea(),
      'nota'                  => new sfWidgetFormInputText(),
      'nota_redacao_1'        => new sfWidgetFormInputText(),
      'nota_redacao_2'        => new sfWidgetFormInputText(),
      'nota_final_redacao'    => new sfWidgetFormInputText(),
      'obs'                   => new sfWidgetFormInputText(),
      'id_eliminacao_redacao' => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'created_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_prova'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbProva'))),
      'id_inscricao'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbInscricao'))),
      'gabarito'              => new sfValidatorString(array('required' => false)),
      'nota'                  => new sfValidatorNumber(array('required' => false)),
      'nota_redacao_1'        => new sfValidatorNumber(array('required' => false)),
      'nota_redacao_2'        => new sfValidatorNumber(array('required' => false)),
      'nota_final_redacao'    => new sfValidatorNumber(array('required' => false)),
      'obs'                   => new sfValidatorPass(array('required' => false)),
      'id_eliminacao_redacao' => new sfValidatorInteger(),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'created_by'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Updator'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_correcao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCorrecao';
  }

}

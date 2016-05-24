<?php

/**
 * TbCandidato form.
 *
 * @package    uerr
 * @subpackage form
 * @author     Marcel Nagm
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbCandidatoForm extends BaseTbCandidatoForm
{
  public function configure()
  {
   
      $this->widgetSchema['sexo'] =  new sfWidgetFormChoice(array('choices' => array('1' => 'Masculino','2' => 'Feminino')));
      
        
     $this->widgetSchema['data_nascimento'] =  new sfWidgetFormInputText(array(),array('id' => 'datepicker'));
     $this->validatorSchema['data_nascimento'] = new sfValidatorString(array('required' => false));  

                
        $this->widgetSchema['cidade_nascimento'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
            'label' => 'Cidade',          
            'model' => 'TbCidade',
            'url'   => '/candidato/registrar/cidadesAjax',
            'config' => '{ max: 10 }'
        ),array('placeholder' => 'Inicie digitação e selecione a cidade'));
     
        
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['rgtipo']->setOption( 'method' ,'toString');
        $this->widgetSchema['rgemissor']->setOption( 'method' ,'toString');
        
        $this->widgetSchema['rguf'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbEstado'),             
            'method' => 'toString',
            'add_empty' => false));
        
        $this->widgetSchema['logradouro'] = new sfWidgetFormDoctrineChoice(array(
            'model' => $this->getRelatedModelName('TbLogradouro'), 
            'method' => 'getNome',
            'add_empty' => false));
        $this->widgetSchema['rgtipo']->setLabel('Tipo de Registro');
        $this->widgetSchema['rguf']->setLabel('Uf de Registro');
        $this->widgetSchema['rgemissor']->setLabel('Orgão Emissor');
        $this->widgetSchema['tel1']->setLabel('Celular');
        $this->widgetSchema['tel2']->setLabel('Celular para recado');
        $this->widgetSchema['tel3']->setLabel('Telefone Fixo');
        
        
        
        $this->widgetSchema['cidade_nascimento']->setAttribute('placeholder','Inicie digitação e selecione a cidade');        
        $this->widgetSchema['cpf']->setAttribute('placeholder','CPF com apenas numeros');        
        $this->widgetSchema['email']->setAttribute('placeholder','O cadastro esta vinculado ao email, logo informe-o corretamente');        
        $this->validatorSchema['email']   = new sfValidatorEmail();  
        
        
        
        
        $this->widgetSchema['id_cidade'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
            'label' => 'Cidade',          
            'model' => 'TbCidade',
            'url'   => '/candidato/registrar/cidadesAjax',
            'config' => '{ max: 10 }'
        ),array('placeholder' => 'Inicie digitação e selecione a cidade'));
     
        

        $this->setValidator('cpf', new sfValidatorCpfCnpj(array('type'=>'cpf', 'required' => true)));
            $this->validatorSchema->setPostValidator(
                new sfValidatorAnd(array(
                    new sfValidatorDoctrineUnique(array('model' => 'TbCandidato', 'column' => array('cpf'))),
                    #new sfValidatorCpfCnpj(array('type'=>'cpf', 'required' => true)),
//                    new sfValidat orCallback(array('callback' => array($this,'checkCPF'))),
                ))
            );
        
      
  }
  
   public function checkCPF($validator, $values)
    {
        if ($values['cpf'] == '')
        {
            #$val = new sfValidatorCpfCnpj(array('type'=>'cpf', 'required' => true));
            #$val = new sfValidatorAnd(array(
             #   new sfValidatorCpfCnpj(array('type'=>'cpf', 'required' => true)),
                #new sfValidatorDoctrineUnique(array('model' => 'Student', 'column' => array('cpf'))),
            #));
            $error = new sfValidatorError($validator, 'CPF é obrigatório para alunos brasileiros');
            $ves = new sfValidatorErrorSchema($validator, array('cpf' => $error));
            throw $ves;
        }
        return $values;
    }
}

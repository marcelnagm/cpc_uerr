<?php


class RelatorioInscricaoForm extends BaseForm
{
  public function configure()
  {
    
    $this->widgetSchema['id_vaga'] = new sfWidgetFormDoctrineChoice(array(                
                 'model' => 'TbVaga', 
                 'label' => 'Escolha a Vaga',
                'table_method' => 'getPorCertame',                
            )); 
    $this->widgetSchema['pago'] = new sfWidgetFormInputCheckbox(array(
        'label' => 'Pago ou Não Pago'
            )
            );
    $this->widgetSchema['deficiente'] = new sfWidgetFormInputCheckbox(array(
        'label' => 'Vaga de Deficiente?'
            )
            );
    $this->widgetSchema['isencao'] = new sfWidgetFormInputCheckbox(array(
        'label' => 'Pediu Isenção?'
            )
            );
    $this->widgetSchema['isento'] = new sfWidgetFormInputCheckbox(array(
        'label' => 'Foi Isento?'
            )
            );
            
    $this->widgetSchema['id_cidade'] = new sfWidgetFormDoctrineChoice(array(                
                 'model' => 'TbCidadeProva', 
                 'label' => 'Escolha a Cidade de Prova',
                'table_method' => 'getPorCertame',                
            )); 
  
    
  }
  
   public function getFields(){
      return array(
          'id_vaga',   
          'id_cidade',   
          'pago',   
          'deficiente',
          'isencao',
          'isento',
          '_csrf_token',   
      );
   }
   
   
  
}

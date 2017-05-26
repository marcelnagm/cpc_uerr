<?php


class RelatorioResultadoForm extends BaseForm
{
  public function configure()
  {
    
    $this->widgetSchema['id_vaga'] = new sfWidgetFormDoctrineChoice(array(                
                 'model' => 'TbVaga', 
                 'label' => 'Escolha a Vaga',
                'table_method' => 'getPorCertame',                
            )); 
  
    $this->widgetSchema['deficiente'] = new sfWidgetFormInputCheckbox(array(
        'label' => 'Vaga de Deficiente (PNE)?'
            )
            );
    $this->widgetSchema['redacao'] = new sfWidgetFormInputCheckbox(array(
        'label' => 'Incluir nota reação?'
            )
            );
    $this->widgetSchema['final'] = new sfWidgetFormInputCheckbox(array(
        'label' => 'Deseja Resultado Final?'
            )
            );
    
  }
  
   public function getFields(){
      return array(
          'id_vaga',   
          'deficiente',          
          'redacao',
          'final',
          '_csrf_token',   
      );
   }
   
   
  
}

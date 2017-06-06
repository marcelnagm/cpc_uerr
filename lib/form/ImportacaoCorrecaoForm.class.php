<?php


class ImportacaoCorrecaoForm extends BaseForm
{
  public function configure()
  {
    
    $this->widgetSchema['sub'] = new sfWidgetFormInputCheckbox(array(
        'label' => 'Deseja Substituir os nboletos encontrados?'
            )
            );
    $this->widgetSchema['arquivo'] = new sfWidgetFormInputFile(array(
        'label' => 'arquivo?'
            )
            );
            
    
    
  }
  
   public function getFields(){
      return array(
          'arquivo',             
          'sub',             
          '_csrf_token',   
      );
   }
   
   
  
}

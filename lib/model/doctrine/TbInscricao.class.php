<?php

/**
 * TbInscricao
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbInscricao extends BaseTbInscricao
{
    public function getVagaDeficienteText(){
        return $this->getVagaDeficiente() == 1 ? 'Sim' : 'Não';
    }
    
    public function getPagoText(){
        return $this->getPago() == 1 ? 'Sim' : 'Não';
    }
    
    public function construct(array $data = null) {
        if(!isset($data))        parent::construct();
        else{
            $this->setArray($data);
        }
    }
 
    public function generateBoleto() {
        $nboleto = '';
        
        
        for($i=  strlen(''.$this->getId());$i<9;$i++){
            $nboleto.='0';
        }
        $nboleto = '7'.$nboleto;
        $nboleto .= $this->getId();
        $this->setBoleto($nboleto);
    }
    
    
    public function toString() {
        return $this->getBoleto();    
    }
    
    
    
    
}

<?php

/**
 * TbCorrecaoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TbCorrecaoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TbCorrecaoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TbCorrecao');
    }
     public function getPorProva() {
          $q = Doctrine_Query::create()->from('TbCorrecao')->where('id_prova = ?',  sfContext::getInstance()->getUser()->getAttribute('prova'));
          return $q;
           
    }
     public function getPorProvaAndInscricao($insc) {
          $q = Doctrine_Query::create()->from('TbCorrecao')->where('id_prova = ?',  sfContext::getInstance()->getUser()->getAttribute('prova'))
                  ->andWhere('id_inscricao = ?',$insc);
          return $q;
           
    }
     
    public function getPorProvaAndVaga($prova,$vaga,$deficiente) {
          $q = Doctrine_Query::create()->from('TbCorrecao c')
                  ->innerJoin('c.TbInscricao ins')                  
                  ->where('c.id_prova = ?',  $prova->getId())
                  ->andWhere('ins.vaga_deficiente = ?',$deficiente)
                  ->orderBy('c.nota DESC');
          return $q;
           
    }
    
}
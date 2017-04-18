<?php

/**
 * TbQuestoesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TbQuestoesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TbQuestoesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TbQuestoes');
    }
    
       public function getPorProva() {
          $q = Doctrine_Query::create()->from('TbQuestoes')->where('id_prova = ?',  sfContext::getInstance()->getUser()->getAttribute('prova'));
          return $q;           
        }
}
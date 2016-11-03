<?php

/**
 * TbSalaProvaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TbSalaProvaTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TbSalaProvaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TbSalaProva');
    }
    
      public function getPorLocalProva() {
          $q = Doctrine_Query::create()->from('TbSalaProva')->where('id_local_prova = ?',  sfContext::getInstance()->getUser()->getAttribute('local_prova'));
          return $q;
           
    }
    
}
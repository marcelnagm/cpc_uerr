<?php

/**
 * TbCidadeProvaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TbCidadeProvaTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TbCidadeProvaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TbCidadeProva');
    }
    
      public function getPorCertame() {
          $q = Doctrine_Query::create()->from('TbCidadeProva')->where('id_certame = ?',  sfContext::getInstance()->getUser()->getAttribute('certame'));
          return $q;
           
    }
    
}
<?php

/**
 * SfMessagesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SfMessagesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object SfMessagesTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SfMessages');
    }
    
     public function getMessagesByEnvirement($e = null)
    {
        $query = Doctrine::getTable('SfMessages')
            ->createQuery('o')
            ->where('o.enviroment = ? and active = 1', $e);
            
        return $query->execute();
    }
    
}
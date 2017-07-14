<?php

/**
 * BaseSfMessages
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $message
 * @property string $enviroment
 * @property boolean $active
 * 
 * @method string     get()           Returns the current record's "message" value
 * @method string     get()           Returns the current record's "enviroment" value
 * @method boolean    get()           Returns the current record's "active" value
 * @method SfMessages set()           Sets the current record's "message" value
 * @method SfMessages set()           Sets the current record's "enviroment" value
 * @method SfMessages set()           Sets the current record's "active" value
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSfMessages extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_messages');
        $this->hasColumn('message', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('enviroment', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}
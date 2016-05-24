<?php

/**
 * BaseTbIdioma
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $descricao
 * 
 * @method string   getDescricao() Returns the current record's "descricao" value
 * @method TbIdioma setDescricao() Sets the current record's "descricao" value
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbIdioma extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_idioma');
        $this->hasColumn('descricao', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}
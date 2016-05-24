<?php

/**
 * BaseTbBanco
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nome
 * @property string $cod
 * @property Doctrine_Collection $TbColaborador
 * 
 * @method string              getNome()          Returns the current record's "nome" value
 * @method string              getCod()           Returns the current record's "cod" value
 * @method Doctrine_Collection getTbColaborador() Returns the current record's "TbColaborador" collection
 * @method TbBanco             setNome()          Sets the current record's "nome" value
 * @method TbBanco             setCod()           Sets the current record's "cod" value
 * @method TbBanco             setTbColaborador() Sets the current record's "TbColaborador" collection
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbBanco extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_banco');
        $this->hasColumn('nome', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('cod', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('TbColaborador', array(
             'local' => 'id',
             'foreign' => 'id_banco'));
    }
}
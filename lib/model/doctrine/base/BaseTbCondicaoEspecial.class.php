<?php

/**
 * BaseTbCondicaoEspecial
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nome
 * @property text $descricao
 * @property Doctrine_Collection $TbCondicaoEspecial
 * 
 * @method string              get()                   Returns the current record's "nome" value
 * @method text                get()                   Returns the current record's "descricao" value
 * @method Doctrine_Collection get()                   Returns the current record's "TbCondicaoEspecial" collection
 * @method TbCondicaoEspecial  set()                   Sets the current record's "nome" value
 * @method TbCondicaoEspecial  set()                   Sets the current record's "descricao" value
 * @method TbCondicaoEspecial  set()                   Sets the current record's "TbCondicaoEspecial" collection
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbCondicaoEspecial extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_condicao_especial');
        $this->hasColumn('nome', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('descricao', 'text', null, array(
             'type' => 'text',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('TbInscricao as TbCondicaoEspecial', array(
             'local' => 'id',
             'foreign' => 'id_condicao_especial'));
    }
}
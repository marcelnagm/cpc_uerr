<?php

/**
 * BaseTbEstado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $uf
 * @property string $nome
 * @property Doctrine_Collection $TbCidade
 * @property Doctrine_Collection $TbEstadoNascimento
 * @property Doctrine_Collection $TbColaborador
 * 
 * @method string              get()                   Returns the current record's "uf" value
 * @method string              get()                   Returns the current record's "nome" value
 * @method Doctrine_Collection get()                   Returns the current record's "TbCidade" collection
 * @method Doctrine_Collection get()                   Returns the current record's "TbEstadoNascimento" collection
 * @method Doctrine_Collection get()                   Returns the current record's "TbColaborador" collection
 * @method TbEstado            set()                   Sets the current record's "uf" value
 * @method TbEstado            set()                   Sets the current record's "nome" value
 * @method TbEstado            set()                   Sets the current record's "TbCidade" collection
 * @method TbEstado            set()                   Sets the current record's "TbEstadoNascimento" collection
 * @method TbEstado            set()                   Sets the current record's "TbColaborador" collection
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbEstado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_estado');
        $this->hasColumn('uf', 'string', 2, array(
             'type' => 'string',
             'length' => 2,
             ));
        $this->hasColumn('nome', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('TbCidade', array(
             'local' => 'id',
             'foreign' => 'tb_estado_id'));

        $this->hasMany('TbCandidato as TbEstadoNascimento', array(
             'local' => 'id',
             'foreign' => 'estado_nascimento'));

        $this->hasMany('TbColaborador', array(
             'local' => 'id',
             'foreign' => 'rguf'));
    }
}
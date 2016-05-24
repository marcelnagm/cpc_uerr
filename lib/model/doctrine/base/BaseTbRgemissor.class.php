<?php

/**
 * BaseTbRgemissor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nome
 * @property Doctrine_Collection $TbRgEmissor
 * @property Doctrine_Collection $TbColaborador
 * 
 * @method string              getNome()          Returns the current record's "nome" value
 * @method Doctrine_Collection getTbRgEmissor()   Returns the current record's "TbRgEmissor" collection
 * @method Doctrine_Collection getTbColaborador() Returns the current record's "TbColaborador" collection
 * @method TbRgemissor         setNome()          Sets the current record's "nome" value
 * @method TbRgemissor         setTbRgEmissor()   Sets the current record's "TbRgEmissor" collection
 * @method TbRgemissor         setTbColaborador() Sets the current record's "TbColaborador" collection
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbRgemissor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_rgemissor');
        $this->hasColumn('nome', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('TbCandidato as TbRgEmissor', array(
             'local' => 'id',
             'foreign' => 'rgemissor'));

        $this->hasMany('TbColaborador', array(
             'local' => 'id',
             'foreign' => 'rgemissor'));
    }
}
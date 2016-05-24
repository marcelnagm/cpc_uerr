<?php

/**
 * BaseTbColaboracao
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_certame
 * @property integer $id_colaborador
 * @property integer $id_funcao
 * @property integer $id_local
 * @property integer $sala
 * @property boolean $servidor
 * @property boolean $presente
 * @property boolean $listagem
 * @property TbCertame $TbCertame
 * @property TbProva $TbProva
 * @property TbCidade $TbCidade
 * @property TbColaborador $TbColaborador
 * 
 * @method integer       getIdCertame()      Returns the current record's "id_certame" value
 * @method integer       getIdColaborador()  Returns the current record's "id_colaborador" value
 * @method integer       getIdFuncao()       Returns the current record's "id_funcao" value
 * @method integer       getIdLocal()        Returns the current record's "id_local" value
 * @method integer       getSala()           Returns the current record's "sala" value
 * @method boolean       getServidor()       Returns the current record's "servidor" value
 * @method boolean       getPresente()       Returns the current record's "presente" value
 * @method boolean       getListagem()       Returns the current record's "listagem" value
 * @method TbCertame     getTbCertame()      Returns the current record's "TbCertame" value
 * @method TbProva       getTbProva()        Returns the current record's "TbProva" value
 * @method TbCidade      getTbCidade()       Returns the current record's "TbCidade" value
 * @method TbColaborador getTbColaborador()  Returns the current record's "TbColaborador" value
 * @method TbColaboracao setIdCertame()      Sets the current record's "id_certame" value
 * @method TbColaboracao setIdColaborador()  Sets the current record's "id_colaborador" value
 * @method TbColaboracao setIdFuncao()       Sets the current record's "id_funcao" value
 * @method TbColaboracao setIdLocal()        Sets the current record's "id_local" value
 * @method TbColaboracao setSala()           Sets the current record's "sala" value
 * @method TbColaboracao setServidor()       Sets the current record's "servidor" value
 * @method TbColaboracao setPresente()       Sets the current record's "presente" value
 * @method TbColaboracao setListagem()       Sets the current record's "listagem" value
 * @method TbColaboracao setTbCertame()      Sets the current record's "TbCertame" value
 * @method TbColaboracao setTbProva()        Sets the current record's "TbProva" value
 * @method TbColaboracao setTbCidade()       Sets the current record's "TbCidade" value
 * @method TbColaboracao setTbColaborador()  Sets the current record's "TbColaborador" value
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbColaboracao extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_colaboracao');
        $this->hasColumn('id_certame', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_colaborador', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_funcao', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_local', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('sala', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('servidor', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('presente', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('listagem', 'boolean', null, array(
             'type' => 'boolean',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TbCertame', array(
             'local' => 'id_certame',
             'foreign' => 'id'));

        $this->hasOne('TbProva', array(
             'local' => 'id_prova',
             'foreign' => 'id'));

        $this->hasOne('TbCidade', array(
             'local' => 'id_cidade',
             'foreign' => 'id'));

        $this->hasOne('TbColaborador', array(
             'local' => 'id_colaborador',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable();
        $this->actAs($timestampable0);
        $this->actAs($signable0);
    }
}
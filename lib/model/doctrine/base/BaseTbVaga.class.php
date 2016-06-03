<?php

/**
 * BaseTbVaga
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_certame
 * @property integer $id_cargo
 * @property integer $id_escolaridade
 * @property integer $id_cidade
 * @property integer $quantidade
 * @property integer $vaga_deficiente
 * @property integer $valor
 * @property date $data_vencimento
 * @property TbCertame $TbCertame
 * @property TbCargo $TbCargo
 * @property TbEscolaridade $TbEscolaridade
 * @property TbCidade $TbCidade
 * @property Doctrine_Collection $TbVaga
 * 
 * @method integer             getIdCertame()       Returns the current record's "id_certame" value
 * @method integer             getIdCargo()         Returns the current record's "id_cargo" value
 * @method integer             getIdEscolaridade()  Returns the current record's "id_escolaridade" value
 * @method integer             getIdCidade()        Returns the current record's "id_cidade" value
 * @method integer             getQuantidade()      Returns the current record's "quantidade" value
 * @method integer             getVagaDeficiente()  Returns the current record's "vaga_deficiente" value
 * @method integer             getValor()           Returns the current record's "valor" value
 * @method date                getDataVencimento()  Returns the current record's "data_vencimento" value
 * @method TbCertame           getTbCertame()       Returns the current record's "TbCertame" value
 * @method TbCargo             getTbCargo()         Returns the current record's "TbCargo" value
 * @method TbEscolaridade      getTbEscolaridade()  Returns the current record's "TbEscolaridade" value
 * @method TbCidade            getTbCidade()        Returns the current record's "TbCidade" value
 * @method Doctrine_Collection getTbVaga()          Returns the current record's "TbVaga" collection
 * @method TbVaga              setIdCertame()       Sets the current record's "id_certame" value
 * @method TbVaga              setIdCargo()         Sets the current record's "id_cargo" value
 * @method TbVaga              setIdEscolaridade()  Sets the current record's "id_escolaridade" value
 * @method TbVaga              setIdCidade()        Sets the current record's "id_cidade" value
 * @method TbVaga              setQuantidade()      Sets the current record's "quantidade" value
 * @method TbVaga              setVagaDeficiente()  Sets the current record's "vaga_deficiente" value
 * @method TbVaga              setValor()           Sets the current record's "valor" value
 * @method TbVaga              setDataVencimento()  Sets the current record's "data_vencimento" value
 * @method TbVaga              setTbCertame()       Sets the current record's "TbCertame" value
 * @method TbVaga              setTbCargo()         Sets the current record's "TbCargo" value
 * @method TbVaga              setTbEscolaridade()  Sets the current record's "TbEscolaridade" value
 * @method TbVaga              setTbCidade()        Sets the current record's "TbCidade" value
 * @method TbVaga              setTbVaga()          Sets the current record's "TbVaga" collection
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbVaga extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_vaga');
        $this->hasColumn('id_certame', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_cargo', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_escolaridade', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_cidade', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('quantidade', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('vaga_deficiente', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('valor', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('data_vencimento', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TbCertame', array(
             'local' => 'id_certame',
             'foreign' => 'id'));

        $this->hasOne('TbCargo', array(
             'local' => 'id_cargo',
             'foreign' => 'id'));

        $this->hasOne('TbEscolaridade', array(
             'local' => 'id_escolaridade',
             'foreign' => 'id'));

        $this->hasOne('TbCidade', array(
             'local' => 'id_cidade',
             'foreign' => 'id'));

        $this->hasMany('TbInscricao as TbVaga', array(
             'local' => 'id',
             'foreign' => 'id_vaga'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable();
        $this->actAs($timestampable0);
        $this->actAs($signable0);
    }
}
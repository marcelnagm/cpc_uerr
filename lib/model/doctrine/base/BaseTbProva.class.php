<?php

/**
 * BaseTbProva
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_certame
 * @property date $data_inicio
 * @property time $hora_inicio
 * @property string $duracao
 * @property TbCertame $TbCertame
 * @property TbVaga $TbVaga
 * @property Doctrine_Collection $TbProva
 * @property Doctrine_Collection $TbLocalProva
 * 
 * @method integer             getIdCertame()    Returns the current record's "id_certame" value
 * @method date                getDataInicio()   Returns the current record's "data_inicio" value
 * @method time                getHoraInicio()   Returns the current record's "hora_inicio" value
 * @method string              getDuracao()      Returns the current record's "duracao" value
 * @method TbCertame           getTbCertame()    Returns the current record's "TbCertame" value
 * @method TbVaga              getTbVaga()       Returns the current record's "TbVaga" value
 * @method Doctrine_Collection getTbProva()      Returns the current record's "TbProva" collection
 * @method Doctrine_Collection getTbLocalProva() Returns the current record's "TbLocalProva" collection
 * @method TbProva             setIdCertame()    Sets the current record's "id_certame" value
 * @method TbProva             setDataInicio()   Sets the current record's "data_inicio" value
 * @method TbProva             setHoraInicio()   Sets the current record's "hora_inicio" value
 * @method TbProva             setDuracao()      Sets the current record's "duracao" value
 * @method TbProva             setTbCertame()    Sets the current record's "TbCertame" value
 * @method TbProva             setTbVaga()       Sets the current record's "TbVaga" value
 * @method TbProva             setTbProva()      Sets the current record's "TbProva" collection
 * @method TbProva             setTbLocalProva() Sets the current record's "TbLocalProva" collection
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbProva extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_prova');
        $this->hasColumn('id_certame', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('data_inicio', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('hora_inicio', 'time', null, array(
             'type' => 'time',
             'notnull' => true,
             ));
        $this->hasColumn('duracao', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 10,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TbCertame', array(
             'local' => 'id_certame',
             'foreign' => 'id'));

        $this->hasOne('TbVaga', array(
             'local' => 'id_vaga',
             'foreign' => 'id'));

        $this->hasMany('TbCorrecao as TbProva', array(
             'local' => 'id',
             'foreign' => 'id_prova'));

        $this->hasMany('TbLocalProva', array(
             'local' => 'id',
             'foreign' => 'id_prova'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable();
        $this->actAs($timestampable0);
        $this->actAs($signable0);
    }
}
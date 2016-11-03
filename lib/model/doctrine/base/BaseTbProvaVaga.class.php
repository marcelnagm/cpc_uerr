<?php

/**
 * BaseTbProvaVaga
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_prova
 * @property integer $id_vaga
 * @property string $gabarito
 * @property TbVaga $TbVaga
 * @property TbProva $TbProva
 * 
 * @method integer     getIdProva()  Returns the current record's "id_prova" value
 * @method integer     getIdVaga()   Returns the current record's "id_vaga" value
 * @method string      getGabarito() Returns the current record's "gabarito" value
 * @method TbVaga      getTbVaga()   Returns the current record's "TbVaga" value
 * @method TbProva     getTbProva()  Returns the current record's "TbProva" value
 * @method TbProvaVaga setIdProva()  Sets the current record's "id_prova" value
 * @method TbProvaVaga setIdVaga()   Sets the current record's "id_vaga" value
 * @method TbProvaVaga setGabarito() Sets the current record's "gabarito" value
 * @method TbProvaVaga setTbVaga()   Sets the current record's "TbVaga" value
 * @method TbProvaVaga setTbProva()  Sets the current record's "TbProva" value
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbProvaVaga extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_prova_vaga');
        $this->hasColumn('id_prova', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_vaga', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('gabarito', 'string', null, array(
             'type' => 'string',
             ));


        $this->index('prova_vaga', array(
             'fields' => 
             array(
              0 => 'id_prova',
              1 => 'id_vaga',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TbVaga', array(
             'local' => 'id_vaga',
             'foreign' => 'id'));

        $this->hasOne('TbProva', array(
             'local' => 'id_prova',
             'foreign' => 'id'));
    }
}
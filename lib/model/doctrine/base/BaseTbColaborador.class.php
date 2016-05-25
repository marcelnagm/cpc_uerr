<?php

/**
 * BaseTbColaborador
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nome
 * @property string $sexo
 * @property string $rg
 * @property integer $rgtipo
 * @property integer $rguf
 * @property integer $rgemissor
 * @property string $cpf
 * @property string $pispasep
 * @property string $cep
 * @property string $logradouro
 * @property string $endereco
 * @property string $bairro
 * @property integer $id_cidade
 * @property string $telefone
 * @property string $celular
 * @property string $tipo_conta
 * @property string $contabanco
 * @property string $agenciabanco
 * @property integer $id_banco
 * @property string $localidade
 * @property string $experiencia
 * @property string $profissao
 * @property text $observacao
 * @property string $email
 * @property TbCidade $TbCidade
 * @property TbRgtipo $TbRgtipo
 * @property TbRgemissor $TbRgemissor
 * @property TbBanco $TbBanco
 * @property TbEstado $TbEstado
 * @property TbLogradouro $TbLogradouro
 * @property Doctrine_Collection $TbColaborador
 * @property Doctrine_Collection $TbResponsavelSala
 * 
 * @method string              getNome()              Returns the current record's "nome" value
 * @method string              getSexo()              Returns the current record's "sexo" value
 * @method string              getRg()                Returns the current record's "rg" value
 * @method integer             getRgtipo()            Returns the current record's "rgtipo" value
 * @method integer             getRguf()              Returns the current record's "rguf" value
 * @method integer             getRgemissor()         Returns the current record's "rgemissor" value
 * @method string              getCpf()               Returns the current record's "cpf" value
 * @method string              getPispasep()          Returns the current record's "pispasep" value
 * @method string              getCep()               Returns the current record's "cep" value
 * @method string              getLogradouro()        Returns the current record's "logradouro" value
 * @method string              getEndereco()          Returns the current record's "endereco" value
 * @method string              getBairro()            Returns the current record's "bairro" value
 * @method integer             getIdCidade()          Returns the current record's "id_cidade" value
 * @method string              getTelefone()          Returns the current record's "telefone" value
 * @method string              getCelular()           Returns the current record's "celular" value
 * @method string              getTipoConta()         Returns the current record's "tipo_conta" value
 * @method string              getContabanco()        Returns the current record's "contabanco" value
 * @method string              getAgenciabanco()      Returns the current record's "agenciabanco" value
 * @method integer             getIdBanco()           Returns the current record's "id_banco" value
 * @method string              getLocalidade()        Returns the current record's "localidade" value
 * @method string              getExperiencia()       Returns the current record's "experiencia" value
 * @method string              getProfissao()         Returns the current record's "profissao" value
 * @method text                getObservacao()        Returns the current record's "observacao" value
 * @method string              getEmail()             Returns the current record's "email" value
 * @method TbCidade            getTbCidade()          Returns the current record's "TbCidade" value
 * @method TbRgtipo            getTbRgtipo()          Returns the current record's "TbRgtipo" value
 * @method TbRgemissor         getTbRgemissor()       Returns the current record's "TbRgemissor" value
 * @method TbBanco             getTbBanco()           Returns the current record's "TbBanco" value
 * @method TbEstado            getTbEstado()          Returns the current record's "TbEstado" value
 * @method TbLogradouro        getTbLogradouro()      Returns the current record's "TbLogradouro" value
 * @method Doctrine_Collection getTbColaborador()     Returns the current record's "TbColaborador" collection
 * @method Doctrine_Collection getTbResponsavelSala() Returns the current record's "TbResponsavelSala" collection
 * @method TbColaborador       setNome()              Sets the current record's "nome" value
 * @method TbColaborador       setSexo()              Sets the current record's "sexo" value
 * @method TbColaborador       setRg()                Sets the current record's "rg" value
 * @method TbColaborador       setRgtipo()            Sets the current record's "rgtipo" value
 * @method TbColaborador       setRguf()              Sets the current record's "rguf" value
 * @method TbColaborador       setRgemissor()         Sets the current record's "rgemissor" value
 * @method TbColaborador       setCpf()               Sets the current record's "cpf" value
 * @method TbColaborador       setPispasep()          Sets the current record's "pispasep" value
 * @method TbColaborador       setCep()               Sets the current record's "cep" value
 * @method TbColaborador       setLogradouro()        Sets the current record's "logradouro" value
 * @method TbColaborador       setEndereco()          Sets the current record's "endereco" value
 * @method TbColaborador       setBairro()            Sets the current record's "bairro" value
 * @method TbColaborador       setIdCidade()          Sets the current record's "id_cidade" value
 * @method TbColaborador       setTelefone()          Sets the current record's "telefone" value
 * @method TbColaborador       setCelular()           Sets the current record's "celular" value
 * @method TbColaborador       setTipoConta()         Sets the current record's "tipo_conta" value
 * @method TbColaborador       setContabanco()        Sets the current record's "contabanco" value
 * @method TbColaborador       setAgenciabanco()      Sets the current record's "agenciabanco" value
 * @method TbColaborador       setIdBanco()           Sets the current record's "id_banco" value
 * @method TbColaborador       setLocalidade()        Sets the current record's "localidade" value
 * @method TbColaborador       setExperiencia()       Sets the current record's "experiencia" value
 * @method TbColaborador       setProfissao()         Sets the current record's "profissao" value
 * @method TbColaborador       setObservacao()        Sets the current record's "observacao" value
 * @method TbColaborador       setEmail()             Sets the current record's "email" value
 * @method TbColaborador       setTbCidade()          Sets the current record's "TbCidade" value
 * @method TbColaborador       setTbRgtipo()          Sets the current record's "TbRgtipo" value
 * @method TbColaborador       setTbRgemissor()       Sets the current record's "TbRgemissor" value
 * @method TbColaborador       setTbBanco()           Sets the current record's "TbBanco" value
 * @method TbColaborador       setTbEstado()          Sets the current record's "TbEstado" value
 * @method TbColaborador       setTbLogradouro()      Sets the current record's "TbLogradouro" value
 * @method TbColaborador       setTbColaborador()     Sets the current record's "TbColaborador" collection
 * @method TbColaborador       setTbResponsavelSala() Sets the current record's "TbResponsavelSala" collection
 * 
 * @package    uerr
 * @subpackage model
 * @author     Marcel Nagm
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbColaborador extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_colaborador');
        $this->hasColumn('nome', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('sexo', 'string', 1, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('rg', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('rgtipo', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('rguf', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('rgemissor', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('cpf', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('pispasep', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cep', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('logradouro', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('endereco', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('bairro', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('id_cidade', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('telefone', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('celular', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('tipo_conta', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('contabanco', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('agenciabanco', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('id_banco', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('localidade', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('experiencia', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('profissao', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('observacao', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TbCidade', array(
             'local' => 'id_cidade',
             'foreign' => 'id'));

        $this->hasOne('TbRgtipo', array(
             'local' => 'rgtipo',
             'foreign' => 'id'));

        $this->hasOne('TbRgemissor', array(
             'local' => 'rgemissor',
             'foreign' => 'id'));

        $this->hasOne('TbBanco', array(
             'local' => 'id_banco',
             'foreign' => 'id'));

        $this->hasOne('TbEstado', array(
             'local' => 'rguf',
             'foreign' => 'id'));

        $this->hasOne('TbLogradouro', array(
             'local' => 'logradouro',
             'foreign' => 'id'));

        $this->hasMany('TbLocalProva as TbColaborador', array(
             'local' => 'id',
             'foreign' => 'id_responsavel'));

        $this->hasMany('TbResponsavelSala', array(
             'local' => 'id',
             'foreign' => 'id_colaborador'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $signable0 = new Doctrine_Template_Signable();
        $this->actAs($timestampable0);
        $this->actAs($signable0);
    }
}
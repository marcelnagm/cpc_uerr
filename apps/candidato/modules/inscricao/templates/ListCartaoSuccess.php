<?php use_helper('I18N', 'Date') ?>
<style>
    table{
        float: left;
        text-align: left;
        width: 750px;
        padding: 10px;
        border-radius: 30px 30px 0 0 ;
    }
    
    table td:first-child{
    border-radius: 30px 30px 0 0 ;  
    }
    table td{
        border:  #000 solid thin;
        padding: 10px;        
    }
    table th{
        border:  #000 solid thin;
        padding: 2px;
    }
    table tr th{
        width: 30.5%;
        padding: 2px;
    }
    
    h2{
        line-height: 1em;
    }


</style>
<?php // $cartao = new TbLotacaoProva();
$tb_inscricao = $cartao->getTbInscricao();
//$tb_local_prova = new TbLocalProva();
$tb_local_prova = $cartao->getTbSalaProva()->getTbLocalProva()->getTbLocal();
$tb_prova = $cartao->getTbSalaProva()->getTbLocalProva()->getTbProva();
?>
<table >
    <tbody>
        <tr>
            <td colspan="2" style=" text-align: center">
                <? echo image_tag('_uerr_historic.png', array('width' => "142", 'height' => "130", 'style' => 'float:left')) ?>  
                <? echo image_tag('rr.png', array('width' => "100", 'height' => "130", 'style' => 'float:right')) ?>  
                <p><h3>Universidade Estadual de Roraima</h3></p>
                <p><h3>Comissão Permanente de Concurso e Vestibular</h3></p>                
                <h2>Comprovante de Confirmação</h2>
            </td>
        </tr>
        <tr>
            <th>Identificador da Inscrição:</th>
            <td class="sf_admin_text sf_admin_list_th_id">
                <?php echo $cartao->getTbInscricao()->getBoleto(); ?>
            </td>
        </tr>
        <tr>
            <th>Certame:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_certame">
                <?php echo $tb_inscricao->getTbCertame()->getNome(); ?>
            </td>
        </tr>
        <tr>
            <th>Vaga </th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_vaga">
                <?php echo $tb_inscricao->getTbVaga()->getTbCargo() ?>
            </td>
        </tr>
        <tr>
            <th>Escolaridade:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_vaga">
                <?php echo $tb_inscricao->getTbVaga()->getTbEscolaridade() ?>
            </td>
        </tr>        
        <tr>
            <th>Cidade de Prova:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_cidade_prova">
                <?php echo $tb_inscricao->getTbCidadeProva() ?>
            </td>
        </tr>
        <tr>
            <th>Necessita de Condicao especial?:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_condicao_especial">
                <?php echo $tb_inscricao->getTbCondicaoEspecial() ?>
            </td>
        </tr>
        <tr>
            <th>Local de Prova:</th>
            <td class="sf_admin_text sf_admin_list_th_pago">
                <?php echo $tb_local_prova->getNome();?>
            </td>
        </tr>
        <tr>
            <th>Endereço:</th>
            <td class="sf_admin_text sf_admin_list_th_pago">
                <?php echo $tb_local_prova->getEndereco();?>
            </td>
        </tr>
        <tr>
            <th>Sala:</th>
            <td class="sf_admin_text sf_admin_list_th_pago">
                <?php echo $cartao->getTbSalaProva()->getNumeroSala();?>
            </td>
        </tr>
        <tr>
            <th>Data da Prova:</th>
            <td class="sf_admin_text sf_admin_list_th_vaga_deficiente">
                <?php echo format_date($tb_prova->getDataInicio(),'d/MM/yyyy');?>
            </td>
        </tr>
        <tr>
            <th>Hora da Prova:</th>
            <td class="sf_admin_text sf_admin_list_th_vaga_deficiente">
                <?php echo $tb_prova->getHoraInicio();?>
            </td>
        </tr>              
        <tr>
            <th>Idioma selecionado:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_idioma">
                <?php echo $tb_inscricao->getTbIdioma() ?>
            </td>
        </tr>
    </tbody>
</table>

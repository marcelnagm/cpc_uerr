<style>
    table{
        float: left;
        text-align: left;
        width: 750px;
    }
    table td{
        border:  #000 solid thin;
    }
    table th{
        border:  #000 solid thin;
    }
    table tr th{
        width: 30.5%;
    }
    
    h2{
        line-height: 1em;
    }


</style>

<table >
    <tbody>
        <tr>
            <td colspan="2" style=" text-align: center">
                <? echo image_tag('_uerr_historic.png', array('width' => "142", 'height' => "130", 'style' => 'float:left')) ?>  
                <? echo image_tag('rr.png', array('width' => "100", 'height' => "130", 'style' => 'float:right')) ?>  
                <p><h3>Universidade Estadual de Roraima</h3></p>
                <p><h3>Comissão Permanente de Concurso e Vestibular</h3></p>                
                <h2>Comprovante de Inscrição</h2>
            </td>
        </tr>
        <tr>
            <th>Id:</th>
            <td class="sf_admin_text sf_admin_list_th_id">
                <?php echo $tb_inscricao->getId(); ?>
            </td>
        </tr>
        <tr>
            <th>Certame:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_certame">
                <?php echo $tb_inscricao->getTbCertame() ?>
            </td>
        </tr>
        <tr>
            <th>Vaga:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_vaga">
                <?php echo $tb_inscricao->getTbVaga() ?>
            </td>
        </tr>
        <tr>
            <th>Necessita de Condicao especial?:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_condicao_especial">
                <?php echo $tb_inscricao->getTbCondicaoEspecial() ?>
            </td>
        </tr>
        <tr>
            <th>Cidade de Prova:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_cidade_prova">
                <?php echo $tb_inscricao->getTbCidadeProva() ?>
            </td>
        </tr>
        <tr>
            <th>Pago:</th>
            <td class="sf_admin_text sf_admin_list_th_pago">
                <?php echo $tb_inscricao->getPagoText() ?>
            </td>
        </tr>
        <tr>
            <th>Vaga deficiente:</th>
            <td class="sf_admin_text sf_admin_list_th_vaga_deficiente">
                <?php echo $tb_inscricao->getVagaDeficiente() ?>
            </td></tr>
        <tr>
            <th>Idioma selecionado:</th>
            <td class="sf_admin_foreignkey sf_admin_list_th_id_idioma">
                <?php echo $tb_inscricao->getTbIdioma() ?>
            </td>
        </tr>
    </tbody>
</table>

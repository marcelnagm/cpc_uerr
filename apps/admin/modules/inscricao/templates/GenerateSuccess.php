<?php use_helper('I18N', 'Date') ?>
<?php include_partial('inscricao/assets') ?>
<style>

    @media all{@page {
                   size: a3 portrait; 
                   margin: 0,5cm;
                   margin-bottom: 1cm;
                   margin-top: 2cm;
                   margin-left: 0,5cm;
               }

               .remove-abs {
                   position:static;
               }

               .page-break {
                   page-break-before:always; 
               }

               h1{              
                   font-size:  30px;    
                   font-style: oblique;    
               }
               #presence_list_container_info {
                   width: 100%;
                   font-size:  22px;    
               }
               #presence_list_container_info tr:first-child td{
                   border-top: lightgray solid thin;    
               }

               #presence_list_container_info td:last-child, #presence_list_container td:last-child{
                   border-right:  lightgray solid thin;    
               }

               #presence_list_container_info td, #presence_list_container td{
                   border-bottom: lightgray solid thin;                                
                   border-left: lightgray solid thin;                                
               }

               #presence_list_container_info tr:first-child td, #presence_list_container tr:first-child td{
                   border-top: lightgray solid thin;    
               }

               #presence_list_container_info td:last-child,  #presence_list_container td:last-child{
                   border-right:  lightgray solid thin;    
               }

               #presence_list_container_info td,#presence_list_container td{
                   border-bottom: lightgray solid thin;                                
                   border-left: lightgray solid thin;                                
                   padding: 0px !important;
                   padding-left: 3px !important;
               }
               #num_sala{
                   background-color: #CCCCCC !important;
               }
    }
</style>
<?php echo image_tag('logo-cpc.png', array('width' => '530px', 'heigth' => '53')); ?>
<h2>Relatório de Inscritos</h2>
<?php
ob_flush();
flush();
?>
<div id="sf_admin_container">
    <div id="sf_admin_content">        
        <h3><?php echo 'Vaga: ' . $vaga ?></h3>
        <h3><?php echo 'Cidade de Prova: ' . $cidade; ?></h3>
        <table id="">
            <tr>
<!---<td  align="center" bgcolor="#F4F4F4"><b>ORDEM</b></td> -->
                <td align="center" bgcolor="#F4F4F4"><b>NOME DO CANDIDATO</b></td>
                <td align="center" bgcolor="#F4F4F4"><b>INSCRIÇÃO</b></td>
                <td align="center" bgcolor="#F4F4F4"><b>CARGO (LOCALIDADE)</b></td>
                <td align="center" bgcolor="#F4F4F4"><b>CIDADE DE PROVA</b></td>
            </tr>
            <?php
            $insc = new TbInscricao();
            $in = false;

            foreach ($inscricoes as $insc) {
                $color = $in ? '#CCCCCC' : '#FFFFFF';
                ?>
                <tr bgcolor="<?php echo $color; ?>"> 
    <!---<td align="center">1</td><!--ordem de exibição -->
                    <td><?php echo $insc->getTbCandidato()->getNome(); ?></td>
                    <td align="center"><?php echo $insc->getBoleto(); ?></td>
                    <td align="justify"><?php echo $insc->getTbVaga(); ?></td>
                    <td align="center"><?php echo $insc->getTbCidadeProva()->getTbCidade()->getNome(); ?></td>
                </tr>
                <?php
                ob_flush();
                flush();
                ?>
                <?php
                $in = !$in;
            }
            ?>
            <tr>
                <td><b>Totais de Candidatos</b></td>
                <td><b><?php echo count($inscricoes); ?></b></td>
            </tr>
        </table>

    </div>
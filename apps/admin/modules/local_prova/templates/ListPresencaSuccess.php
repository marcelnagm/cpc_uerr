<?php use_helper('I18N', 'Date') ?>
<?php include_partial('inscricao/assets') ?>
<style>

    @media all{@page {
                   size: a3 landscape; 
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
    </style>

    <?php $sala = new TbSalaProva(); ?>

    <?php echo image_tag('logo-cpc.png'); ?>
    <h1>Listagem Geral - <?php echo $local_prova->getTbLocal()->getNome(); ?></h1>
    <table id="presence_list_container_info">
        <tr>                
            <td>Insc.</td>                
            <td>Nome do Candidato</td>                
            <td>Cargo</td>                
            <td>Municipio do Cargo</td>                
            <td>Local de Prova</td>
            <td>Ling. Estrangeira</td>
            <td>Sala</td>
        </tr>
        <?php foreach ($salas as $sala): ?>   
            <?php
            $lotacao = new TbLotacaoProva();
            foreach ($sala->getTbLotacaoProva() as $lotacao):
                $inscricao = $lotacao->getTbInscricao();
                $candidato = $inscricao->getTbCandidato();
                ?>
                <tr>
                    <td><?php echo $inscricao->getBoleto(); ?></td>                    
                    <td><?php echo $candidato->getNome(); ?></td>
                    <td><?php echo $inscricao->getTbVaga()->getTbCargo(); ?></td>
                    <td><?php echo $inscricao->getTbVaga()->getTbCidade(); ?></td>
                    <td><?php echo $local_prova->getTbLocal()->getNome(); ?></td>
                    <td><?php echo $inscricao->getTbIdioma(); ?></td>
                    <td><?php echo $sala->getNumeroSala(); ?></td>
                </tr>
                <?php  endforeach; ?>
        <?php endforeach; ?>
    </table>



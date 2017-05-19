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
    <?php $sala = new TbSalaProva(); ?>
    <?php foreach ($salas as $sala): ?>   
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody><tr>
                    <td width="30%" align="center"><a href="javascript:history.go(-1)"><?php echo image_tag('logo-cpc.png',array('width' => '530px','heigth' => '53')); ?></a></td>
                    <td width="70%" align="center">

                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tbody><tr class="">
                                    <td width="100%%" align="center">
                                        <font face="Arial, Helvetica, sans-serif" size="+2">
                                        <?php echo $local_prova->getTbCertame()->getNome(); ?>
                                        </font><br><font face="Arial, Helvetica, sans-serif" size="+1">
                                        Local de Prova: <?php echo $local_prova->getTbLocal(); ?><br>
                                        <?php echo $local_prova->getTbProva()->getTbCidadeProva() ; ?>
                                        </font>
                                    </td>
                                    <td id="num_sala" rowspan="2" align="center" style="font-size:80px; font-family:Arial, Helvetica, sans-serif;background-color: #CCCCCC !important;" ><?php echo $sala->getNumeroSala(); ?></td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-size:36px; font-family:Arial, Helvetica, sans-serif">Sala:</td>
                                </tr>
                            </tbody></table>
                    </td>
                </tr>
            </tbody></table>        
        <table id="presence_list_container_info">
            <tr>
                <td style="width: 10px">Nº</td>
                <td>Rg/UF</td>
                <td>Nome do Candidato</td>
                <td>Cargo</td>
                <td>Ling. Estrangeira</td>
            </tr>
            <?php
            $lotacao = new TbLotacaoProva();
            $i = 1;
             $in = false;   
            foreach ($sala->getTbLotacaoProva() as $lotacao):
                $inscricao = $lotacao->getTbInscricao();
                $candidato = $inscricao->getTbCandidato();
                  $color = $in ? '#CCCCCC' : '#FFFFFF';
                ?>
                      <tr style="background-color: <?php echo $color; ?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $candidato->getRgFormatted(); ?></td>
                    <td><?php echo $candidato->getNome(); ?></td>
                    <td><?php echo $inscricao->getTbVaga()->getTbCargo(); ?></td>
                    <td><?php echo $inscricao->getTbIdioma(); ?></td>
                </tr>
                <?php
                $in = !$in;
                $i++;
            endforeach;
            ?>
        </table>
        <p class="footer" style="page-break-after:always;"></p>
    <?php endforeach; ?>


<?php
/**
 * @var $prova TbProva
 */
//$prova = new TbProva();
?>
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

<h2><?php echo $prova->getTbCertame()->getNome(); ?></h2>
<?php if ($final) { ?>
    <h2>Resultado Final</h2>
<?php } else { ?>
    <h2>Resultado Preliminar</h2>
<?php } ?>
<h3><?php echo $vaga; ?></h3>
<?php if ($deficiente) { ?>
    <h2>Vaga Reservada a PNE</h2>
<?php } ?>
<div id="sf_admin_container">
    <div id="sf_admin_content">


        <table id="presence_list_container_info">

            <?php
            $corre = TbCorrecaoTable::getInstance()->getPorProvaAndVaga(
                            $prova, $vaga, $deficiente ? '1' : '0'
                    )->execute();
            ?>
            <tr>
                <td>Num. Insc</td>
                <td style="width: 80%">Nome</td>
                <td>Pontuação</td>
                <?php if ($redacao) { ?>
                    <td>Nota Redacao</td>
                    <td>Nota Final</td>
                <?php } ?>
                <?php if ($final) { ?>
                    <td>Situação</td>
                <?php } ?>
                    
            </tr>
            <?php
//            $c = new TbCorrecao();
            $i = 1;
            $in = false;
            $qtd = $deficiente == true ? $vaga->getVagaDeficiente() : $vaga->getQuantidade();
            echo $deficiente;
            echo $qtd;
            foreach ($corre as $c) {

                $color = $in ? '#CCCCCC' : '#FFFFFF';
              
                ?>              
                <tr style="background-color: <?php echo $color; ?>">
                    <td><?php echo $c->getTbInscricao()->getBoleto() . ' / ' . $c->getId(); ?></td>
                    <td><?php echo $c->getTbInscricao()->getTbCandidato()->getNome(); ?></td>
                    <td><?php echo $c->getNotaF(); ?></td>
                    <?php if ($redacao) { ?>
                        <td><?php echo $c->getNotaFinalRedacaof(); ?></td>
                        <td><?php echo $c->getNotaFinalF(); ?></td>
                    <?php } ?>
                    <?php if ($final) { ?>
                        <td><?php echo   ($i <= $qtd )? 'Classificado' : 'Não Classificado'; ?></td>                        
                    <?php } ?> 
                </tr>
                <?php
                $i++;
                $in = !$in;
            }
            ?>
        </table>


    </div>

    <p><?php echo link_to1('Voltar a Lista de Provas', 'prova/index'); ?></p>
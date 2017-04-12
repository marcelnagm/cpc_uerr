<?php 
/**
 * @var $prova TbProva
 */
//$prova = new TbProva();
?>

<h2><?php echo $prova->getTbCertame()->getNome(); ?></h2>
detalhes do certame:
<table>
    <tr>
        <td>Comissão Organizadora:</td>
        <td> <?php echo $prova->getTbCertame()->getEntidadeSigla(); ?></td>            
        <td>Tipo do certame:</td>
        <td> <?php echo $prova->getTbCertame()->getTbTipoCertame();?></td>        
    </tr>
</table>
<table class="certame_info">   
    <tr>
        <td>Total Inscritos: </td>
        <td><?php echo $totalinscritos?></td>
    </tr>
    <tr>
        <td>Total Alocados: </td>
        <td><?php echo $j;?></td>
    </tr>
</table>

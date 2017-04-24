<?php 
/**
 * @var $prova TbProva
 */
//$prova = new TbProva();
?>
<h1 style="color: red; background-color: black;">Tela de Verificação</h1>
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
<h3>Foram encontrados <?php echo count($local_prova); ?> locais de prova</h3>

<table class="certame_info">
    
<?php 

$local = new TbLocalProva();
foreach ($local_prova as $local):?>
    <tr>
        <td><?php echo $local->getTbLocal()->getNome();?></td>        
    </tr>
    <tr>
        <td>Salas Cadastradas:</td>        
    </tr>
    <?php 
        $salas = TbSalaProvaTable::getInstance()->findByDql('id_local_prova = ? and status = 1',array('1'=> $local->getId()));
//        $sala = new TbSalaProva();
        foreach ($salas as $sala):
        ?>
    <tr>
        <td>Numero da Sala:</td>        
        <td>Vagas:</td>        
        <td>Tem acesso Especial:</td>        
    </tr>
    <tr>
        
        <td><?php echo $sala->getNumeroSala();?></td>        
        <td><?php echo $sala->getVagas();?></td>        
        <td><?php echo $sala->getEspecial();?></td>        
        
    </tr>
    <?php endforeach;?>
<?php endforeach;?>
</table>


<p><?php echo link_to1('Alocar Candidatos', 'prova/ListGenerate?id='.$prova->getId()); ?></p>
<p><?php echo link_to1('Voltar a Lista de Provas', 'prova/index'); ?></p>
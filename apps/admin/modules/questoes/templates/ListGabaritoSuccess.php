<h2><?php echo $prova; ?></h2>

<table>
    <tr>
        <td>Numero</td>
        <td>Peso</td>
        <td>Gabarito</td>
    </tr>
    <?php foreach ($questoes as $questao): ?>
        <tr>
            <td><?php echo $questao->getNumero(); ?></td>
            <td><?php echo $questao->getPeso(); ?></td>
            <td><b><?php echo $questao->getGabarito(); ?></b></td>        
        </tr>
    <?php endforeach; ?>
</table>
<?php echo link_to1('Voltar as Questões', 'questoes/index'); ?>
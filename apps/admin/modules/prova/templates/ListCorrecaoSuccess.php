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
        <td> <?php echo $prova->getTbCertame()->getTbTipoCertame(); ?></td>        
    </tr>
</table>
<table>
    <tr>
        <td>Inscricao</td>
        <td>Nota</td>
    </tr>
    <?php foreach ($cartoes as $cartao) { ?>
        <tr>        
            <td>
                <?php echo $cartao; ?>
            </td>
            <?php
            $nota = 0;
            $i = 0;
            $questao = new TbQuestoes();
            $respostas = $cartao->getGabarito();
            foreach ($questoes as $questao) {
                $alternativa = substr($respostas, $i, 1);
                if (strcasecmp($questao->getGabarito(), $alternativa) == 0) {
                    $nota += $questao->getPeso();
                }

                $i++;
            }

            $cartao->setNota($nota);
            $cartao->save();
            ?>
            <td>
                <?php echo $nota; ?>
            </td>
        </tr>
        <?php
        unset($cartao);
    }
    ?>
</table>



<p><?php echo link_to1('Voltar a Lista de Provas', 'prova/index'); ?></p>
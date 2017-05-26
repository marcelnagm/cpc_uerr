<?php
/**
 * @var $prova TbProva
 */
//$prova = new TbProva();
?>
<h1 style="color: red; background-color: black;">Tela de Resultados</h1>
<h2><?php echo $prova->getTbCertame()->getNome(); ?></h2>
<div id="sf_admin_container">
    <div id="sf_admin_content">
        <div class="sf_admin_form">
            <form action="<?php echo url_for1('prova/ListResultadoGenerate');?>" method="post">
                <?php
                foreach ($form->getFields() as $field):

                    if ($form[$field]->isHidden()) {
                        echo $form[$field];
                    } else {
                        ?>

                        <div class="sf_admin_form_row">
                            <?php echo $form[$field]->renderLabel(); ?>
                            <?php ?>
                            <?php echo $form[$field]; ?>    
                        </div>
                        <?php
                    }
                endforeach;
                ?>
                <div class="sf_admin_form_row">
                    <input type="submit" value="Gerar">
                </div>
            </form>
        </div>


    </div>

<p><?php echo link_to1('Voltar a Lista de Provas', 'prova/index'); ?></p>
<?php use_helper('I18N', 'Date') ?>
<?php include_partial('inscricao/assets') ?>
<h2>Relatório de Inscritos</h2>
<div id="sf_admin_container">
    <div id="sf_admin_content">
        <div class="sf_admin_form">
            <form action="<?php echo url_for1('inscricao/Generate');?>" method="post">
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
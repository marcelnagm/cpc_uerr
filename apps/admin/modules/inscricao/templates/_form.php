<div id="sf_admin_container">
    <div id="sf_admin_content">
        <div class="sf_admin_form">
            <form action="<?php echo url_for1($path); ?>" method="post"  enctype="multipart/form-data">
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
</div>
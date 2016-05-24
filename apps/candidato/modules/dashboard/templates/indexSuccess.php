<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
    <?php $sf_user->setFlash('notice', '') ?>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
    <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
    <?php $sf_user->setFlash('error', '') ?>
<?php endif; ?>
Avisos
<?
//$m = new SfMessages();
foreach ($messages as $m) {
    ?>
<div style="background-color: wheat; color: black;">
    <p>    
 <? echo sfOutputEscaper::unescape($m->getMessage()) ;  ?>
       </p> 
           <?    
    }
    ?>
</div>

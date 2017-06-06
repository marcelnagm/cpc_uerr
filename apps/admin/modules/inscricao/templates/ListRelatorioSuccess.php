<?php use_helper('I18N', 'Date') ?>
<?php include_partial('inscricao/assets') ?>
<h2>Relatório de Inscritos</h2>
    
<?php  include_partial('inscricao/form',array('form' => $form,'path' => 'inscricao/Generate')); ?>
            
        
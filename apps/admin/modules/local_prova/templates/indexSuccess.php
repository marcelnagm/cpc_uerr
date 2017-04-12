<?php use_helper('I18N', 'Date') ?>
<?php include_partial('local_prova/assets') ?>

<div id="sf_admin_container">
  <?php include_partial('local_prova/flashes') ?>

  <h2 class="title"><?php echo __('Lista de Locais de Prova - "%%TbCertame%%"', array('%%TbCertame%%' => $certame), 'messages') ?></h2>

  <ul class="sf_admin_actions left">
        <?php echo $helper->linkToNew(array(  'params' =>   array(  ),  'class_suffix' => 'new',  'label' => 'New',)) ?>
        </ul>

  <div id="sf_admin_bar">
    <?php include_partial('local_prova/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_header">
    <?php include_partial('local_prova/list_header', array('pager' => $pager)) ?>
  </div>
  <div id="sf_admin_content">
    <form action="<?php echo url_for('tb_local_prova_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('local_prova/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('local_prova/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('local_prova/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('local_prova/list_footer', array('pager' => $pager)) ?>
  </div>
</div>

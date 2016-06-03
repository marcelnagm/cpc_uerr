<?php use_helper('I18N', 'Date') ?>
<?php include_partial('inscricao/assets') ?>

<div id="sf_admin_container">
  <?php include_partial('inscricao/flashes') ?>

  <h2 class="title">Lista de Inscrições no Certame: <? echo $certame; ?> </h2>

  <ul class="sf_admin_actions left">
        <?php echo $helper->linkToNew(array(  'params' =>   array(  ),  'class_suffix' => 'new',  'label' => 'New',)) ?>
        </ul>


  <div id="sf_admin_header">
    <?php include_partial('inscricao/list_header', array('pager' => $pager)) ?>
  </div>
  <div id="sf_admin_content">
    <form action="<?php echo url_for('tb_inscricao_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('inscricao/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('inscricao/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('inscricao/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('inscricao/list_footer', array('pager' => $pager)) ?>
  </div>
</div>

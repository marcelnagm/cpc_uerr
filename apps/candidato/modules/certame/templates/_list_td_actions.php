<td>
  <ul class="sf_admin_td_actions">
      <?php 
       $data = date('Y-m-d H:s');
      if ((( $data >= $tb_certame->getDataInicioInscricao()) && ( $data <= $tb_certame->getDataFimInscricao() ))) { ?>
    <li class="sf_admin_action_inscrever">
      <?php echo link_to(__('Inscrever-se', array(), 'messages'), 'certame/ListInscrever?id='.$tb_certame->getId(), array()) ?>
    </li>
      <?php }?>
    <li class="sf_admin_action_inscricao">
      <?php echo link_to(__('Listar Inscrições', array(), 'messages'), 'certame/ListInscricao?id='.$tb_certame->getId(), array()) ?>
    </li>
  </ul>
</td>

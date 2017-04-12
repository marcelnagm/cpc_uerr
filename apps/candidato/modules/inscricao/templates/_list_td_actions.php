<td>
  <ul class="sf_admin_td_actions">    
    <?php echo $helper->linkToShow($tb_inscricao, array(  'label' => 'Comprovante de Inscrição',  'params' =>   array(  ),  'class_suffix' => 'show',)) ?>
    <li class="sf_admin_action_boleto">
      <?php echo link_to(__('Gerar Boleto', array(), 'messages'), 'inscricao/ListBoleto?id='.$tb_inscricao->getId(), array()) ?>
    </li>
    <li class="sf_admin_action_cartao">
      <?php echo link_to(__('Buscar Cartão de Confirmação', array(), 'messages'), 'inscricao/ListCartao?id='.$tb_inscricao->getId(), array()) ?>
    </li>
  </ul>
</td>

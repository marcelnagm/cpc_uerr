<?php decorate_with(dirname(__FILE__).'/../../../templates/login.php') ?>
<h1>Uerr</h1>
<form>
  <h3>Página não encontrada!</h3>
  <p>Desculpe, mas a página requisitada não existe ou o endereço foi digitado incorretamente.</p>
  <p><button type="button" onclick="javascript:history.go(-1)" >Voltar</button></p>
  <p><?php echo link_to('Ir para a página inicial', '@homepage') ?></p>
</form>


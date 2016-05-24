<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <div>
      <?php print $form['username']->renderLabel(); ?>
      <?php print $form['username']->renderError(); ?>
    </div>
    <div>
    <?php print $form['username'] ?>
    </div>
    <div>
    <?php print $form['password']->renderLabel(); ?>
    <?php print $form['password']->renderError(); ?>
    </div>
    <div>
    <?php print $form['password'] ?>
    </div>
    <div>
    <?php print $form['_csrf_token'] ?>
    </div>
    <input type="submit" value="<?php echo __('Login', null, 'sf_guard') ?>" />
    <?php $routes = $sf_context->getRouting()->getRoutes() ?>
    <?php if (isset($routes['sf_guard_forgot_password'])): ?>
      <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Esqueceu a Senha?', null, 'sf_guard') ?></a>
      <a href="<?php echo url_for('@tb_candidato'); ?>"><?php echo __('Cadastrar-se', null, 'sf_guard') ?></a>
    <?php endif; ?>
</form>

<?php use_helper('I18N') ?>
<h1><?php echo __('Forgot your password?', null, 'sf_guard') ?></h1>


<form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
  <h3>Recuperar Senha</h3>
  <p>
    <?php #echo __('Do not worry, we can help you get back in to your account safely!', null, 'sf_guard') ?>
    <?php echo __('Fill out the form below to request an e-mail with information on how to reset your password.', null, 'sf_guard') ?>
  </p>

  <div>
    <?php print $form['email_address']->renderLabel(); ?>
    <?php print $form['email_address']->renderError(); ?>
  </div>
  <div>
  <?php print $form['email_address'] ?>
  <?php print $form['_csrf_token'] ?>
  </div>
  <input type="submit" name="change" value="<?php echo __('Request', null, 'sf_guard') ?>" />
</form>

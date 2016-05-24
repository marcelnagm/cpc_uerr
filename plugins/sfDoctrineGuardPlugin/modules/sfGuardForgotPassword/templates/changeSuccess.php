<?php use_helper('I18N') ?>

<h1>Resetar Senha</h1>

<form action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key='.$sf_request->getParameter('unique_key')) ?>" method="POST">
  <h3><?php echo __('Hello %name%', array('%name%' => $user->getName()), 'sf_guard') ?></h3>
  <p><?php echo __('Enter your new password in the form below.', null, 'sf_guard') ?></p>
  <div>
    <?php print $form['password']->renderLabel(); ?>
    <?php print $form['password']->renderError(); ?>
  </div>
  <div>
  <?php print $form['password'] ?>
  </div>
  <div>
    <?php print $form['password_again']->renderLabel(); ?>
    <?php print $form['password_again']->renderError(); ?>
  </div>
  <div>
  <?php print $form['password_again'] ?>
  </div>
  <?php print $form['_csrf_token'] ?>
  <input type="submit" name="change" value="<?php echo __('Change', null, 'sf_guard') ?>" />
</form>

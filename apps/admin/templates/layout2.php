<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>



        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
        <header class="no-print">
            <div id="top_header">
                <div class="grid">
                    <h1 id="logo" class="left">
                        <?php print link_to('Uerr - Universidade Estadual de Roraima', 'homepage') ?>
                    </h1>

                    <?php if ($sf_user->isAuthenticated()): ?>
                        <nav id="menu_top" class="right">
                            <ul>
                                <?php if ($sf_user->hasCredential('list_user')): ?>
                                    <li class="left"><?php print link_to('Usuários', '@sf_guard_user', array('class' => 'user ico')) ?></li>
                                <?php endif ?>

                                <?php if ($sf_user->hasCredential('list_group')): ?>
                                    <li class="left"><?php print link_to('Grupos', '@sf_guard_group', array('class' => 'group ico')) ?></li>
                                <?php endif ?>

                                <?php if ($sf_user->isSuperAdmin()): ?>
                                    <li class="left"><?php print link_to('Permissões', '@sf_guard_permission', array('class' => 'permission ico')) ?></li>
                                <?php endif ?>
                                <?php if ($sf_user->isSuperAdmin()): ?>
                                    <li class="left"><?php print link_to('Modulo', '@sf_guard_module', array('class' => 'permission ico')) ?></li>
                                <?php endif ?>
                                <?php if ($sf_user->isSuperAdmin()): ?>
                                    <li class="left"><?php print link_to('Mensagens', '@sf_messages', array('class' => 'permission ico')) ?></li>
                                <?php endif ?>

                                <li class="left"><?php print link_to('Sair', '@sf_guard_signout', array('class' => 'delete ico')) ?></li>
                            </ul>
                        </nav>
                    <?php endif ?>
                </div>
            </div>

            <nav id="menu">
                <ul class="grid">
                    <?php if ($sf_user->isAuthenticated()): ?>
                      <?php if ($sf_user->hasCredential('list_campus')): ?>
                            <li><?php print link_to('Campus', '@campus') ?></li>
                        <?php endif ?>
                        <li><?php print link_to('Certames', '@tb_certame') ?></li>
                <?php endif ?>
                <!--Inicio menu outros acessos-->            
                    </ul>
            </nav>

        </header>

        <section id="main">
            <div class="grid">
                <?php print $sf_content ?>
            </div>
        </section>
    </body>
    <footer>
        <p>Sistema desenvolvido pela UERR/DVT.</p> 
        <p>Problemas de acesso, erros ou sugestões envie um email para marcel@uerr.edu.br</p>
    </footer>
</html>

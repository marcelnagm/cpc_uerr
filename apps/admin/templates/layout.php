<!DOCTYPE html>
<!-- saved from url=(0019)http://uerr.edu.br/ -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR"><head profile="http://gmpg.org/xfn/11">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


                <!--[if lt IE 8]><link rel="stylesheet" href="http://uerr.edu.br/wp-content/themes/uerr/lib/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->

                <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://uerr.edu.br/xmlrpc.php?rsd">
                    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://uerr.edu.br/wp-includes/wlwmanifest.xml"> 
                        <link rel="shortcut icon" href="http://uerr.edu.br/wp-content/themes/uerr/images/favicon.png" type="image/x-icon">
                            <link rel="alternate" type="application/rss+xml" title="UERR - Universidade Estadual de Roraima RSS Feed" href="http://uerr.edu.br/feed/" >
                                <link rel="pingback" href="http://uerr.edu.br/xmlrpc.php">
                                    <style type="text/css" id="custom-background-css">
                                        body.custom-background { background-color: #ffffff; }
                                    </style>
                                    <title>Comissão Permanente de Concursos e Vestibular</title>
                                    <!-- Featured Posts -->
                                    <!-- /jquery.cycle.all.js -->
                                    <?php include_http_metas() ?>
                                    <?php include_metas() ?>
                                    <?php include_title() ?>


                                    <?php include_stylesheets() ?>
                                    <?php include_javascripts() ?>

                                    </head>

                                    <body class="home blog custom-background" cz-shortcut-listen="true">

                                        <div id="wrapper">

                                            <div class="barra">
                                                <div class="barra-interna">

                                                    <div class="redes_topo">
                                                        <ul>
                                                            <li><a href="http://uerr.edu.br/?feed=rss2" target="blank_"><? echo image_tag('feed-topo.png', array('alt' => "RSS Feed")) ?></a></li>
                                                            <li><a href="http://uerr.edu.br/" target="blank_"><? echo image_tag('youtube-topo.png', array('alt' => "Youtube")) ?></a></li>
                                                            <li><a href="https://twitter.com/uerr" target="blank_"><? echo image_tag('twitter-topo.png', array('alt' => "Twitter")) ?></a></li>
                                                            <li><a href="https://www.facebook.com/UERR.face" target="blank_"><? echo image_tag('facebook-topo.png', array('alt' => "Facebook")) ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu_topo">
                                                        <div class="uerr_home">
                                                            <a href="http://uerr.edu.br/"><? echo image_tag('uerr-home.png', array('width' => "153", 'height' => "35")) ?></a>
                                                        </div>
                                                        <ul>
                                                            <li><a href="http://uerr.edu.br/?page_id=5200" target="blank_">CURSOS</a></li>
                                                            <li><a href="http://cpc.uerr.edu.br/vestibular/" target="blank_">VESTIBULAR</a></li>
                                                            <li><a href="http://uerr.edu.br/servidor" target="blank_">SERVIDOR</a></li>
                                                            <li><a href="http://sistema.minhauerr.com.br/" target="blank_">MINHA UERR</a></li>
                                                            <li><a href="http://uerr.edu.br/?page_id=5243" target="blank_">TRANSPARÊNCIA</a></li>
                                                            <li><a href="http://gmail.com/" target="blank_">WEBMAIL</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="sf_admin_container">

                                                <div id="header">

                                                    <div class="logo">


                                                        <a href="http://uerr.edu.br/"> <? echo image_tag('logo.png', array('alt' => "UERR – Universidade Estadual de Roraima", 'title' => "UERR – Universidade Estadual de Roraima")); ?></a>
                                                        <div class="header-right">
                                                            <h1 class="site_title">| CPCV</h1>
                                                        </div>
                                                    </div><!-- .logo -->

                                                </div><!-- #header -->


                                                <div class="clearfix">
                                                    <div class="menu-primary-container"><ul id="menu-principal" class="menus menu-primary sub-menu sf-js-enabled">
                                                            <li><a href="<? echo url_for('homepage') ?>">HOME</a></li>
                                                            <li><a href="<? echo url_for('tb_certame') ?>">Certames</a></li>
                                                            <li><a href="<? echo url_for('tb_tipo_isencao') ?>">Tipo de Isenção</a></li>                                                            
                                                            <li><a href="<? echo url_for('tb_tipo_certame') ?>">Tipo de Certame</a></li>                                                            
                                                            <li><a href="<? echo url_for('tb_cargo') ?>">Cargo</a></li>                                                                                                                        
                                                            <li><a href="<? echo url_for('tb_idioma') ?>">Idioma</a></li>                                                                                                                        
                                                            <li><a href="<? echo url_for('tb_local') ?>">Locais</a></li>                                                                                                                              
                                                            <li><a href="<? echo url_for('tb_colaborador') ?>">Colaborador</a></li>                                                                                                                                                                              
                                                            <li><a href="<? echo url_for('tb_funcao') ?>">Função</a></li>                                                                                                                                                                                                                                               
                                                            <li><?php print link_to('Sair', '@sf_guard_signout', array('class' => 'delete ico')) ?></li>
                                                    </div>
                                                </div>

                                                <div id="main">  

                                                    <div id="content">

                                                        <?php echo $sf_content ?>

                                                    </div><!-- #content -->
                                                </div><!-- #main -->
                                            </div>
                                            <div id="footer-container">
                                                <div class="clearfix">

                                                    <?php if ($sf_user->isAuthenticated()): ?>
                                                        <?php if ($sf_user->isSuperAdmin()): ?>
                                                            <div class="menu-secondary-container" style="  background: #c3c3c3;">
                                                                <ul id="menu-principal" class="menus menu-primary sub-menu sf-js-enabled"  >


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
                                                                    </ul>
                                                                <?php endif ?>

                                                            </div>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                    <div id="footer">
                                                        <div class="topo-footer">
                                                            <div class="postmeta-topo-footer">
                                                                <span class="meta_topo_footer">(95) 2121-0921</span> 
                                                                &nbsp;  | &nbsp; &nbsp;<span class="meta_topo_footer2">CPC@UERR.EDU.BR</span>
                                                                &nbsp;  | &nbsp; &nbsp;<span class="meta_topo_footer3">Horário de Atendimento ao Público: 8h às 14h</span>
                                                            </div>
                                                        </div>  

                                                        <div id="copyrights">
                                                            Copyright © 2016. Todos os direitos reservados. Universidade Estadual de Roraima. <br>
                                                                Rua 7 de Setembro, 231, Canarinho. Boa Vista/RR. CEP: 69306-530


                                                        </div>


                                                        <div id="credits">Powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a> | Designed by: <a href="http://bbcwebhosting.com/web-hosting-articles/website-hosting-how-to-host-a-website/">How to Host a Website</a> | Thanks to <a href="http://www.buyfacebooklikes-fans.com/">buy facebook fans</a>, <a href="http://kredytgotowkowy4u.pl/">kredytgotowkowy4u.pl</a> and <a href="http://www.gutscheingiraffe.com/" title="Gutscheingiraffe">Gutscheingiraffe</a></div><!-- #credits -->

                                                    </div><!-- #footer -->
                                                </div><!-- #footer -->
                                            </div><!-- #footer -->
                                        </div><!-- #footer -->

                                    </body></html>

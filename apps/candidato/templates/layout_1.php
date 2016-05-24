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
                        <?php if ($sf_user->hasCredential('list_room')): ?>
                            <li><?php print link_to('Sala', '@room') ?></li>
                        <?php endif ?>
                        <?php if ($sf_user->hasCredential('list_professor')): ?>
                            <li><?php print link_to('Professor', '@professor') ?></li>
                        <?php endif ?>
                        <?php if ($sf_user->hasCredential('list_department')): ?>
                            <li><?php print link_to('Coordenação de Área', '@department') ?></li>
                        <?php endif ?>
                        <?php if ($sf_user->hasCredential('list_course')): ?>
                            <li class="relative">
                                <a href='#'>Cursos&dArr;</a>
                                <ul class="submenu absolute">              
                                    <li><?php print link_to('Matricular Aluno', '@enrol') ?></li>                                    
                                    <li><?php print link_to('Lista de Cursos', '@course') ?></li>
                                    
                                </ul>            
                            <?php endif ?>
                            <?php if ($sf_user->hasCredential('list_discipline')): ?>
                                 <li class="relative">
                                <a href='#'>Disciplinas &dArr;</a>
                                <ul class="submenu absolute">
                                    <li><?php print link_to('Disciplina', '@discipline') ?></li>
                                    <li><?php print link_to('Disciplina Equivalente', '@discipline_equal') ?></li>
                                </ul>
                            
                        <?php endif ?>
                        <?php if ($sf_user->hasCredential('list_semester')): ?>
                            <li class="relative">
                                <a href='#'>Semestre &dArr;</a>
                                <ul class="submenu absolute">
                                    <li><?php print link_to('Semestre', '@semester') ?></li>
                                    <li><?php print link_to('Tipos de Semestre', '@semester_type') ?></li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <?php if ($sf_user->hasCredential('list_curriculum_model')): ?>
                            <li><?php print link_to('Matriz Curricular', '@curriculum_model') ?></li>
                        <?php endif ?>                       
                        <?php if ($sf_user->hasCredential('list_offer')): ?>
                            <li class="relative">
                                <a href='#'>Oferta&dArr;</a>
                                <ul class="submenu absolute">
                                    <?php print link_to('Oferta de Disciplina', '@offer') ?>
                                    <?php if ($sf_user->hasCredential('list_request')): ?>
                                        <li><?php print link_to('Requisição de Disciplinas', '@offer_requisition') ?></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif ?>
                        <?php if ($sf_user->hasCredential('list_student')): ?>
                            <li><?php print link_to('Aluno', '@student') ?></li>
                        <?php endif ?>
                        <?php if ($sf_user->hasCredential('list_matriculation')): ?>
                            <li class="relative">
                                <a href='#'>Matricula &dArr;</a>
                                <ul class="submenu absolute">
                                    <li><?php print link_to('Matrícula', '@matriculation') ?></li></li>
                                    <li><?php print link_to('Status de Matricula', '@matriculation_status') ?></li>
                                    <li><?php print link_to('Método de Ingresso', '@entry_method') ?></li>
                                    <li><?php print link_to('Diplomas', '@degree') ?></li>
                        </ul>

                        </li>   
                    <?php endif ?>
                    <?php
                    if (
                            $sf_user->hasCredential('report_by_sex') ||
                            $sf_user->hasCredential('report_by_document') ||
                            $sf_user->hasCredential('report_by_age') ||
                            $sf_user->hasCredential('report_count_matriculation') ||
                            $sf_user->hasCredential('report_by_concluded') ||
                            $sf_user->hasCredential('report_by_locked') ||
                            $sf_user->hasCredential('report_by_concluding')
                    ):
                        ?>
                        <li class="relative">
                            <a href='#'>Relatórios&dArr;</a>
                            <ul class="submenu absolute">
                                <?php if ($sf_user->hasCredential('report_by_sex')): ?>
                                    <li><?php print link_to('Alunos por Sexo', '@student_report_by_sex') ?></li>
                                <?php endif ?>
                                <?php if ($sf_user->hasCredential('report_by_document')): ?>
                                    <li><?php print link_to('Alunos com Pendência de Documentos', '@student_report_by_document') ?></li>
                                <?php endif ?>
                                <?php if ($sf_user->hasCredential('report_by_age')): ?>
                                    <li><?php print link_to('Alunos por Faixa Etária', '@student_report_by_age') ?></li>
                                <?php endif ?>
                                <?php if ($sf_user->hasCredential('report_count_matriculation')): ?>
                                    <li><?php print link_to('Alunos por Localidade', '@matriculation_report_count_matriculation') ?></li>                                    
                                <?php endif ?>
                                <?php if ($sf_user->hasCredential('report_matriculation_semester')): ?>
                                    <li>
                                        <a href="<? echo url_for('report_by_semester/new') ?>">
                                            Alunos Matriculados
                                        </a>     
                                        
                                    </li>
                                <?php endif ?>    
                                <?php if ($sf_user->hasCredential('report_by_concluded')): ?>
                                    <li><?php print link_to('Formados por Semestre', '@matriculation_report_by_concluded') ?></li>
                                <?php endif ?>
                                <?php if ($sf_user->hasCredential('report_by_locked')): ?>
                                    <li><?php print link_to('Trancamentos por Semestre', '@matriculation_report_by_locked') ?></li>
                                <?php endif ?>
                                <?php if ($sf_user->hasCredential('report_by_concluding')): ?>
                                    <li><?php print link_to('Formandos por Semestre', '@matriculation_report_by_concluding') ?></li>
                                <?php endif ?>
                            </ul>
                        </li>
                    <?php endif ?>
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

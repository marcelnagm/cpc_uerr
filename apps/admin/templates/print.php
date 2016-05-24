<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

   <style type="text/css">
   <!--
   @page { size:a4; 
           margin: 2cm 
               
   }
   @page rotated { size : landscape }
   -->
</style>

    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
    

    <section id="main">
      <div class="grid">
        <?php print $sf_content ?>
      </div>
    </section>
  </body>
</html>

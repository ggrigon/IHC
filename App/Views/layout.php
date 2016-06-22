<!DOCTYPE html>
<html ng-app="myApp">
  <head>
    <meta charset="utf-8">
    <title>CHC</title>
    <link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.css">

    <script src="plugins/js/angular.js"></script>

    <script type="text/javascript" src="plugins/js/jquery.js"></script>
    <script type="text/javascript" src="plugins/js/bootstrap.js"></script>

    <script type="text/javascript">

    $( document ).ready(function() {
      var url = window.location.pathname;
      var final_url = url.replace("/", "");

      $('#'+final_url).addClass('active');
    });

    </script>

  </head>
  <body>

    <div class="container">

      <div class="row menu cabecalho">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="/">CHC</a>
            </div>
            <ul class="nav navbar-nav">
              <li id="eventos"><a href="/eventos">Eventos</a></li>
              <li id="certificados"><a href="/certificados">Certificados</a></li>
              <li id="alunos"><a href="/alunos">Alunos</a></li>
              <li id="professores"><a href="/professores">Professores</a></li>
              <li id="usuarios"><a href="/usuarios">Usuarios</a></li>
            </ul>
          </div>
        </nav>
      </div>

      <div class="row conteudo">
        <?php echo $this->content(); ?>
      </div>

      <div class="row rodape"></div>

    </div>

  </body>
</html>

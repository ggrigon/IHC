<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CHC</title>
    <link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.css">
    <script type="text/javascript" src="plugins/js/jquery.js"></script>
    <script type="text/javascript" src="plugins/js/bootstrap.js"></script>

  </head>
  <body>

    <div class="container">

      <div class="row menu cabecalho">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">CHC</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="/">Eventos</a></li>
              <li><a href="#">Certificados</a></li>
              <li><a href="#">Alunos</a></li>
              <li><a href="#">Professores</a></li>
              <li><a href="#">Secretarias</a></li>
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

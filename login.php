<?php
	session_start();

	if(isset($_SESSION['bsd1'])){
		header('Location: monitoreo/index.php');
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="monitoreo/css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="monitoreo/js/jquery.js"></script>
    <script type="text/javascript" src="monitoreo/js/ejecucion.js"></script>

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/views/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  </head>
  <body>

<div class="header">


      <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.html"> <img style="height:51px; width: 100px;" src="monitoreo/css/hub.jpg" alt=""></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Incio</a></li>
    </ul>
  </div>
</nav>

</div>

        <form class="form col-5 container center" action="iniciar_sesion.php" method="post">
          <h2>Inicia sesion</h2>
          <div class="alert alert-danger text-center" style="display:none;">
            Faltan elementos
          </div>
          <div class="form-group">
            <input type="email" placeholder="Correo electrónico" name="correo" class="form-control input-md" maxlength="30" required>
          </div>
          <div class="form-group">
            <input type="password" placeholder="Contraseña" name="clave" class="form-control input-md" maxlength="20" required>
          </div>
          <div class="form-group">
            <input type="submit" value="Iniciar sesión" class="form-control btn btn-info" name="">
          </div>
          </div>
        </form>

  </body>
</html>

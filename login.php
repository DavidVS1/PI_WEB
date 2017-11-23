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
    <title>JQuery</title>
    <link rel="stylesheet" href="monitoreo/css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="monitoreo/js/jquery.js"></script>
    <script type="text/javascript" src="monitoreo/js/ejecucion.js"></script>

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/views/index.css">
  </head>
  <body>

<div class="header">


      <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"> <img style="height:51px; width: 100px;" src="monitoreo/css/hub.jpg" alt=""></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html">Incio</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="usuarios.php">Page 1-1</a></li>
          <li><a href="arduinos.php">Page 1-2</a></li>
          <li><a href="mediciones.php">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
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

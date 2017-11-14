<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>JQuery</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/ejecucion.js"></script>
  </head>
  <body>

<div class="header">


      <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"> <img style="height:51px; width: 100px;" src="css/hub.jpg" alt=""></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Incio</a></li>
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

        <form class="form col-4 container center" action="dom2 validacion.html" method="post">
          <h2>Inicia sesion</h2>
          <div class="alert alert-danger text-center" style="display:none;">
            Faltan elementos
          </div>
          <div class="form-group">
            <label for="">Correo electronico</label>
            <input type="text" id="correo" class="form-control" placeholder="avidrio@ucol.mx" value="">
          </div>
          <div class="form-group">
            <label for="">Contraseña</label>
            <input type="password" id="contraseña" class="form-control" value="">
          </div>
          <div class="form-group">
            <button type="submit" name="button" onclick="return validar_campos();" class="btn btn-primary"> Iniciar sesion</button>
          </div>
        </form>

  </body>
</html>

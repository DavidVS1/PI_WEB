 <!DOCTYPE html>
 <html>
 	<head>
 		<title>Crear Alarma</title>
 		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 		<!--<script type="text/javascript" src="assets/js/libs/base.js"></script>-->
 	</head>
 	<body>
    <main>
      <?php

        //Declaracion ARRAY
        $configuracion_usuario = array(
          'id_usuario' => 0,
          'nombre' => '',
          'clave' => '',
          'correo' => '',
          'super_usuario' => 0
        );

        try {
      		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

      		if(!$conn->connect_error)
          {
          
            //Si es editar
      			if(isset($_GET['id_usuario']))
            {
      				$id_usuario = $_GET['id_usuario'];

      				$sql = "
      					select
      						*
      					from
      						usuarios
      					where
      						id_usuario = ".$id_usuario;

      				$configuracion_arduinos = $conn->query($sql)->fetch_assoc();

      				}
              else
      				{
      					unset($id_usuario);
      				}

      			}
      		}catch (Exception $e){}
      ?>
      <div class="container">
    		<div class="col-xs-12 encabezado">
    			<div class="col-xs-12 col-md-8 header">
    				<h2><?php echo((isset($id_usuario)) ? 'Modificar' : 'Nueva'); ?> Usuario</h2>
    				<small>Ingrese todos los datos solicitados</small>
    			</div>
    			<div class="col-xs-12 col-md-4 opciones">
    				<ul class="col-xs-12">
    					<li class="col-xs-6">
    						<a class="btn btn-info" id="regresar" href="usuarios.php">
    							<span class="glyphicon glyphicon-chevron-left"></span>
    							Regresar
    						</a>
    					</li>
    				</ul>
    			</div>
    		</div>
    		<div class="col-xs-12 col-md-12 contenido">
          <?php if(isset($validacion_datos)): ?>
     				<div class="text-center bold alert alert-<?php echo(($validacion_datos['done']) ? 'success' : 'warning'); ?>">
     					<?php echo($validacion_datos['message']); ?>
     				</div>
     			<?php endif; ?>
    			<form name="frm_alarma" action="usu_guardar.php" method="post" class="col-xs-12 form-horizontal">
            


            <div class="form-group">
              <div class="col-xs-12 col-md-12">
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="hidden"  name="id_usuario" class="form-control" readonly value="<?php echo $configuracion_usuario['id_usuario'] ?>">
              </div>
            </div>
              
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Nombre de Usuario</label>
                <small>Indique el nombre del usuario</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="text" min="1" maxlength="15" name="nombre_usuario" class="form-control" value="<?php echo $configuracion_usuario['nombre'] ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Contraseña</label>
                <small>Indique la clave de acceso para el usuario </small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="text" min="1" maxlength="12"  name="clave" class="form-control" value="<?php echo $configuracion_usuario['clave'] ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Correo</label>
                <small>Indique un correo</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="text" min="1" maxlength="15"  name="correo" class="form-control" value="<?php echo $configuracion_usuario['correo'] ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Privilegios</label>
                <small>Indique [0 - Usuario Trabajador] o [1 - Usuario Administrador] </small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="number" min="0" max="1" maxlength="5"  name="super_usuario" class="form-control" value="<?php echo $configuracion_usuario['super_usuario'] ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-6">
                <button type="submit" name="guardar" class="btn btn_enviar btn-success">Guardar</button>
              </div>
            </div>
    			</form>
    		</div>

    	</div>


    </main>
    <footer>
    </footer>
  </body>
</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script type="text/javascript" src="usu_formulario.js"></script>
<script type="text/javascript" src="jquery.validate.min.js"></script>
<link rel="stylesheet" href="usu_formulario.css">

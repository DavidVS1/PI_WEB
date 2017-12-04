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
        $configuracion_arduinos = array(
          'id_arduinos' => 0,
          'nombre_arduino' => '',
          'ubicacion' => '',
          'activo' => 0
        );

        try {
      		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

      		if(!$conn->connect_error)
          {
          
            //Si es editar
      			if(isset($_GET['id_arduinos']))
            {
      				$id_arduinos = $_GET['id_arduinos'];

      				$sql = "
      					select
      						*
      					from
      						arduinos
      					where
      						id_arduinos = ".$id_arduinos;

      				$configuracion_arduinos = $conn->query($sql)->fetch_assoc();

      				}
              else
      				{
      					unset($id_arduinos);
      				}

      			}
      		}catch (Exception $e){}
      ?>
      <div class="container">
    		<div class="col-xs-12 encabezado">
    			<div class="col-xs-12 col-md-8 header">
    				<h2><?php echo((isset($id_arduinos)) ? 'Modificar' : 'Nueva'); ?> Estación</h2>
    				<small>Ingrese todos los datos solicitados</small>
    			</div>
    			<div class="col-xs-12 col-md-4 opciones">
    				<ul class="col-xs-12">
    					<li class="col-xs-6">
    						<a class="btn btn-info" id="regresar" href="arduinos.php">
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
    			<form name="frm_alarma" action="ard_guardar.php" method="post" class="col-xs-12 form-horizontal">
            


            <div class="form-group">
              <div class="col-xs-12 col-md-12">
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="hidden"  name="id_arduinos" class="form-control" readonly value="<?php echo $configuracion_arduinos['id_arduinos'] ?>">
              </div>
            </div>
              
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Nombre de Estación</label>
                <small>Indique el nombre de la Estación (Arduino)</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="text" min="1" maxlength="10" name="nombre_arduino" class="form-control" value="<?php echo $configuracion_arduinos['nombre_arduino'] ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Ubicación</label>
                <small>Indique la ubicación del sensor</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="text" min="1" maxlength="12"  name="ubicacion" class="form-control" value="<?php echo $configuracion_arduinos['ubicacion'] ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Activo</label>
                <small>Indique estado de sensor</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="number" min="1" maxlength="5"  name="activo" class="form-control" value="<?php echo $configuracion_arduinos['activo'] ?>"  required>
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
<script type="text/javascript" src="ard_formulario.js"></script>
<script type="text/javascript" src="jquery.validate.min.js"></script>
<link rel="stylesheet" href="ard_formulario.css">

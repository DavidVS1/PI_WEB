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
        $configuracion_alarmas = array(
          'id' => 0,
          'id_arduino' => 0,
          'id_sensores' => 0,
          'correo' => '',
          'valor_minimo' => '',
          'valor_maximo' => '',
          'descripcion' => ''
        );

        try {
      		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

      		if(!$conn->connect_error)
          {
            //Estacciones existentes
            $sql = "
              select
                *
              from
                arduinos"
            ;
            $estaciones = $conn->query($sql);
            //
            //Sensores existentes
            $sql = "
              select
                *
              from
                sensores"
            ;
            $sensores = $conn->query($sql);
            //
            //Usuarios existentes
            $sql = "
              select
                *
              from
                usuarios"
            ;
            $usuarios = $conn->query($sql);
            //
            //Si es editar
      			if(isset($_GET['id']))
            {
      				$id = $_GET['id'];

      				$sql = "
      					select
      						*
      					from
      						alarmas_configuracion
      					where
      						id = ".$id;

      				$configuracion_alarmas = $conn->query($sql)->fetch_assoc();
				
      				}
              else
      				{
      					unset($id);
      				}

      			}
      		}catch (Exception $e){}
      ?>
      <div class="container">
    		<div class="col-xs-12 encabezado">
    			<div class="col-xs-12 col-md-8 header">
    				<h2><?php echo((isset($id)) ? 'Modificar' : 'Nueva'); ?> Alarma</h2>
    				<small>Ingrese todos los datos solicitados</small>
    			</div>
    			<div class="col-xs-12 col-md-4 opciones">
    				<ul class="col-xs-12">
    					<li class="col-xs-6">
    						<a class="btn btn-info" id="regresar" href="../alarmas.php">
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
    			<form name="frm_alarma" action="Alarmas_guardar.php" method="post" class="col-xs-12 form-horizontal">
            <div class="form-group">
  						<div class="col-xs-12  col-md-12">
  							<label for="">Estación</label>
  							<small>Seleccione la estación donde se detectara la alarma</small>
  						</div>
  						<div class="col-xs-12  col-md-6">
  							<select class="" name="Estacion" onchange="Comprobar_sensores();">
                  <?php while($row = $estaciones->fetch_assoc()): ?>
  									<option value="<?php echo $row['id_arduinos'] ?>" <?php echo(($row['id_arduinos'] == $configuracion_alarmas['id_arduino']) ? "selected" : "") ?>> <?php echo $row['nombre_arduino'] ?> </option>
  								<?php endwhile; ?>
  							</select>
                <input type="hidden" readonly="readonly" name="id_alarma" value="<?php echo $configuracion_alarmas['id'] ?>">
  						</div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Variable</label>
                <small>Seleccione la variable que a comprobar</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <select class="" name="Sensor">
                  <!-- tomar solo sensores que tengan el arduino seleccionado -->
                  <?php while($row = $sensores->fetch_assoc()): ?>
  									<option value="<?php echo $row['id_sensores'] ?>" <?php echo(($row['id_sensores'] == $configuracion_alarmas['id_sensor']) ? "selected" : "") ?>><?php echo $row['nombre_sensor'] ?></option>
  								<?php endwhile;?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Indice inferior</label>
                <small>Indique cual es el valor minimo detectado para activar la alarma</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="number" min="1" maxlength="3" step=".1" name="Valor_min" class="form-control" value="<?php echo $configuracion_alarmas['valor_minimo'] ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Indice superior</label>
                <small>Indique cual es el valor maximo detectado para activar la alarma</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <input type="number" min="1" maxlength="3" step=".1" name="Valor_max" class="form-control" value="<?php echo $configuracion_alarmas['valor_maximo'] ?>"  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Contenido correo</label>
                <small>Ingrese el mensaje de la alarma</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <textarea class="form-control" name="Mensaje" rows="3" minlength="20" maxlength="200" required><?php echo $configuracion_alarmas['descripcion'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-md-12">
                <label for="">Destinatario</label>
                <small>Seleccione el nombre del usuario a quien se le notificara la alarma</small>
              </div>
              <div class="col-xs-12 col-md-6">
                <select class="opcion" name="Destinatario" size="5" style="widht: 100%;" required>
                  <?php while($row = $usuarios->fetch_assoc()): ?>
                    <?php //$num = 0; ?>
  									<option value="<?php echo $row['correo'] ?>" <?php echo(($row['correo'] == $configuracion_alarmas['correo']) ? "selected" : "") ?>><?php echo $row['nombre'] ?></option>
                    <?php //$num++; ?>
                  <?php endwhile;?>
                </select>
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
<script type="text/javascript" src="Alarmas_formulario.js"></script>
<script type="text/javascript" src="jquery.validate.min.js"></script>
<link rel="stylesheet" href="Alarmas_formulario.css">

<?php 
	include('header.php'); 
	$arduinos = array(
		'id_arduinos' => 0, 
		'nombre' => '',
		'ubicacion' => '',
		'activo' => 0
	);

	try {
		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

		if(!$conn->connect_error){
			// $sql = "
			// 	select 
			// 		* 
			// 	from 
			// 		arduinos"; 
			// $arduinos = $conn->query($sql);
			// Guarda info de las estaciones.

			$sql = "
				select 
					* 
				from 
					sensores";
			$sensores = $conn->query($sql);
			// Guarda info de los sensores.

			if(isset($_GET['id'])){
				$id = $_GET['id'];

				$sql = "
					select 
						* 
					from 
						arduinos
					where
						id_arduinos = ".$id
				;
				$arduinos = $conn->query($sql)->fetch_assoc();
				// Guarda la info de la estacion seleccionada

				if(is_array($arduinos)){

					$sql = "
						select 
							* 
						from 
							ardsensor
							inner join sensores on as_id_sensores = id_sensores
						where
							as_id_arduinos = ".$id."
						order by
							nombre
					";
					$arduinos_sensores = $conn->query($sql);
					// Guarda la info de los sensores que tiene la estacion
				}else
					unset($id);
			}
		}
	} catch (Exception $e){}
?>
	<div class="container">
		<div class="col-xs-12">
			<div class="col-xs-12 col-md-8 header">
				<h2><?php echo((isset($id)) ? 'Modificar' : 'Nueva'); ?> Estacion</h2>
				<small>Ingrese todos los datos solicitados</small>
			</div>
			<div class="col-xs-12 col-md-4 opciones">
				<ul class="col-xs-12">
					<li class="col-xs-6">
						<a class="btn btn-info" href="arduinos.php"> <!-- ** No se que nombre de archivo estan usando ** -->
							<span class="glyphicon glyphicon-chevron-left"></span>
							Regresar
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-xs-12 contenido">
			<?php if(isset($response)): ?>
				<div class="text-center bold alert alert-<?php echo(($response['done']) ? 'success' : 'warning'); ?>">
					<?php echo($response['message']); ?>
				</div>
			<?php endif; ?>
			<form name="frm" action="ard_guardar.php" method="post" class="col-xs-12 form-horizontal"> <!-- -->
				<div class="col-xs-12 col-md-7">
					<h3>Información general</h3>
					<div class="form-group">
						<div class="col-xs-12">
							<label for="">Nombre</label>
							<small>Obligatorio</small>
						</div>
						<div class="col-xs-12 col-md-12">
							<input type="text" name="nombre" placeholder="Estacion" maxlength="75" class="form-control col-xs-8" value="<?php echo $arduinos['nombre'] ?>" required>
							<input type="hidden" readonly="readonly" name="id_arduinos" value="<?php echo $arduinos['id_arduinos'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label for="ubicacion">Ubicacion</label>
							<small>Obligatorio</small>
						</div>
						<div class="col-xs-12 col-md-4">
							<input type="text" name="ubicacion" placeholder="Un Lugar" class="form-control col-xs-8" value="<?php echo $arduinos['ubicacion'] ?>"  required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label for="activo">Activo</label>
						</div>
						<div class="col-xs-12 col-md-12 checkbox">
							<label><input type="checkbox" name="activo_ard" value="<?php echo $arduinos['activo'] ?>">Activo</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-md-5">
							<button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-5">
					<h3>Sensores</h3>
					<div class="form-group">
						<div class="col-xs-12">
							<label for="correo">Sensores</label>
							<small>Elige uno y da click en el botón para añadirlo</small>
						</div>
						<div class="col-xs-12">
							<select name="ingredientes" class="form-control">
								<option value="">--Elige un Sensor--</option>
								<?php while($row = $sensores->fetch_assoc()): ?>
									<option value="<?php echo $row['id_sensores'] ?>" unidad="<?php echo $row['unidad'] ?>"><?php echo $row['nombre'] ?></option>
								<?php endwhile; ?>
							</select>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-xs-12">
							<button type="button" class="btn btn-info btn-add-ingrediente" name="agregar">Agregar Sensor</button>
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<td></td>
								<td>Sensor</td>
								<td>Unidad</td>
								<td>Activo</td>
							</tr>
						</thead>
						<tbody>
							<?php 
								if(isset($arduinos_sensores)):
									while ($value = $arduinos_sensores->fetch_assoc()): 
							?>
								<tr>
									<td class="text-center">
										<button type="button" class="btn btn-danger btn-xs btn-delete-ingrediente">X</button>
									</td>
									<td><?php echo $value['nombre'] ?></td>
									<td><?php echo $value['unidad'] ?></td>
									<td class="col-xs-4">
										<input type="checkbox" name="activo_sens[]" value="<?php echo $value['activo'] ?>">
										<input type="hidden" readonly value="<?php echo $value['as_id_sensores'] ?>" name="sensores[]" class="form-control">
									</td>
								</tr>
							<?php
									endwhile;
								endif;
							?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
<?php include('footer.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="assets/css/views/pl_formulario.css">
<script type="text/javascript" src="assets/js/libs/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/views/ard_formulario.js"></script>
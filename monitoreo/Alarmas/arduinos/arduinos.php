<?php 
	include('header.php'); 

	try {
		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

		if(!$conn->connect_error){
			$sql = "
				select 
					*,
					(
						select
							count(as_id_sensores)
						from
							ardsensor
						where
							id_arduinos = id_arduinos
					) as tot_sensores
				from 
					arduinos";
			$sql_respuesta = $conn->query($sql);
		}
	} catch (Exception $e){}
?>

	<div class="container">
		<div class="col-xs-12">
			<div class="col-xs-12 col-md-8 header">
				<h2>Lista de Estaciones</h2>
				<small>Se encontraron <?php echo($sql_respuesta->num_rows); ?> estaciones registrados</small>
			</div>
			<div class="col-xs-12 col-md-4 opciones">
				<ul class="col-xs-12">
					<li class="col-xs-6">
						<a class="btn btn-info" href="ard_formulario.php">
							<span class="glyphicon glyphicon-plus"></span>
							Nuevo
						</a>
					</li>
					<li class="col-xs-6">
						<a class="btn btn-info easy-sidebar-toggle">
							<span class="glyphicon glyphicon-search"></span>
							Filtros
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
			<table class="table table-bordered">
				<thead>
					<tr>
						<td class="text-center">#</td>
						<td class="text-center">Id</td>
						<td>Nombre</td>
						<td class="text-center">Ubicacion</td>
						<td class="text-center">Activo</td>
						<td class="text-center">Acciones</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$num_rows = 0;
						while($row = $sql_respuesta->fetch_assoc()):
							$num_rows++;
					?>
							<tr>
								<td class="text-center"><?php echo $num_rows ?></td>
								<td class="text-center"><?php echo $row['id_arduinos'] ?></td>
								<td class="text-center"><?php echo $row['nombre'] ?></td>
								<td class="text-center"><?php echo $row['ubicacion'] ?></td>
								<td class="text-center"><?php echo $row['activo'] ?></td> 
								<!-- arreglar para ver un mensaje -->
								<td class="text-center">
									<a href="ard_formulario.php?id=<?php echo $row['id_arduinos'] ?>" class="btn btn-primary btn-sm">
										Editar
									</a>
									<a href="ard_eliminar.php?id=<?php echo $row['id_arduinos'] ?>" class="btn btn-danger btn-sm btn-eliminar">
										Eliminar
									</a>
								</td>
							</tr>	
					<?php
						endwhile;	
					?>						
				</tbody>
			</table>
		</div>
	</div>
<?php include('footer.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="assets/js/views/platillos.js"></script>
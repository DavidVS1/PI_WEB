<!DOCTYPE html>
<html>
 <head>
   <title>Alarmas</title>
   <link rel="stylesheet" href="../css/estilos.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="refresh" content="60">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/weather-icons.css">
   <link rel="stylesheet" href="../css/weather-icons-wind.css">
   <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--<script type="text/javascript" src="assets/js/libs/base.js"></script>-->


	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

</head>
 <body style='background-image: url("../css/aaa.jpg");'>
   <main>
     <?php

     	try {
     		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

     		if(!$conn->connect_error){
     			$sql = "select *
           from alarmas_configuracion
           join arduinos
           on (alarmas_configuracion.id_arduino=arduinos.id_arduinos)
           join sensores
           on (alarmas_configuracion.id_sensor=sensores.id_sensores)
           ";
     			$alarmas = $conn->query($sql);
     		}
     	} catch (Exception $e){}
     ?>

		 <div class="header">
			
			
						<nav class="navbar navbar-inverse">
							<div class="container-fluid">
								<div class="navbar-header">
									<a href="../index.php"> <img style="height:51px; width: 100px;" src="../css/hub.jpg" alt=""></a>
								</div>
								<ul class="nav navbar-nav">
									<li class="active"><a href="../index.php">Incio</a></li>
									<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrar <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="../usuarios.php">Usuarios</a></li>
											<li><a href="../arduinos.php">Arduinos</a></li>
											<li><a href="../mediciones.php">Mediciones</a></li>
											<li><a href="../alarmas.php">Alarmas</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</nav>
			</div>
		
			<center><i style="font-size:125px"  class="wi wi-time-2"></i>
				<div id="titulo">
					<center><h1>Alarmas</h1></center>
				</div>

			<div class="container">


     	<div class="container">
     		<div class="col-xs-12">
     			<div class="col-xs-12 col-md-8 header">
     			
     			</div>
     			<div class="col-xs-12 col-md-4 opciones">
     				<ul class="col-xs-12">
     					<li class="col-xs-6">
     						<a class="btn btn-info" href="Alarmas_formulario.php">
     							<span class="glyphicon glyphicon-plus"></span>
     							Crear nueva alarma
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
     			<table id="alarmas_tabla" class="table table-bordered">
     				<thead>
     					<tr>
     						<td class="text-center">#</td>
     						<td class="text-center">Id</td>
     						<td>Estación</td>
     						<td>Sensor</td>
     						<td class="text-center">Destinatario</td>
     						<td class="text-center">Acciones</td>
     					</tr>
     				</thead>
     				<tbody>
     					<?php
     						$num_rows = 0;
     						while($row = $alarmas->fetch_assoc()):
     							$num_rows++;
     					?>
     							<tr>
     								<td class="text-center"><?php echo $num_rows; ?></td>
     								<td class="text-center"><?php echo $row['id']; ?></td>
     								<td><?php echo $row['nombre_arduino']; ?></td>
     								<td><?php echo $row['nombre_sensor']; ?></td>
     								<td class="text-center">
     										<?php echo(($row['correo'])) ?>
     								</td>
     								<td class="text-center">
     									<a href="Alarmas_formulario.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
     										Editar
     									</a>
                      <a href="Alarmas_eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">
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
   </main>
   <footer>
   </footer>
 </body>
</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script type="text/javascript" src="Alarmas/Alarmas.js"></script>

<script>
	$(document).ready(function(){
		 $('#alarmas_tabla').DataTable();
	});
</script>
<!DOCTYPE html>
<html>
 <head>
   <title>PHP</title>
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--<script type="text/javascript" src="assets/js/libs/base.js"></script>-->
 </head>
 <body>
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

     	<div class="container">
     		<div class="col-xs-12">
     			<div class="col-xs-12 col-md-8 header">
     				<h2>Lista de alarmas</h2>
     				<small>Se encontraron <?php echo($alarmas->num_rows); ?> alarmas configuradas</small>
     			</div>
     			<div class="col-xs-12 col-md-4 opciones">
     				<ul class="col-xs-12">
     					<li class="col-xs-6">
     						<a class="btn btn-info" href="Alarmas_formulario.php">
     							<span class="glyphicon glyphicon-plus"></span>
     							Nuevo
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
<link rel="stylesheet" href="Alarmas.css">
<script type="text/javascript" src="Alarmas.js"></script>

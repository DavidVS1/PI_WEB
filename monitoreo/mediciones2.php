<!DOCTYPE html>
	<html>
	<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/estilos.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="refresh" content="60">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/weather-icons.css">
<link rel="stylesheet" href="css/weather-icons-wind.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

  </head>
		<body style='background-image: url("css/aaa.jpg");'>
			<div class="header">


			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="index2.php"> <img style="height:51px; width: 100px;" src="css/hub.jpg" alt=""></a>
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index2.php">Incio</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../../cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span>   Cerrar Sesión</a></li>
					</ul>
				</div>
			</nav>

			</div>


			<div id="cuadro">
				<center><i style="font-size:125px"  class="wi wi-earthquake"></i>
					<div id="titulo">
						<center><h1>Mediciones</h1></center>
					</div>

					

<?php
 $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
 $query ="SELECT nombre_arduino,nombre_sensor,ubicacion,activo,valor,unidad,fecha FROM mediciones join (sensores,arduinos) on (sensores.id_sensores=mediciones.id_sensor and arduinos.id_arduinos=mediciones.id_arduino) order by id_mediciones;";
 //$query ="SELECT * FROM mediciones ORDER BY id_mediciones DESC";
 $result = mysqli_query($conn, $query)
 or die("Error: ".mysqli_error($conn));
?>
<div class="container" >
	<br /><br/>
						 <div class="container" style="color:black;font-weight: bold;">
									<br/>
									<div class="table-responsive">
											 <table id="mediciones" class="table table-bordered table-condensed ">
														<thead>
																 <tr>
																			<td>Nombre del Arduino</td>
																			<td>Nombre del Sensor</td>
																			<td>Ubicacion</td>
																			<td>Activo</td>
																			<td>Valor</td>
																			<td>Unidad</td>
																			<td>Fecha</td>
																			<td>Accion</td>
																 </tr>
														</thead>
														<?php
														while($row = mysqli_fetch_array($result)):
														?>
																 <tr>
																			<td> <?php echo $row["nombre_arduino"]; ?> </td>
																			<td> <?php echo $row["nombre_sensor"]; ?> </td>
																			<td> <?php echo $row["ubicacion"]; ?> </td>
																			<td> <?php echo $row["activo"]; ?> </td>
																			<td> <?php echo $row["valor"]; ?> </td>
																			<td> <?php echo $row["unidad"]; ?> </td>
																			<td> <?php echo $row["fecha"]; ?> </td>
																			<td>
																					<a href="pa_eliminar.php?id=<?php echo $row['pa_id'] ?>" class="btn btn-danger btn-sm">
																						Eliminar
																					</a>

																			</td>
																 </tr>
														<?php
															endwhile;
														?>

											 </table>
									</div>
						 </div>
</div>


					</div>
		</center>
	</div>
	<script>
$(document).ready(function(){
		 $('#mediciones').DataTable();
});
</script>

</body>
</html>

<!DOCTYPE html>
	<html>
	<head>
    <meta charset="utf-8">
    <title>Reportes</title>
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
						<a href="index.php"> <img style="height:51px; width: 100px;" src="css/hub.jpg" alt=""></a>
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Incio</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrar <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="usuarios/usuarios.php"><span class="glyphicon glyphicon-user"></span>   Usuarios</a></li>
								<li><a href="arduinos/arduinos.php"><span class="glyphicon glyphicon-hdd"></span>   Arduinos</a></li>
								<li><a href="mediciones.php"><span class="glyphicon glyphicon-list-alt"></span>   Mediciones</a></li>
								<li><a href="Alarmas/alarmas.php"><span class="glyphicon glyphicon-bell"></span>   Alarmas</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-bullhorn"></span>   Reportes</a></li>
							</ul>
						</li>

					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span>  Cerrar Sesión</a></li>
					</ul>
				</div>
			</nav>

			</div>


			<div id="cuadro">
				<center><i style="font-size:125px"  class="fa fa-bullhorn"></i>
					<div id="titulo">
						<center><h1>Reportes</h1></center>
					</div>

					

<?php
 $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
 $query ="SELECT * FROM alarmas ORDER BY id DESC";
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
																			<td>ID</td>
																			<td>ID de Arduino</td>
																			<td>Nombre del Sensor</td>
																			<td>Mensaje</td>
																			<td>Valor</td>
																			<td>Fecha</td>
																			
																 </tr>
														</thead>
														<?php
														while($row = mysqli_fetch_array($result)):
														?>
																 <tr>
																			<td> <?php echo $row["id"]; ?> </td>
																			<td> <?php echo $row["id_arduino"]; ?> </td>
																			<td> <?php echo $row["nombre_sensor"]; ?> </td>
																			<td> <?php echo $row["mensaje"]; ?> </td>
																			<td> <?php echo $row["valor"]; ?> </td>
																			<td> <?php echo $row["fecha"]; ?> </td>
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

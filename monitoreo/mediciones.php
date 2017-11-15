<!DOCTYPE html>
	<html>
	<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/estilos.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="refresh" content="60">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

  </head>
		<body style="background-color:#cccccc">
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
								<li><a href="usuarios.php">Usuarios</a></li>
								<li><a href="arduinos.php">Arduinos</a></li>
								<li><a href="mediciones.php">Mediciones</a></li>
							</ul>
						</li>
						<li><a href="#">Page 2</a></li>
					</ul>
				</div>
			</nav>

			</div>


			<div id="cuadro">
				<center><img src="contact.png"><br>
					<div id="titulo">
						<center><h1>Menu de consultas</h1></center>
					</div>

					<div class="container">

<?php
 $conn = mysqli_connect("localhost","root","","SIMP2");
 $query ="SELECT nombre_arduino,nombre_sensor,ubicacion,activo,valor,unidad,fecha FROM mediciones join (sensores,arduinos) on (sensores.id_sensores);";
 //$query ="SELECT * FROM mediciones ORDER BY id_mediciones DESC";
 $result = mysqli_query($conn, $query)
 or die("Error: ".mysqli_error($conn));
?>
<div class="container">
	<br /><br/>
						 <div class="container">
									<h3 align="center">Mediciones</h3>
									<br/>
									<div class="table-responsive">
											 <table id="mediciones" class="table table-striped table-bordered">
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

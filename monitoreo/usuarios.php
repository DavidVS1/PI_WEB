<!DOCTYPE html>
	<html>
	<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/estilos.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="refresh" content="60">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
								<li><a href="usuarios.php">Usuarios</a></li>
								<li><a href="arduinos.php">Arduinos</a></li>
								<li><a href="mediciones.php">Mediciones</a></li>
								<li><a href="alarmas.php">Alarmas</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>

			</div>


			<div id="cuadro">
				<center><span style="font-size:125px" class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<div id="titulo">
						<center><h1>Usuarios</h1></center>
					</div>

					<div class="container">

<!--______________________________________________________USUARIOS______________________________________-->
						<?php
						 $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
						 $query ="SELECT * FROM usuarios ORDER BY id_usuario DESC";
						 $result = mysqli_query($conn, $query)
						 or die("Error: ".mysqli_error($conn));
						?>
						<div class="container">
							<br /><br/>
												 <div class="container">
															<br/>
															<div class="table-responsive">
																	 <table id="usuarios" class="table table-striped table-bordered">
																				<thead>
																						 <tr>
																									<td>ID</td>
																									<td>Nombre</td>
																									<td>Clave</td>
																									<td>Correo</td>
																									<td>Super usuario</td>
																									<td>Accion</td>
																						 </tr>
																				</thead>
																				<?php
																				while($row = mysqli_fetch_array($result)):
																				?>
																						 <tr>
																									<td> <?php echo $row["id_usuario"]; ?> </td>
																									<td> <?php echo $row["nombre"]; ?> </td>
																									<td> <?php echo $row["clave"]; ?> </td>
																									<td> <?php echo $row["correo"]; ?> </td>
																									<td> <?php echo $row["super_usuario"]; ?> </td>
																									<td>
																										<a href="pa_formulario.php?id=<?php echo $row['pa_id'] ?>" class="btn btn-primary btn-sm">
																											Editar
																										</a>

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
		 $('#usuarios').DataTable();
});
</script>

</body>
</html>

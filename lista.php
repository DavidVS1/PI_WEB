<!DOCTYPE html>
	<html>
	<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="estilos.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="refresh" content="60">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
		<body style="background-color:#cccccc">
			<header>
				<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">Equipillo</a>
						</div>
						<ul class="nav navbar-nav">
							<li><a href="index.html">Inicio</a></li>
							<li><a href="#">Page 1</a></li>
							<li><a href="#">Page 2</a></li>
							<li class="active"><a href="#">Admin</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="sigin.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							<li><a href="loggin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						</ul>
					</div>
				</nav>
			</header>


			<div id="cuadro">
				<center><img src="contact.png"><br>
					<div id="titulo">
						<center><h1>Menu de consultas</h1></center>
					</div>

					<div class="container">
					  <h2>Usuarios</h2>
<!--______________________________________________________USUARIOS______________________________________-->
						<?php
							require('conexion.php');


							$query="SELECT *  FROM usuarios";


							$resultado1=$mysqli->query($query);

						?>
					  <table class="table table-condensed">
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>Nombre</th>
					        <th>Password</th>
									<th>Correo</th>
									<th>Super Usuario</th>
					      </tr>
					    </thead>
					    <tbody>
								<?php while($row=$resultado1->fetch_assoc()){ ?>
									<tr>
										<td>
											<?php echo $row['id'];?>
										</td>
										<td>
											<?php echo $row['name'];?>
										</td>
										<td>
											<?php echo $row['pass'];?>
										</td>
										<td>
											<?php echo $row['mail'];?>
										</td>
										<td>
											<?php echo $row['superUser'];?>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar(<?php echo $row['id'];?>)"> Eliminar</a>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar1(<?php echo $row['id'];?>)"> Editar</a>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar2(<?php echo $row['id'];?>)"> Ingresar</a>
										</td>
									</tr>
								<?php } ?>
					    </tbody>
					  </table>
<!--______________________________________________________Turbidez______________________________________-->
						<h2>Turbidez</h2>
						<?php
							require('conexion.php');


							$query="SELECT *  FROM turbidity";


							$resultado2=$mysqli->query($query);

						?>
						<table class="table table-condensed">
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>Fecha</th>
					        <th>Info</th>
									<th>Sensor activo</th>

					      </tr>
					    </thead>
					    <tbody>
								<?php while($row=$resultado2->fetch_assoc()){ ?>
									<tr>
										<td>
											<?php echo $row['id'];?>
										</td>
										<td>
											<?php date_default_timezone_set("America/Mexico_City");
											 echo date("h:i:sa");?>
										</td>
										<td>
											<?php echo $row['turbidityInfo'];?>
										</td>
										<td>
											<?php echo $row['activeSensor'];?>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar(<?php echo $row['id'];?>)"> Eliminar</a>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar1(<?php echo $row['id'];?>)"> Editar</a>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar2(<?php echo $row['id'];?>)"> Ingresar</a>
										</td>
									</tr>
								<?php } ?>
					    </tbody>
					  </table>
<!--______________________________________________________temperature______________________________________-->
						<h2>Temperatura</h2>
						<?php
							require('conexion.php');


							$query="SELECT *  FROM temperature";


							$resultado2=$mysqli->query($query);

						?>
						<table class="table table-condensed">
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>Fecha</th>
					        <th>Info</th>
									<th>Sensor activo</th>

					      </tr>
					    </thead>
					    <tbody>
								<?php while($row=$resultado2->fetch_assoc()){ ?>
									<tr>
										<td>
											<?php echo $row['id'];?>
										</td>
										<td>
											<?php date_default_timezone_set("America/Mexico_City");
											 echo date("h:i:sa");?>
										</td>
										<td>
											<?php echo $row['temperatureInfo'];?>
										</td>
										<td>
											<?php echo $row['activeSensor'];?>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar(<?php echo $row['id'];?>)"> Eliminar</a>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar1(<?php echo $row['id'];?>)"> Editar</a>
										</td>

										<td>
										<a href="#" class="btn btn-warning" onclick="preguntar2(<?php echo $row['id'];?>)"> Ingresar</a>
										</td>
									</tr>
								<?php } ?>
					    </tbody>
					  </table>

<!--______________________________________________________Humedad______________________________________-->
												<h2>Humedad</h2>
												<?php
													require('conexion.php');


													$query="SELECT *  FROM humidity";


													$resultado2=$mysqli->query($query);

												?>
												<table class="table table-condensed">
											    <thead>
											      <tr>
											        <th>ID</th>
											        <th>Fecha</th>
											        <th>Info</th>
															<th>Sensor activo</th>

											      </tr>
											    </thead>
											    <tbody>
														<?php while($row=$resultado2->fetch_assoc()){ ?>
															<tr>
																<td>
																	<?php echo $row['id'];?>
																</td>
																<td>
																	<?php date_default_timezone_set("America/Mexico_City");
																	 echo date("h:i:sa");?>
																</td>
																<td>
																	<?php echo $row['humidityInfo'];?>
																</td>
																<td>
																	<?php echo $row['activeSensor'];?>
																</td>

																<td>
																<a href="#" class="btn btn-warning" onclick="preguntar(<?php echo $row['id'];?>)"> Eliminar</a>
																</td>

																<td>
																<a href="#" class="btn btn-warning" onclick="preguntar1(<?php echo $row['id'];?>)"> Editar</a>
																</td>

																<td>
																<a href="#" class="btn btn-warning" onclick="preguntar2(<?php echo $row['id'];?>)"> Ingresar</a>
																</td>
															</tr>
														<?php } ?>
											    </tbody>
											  </table>

<!--______________________________________________________Profundidad______________________________________-->
												<h2>Profundidad</h2>
												<?php
													require('conexion.php');


													$query="SELECT *  FROM depth";


													$resultado2=$mysqli->query($query);

												?>
												<table class="table table-condensed">
													<thead>
														<tr>
															<th>ID</th>
															<th>Fecha</th>
															<th>Info</th>
															<th>Sensor activo</th>

														</tr>
													</thead>
													<tbody>
														<?php while($row=$resultado2->fetch_assoc()){ ?>
															<tr>
																<td>
																	<?php echo $row['id'];?>
																</td>
																<td>
																	<?php date_default_timezone_set("America/Mexico_City");
																	 echo date("h:i:sa");?>
																</td>
																<td>
																	<?php echo $row['depthInfo'];?>
																</td>
																<td>
																	<?php
																	$actividad='activeSensor';
																	if($actividad=1):
																		echo "Acivo";
																	elseif($actividad =  0):
																			echo "Iniactivo";
																	endif;
																	?>
																</td>

																<td>
																<a href="#" class="btn btn-warning" onclick="preguntar(<?php echo $row['id'];?>)"> Eliminar</a>
																</td>

																<td>
																<a href="#" class="btn btn-warning" onclick="preguntar1(<?php echo $row['id'];?>)"> Editar</a>
																</td>

																<td>
																<a href="#" class="btn btn-warning" onclick="preguntar2(<?php echo $row['id'];?>)"> Ingresar</a>
																</td>
															</tr>
														<?php } ?>
													</tbody>
												</table>




					</div>
		</center>
	</div>

	<script type="text/javascript">
		function preguntar(id)
		{
			if(confirm('¿Estas seguro de borrar?'+id))
			{
				window.location.href="borrar.php?id="+id;

			}
		}
	</script>

		<script type="text/javascript">
		function preguntar1(id)
		{
			if(confirm('¿Estas seguro de Editar?'+id))
			{
				window.location.href="borrar.php?id="+id;

			}
		}
	</script>

		<script type="text/javascript">
		function preguntar2(id)
		{
			if(confirm('¿Estas seguro de Ingresar?'+id))
			{
				window.location.href="borrar.php?id="+id;

			}
		}
	</script>


</body>
</html>

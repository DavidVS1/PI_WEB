<?php
	session_start();

	if(!isset($_SESSION['bsd1']))
		header('Location: ../index.html');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
  <title>Proyecto integrador</title>

  <link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="js/ajax_query.php">

  <link rel="stylesheet" href="css/weather-icons.css">
  <link rel="stylesheet" href="css/weather-icons-wind.css">

	<!-- Bootstrap Core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="../vendor/morrisjs/morris.css" rel="stylesheet">


	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <!--
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">
    -->


  <!--Version agregada de Bootstrap-->

<!-- Tabla-->
  <script>
    window.onload = function () {

      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
          text: "Sensores"
        },
        axisX: {
          valueFormatString: "DD MMM",
          crosshair: {
            enabled: true,
            snapToDataPoint: true
          }
        },
        axisY: {
          title: "Sensores",
          crosshair: {
            enabled: true
          }
        },
        toolTip: {
          shared: true
        },
        legend: {
          cursor: "pointer",
          verticalAlign: "bottom",
          horizontalAlign: "left",
          dockInsidePlotArea: true,
          itemclick: toogleDataSeries
        },
        data: [{
          //_________________________________________________UNA______________________________________________________________
          <?php
           $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
           //$query ="SELECT nombre_arduino,nombre_sensor,ubicacion,activo,valor,unidad,fecha FROM mediciones join (sensores,arduinos) on (sensores.id_sensores);";
           $query ="SELECT id_sensor,valor,fecha FROM mediciones WHERE id_sensor=1 ORDER BY fecha  DESC";
           $query2 ="SELECT id_sensor,valor,fecha FROM mediciones WHERE id_sensor=2 ORDER BY fecha  DESC";
           $query3 ="SELECT id_sensor,valor,fecha FROM mediciones WHERE id_sensor=3 ORDER BY fecha  DESC";
           $query4 ="SELECT id_sensor,valor,fecha FROM mediciones WHERE id_sensor=4 ORDER BY fecha  DESC";
           //$quer = "SELECT * FROM `$tabla` WHERE `$iden` = '$id'";
           //$query ="SELECT * FROM mediciones ORDER BY id_mediciones DESC";
           $result = mysqli_query($conn, $query)
           or die("Error: ".mysqli_error($conn));
           $result2 = mysqli_query($conn, $query2)
           or die("Error: ".mysqli_error($conn));
           $result3 = mysqli_query($conn, $query3)
           or die("Error: ".mysqli_error($conn));
           $result4 = mysqli_query($conn, $query4)
           or die("Error: ".mysqli_error($conn));

           $contador = 0;
           while($row = mysqli_fetch_array($result)){
             $valor_med[$contador]=$row['valor'];
             $contador++;
           }

           $contador2 = 0;
           while($row2 = mysqli_fetch_array($result2)){
             $valor_med2[$contador2]=$row2['valor'];
             $contador2++;
           }

           $contador3 = 0;
           while($row3 = mysqli_fetch_array($result3)){
             $valor_med3[$contador3]=$row3['valor'];
             $contador3++;
           }

           $contador4 = 0;
           while($row4 = mysqli_fetch_array($result4)){
             $valor_med4[$contador4]=$row4['valor'];
             $contador4++;
           }
          ?>
          type: "line",
          showInLegend: true,
          name: "Grados C",
          markerType: "square",
          xValueFormatString: "DD MMM, YYYY hh:mm",
          color: "#F5B041",
          dataPoints: [
            <?php for ($i=0; $i < $contador ; $i++): ?>
              { x: new Date(2017, 0, <?php echo $i ?> , 22, 10), y: <?php echo $valor_med[$i] ?> },
            <?php endfor; ?>

            //{ x: new Date(2017, 0, 15), y: <?php // echo $valor_med[12] ?> },
            //{ x: new Date(2017, 0, 16), y: <?php // echo 5000   ?> }
          ]
        },
        {
          //_________________________________________________DOS___________________________________________________________________
          type: "line",
          showInLegend: true,
          name: "Humedad del Ambiente",
          markerType: "square",
          xValueFormatString: "DD MMM, YYYY",
          color: "#E74C3C ",
          dataPoints: [
            <?php for ($i=0; $i < $contador2 ; $i++): ?>
              { x: new Date(2017, 0, <?php echo $i ?> , 22, 10), y: <?php echo $valor_med2[$i] ?> },
            <?php endfor; ?>
          ]
        },
        {
          //_________________________________________________DOS___________________________________________________________________
          type: "line",
          showInLegend: true,
          name: "Profundidad",
          markerType: "square",
          xValueFormatString: "DD MMM, YYYY",
          color: "#85C1E9",
          dataPoints: [
            <?php for ($i=0; $i < $contador3 ; $i++): ?>
              { x: new Date(2017, 0, <?php echo $i ?> , 22, 10), y: <?php echo $valor_med3[$i] ?> },
            <?php endfor; ?>
          ]
        },
        {
          //_________________________________________________DOS___________________________________________________________________
          type: "line",
          showInLegend: true,
          name: "Humedad del suelo",
          markerType: "square",
          xValueFormatString: "DD MMM, YYYY",
          color: "#28B463",
          dataPoints: [
            <?php for ($i=0; $i < $contador4 ; $i++): ?>
              { x: new Date(2017, 0, <?php echo $i ?> , 22, 10), y: <?php echo $valor_med4[$i] ?> },
            <?php endfor; ?>
          ]
        }

      ]
      });
      chart.render();

      function toogleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
          e.dataSeries.visible = false;
        } else {
          e.dataSeries.visible = true;
        }
        chart.render();
      }

    }
  </script>


	<!--SCRIPT AJAX CONSULTA DE DATOS Y ACTUALIZACION-->
  <script>
	var datos=0;
	var nombre_icono="";
	

	function set_icon(temperatura){
		 var temperatura_int = parseInt(temperatura);

		 if(temperatura_int >= -10 && temperatura_int < 0 ){
				 nombre_icono = "wi-snowflake-cold";
		 }
		 else if(temperatura_int >= 0 && temperatura_int < 8){
				 nombre_icono = "wi-day-snow";
		 }
		 else if(temperatura_int >= 8 && temperatura_int < 16){
				 nombre_icono = "wi-day-windy";
		 }
		 else if(temperatura_int >= 16 && temperatura_int < 24){
				 nombre_icono = "wi-day-cloudy";
		 }
		 else if(temperatura_int >= 24 && temperatura_int < 32){
				 nombre_icono = "wi-day-haze";
		 }
		 else if(temperatura_int >= 32 && temperatura_int < 40){
				 nombre_icono = "wi-day-sunny";
		 }
		 else if(temperatura_int >= 40){
				 nombre_icono = "wi-hot";
		 }
		 else
				 console.log('ERROR: TEMPERATURA FUERA DE RANGO');

		 console.log(nombre_icono);

	}

	function actualizar_html(datos){




		 document.getElementById("ICONO").className = 'wi '+nombre_icono;
		 document.getElementById("TEMPERATURA").innerHTML = datos[3]+'  <sup class="wi wi-celsius"></sup>';
		 document.getElementById("HUMEDAD").innerHTML = datos[2]+'  <sup class="wi wi-humidity"></sup>';
		 document.getElementById("PROFUNDIDAD").innerHTML = datos[1]+'  cm  <sup class="wi wi-flood"></sup>';
		 document.getElementById("HUMEDAD_SUELO").innerHTML = datos[0]+'  <sup class="wi wi-humidity"></sup>';


		 switch (datos[4]){
				 case "Mon":
						 document.getElementById("FECHA").innerHTML = "Lunes  " + datos[5];
						 break;
				 case "Tue":
						 document.getElementById("FECHA").innerHTML = "Martes  " + datos[5];
						 break;
				 case "Wen":
						 document.getElementById("FECHA").innerHTML = "Miercoles  " + datos[5];
						 break;
				 case "Thu":
						 document.getElementById("FECHA").innerHTML = "Jueves  " + datos[5];
						 break;
				 case "Fri":
						 document.getElementById("FECHA").innerHTML = "Viernes  " + datos[5];
						 break;
				 case "Sat":
						 document.getElementById("FECHA").innerHTML = "Sábado  " + datos[5];
						 break;
				 case "Sun":
						 document.getElementById("FECHA").innerHTML = "Domingo  " + datos[5];
						 break;
				 default:
						 console.log('Error: DATO DEL DIA');
		 }

	}




	$(document).ready(
				 function() {
						 setInterval(function() {

						 $(function(){

								 var ajax = $.ajax({
										 data: {} ,
										 url: "js/ajax_query.php",
										 type: "POST",
										 success: function (response){
												 console.log(response);
												 datos = JSON.parse(response);
;                        },
										 error: function(response,estatus,error){

												 console.log("Error:",error);
										 }
								 });
						 });

						 //Actualizar datos en pagina web
						 actualizar_html(datos);
						 set_icon(datos[3]);

						 }, 550);
				 });
  </script>

  <!--//////////////////////////////////////////////////////////////////////-->






  <section class="back">
</head>

<body style='background-image: url("css/aaa.jpg");'>

<div id="wrapper">
  <div class="header">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">S.I.M.P</a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
						<!-- /.dropdown -->
						<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
								</a>
								<ul class="dropdown-menu dropdown-user">
										<li><a href="../cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
										</li>
								</ul>
								<!-- /.dropdown-user -->
						</li>
						<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
						<div class="sidebar-nav navbar-collapse">
								<ul class="nav" id="side-menu">
										<li>
												<a href="index.php"><i class="fa fa-home fa-fw"></i> Inicio</a>
										</li>
										<li>
												<a href="ubicacion/Ubicacion.php"><i class="fa fa-location-arrow fa-fw"></i> Ubicación de Estaciones</a>
										</li>
								</ul>

						</div>
						<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper">
				<div class="row">
						<div class="col-lg-12">
								<h3 class="page-header">Administración Principal</h3>
						</div>
						<!-- /.col-lg-12 -->
				</div>
				<?php
				 $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
				 $query ="SELECT * FROM usuarios ORDER BY id_usuario";
				 $result = mysqli_query($conn, $query)
				 or die("Error: ".mysqli_error($conn));

				 $usuarios=0;
				 while($row = mysqli_fetch_array($result)){
					 $usuarios++;
				 }

				?>
				<!-- /.row -->
				<div class="row">
						<div class="col-md-4">
								<div class="panel panel-primary">
										<div class="panel-heading">
												<div class="row">
														<div class="col-xs-3">
																<i class="fa fa-users fa-5x"></i>
														</div>
														<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $usuarios ?></div>
																<div>Usuarios</div>
														</div>
												</div>
										</div>
										<a href="usuarios.php">
												<div class="panel-footer">
														<span class="pull-left">Ver detalles</span>
														<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
														<div class="clearfix"></div>
												</div>
										</a>
								</div>
						</div>
						<?php
						 $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
						 $query ="SELECT nombre_arduino,nombre_sensor,ubicacion,activo,valor,unidad,fecha FROM mediciones join (sensores,arduinos) on (sensores.id_sensores);";
						 $result = mysqli_query($conn, $query)
						 or die("Error: ".mysqli_error($conn));

						 $mediciones=0;
						 while($row = mysqli_fetch_array($result)){
							 $mediciones++;
						 }

						?>
						<div class="col-md-4">
								<div class="panel panel-green">
										<div class="panel-heading">
												<div class="row">
														<div class="col-xs-3">
																<i style="font-size:75px"  class="wi wi-earthquake wi-5px"></i>
														</div>
														<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $mediciones ?></div>
																<div>Mediciones</div>
														</div>
												</div>
										</div>
										<a href="mediciones.php">
												<div class="panel-footer">
														<span class="pull-left">Ver detalles</span>
														<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
														<div class="clearfix"></div>
												</div>
										</a>
								</div>
						</div>

						<?php
						 $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
						 $query ="SELECT * FROM arduinos ORDER BY id_arduinos DESC";
						 $result = mysqli_query($conn, $query)
						 or die("Error: ".mysqli_error($conn));

						 $arduino=0;
						 while($row = mysqli_fetch_array($result)){
							 $arduino++;
						 }

						?>
						<div class="col-md-4">
								<div class="panel panel-yellow">
										<div class="panel-heading">
												<div class="row">
														<div class="col-xs-3">

																<i class="fa fa fa-bug fa-5x"></i>
														</div>
														<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $arduino ?></div>
																<div>Arduinos</div>
														</div>
												</div>
										</div>
										<a href="arduinos/arduinos.php">
												<div class="panel-footer">
														<span class="pull-left">Ver detalles</span>
														<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
														<div class="clearfix"></div>
												</div>
										</a>
								</div>
						</div>
				</div>
				<div class="row">
						<?php
						 $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
						 $query ="SELECT * FROM alarmas_configuracion ORDER BY id DESC";
						 $result = mysqli_query($conn, $query)
						 or die("Error: ".mysqli_error($conn));

						 $alarmas=0;
						 while($row = mysqli_fetch_array($result)){
							 $alarmas++;
						 }

						?>
						<div class="col-md-6">
								<div class="panel panel-info">
										<div class="panel-heading">
												<div class="row">
														<div class="col-xs-3">
																<i class="fa fa-bell-o fa-5x"></i>
														</div>
														<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $alarmas ?></div>
																<div>Alertas</div>
														</div>
												</div>
										</div>
										<a href="Alarmas/alarmas.php">
												<div class="panel-footer">
														<span class="pull-left">Ver detalles</span>
														<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
														<div class="clearfix"></div>
												</div>
										</a>
								</div>
						</div>

						<?php
						 $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");
						 $query ="SELECT * FROM alarmas ORDER BY id DESC";
						 $result = mysqli_query($conn, $query)
						 or die("Error: ".mysqli_error($conn));

						 $alarmas=0;
						 while($row = mysqli_fetch_array($result)){
							 $alarmas++;
						 }

						?>
						<div class="col-md-6">
								<div class="panel panel-red">
										<div class="panel-heading">
												<div class="row">
														<div class="col-xs-3">
																<i class="fa fa-bullhorn fa-5x"></i>
														</div>
														<div class="col-xs-9 text-right">
																<div class="huge"><?php echo $alarmas ?></div>
																<div>Reportes del Sistema</div>
														</div>
												</div>
										</div>
										<a href="#">
												<div class="panel-footer">
														<span class="pull-left">Ver detalles</span>
														<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
														<div class="clearfix"></div>
												</div>
										</a>
								</div>
						</div>
				</div>

				<div class="row">
					<section style="col-md-2;" >
											
												<div id="myCarousel" class="carousel slide" data-ride="carousel">
													<!-- Indicators -->
													<ol class="carousel-indicators">
														<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
														<li data-target="#myCarousel" data-slide-to="1"></li>
														<li data-target="#myCarousel" data-slide-to="2"></li>
													</ol>

													<!-- Wrapper for slides -->
													<div class="carousel-inner" style="padding-bottom: 20px;">

														<div class="item active">
															<section class=temperatura style="background-color:#00000042">
																<div class="row">
																	<div class="col-md-2">
																	</div>

																	<div class="col-md-8" style="margin: 0; padding: 0;">
																		<ul>
																			<li>
																				<div class="col-md-12 well" style="background-color: rgb(223, 223, 223);">

																					<!--FECHA-->
																					<div class="row" style="text-align: center;">
																						<div>
																							<p id="FECHA" style="font-size: 25px; color:rgb(24, 196, 190);"></p>
																						</div>
																					</div>

																					<!--ICONO TIEMPO-->
																					<div class="row">
																						<p style="font-size:35px; color:#E67E22; text-align: center; ">
																							<i  id="ICONO" class=""></i>
																						</p>
																					</div>


																					<!--TEMPERATURA-->
																					<div  class="row">
																						<p id="TEMPERATURA" style="color:rgb(28, 131, 8);font-size:20px; text-align: center;">
																							<sup class="wi wi-celsius"></sup>
																						</p>
																						<p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
																					</div>


																					<!--HUMEDAD-->
																					<div  class="row">
																						<p id="HUMEDAD" style="color: #2471A3 ;font-size:20px; text-align: center;">
																							<sup class="wi wi-humidity"></sup>
																						</p>
																						<p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
																					</div>

																					<!--PROFUNDIDAD-->
																					<div class="row">
																						<p id="PROFUNDIDAD" style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">  cm
																							<sup class="wi wi-flood"></sup>
																						</p>
																						<p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>
																					</div>

																					<div class="row" >
																						<p id="HUMEDAD_SUELO" style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">
																							<sup class="wi wi-humidity"></sup>
																						</p>
																						<p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
																					</div>

																					<!--ID ARDUINO-->
																					<div class="row">
																						<p style="color:rgb(106, 104, 104); font-size:12px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
																							<span class="glyphicon glyphicon-import"></span>
																						</p>
																					</div>

																					<!--MAS-->
																					<div class="row">
																						<a href="mediciones.php"><button style="margin-right:40px;  float:right; overflow: none; font-size: 10px;" type="button" class="btn 							btn-info">Leer mas</button></a>
																					</div>

																				</div>
																			</li>

																		</ul>
																	</div>
																</div>
															</section>
															
														</div>

													</div>

													<!-- Left and right controls -->
													<!--
													<a class="left carousel-control" href="#myCarousel" data-slide="prev">
														<span class="glyphicon glyphicon-chevron-left"></span>
														<span class="sr-only">Previous</span>
													</a>
													<a class="right carousel-control" href="#myCarousel" data-slide="next">
														<span class="glyphicon glyphicon-chevron-right"></span>
														<span class="sr-only">Next</span>
													</a>

													--><!-- CONTROLES DESHABILITADOS-->
												</div>
											
										</section>	
				</div>

				<div class="row">
					<div id="chartContainer" style="height: 370px; width: 100%;"></div>
				</div>
			</div>


  </div>




		</div>

    <!--_________________________________________________DOS___________________________________________________________________-->

    

  </main>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>

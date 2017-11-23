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
           $conn = mysqli_connect("localhost","root","","SIMP2");
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

		 document.getElementById("TEMPERATURA").innerHTML = datos[0]+'  <sup class="wi wi-celsius"></sup>';
		 document.getElementById("HUMEDAD").innerHTML = datos[1]+'  <sup class="wi wi-humidity"></sup>';
		 document.getElementById("PROFUNDIDAD").innerHTML = datos[2]+'  cm  <sup class="wi wi-flood"></sup>';
		 document.getElementById("HUMEDAD_SUELO").innerHTML = datos[3]+'  <sup class="wi wi-humidity"></sup>';


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
						 set_icon(datos[0]);

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
						<a class="navbar-brand" href="index.html">S.I.M.P</a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
						<!-- /.dropdown -->
						<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
								</a>
								<ul class="dropdown-menu dropdown-tasks">
										<li>
												<a href="#">
														<div>
																<p>
																		<strong>Task 1</strong>
																		<span class="pull-right text-muted">40% Complete</span>
																</p>
																<div class="progress progress-striped active">
																		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
																				<span class="sr-only">40% Complete (success)</span>
																		</div>
																</div>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a href="#">
														<div>
																<p>
																		<strong>Task 2</strong>
																		<span class="pull-right text-muted">20% Complete</span>
																</p>
																<div class="progress progress-striped active">
																		<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
																				<span class="sr-only">20% Complete</span>
																		</div>
																</div>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a href="#">
														<div>
																<p>
																		<strong>Task 3</strong>
																		<span class="pull-right text-muted">60% Complete</span>
																</p>
																<div class="progress progress-striped active">
																		<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
																				<span class="sr-only">60% Complete (warning)</span>
																		</div>
																</div>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a href="#">
														<div>
																<p>
																		<strong>Task 4</strong>
																		<span class="pull-right text-muted">80% Complete</span>
																</p>
																<div class="progress progress-striped active">
																		<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
																				<span class="sr-only">80% Complete (danger)</span>
																		</div>
																</div>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a class="text-center" href="#">
														<strong>See All Tasks</strong>
														<i class="fa fa-angle-right"></i>
												</a>
										</li>
								</ul>
								<!-- /.dropdown-tasks -->
						</li>
						<!-- /.dropdown -->
						<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
								</a>
								<ul class="dropdown-menu dropdown-alerts">
										<li>
												<a href="#">
														<div>
																<i class="fa fa-comment fa-fw"></i> New Comment
																<span class="pull-right text-muted small">4 minutes ago</span>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a href="#">
														<div>
																<i class="fa fa-twitter fa-fw"></i> 3 New Followers
																<span class="pull-right text-muted small">12 minutes ago</span>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a href="#">
														<div>
																<i class="fa fa-envelope fa-fw"></i> Message Sent
																<span class="pull-right text-muted small">4 minutes ago</span>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a href="#">
														<div>
																<i class="fa fa-tasks fa-fw"></i> New Task
																<span class="pull-right text-muted small">4 minutes ago</span>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a href="#">
														<div>
																<i class="fa fa-upload fa-fw"></i> Server Rebooted
																<span class="pull-right text-muted small">4 minutes ago</span>
														</div>
												</a>
										</li>
										<li class="divider"></li>
										<li>
												<a class="text-center" href="#">
														<strong>See All Alerts</strong>
														<i class="fa fa-angle-right"></i>
												</a>
										</li>
								</ul>
								<!-- /.dropdown-alerts -->
						</li>
						<!-- /.dropdown -->
						<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
								</a>
								<ul class="dropdown-menu dropdown-user">
										<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
										</li>
										<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
										</li>
										<li class="divider"></li>
										<li><a href="../cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
										<li class="sidebar-search">
												<div class="input-group custom-search-form">
														<input type="text" class="form-control" placeholder="Search...">
														<span class="input-group-btn">
														<button class="btn btn-default" type="button">
																<i class="fa fa-search"></i>
														</button>
												</span>
												</div>
												<!-- /input-group -->
										</li>
										<li>
												<a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
										</li>
										<li>
												<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
												<ul class="nav nav-second-level">
														<li>
																<a href="flot.html">Flot Charts</a>
														</li>
														<li>
																<a href="morris.html">Morris.js Charts</a>
														</li>
												</ul>
												<!-- /.nav-second-level -->
										</li>
										<li>
												<a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
										</li>
										<li>
												<a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
										</li>
										<li>
												<a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
												<ul class="nav nav-second-level">
														<li>
																<a href="panels-wells.html">Panels and Wells</a>
														</li>
														<li>
																<a href="buttons.html">Buttons</a>
														</li>
														<li>
																<a href="notifications.html">Notifications</a>
														</li>
														<li>
																<a href="typography.html">Typography</a>
														</li>
														<li>
																<a href="icons.html"> Icons</a>
														</li>
														<li>
																<a href="grid.html">Grid</a>
														</li>
												</ul>
												<!-- /.nav-second-level -->
										</li>
										<li>
												<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
												<ul class="nav nav-second-level">
														<li>
																<a href="#">Second Level Item</a>
														</li>
														<li>
																<a href="#">Second Level Item</a>
														</li>
														<li>
																<a href="#">Third Level <span class="fa arrow"></span></a>
																<ul class="nav nav-third-level">
																		<li>
																				<a href="#">Third Level Item</a>
																		</li>
																		<li>
																				<a href="#">Third Level Item</a>
																		</li>
																		<li>
																				<a href="#">Third Level Item</a>
																		</li>
																		<li>
																				<a href="#">Third Level Item</a>
																		</li>
																</ul>
																<!-- /.nav-third-level -->
														</li>
												</ul>
												<!-- /.nav-second-level -->
										</li>
										<li>
												<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
												<ul class="nav nav-second-level">
														<li>
																<a href="blank.html">Blank Page</a>
														</li>
														<li>
																<a href="login.html">Login Page</a>
														</li>
												</ul>
												<!-- /.nav-second-level -->
										</li>
										<section style="col-md-3; padding-left:100%;" >
											<div class="container">
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

																	<div class="col-md-10" style="margin: 0; padding: 0;">
																		<ul>


																			<li>
																				<div class="col-md-10 well" style="background-color: rgb(223, 223, 223);">

																					<!--FECHA-->
																					<div class="row" style="text-align: center;">
																						<div>
																							<p id="FECHA" style="font-size: 25px; color:rgb(24, 196, 190);"></p>
																						</div>
																					</div>

																					<!--ICONO TIEMPO-->
																					<div  style="padding-bottom:100px" class="row">
																						<p style="font-size:80px; color:#E67E22; text-align: center; ">
																							<i  id="ICONO" class=""></i>
																						</p>
																					</div>


																					<!--TEMPERATURA-->
																					<div  class="row" style="padding-bottom:100px;">
																						<p id="TEMPERATURA" style="color:rgb(28, 131, 8);font-size:50px; text-align: center;">
																							<sup class="wi wi-celsius"></sup>
																						</p>
																						<p style="color: gray; font-size:25px; text-align: center;">Temperatura</p>
																					</div>


																					<!--HUMEDAD-->
																					<div  class="row" style="padding-bottom:100px;">
																						<p id="HUMEDAD" style="color: #2471A3 ;font-size:50px; text-align: center;">
																							<sup class="wi wi-humidity"></sup>
																						</p>
																						<p style="color: gray; font-size:25px; text-align: center;">Humedad del ambiente</p>
																					</div>

																					<!--PROFUNDIDAD-->
																					<div class="row" style="padding-bottom:100px;">
																						<p id="PROFUNDIDAD" style="color: #2471A3 ;font-size:50px; text-align: center; margin:0;">  cm
																							<sup class="wi wi-flood"></sup>
																						</p>
																						<p style="color: gray; font-size:25px; text-align:center;">Profundidad</p>
																					</div>

																					<div class="row" style="padding-bottom:100px;">
																						<p id="HUMEDAD_SUELO" style="color:rgb(143, 28, 15); font-size:50px;  text-align: center; ">
																							<sup class="wi wi-humidity"></sup>
																						</p>
																						<p style="color: gray; font-size:25px; text-align: center;">Humedad de la tierra</p>
																					</div>

																					<!--ID ARDUINO-->
																					<div class="row" style="padding-bottom:100px;">
																						<p style="color:rgb(106, 104, 104); font-size:25px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
																							<span class="glyphicon glyphicon-import"></span>
																						</p>
																					</div>

																					<!--MAS-->
																					<div class="row">
																						<a href="mediciones.php"><button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn 							btn-info">Leer mas</button></a>
																					</div>

																				</div>
																			</li>

																		</ul>
																	</div>
																</div>
															</section>
															<div class="carousel-caption" style="position: relative;">
																<h3>Noviembre 2017</h3>
																<p>Semana 1</p>
															</div>
														</div>

													</div>

													<!-- Left and right controls -->
													<a class="left carousel-control" href="#myCarousel" data-slide="prev">
														<span class="glyphicon glyphicon-chevron-left"></span>
														<span class="sr-only">Previous</span>
													</a>
													<a class="right carousel-control" href="#myCarousel" data-slide="next">
														<span class="glyphicon glyphicon-chevron-right"></span>
														<span class="sr-only">Next</span>
													</a>
												</div>
											</div>
										</section>
										<main>
											<!--_________________________________________________UNA___________________________________________________________________-->


											<!--_______________________________________VISOR MEDICIONES___________________________________________________-->
											<?php
											 /*$conn = mysqli_connect("localhost","root","","SIMP2");
											 //$query ="SELECT nombre_arduino,nombre_sensor,ubicacion,activo,valor,unidad,fecha FROM mediciones join (sensores,arduinos) on (sensores.id_sensores);";
											 $query ="SELECT * FROM mediciones ORDER BY `mediciones`.`id_mediciones` DESC LIMIT 4";
											 //$quer = "SELECT * FROM `$tabla` WHERE `$iden` = '$id'";
											 //$query ="SELECT * FROM mediciones ORDER BY id_mediciones DESC";


											 $result = mysqli_query($conn, $query)
											 or die("Error: ".mysqli_error($conn));
											*/?>


								</ul>

						</div>
						<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper">
				<div class="row">
						<div class="col-lg-12">
								<h1 class="page-header">S.I.M.P</h1>
						</div>
						<!-- /.col-lg-12 -->
				</div>
				<?php
				 $conn = mysqli_connect("localhost","root","","SIMP2");
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
						<div class="col-lg-3 col-md-6">
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
						 $conn = mysqli_connect("localhost","root","","SIMP2");
						 $query ="SELECT nombre_arduino,nombre_sensor,ubicacion,activo,valor,unidad,fecha FROM mediciones join (sensores,arduinos) on (sensores.id_sensores);";
						 $result = mysqli_query($conn, $query)
						 or die("Error: ".mysqli_error($conn));

						 $mediciones=0;
						 while($row = mysqli_fetch_array($result)){
							 $mediciones++;
						 }

						?>
						<div class="col-lg-3 col-md-6">
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
						 $conn = mysqli_connect("localhost","root","","SIMP2");
						 $query ="SELECT * FROM arduinos ORDER BY id_arduinos DESC";
						 $result = mysqli_query($conn, $query)
						 or die("Error: ".mysqli_error($conn));

						 $arduino=0;
						 while($row = mysqli_fetch_array($result)){
							 $arduino++;
						 }

						?>
						<div class="col-lg-3 col-md-6">
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
										<a href="arduinos.php">
												<div class="panel-footer">
														<span class="pull-left">Ver detalles</span>
														<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
														<div class="clearfix"></div>
												</div>
										</a>
								</div>
						</div>
						<div class="col-lg-3 col-md-6">
								<div class="panel panel-red">
										<div class="panel-heading">
												<div class="row">
														<div class="col-xs-3">
																<i class="fa fa-bell-o fa-5x"></i>
														</div>
														<div class="col-xs-9 text-right">
																<div class="huge">0</div>
																<div>Alertas</div>
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
			</div>


  </div>




		</div>

    <!--_________________________________________________DOS___________________________________________________________________-->

    <div id="chartContainer" style="height: 370px; width: 83%;padding-left:17%; "></div>

  </main>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>

<?php
	session_start();

	if(!isset($_SESSION['bsd1']))
		header('Location: ../index.html');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proyecto integrador</title>
  <link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="js/ajax_query.php">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/weather-icons.css">
  <link rel="stylesheet" href="css/weather-icons-wind.css">

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
     var datos;

     function actualizar_html(datos){
        document.getElementById("TEMPERATURA").innerHTML = datos[0];
        document.getElementById("HUMEDAD").innerHTML = datos[1];
        document.getElementById("PROFUNDIDAD").innerHTML = datos[2];
        document.getElementById("HUMEDAD_SUELO").innerHTML = datos[3];

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

                }, 550);
            });
  </script>

  <!--//////////////////////////////////////////////////////////////////////-->






  <section class="back">
</head>

<body style='background-image: url("css/back.jpg");'>
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
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../cerrar_sesion.php"><span class="glyphicon glyphicon-user"></span> Cerrar sesion</a></li>
    </ul>
    </div>
  </nav>

  </div>

  <main>
    <!--_________________________________________________UNA___________________________________________________________________-->


    <section>
      <div class="row">
        <div class="col-md-2">
        </div>

        <div class="col-md-8">
          <h1 style="text-align: center;color:White; margin: 0 0 20px 0;">Información de sensores activos</h1>
        </div>

        <div class="col-md-2">
        </div>
      </div>
    </section>


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

    <section >
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
                              <i  class="wi wi-day-cloudy"></i>
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

    <!--_________________________________________________DOS___________________________________________________________________-->

    <div id="chartContainer" style="height: 370px; width: 69%;padding-left:17%; "></div>

  </main>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>

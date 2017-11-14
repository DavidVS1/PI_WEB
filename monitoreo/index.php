<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proyecto integrador</title>
  <link rel="stylesheet" href="css/estilos.css">
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
          //_________________________________________________UNA___________________________________________________________________
          type: "line",
          showInLegend: true,
          name: "Grados C",
          markerType: "square",
          xValueFormatString: "DD MMM, YYYY",
          color: "#F5B041",
          dataPoints: [
            { x: new Date(2017, 0, 3), y: 650 },
            { x: new Date(2017, 0, 4), y: 700 },
            { x: new Date(2017, 0, 5), y: 710 },
            { x: new Date(2017, 0, 6), y: 658 },
            { x: new Date(2017, 0, 7), y: 734 },
            { x: new Date(2017, 0, 8), y: 963 },
            { x: new Date(2017, 0, 9), y: 847 },
            { x: new Date(2017, 0, 10), y: 853 },
            { x: new Date(2017, 0, 11), y: 869 },
            { x: new Date(2017, 0, 12), y: 943 },
            { x: new Date(2017, 0, 13), y: 970 },
            { x: new Date(2017, 0, 14), y: 869 },
            { x: new Date(2017, 0, 15), y: 890 },
            { x: new Date(2017, 0, 16), y: 930 }
          ]
        },
        {
          //_________________________________________________DOS___________________________________________________________________
          type: "line",
          showInLegend: true,
          name: "Porcentaje de Hidrogeno",
          markerType: "square",
          xValueFormatString: "DD MMM, YYYY",
          color: "#85C1E9",
          dataPoints: [
            { x: new Date(2017, 0, 3), y: 510 },
            { x: new Date(2017, 0, 4), y: 560 },
            { x: new Date(2017, 0, 5), y: 540 },
            { x: new Date(2017, 0, 6), y: 558 },
            { x: new Date(2017, 0, 7), y: 544 },
            { x: new Date(2017, 0, 8), y: 693 },
            { x: new Date(2017, 0, 9), y: 657 },
            { x: new Date(2017, 0, 10), y: 663 },
            { x: new Date(2017, 0, 11), y: 639 },
            { x: new Date(2017, 0, 12), y: 673 },
            { x: new Date(2017, 0, 13), y: 660 },
            { x: new Date(2017, 0, 14), y: 562 },
            { x: new Date(2017, 0, 15), y: 643 },
            { x: new Date(2017, 0, 16), y: 570 }
          ]
        },
        {
          //_________________________________________________tres___________________________________________________________________
          type: "line",
          showInLegend: true,
          name: "Porcentaje de Contaminacion",
          markerType: "square",
          xValueFormatString: "DD MMM, YYYY",
          color: "#BB8FCE",
          dataPoints: [
            { x: new Date(2017, 0, 3), y: 400 },
            { x: new Date(2017, 0, 4), y: 400 },
            { x: new Date(2017, 0, 5), y: 400 },
            { x: new Date(2017, 0, 6), y: 400 },
            { x: new Date(2017, 0, 7), y: 400 },
            { x: new Date(2017, 0, 8), y: 400 },
            { x: new Date(2017, 0, 9), y: 400 },
            { x: new Date(2017, 0, 10), y: 400 },
            { x: new Date(2017, 0, 11), y: 400 },
            { x: new Date(2017, 0, 12), y: 400 },
            { x: new Date(2017, 0, 13), y: 400 },
            { x: new Date(2017, 0, 14), y: 400 },
            { x: new Date(2017, 0, 15), y: 400 },
            { x: new Date(2017, 0, 16), y: 400 }
          ]
        },
        {
          type: "line",
          showInLegend: true,
          name: "Metros",
          markerType: "square",
          xValueFormatString: "DD MMM, YYYY",
          color: "#ABEBC6",
          dataPoints: [
            { x: new Date(2017, 0, 3), y: 300 },
            { x: new Date(2017, 0, 4), y: 300 },
            { x: new Date(2017, 0, 5), y: 400 },
            { x: new Date(2017, 0, 6), y: 300 },
            { x: new Date(2017, 0, 7), y: 300 },
            { x: new Date(2017, 0, 8), y: 300 },
            { x: new Date(2017, 0, 9), y: 300 },
            { x: new Date(2017, 0, 10), y: 300 },
            { x: new Date(2017, 0, 11), y: 300 },
            { x: new Date(2017, 0, 12), y: 300 },
            { x: new Date(2017, 0, 13), y: 300 },
            { x: new Date(2017, 0, 14), y: 300 },
            { x: new Date(2017, 0, 15), y: 300 },
            { x: new Date(2017, 0, 16), y: 300 }
          ]
        }]
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
          <h1 style="color:White; margin: 0 0 20px 0;">Información de sensores activos</h1>
        </div>

        <div class="col-md-2">
        </div>
      </div>
    </section>


    <!--_______________________________________VISOR MEDICIONES___________________________________________________-->

    <section>
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
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center;">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:25px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center;">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
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

            <div class="item">

              <section class=temperatura style="background-color:#00000042">
                <div class="row">
                  <div class="col-md-2">
                  </div>

                  <div class="col-md-10" style="margin: 0; padding: 0;">
                    <ul>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center;">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:25px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center;">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </section>
              <div class="carousel-caption" style="position: relative;">
                <h3>Noviembre 2017</h3>
                <p>Semana 2</p>
              </div>
            </div>

            <div class="item">
              <section class=temperatura style="background-color:#00000042">
                <div class="row">
                  <div class="col-md-2">
                  </div>

                  <div class="col-md-10" style="margin: 0; padding: 0;">
                    <ul>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center;">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:25px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center;">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
                          </div>

                        </div>
                      </li>
                      <li>
                        <div class="col-md-2 well" style="background-color: rgb(223, 223, 223);">

                          <!--FECHA-->
                          <div class="row" style="text-align: center;">
                            <div>
                              <p style="font-size: 14px; color:rgb(24, 196, 190);">VIERNES</p>
                            </div>
                          </div>

                          <!--ICONO TIEMPO-->
                          <div class="row">
                            <p style="font-size:30px; color:#E67E22; text-align: center;">
                              <i class="wi wi-day-cloudy"></i>
                            </p>
                          </div>

                          <!--TEMPERATURA-->
                          <div class="row">
                            <p style="color:rgb(28, 131, 8);font-size:20px; text-align: center">32
                              <sup class="wi wi-celsius"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Temperatura</p>
                          </div>

                          <!--HUMEDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center;">66
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad del ambiente</p>
                          </div>

                          <div class="row">
                            <p style="color:rgb(143, 28, 15); font-size:20px;  text-align: center; ">10
                              <sup class="wi wi-humidity"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align: center;">Humedad de la tierra</p>
                          </div>

                          <!--PROFUNDIDAD-->
                          <div class="row">
                            <p style="color: #2471A3 ;font-size:20px; text-align: center; margin:0;">66 cm
                              <sup class="wi wi-flood"></sup>
                            </p>
                            <p style="color: gray; font-size:12px; text-align:center;">Profundidad</p>

                          </div>

                          <!--ID ARDUINO-->
                          <div class="row">
                            <p style="color:rgb(106, 104, 104); font-size:15px; text-align: center; margin: 25px 0px 15px;">ARDUINO 1 &nbsp;
                              <span class="glyphicon glyphicon-import"></span>
                            </p>
                          </div>

                          <!--MAS-->
                          <div class="row">
                            <button style="float:right; overflow: auto; font-size: 10px;" type="button" class="btn btn-info">Leer mas</button>
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

    <div id="chartContainer" style="height: 370px; width: 69%;padding-left:6cm"></div>

  </main>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>
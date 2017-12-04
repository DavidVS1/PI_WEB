<!DOCTYPE html>
<html>
 <head>
   <title>Ubicacion</title>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <link rel="stylesheet" href="../css/estilos.css">

   <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--<script type="text/javascript" src="assets/js/libs/base.js"></script>-->


    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
 </head>
 <body style='background-image: url("../css/aaa.jpg");'>
   <main>
     <?php

     	try {
     		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

     		if(!$conn->connect_error){
     			$sql = "select *
           from arduinos";
     			$estaciones = $conn->query($sql);
     		}
     	} catch (Exception $e){}
     ?>

<div class="header">


          <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a href="../index.php"> <img style="height:51px; width: 100px;" src="../css/hub.jpg" alt=""></a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="../index.php">Incio</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrar <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../usuarios/usuarios.php"><span class="glyphicon glyphicon-user"></span>   Usuarios</a></li>
                  <li><a href="../arduinos/arduinos.php"><span class="glyphicon glyphicon-hdd"></span>   Arduinos</a></li>
                  <li><a href="../mediciones.php"><span class="glyphicon glyphicon-list-alt"></span>   Mediciones</a></li>
                  <li><a href="../Alarmas/alarmas.php"><span class="glyphicon glyphicon-bell"></span>   Alarmas</a></li>
                  <li><a href="../reportes.php"><span class="glyphicon glyphicon-bullhorn"></span>   Reportes</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span>   Cerrar Sesión</a></li>
            </ul>
          </div>
          </nav>

			</div>


			<div id="cuadro">
				<center><i style="font-size:125px" class="glyphicon glyphicon-map-marker"></i>
					<div id="titulo">
						<center><h1>Ubicación de Sensores</h1></center>
					</div>

					<div class="container">


     <div class="container">
       <div class="col-xs-12 col-md-12 alert alert-info" role="alert">
         <h3>Lista de sensores</h3>
         <p>Se encontr<?php echo($estaciones->num_rows == 1 ? 'ó ' : 'arón ');
         echo($estaciones->num_rows); ?> estaci<?php echo($estaciones->num_rows == 1 ? 'ón ' : 'ones ');?>
         en el sistema</print>
         <br>
         <?php
          $num_activas = 0;
          while ($row = $estaciones->fetch_assoc())
          {
            if($row['activo']==1)
            {
              $num_activas++;
            }
          }
          $estaciones->data_seek(0);
         ?>
         <p>Se encontr<?php echo($estaciones->num_rows == 1 ? 'ó ' : 'arón ');
         echo($num_activas); ?> estaci<?php echo($estaciones->num_rows == 1 ? 'ón ' : 'ones ');?>
         activa<?php echo($estaciones->num_rows == 1 ? '' : 's');?>
        </p>
       </div>
       <div class="col-md-12 contenido">
         <div class="col-md-6">
           <img src="Ubicacion.png" alt="ubicacion" class="img-thumbnail">
         </div>
         <div class="col-md-6 Estaciones">
           <table id="tabla_ub" class="table table-bordered">
             <thead>
               <tr>
                 <td class="text-center">#</td>
                 <td>Nombre Estación</td>
                 <td>Ubicación</td>
                 <td class="text-center">Estado</td>
               </tr>
             </thead>
             <tbody>
               <?php
                 $num_rows = 0;
                 while($row = $estaciones->fetch_assoc()):
                   $num_rows++;
               ?>
                   <tr>
                     <td class="text-center"><?php echo $num_rows; ?></td>
                     <td><?php echo $row['nombre_arduino']; ?></td>
                     <td><?php echo $row['ubicacion']; ?></td>
                     <td class="text-center">
                       <label class="label label-<?php echo(($row['activo']) ? 'success' : 'warning') ?>">
     										<?php echo(($row['activo']) ? 'Activo' : 'Inactivo') ?>
     									</label>
                     </td>
                   </tr>
               <?php
                 endwhile;
               ?>
             </tbody>
           </table>
         </div>
       </div>

     </div>
   </main>
   <footer>
   </footer>
      <script>
      $(document).ready(function(){
        $('#tabla_ub').DataTable();
      });
      </script>
 </body>
</html>

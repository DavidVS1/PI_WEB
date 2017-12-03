<?php
	$response = array(
		'done' => false,
		'message' => 'No se pudo guardar la configuración de la alarma'
	);

	if(isset($_POST['guardar'])){
		$id_arduinos = $_POST['id_arduinos'];
		$nombre_arduino =  $_POST['nombre_arduino'];
    $ubicacion =  $_POST['ubicacion'];
    $activo =  $_POST['activo'];
  
			if ($nombre_arduino != '' && $ubicacion != '' && $activo != '')
      {
          try{

            $conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');
    				if(!$conn->connect_error){
    					if ($id_arduinos == 0){
                //Es Nuevo
    						$sql = "insert into	arduinos
    									(nombre_arduino, ubicacion, activo)
    									values
    										(
    											'".$nombre_arduino."',
    											'".$ubicacion."',
    											'".$activo."'
    										)";
    					}else{
                //Es Editar
    						$sql = "
    							update
    								arduinos
    							set
    								nombre_arduinos = '".$nombre_arduino."',
										ubicacion = '".$ubicacion."',
                    activo = '".$activo."'
    							where
    								id_arduinos = '".$id_arduinos."'
    						";
    					}

    					$sql_respuesta = $conn->query($sql);
    					if($sql_respuesta)
              {
    						$response['done'] = true;
    						$response['message'] = 'La alarma se guardó correctamente en el sistema';
    					}
    				}

    			}catch (Exception $e){}
        }
        else
        {
          $validacion_datos['done'] = false;
          $validacion_datos['message'] = 'La alarma no se guardo, el indice superior tiene que ser igual o mayor al indice inferior';
        }
	}
	if($response['done'])
//		header('Location: ../alarmas.php');
		include 'arduinos.php';
	else
		include('ard_formulario.php');
?>

<?php
	$response = array(
		'done' => false,
		'message' => 'No se pudo guardar la configuración de la alarma'
	);

	if(isset($_POST['guardar'])){
		$id_alarma = $_POST['id_alarma'];
		$estacion =  $_POST['Estacion'];
    $sensor =  $_POST['Sensor'];
    $valor_min =  $_POST['Valor_min'];
    $valor_max =  $_POST['Valor_max'];
    $mensaje =  $_POST['Mensaje'];
    $destinatario = $_POST['Destinatario'];
		$alarma_enviada = '0';
			if ($valor_min != '' && $valor_max != '' && $mensaje != '' && ($valor_max >= $valor_min))
      {
          try{

            $conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');
    				if(!$conn->connect_error){
    					if ($id_alarma == 0){
                //Es Nuevo
    						$sql = "insert into	alarmas_configuracion
    									(id_arduino, id_sensor, correo, descripcion, valor_minimo, valor_maximo, alarma_enviada)
    									values
    										(
    											'".$estacion."',
    											'".$sensor."',
    											'".$destinatario."',
													'".$mensaje."',
                          '".$valor_min."',
                          '".$valor_max."',
    											'".$alarma_enviada."'
    										)";
    					}else{
                //Es Editar
    						$sql = "
    							update
    								alarmas_configuracion
    							set
    								id_arduino = '".$estacion."',
    								id_sensor = '".$sensor."',
    								correo = '".$destinatario."',
										descripcion = '".$mensaje."',
                    valor_minimo = '".$valor_min."',
                    valor_maximo = '".$valor_max."',
    								alarma_enviada = '".$alarma_enviada."'
    							where
    								id = '".$id_alarma."'
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
		include '../monitoreo/alarmas.php';
	else
		include('Alarmas_formulario.php');
?>

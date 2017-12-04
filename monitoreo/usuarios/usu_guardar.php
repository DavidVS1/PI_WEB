<?php








	$response = array(
		'done' => false,
		'message' => 'No se pudo guardar la configuración del usuario'
	);

	if(isset($_POST['guardar'])){
		$id_usuario = $_POST['id_usuario'];
		$nombre =  $_POST['nombre'];
    $clave =  $_POST['clave'];
		$correo =  $_POST['correo'];
		$super_usuario =  $_POST['super_usuario'];
  
			if ($nombre != '' && $clave != '' && $correo != '' && $super_usuario != 0)
      {
          try{

            $conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');
    				if(!$conn->connect_error){
    					if ($id_usuario == 0){
                //Es Nuevo
    						$sql = "insert into	usuarios
    									(nombre, clave, correo, super_usuario)
    									values
    										(
    											'".$nombre."',
													'".$clave."',
													'".$correo."',
    											'".$super_usuario."'
    										)";
    					}else{
                //Es Editar
    						$sql = "
    							update
    								usuarios
    							set
    								nombre = '".$nombre."',
										clave = '".$clave."',
										correo = '".$correo."',
                    super_usuario = '".$super_usuario."'
    							where
    								id_usuario = '".$id_usuario."'
    						";
    					}

    					$sql_respuesta = $conn->query($sql);
    					if($sql_respuesta)
              {
    						$response['done'] = true;
    						$response['message'] = 'El usuario ha sido guardado exitosamente';
    					}
    				}

				}
				catch (Exception $e){}
      }
      else{
          $validacion_datos['done'] = false;
          $validacion_datos['message'] = 'Existen campos faltantantes';
			}
			
	}
	if($response['done'])
		include 'usuarios.php';
	else
		include('usu_formulario.php');

	
?>

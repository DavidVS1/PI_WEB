<?php
	$response = array(
		'done' => false,
		'message' => 'No se pudo guardar la información del platillo'
	);

	if(isset($_POST['guardar'])){
		$ard_id = $_POST['pa_id'];
		$ard_nombre = $_POST['nombre'];
		$ard_ubicacion = $_POST['ubicacion'];
		$ard_activo = $_POST['activo_ard'];

		$sensores = $_POST['sensores'];
		$sen_activo = $_POST['activo_sens'];

		if ($ard_nombre != '' && $ard_ubicacion != ''){
			if (count($sensores) > 0){
				$conn = new mysqli('localhost', 'root', '', 'smip');
				
				if(!$conn->connect_error){
					if ($ard_id == 0){
						$sql = "
							insert into
								arduinos
									(nombre, ubicacion, activo)
									values
										(
											'".$ard_nombre."', 
											'".$ard_ubicacion."', 
											".$ard_activo."
										);
						";
					}else{
						$sql = "
							update
								arduinos
							set
								nombre = '".$ard_nombre."',
								ubicacion = '".$ard_ubicacion."',
								activo = ".$ard_activo."
							where
								id_arduinos = ".$ard_id."
						";
					}			

					$sql_respuesta = $conn->query($sql);					
					if($sql_respuesta){
						if($ard_id == 0)
							$ard_id = $conn->insert_id;

						$sql = "
							delete from
								ardsensor
							where
								id_sensores = ".$ard_id
						;
						$sql_respuesta = $conn->query($sql);
						if ($sql_respuesta){
							for($i = 0; $i <= count($sensores)-1; $i++){
								$sql = "
									insert into
										ardsensor
											(id_arduinos, id_sensores, activo)
										values
											(".$ard_id.",".$sensores[$i].", ".$sen_activo[$i].");
								";
								$conn->query($sql);
							}
						}

						$response['done'] = true;
						$response['message'] = 'La estacion se guaró correctamente';
					}
				}

			}else
				$response['message'] = 'Debe indicar al menos un sensor';
		}else
			$response['message'].= ', favor de llenar todos los campos';
	}

	//$id = (isset($_POST['pa_id']) ? $_POST['pa_id'] : 0);

	if($response['done'])
		include 'arduinos.php';
	else
		include('ard_formulario.php');
?>
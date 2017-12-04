<?php
	session_start();
	$iniciar = false;
	$super_us = 0;
	try {
		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

		if(!$conn->connect_error){
			$correo = $_POST['correo'];
			$clave = $_POST['clave'];

			$sql = "
				select
					*
				from
					usuarios
				where
					correo = '".$correo."'
					and clave = '".$clave."'";
			$sql_respuesta = $conn->query($sql);

			//echo($sql);	// imprime el contenido de la variable $sql
			//var_dump($sql_respuesta);	// imprime el contenido de la variable $sql_respuesta, este método funciona para visualizar arrays

			// ciclo que recorre cada fila obtenida en el select, en este caso cada fila se obtiene en un vector asociativo, investogar de vectores asociativos
			while($row = mysqli_fetch_array($sql_respuesta)){
				//var_dump($row);	// imprime cada fila para ver la estructura del vector asociativo
				$_SESSION['bsd1'] = $row;
				$iniciar = true;
				$super_us = $row['super_usuario'];
			}
			//var_dump($row);
		}
	} catch (Exception $e){}
	

	if($iniciar){
		if($super_us){
			header('Location: monitoreo/index.php');
		}
		else{
			header('Location: monitoreo/index2.php');
		}
	}else{
		header('Location: login.php?error=1');
	}
?>

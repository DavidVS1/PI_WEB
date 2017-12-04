<?php

		$id_usuario = $_GET['id_usuario'];
  	try {
  		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

  		if(!$conn->connect_error){
  				$sql = "delete from usuarios where id_usuario = ".$id_usuario;
  				$sql_respuesta = $conn->query($sql);
  				if($sql_respuesta)
          {
            $response =  array('done' => true, 'message' => 'Se eliminó la estación');
          }


  		}
  	} catch (Exception $e){}


	include 'usuarios.php';
?>

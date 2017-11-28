<?php

  	$id_alarma = $_GET['id'];
  	try {
  		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

  		if(!$conn->connect_error){
  				$sql = "delete from alarmas_configuracion where id = ".$id_alarma;
  				$sql_respuesta = $conn->query($sql);
  				if($sql_respuesta)
          {
            $response =  array('done' => true, 'message' => 'Se eliminó la alarma');
          }


  		}
  	} catch (Exception $e){}


	include 'alarmas.php';
?>

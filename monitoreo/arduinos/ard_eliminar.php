<?php

  	$id_arduinos = $_GET['id_arduinos'];
  	try {
  		$conn = new mysqli('localhost', 'simp', 'simpcolima', 'SIMP2');

  		if(!$conn->connect_error){
  				$sql = "delete from arduinos where id = ".$id_arduinos;
  				$sql_respuesta = $conn->query($sql);
  				if($sql_respuesta)
          {
            $response =  array('done' => true, 'message' => 'Se eliminó la alarma');
          }


  		}
  	} catch (Exception $e){}


	include 'arduinos.php';
?>

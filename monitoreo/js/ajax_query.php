 <?php
    //SCRIPT DE CONSULTA POR FECHA

    //Fecha Automatica
    //$fecha_act = date("Y-m-d");
    //$dia = date("N");

    //Fecha manual
    //$fecha_act = "2017-11-12";
    //$dia = "3";


    $conn = mysqli_connect("localhost","simp","simpcolima","SIMP2");


    $query ="select * from mediciones where fecha order by id_mediciones DESC LIMIT 4";
    $result = mysqli_query($conn, $query) or die("Error: ".mysqli_error($conn));


    $contador = 0;
    while($row = mysqli_fetch_array($result)){
        $valor_medicion[$contador]=$row['valor'];
        $fecha_act = $row['fecha'];
        $contador++;
    }

    //Dato de numero de dia de la semana
    //$valor_medicion[4] = $dia;

    //Dato de numero de dia del mes
    //$valor_medicion[5] = date("d");

    $valor_medicion[4] = date('D', strtotime($fecha_act));
    //Dato de numero de dia del mes
    $valor_medicion[5] = date('d', strtotime($fecha_act));


    echo json_encode($valor_medicion);


?>

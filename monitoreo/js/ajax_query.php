 <?php
    //SCRIPT DE CONSULTA POR FECHA

    //Fecha Automatica
    //$fecha_act = date("Y-m-d");
    //$dia = date("N");

    //Fecha manual
    // CAmbiar la fecha a una forma dinamica
    $fecha_act = "2017-11-12";
    #$dia = "7";

    #$date = '2017-11-16';
    #$nameOfDay = date('D', strtotime($date));
    #var_dump($nameOfDay);
    #SELECT * FROM mediciones ORDER BY fecha DESC

    // echo "console.log('FECHA CONSULTA:".$fecha_act."')";

    $conn  = mysqli_connect("localhost","root","","SIMP2");
    $query ="SELECT * FROM mediciones WHERE fecha LIKE '".$fecha_act."%' ORDER By id_mediciones DESC LIMIT 4";
    #$query ="SELECT * FROM mediciones ORDER BY fecha DESC LIMIT 1";
    $result = mysqli_query($conn, $query) or die("Error: ".mysqli_error($conn));

    $contador = 0;
    while($row = mysqli_fetch_array($result)){
        $valor_medicion[$contador]=$row['valor'];
        $contador++;
    }

    //Dato de numero de dia de la semana
    $valor_medicion[4] = date('D', strtotime($fecha_act));

    //Dato de numero de dia del mes
    $valor_medicion[5] = date('d', strtotime($fecha_act));

    echo json_encode($valor_medicion);

?>

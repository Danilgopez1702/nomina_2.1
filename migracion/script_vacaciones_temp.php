<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_empleado`, `fecha_iv`, `fecha_fv`, `fecha_ind` FROM `vacaciones`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_empleado = $data['id_empleado'];

    $sql2 =  mysqli_query($conexion,"SELECT  `id_empleado`, `fecha_ingreso` FROM `empleados` WHERE `id_empleado` = '0000000004' ");
    $data2 = mysqli_fetch_assoc($sql2);

    $fecha_ingreso = $data2['fecha_ingreso'];
    $año_ingreso = substr($fecha_ingreso, 0, 4);
    $fecha_actual = date("Y-m-d");

    $sql3 =  mysqli_query($con,"SELECT  `id_empleado`, `fecha_vacacion` FROM `vacaciones` WHERE `id_empleado` = '$id_empleado' ");

    while ($data3 = mysqli_fetch_assoc($sql3)){

    $fecha_vacacion = $data3['fecha_vacacion'];

    if ($año_ingreso == "2021") {

        $fecha_historico = date("Y-m-d",strtotime($fecha_ingreso."+ 2 year"));
        if ($fecha_actual < $fecha_historico) {

            $sql_update = mysqli_query($con, "UPDATE vacaciones SET status_vacaciones = 1 WHERE  id_empleado = '$id_empleado' AND fecha_vacacion = '$fecha_vacacion' ");
            $x++;

            var_dump($sql_update);
            
        }

        
    }elseif ($año_ingreso == "2022"){


    }else{

        $año_int = (int) $año_ingreso;
        $iguala = 2021 - $año_int;
        $año_iguala = $año_int + $iguala;
        $mes_dia_ingreso = substr($fecha_ingreso, 4, 6);
        $año_iguala_string = (string) $año_iguala;
        $fecha_nueva = $año_iguala.$mes_dia_ingreso;
        $fecha_historico = date("Y-m-d",strtotime($fecha_nueva."+ 1 year"));
        $fecha_cambio_status = date("Y-m-d",strtotime($fecha_historico."+ 1 year"));


        if ($fecha_vacacion < $fecha_cambio_status && $fecha_vacacion > $fecha_historico) {

            $sql_update = mysqli_query($con, "UPDATE vacaciones SET status_vacaciones = 1 WHERE  id_empleado = '$id_empleado' AND fecha_vacacion = '$fecha_vacacion' ");
            $x++;

            var_dump($sql_update);
            
        }

    }

}


}

echo $x;


?>
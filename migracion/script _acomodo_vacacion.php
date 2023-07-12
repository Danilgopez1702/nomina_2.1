<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
    die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($con,"SELECT `id_empleado`,`fecha_ingreso` FROM `empleados` WHERE `status` = 1");

while ($data = mysqli_fetch_assoc($sql)){

    $ff = $data['fecha_ingreso'];
    $dias = substr($ff, 8);
    $mes = substr($ff, 5,2);
    if($mes == 12){
        $fecha = "2021"."-".$mes."-".$dias;
    }else{
        $fecha = "2022"."-".$mes."-".$dias;
    }
    $id = $data['id_empleado'];

    $sql_select_vacaciones =  mysqli_query($con,"SELECT `id_vacaciones`, `id_empleado`, `fecha_vacacion` FROM `vacaciones` WHERE `id_empleado` = $id");
    $num = mysqli_num_rows($sql_select_vacaciones);
    //var_dump($num);
    while ($date = mysqli_fetch_assoc($sql_select_vacaciones)){

        $fecha_vacaciones = $date['fecha_vacacion'];
        $id_vacacion = $date['id_vacaciones'];
        
        $fecha1 = date("Y-m-d",strtotime($fecha));

        $fecha_vacaciones1 = date("Y-m-d",strtotime($fecha_vacaciones));

        if($fecha_vacaciones1 <  $fecha1 ){
            $sql_update_vacaciones =  mysqli_query($con,"UPDATE `vacaciones` SET `status_vacaciones` = 2 WHERE `id_vacaciones`= $id_vacacion");
            echo "historico".$sql_update_vacaciones."\n";
        }else{
            $sql_update_vacaciones =  mysqli_query($con,"UPDATE `vacaciones` SET `status_vacaciones` = 1 WHERE `id_vacaciones`= $id_vacacion");
            echo "actual".$sql_update_vacaciones."\n";

        }
        





    }



}

?>
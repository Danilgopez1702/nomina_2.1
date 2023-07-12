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
    $fecha = date('Y')."-".$mes."-".$dias;

    $fecha_historico = date("Y-m-d",strtotime($fecha));
    





}



?>
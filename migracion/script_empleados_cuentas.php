<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
    die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
    die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT * FROM `empleados`");
$sql_t = mysqli_num_rows($sql);


if ($sql_t > 0) {
    while ($data = mysqli_fetch_assoc($sql)){
        $no_cuenta = $data['no_cuenta'];
        $id_empleado = $data['id_empleado'];


        $sql_update =  mysqli_query($con,"UPDATE `empleados` SET `no_cuenta` = '$no_cuenta' WHERE `id_empleado` = '$id_empleado'");

        
    }
}
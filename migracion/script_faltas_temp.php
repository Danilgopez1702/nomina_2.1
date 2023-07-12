<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_ft`, `id_empleado`, `fecha_ft`, `razon_ft` FROM `falta_temp`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_empleado = $data['id_empleado'];
    $fecha_ft = $data['fecha_ft'];

    $sql_update = mysqli_query($con, "UPDATE asistencia SET status_asistencia = 1 WHERE  id_empleado = $id_empleado AND fecha_asistencia = '$fecha_ft'");
    $x++;

    var_dump($sql_update);

}

echo $x;


?>
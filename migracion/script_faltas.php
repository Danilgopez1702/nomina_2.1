<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_empleado`, `fecha`, `razon` FROM `falta`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_empleado = $data['id_empleado'];
    $fecha = $data['fecha'];
    $razon = $data['razon'];


    $sql_insert =  mysqli_query($con,"INSERT INTO `asistencia`(`id_empleado`, `tipo_asistencia`, `fecha_asistencia`, `status_asistencia`, `comentario_asistencia`)
     VALUES ('$id_empleado', 2, '$fecha', 2, '$razon')");
    $x++;

    var_dump($sql_insert);

}

echo $x;


?>
<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_p`, `id_empleado`, `fecha_p`, `monto_p`, `comentario_p` FROM `prestamo`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_p = $data['id_p'];
    $id_empleado = $data['id_empleado'];
    $fecha_p = $data['fecha_p'];
    $monto_p = $data['monto_p'];
    $comentario_p = $data['comentario_p'];


    $sql_insert =  mysqli_query($con,"INSERT INTO `prestamo`(`id_prestamo`, `id_empleado`, `fecha_prestamo`, `monto_prestamo`, `comentario_prestamo`, `status_prestamo`)
     VALUES ('$id_p', '$id_empleado', '$fecha_p', '$monto_p', '$comentario_p', '2')");
    $x++;

    var_dump($sql_insert);

}

echo $x;


?>
<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_pt`, `id_empleado`, `fecha_pt`, `monto_pt`, `comentario_pt`, `c_pago`, `pago_unitario` FROM `prestamo_temp` WHERE `c_pago` > 0 ");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_empleado = $data['id_empleado'];
    $c_pago = $data['c_pago'];
    $pago_unitario = $data['pago_unitario'];
    $fecha_pt = $data['fecha_pt'];


    $sql_update = mysqli_query($con, "UPDATE prestamo SET status_prestamo = 1, plazo_prestamo = '$c_pago', plazo_actual_prestamo = '$c_pago', unitario_prestamo = '$pago_unitario' WHERE  id_empleado = $id_empleado AND fecha_prestamo = '$fecha_pt' ");
    $x++;

    var_dump($sql_update);

}

echo $x;


?>
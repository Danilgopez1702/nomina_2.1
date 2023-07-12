<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_hm`, `fecha`, `monto_total`, `modalidad_p` FROM `historico_m`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $fecha = $data['fecha'];
    $monto_total = $data['monto_total'];
    $modalidad_p = $data['modalidad_p'];

    $sql_insert =  mysqli_query($con,"INSERT INTO `historico_detalles`(`fecha`, `monto_total`, `modalidad_p`)
     VALUES ('$fecha', '$monto_total', '$modalidad_p')");
    $x++;

    var_dump($sql_insert);

}

echo $x;


?>
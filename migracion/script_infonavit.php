<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_info`, `id_empleado`, `monto_info` FROM `infonavit`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_info = $data['id_info'];
    $id_empleado = $data['id_empleado'];
    $monto_info = $data['monto_info'];


    $sql_insert =  mysqli_query($con,"INSERT INTO `infonavit`(`id_infonavit`, `id_empleado`, `monto_infonavit`)
     VALUES ('$id_info', '$id_empleado', '$monto_info')");
    $x++;

    var_dump($sql_insert);

}

echo $x;


?>
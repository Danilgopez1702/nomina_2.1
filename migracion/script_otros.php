<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_o`, `id_empleado`, `monto_ot`, `razon_ot` FROM `otros`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_o = $data['id_o'];
    $id_empleado = $data['id_empleado'];
    $monto_ot = $data['monto_ot'];
    $razon_ot = $data['razon_ot'];
    $id_empleado_real = str_pad($id_empleado, 10, "0", STR_PAD_LEFT);


    $sql_insert =  mysqli_query($con,"INSERT INTO `otros`(`id_otros`, `id_empleado`, `monto_otros`, `comentario_otros`, `status_otros`)
     VALUES ('$id_o', '$id_empleado_real', '$monto_ot', '$razon_ot', '2')");
    $x++;

    var_dump($sql_insert);

}

echo $x;


?>
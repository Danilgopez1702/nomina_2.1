<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_ext`, `id_empleado`, `hora_ext`, `razon_ext` FROM `extra_temp`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_empleado = $data['id_empleado'];
    $id_empleado_real = str_pad($id_empleado, 10, "0", STR_PAD_LEFT);


    $sql_update = mysqli_query($con, "UPDATE horas_extras SET status_extras = 1 WHERE  id_empleado = $id_empleado_real");
    $x++;

    var_dump($sql_update);

}

echo $x;


?>
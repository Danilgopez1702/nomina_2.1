<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_ex`, `id_empleado`, `hora_ex`, `razon_ex` FROM `extra`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_ex = $data['id_ex'];
    $id_empleado = $data['id_empleado'];
    $hora_ex = $data['hora_ex'];
    $razon_ex = $data['razon_ex'];
    $id_empleado_real = str_pad($id_empleado, 10, "0", STR_PAD_LEFT);
    


    $sql_insert =  mysqli_query($con,"INSERT INTO `horas_extras`(`id_extra`, `id_empleado`, `horas_extras`, `comentario_extra`, `status_extras`)
     VALUES ('$id_ex', '$id_empleado_real', '$hora_ex', '$razon_ex', '2')");
    $x++;

    var_dump($sql_insert);

}

echo $x;


?>
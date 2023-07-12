<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_v`, `id_empleado`, `fecha_iv`, `fecha_fv`, `fecha_ind` FROM `vacaciones`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_v = $data['id_v'];
    $id_empleado = $data['id_empleado'];
    $fecha_iv = $data['fecha_iv'];
    $fecha_fv = $data['fecha_fv'];
    $fecha_ind = $data['fecha_ind'];
    $fecha_ind_real = date('Y-m-d' ,strtotime($fecha_ind));
    


    $sql_insert =  mysqli_query($con,"INSERT INTO `vacaciones`(`id_vacaciones`, `id_empleado`, `fecha_inicio_v`, `fecha_fin_v`, `fecha_vacacion`, `status_vacaciones`)
     VALUES ('$id_v', '$id_empleado', '$fecha_iv', '$fecha_fv', '$fecha_ind_real', '2')");
    $x++;

    var_dump($sql_insert);

}

echo $x;


?>
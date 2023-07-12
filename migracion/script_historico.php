<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
	die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT  `id_empleado`, `nombre`, `faltas`, `prestamos`, `infonavit`, `horas_extra`, `otros_perc`, `monto_pagar` FROM `historico`");

$x = 0;

while ($data = mysqli_fetch_assoc($sql)){

    $id_empleado = $data['id_empleado'];
    $nombre = $data['nombre'];
    $faltas = $data['faltas'];
    $prestamos = $data['prestamos'];
    $infonavit = $data['infonavit'];
    $horas_extra = $data['horas_extra'];
    $otros_perc = $data['otros_perc'];
    $monto_pagar = $data['monto_pagar'];


    $sql_insert =  mysqli_query($con,"INSERT INTO `historico`(`id_empleado`, `nombre`, `faltas`, `prestamo`, `infonavit`, `hora_extra`, `otras_percepciones`, `monto_pago`, `status`)
     VALUES ('$id_empleado', '$nombre', '$faltas', '$prestamos', '$infonavit', '$horas_extra', '$otros_perc', '$monto_pagar', 2)");
    $x++;

    var_dump($sql_insert);

}

echo $x;


?>
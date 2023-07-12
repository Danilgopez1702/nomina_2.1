<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die("Connection failed: " . $con->connect_error);
}

$fecha_i = $_POST['fecha_i'];
$fecha_f = $_POST['fecha_f'];
$id_empleado  = $_POST['id_empleado'];
if($id_empleado == 50){
    $sql = mysqli_query($con, "SELECT * FROM `empleados` WHERE `status` = 1");
}else{
    $sql = mysqli_query($con, "SELECT * FROM `empleados` WHERE `id_empleado` = '$id_empleado' AND `status` = 1");
}

$sql_delete = mysqli_query($con, "DELETE FROM `previsualizacion_vales`");

$result_numero = mysqli_num_rows($sql);


while ($data = mysqli_fetch_assoc($sql)) {

    $id = $data['id_empleado'];
    $vale = $data['vales'];
    
    $sql_faltas = mysqli_query($con, "SELECT * FROM `asistencia` WHERE `id_empleado` = '$id' AND `fecha_asistencia` >= '$fecha_i' AND `fecha_asistencia` <= '$fecha_f' AND tipo_asistencia in (2, 3, 4)");
    $numero_faltas = mysqli_num_rows($sql_faltas);
    
    $sql_vacacion = mysqli_query($con, "SELECT * FROM `vacaciones` WHERE `id_empleado` = '$id' AND `fecha_vacacion` >= '$fecha_i' AND `fecha_vacacion` <= '$fecha_f'");
    $numero_vacacion = mysqli_num_rows($sql_vacacion);
    
    $sql_retardo = mysqli_query($con, "SELECT * FROM `asistencia` WHERE `id_empleado` = '$id' AND `fecha_asistencia` >= '$fecha_i' AND `fecha_asistencia` <= '$fecha_f' AND tipo_asistencia = 1");
    $numero_retardo = mysqli_num_rows($sql_retardo);

echo "falta: ".$numero_faltas. " vacaciones: ". $numero_vacacion. " retardo: ". $numero_retardo;

    if($numero_faltas != 0 || $numero_vacacion != 0 || $numero_retardo != 0){
        $sql_insert = mysqli_query($con, "INSERT INTO `previsualizacion_vales`( `id_empleado`, `retardos_vales`, `faltas_vales`, `vacacion_vales`, `cuenta_vales`) VALUES ('$id', $numero_retardo, $numero_faltas, $numero_vacacion, '$vale')");
    }
}

header('location: ./vales.php');
?>
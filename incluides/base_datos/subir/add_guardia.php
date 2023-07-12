<?php
if ( empty($_POST['empleado']) || empty($_POST['dep']) || empty($_POST['dia']) || empty($_POST['hr']) || empty($_POST['aco'])) {

} else {
	require ("../conexion/conexion.php");

    $empleado = $_POST['empleado'];
    $id_departamento = $_POST['dep'];
    $dia =  $_POST['dia'];
    $hora = $_POST['hr'];
    $acomodo = $_POST['aco'];

    var_dump($empleado,$id_departamento, $dia,$hora,$acomodo);
    $sql = mysqli_query($conexion, "INSERT INTO `guardia`(`id_departamento`, `dia_guardia`, `hr_guardia`, `id_empleado`, `rol_guardia`) 
    VALUES ('$id_departamento','$dia','$hora','$empleado','$acomodo')");

    var_dump($sql);
	mysqli_close($conexion);
	header("location: ../../admin/guardia.php");
}
?>
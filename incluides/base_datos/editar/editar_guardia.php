<?php
if ( empty($_POST['id_guardia_editar']) || empty($_POST['id_departamento_editar']) || empty($_POST['dia_guardia_editar']) || empty($_POST['hr_guardia_editar']) || empty($_POST['rol_guardia_editar'])) {

} else {
	require ("../conexion/conexion.php");
    
    $id = $_POST['id_guardia_editar'];
    $dep = $_POST['id_departamento_editar'];
    $dia =  $_POST['dia_guardia_editar'];
    $hora = $_POST['hr_guardia_editar'];
    $acomodo = $_POST['rol_guardia_editar'];


    $sql = mysqli_query($conexion, "UPDATE `guardia` SET `id_departamento`= '$dep',`dia_guardia`= '$dia',`hr_guardia`= '$hora',`rol_guardia`= '$acomodo' WHERE `id_guardia` = '$id'");


	mysqli_close($conexion);

	header("location: ../../admin/guardia.php");
}
?>
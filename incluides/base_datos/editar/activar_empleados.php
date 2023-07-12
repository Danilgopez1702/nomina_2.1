<?php
	require ("../conexion/conexion.php");
    
    $id = $_GET['id'];
    $sql = mysqli_query($conexion, "UPDATE `empleados` SET `status` = 1, `fecha_baja`= NULL, `motivo_baja`= ' ' WHERE `dni` = $id");
	mysqli_close($conexion);
    header('location: ../../admin/empleados_inactivos.php');

?>
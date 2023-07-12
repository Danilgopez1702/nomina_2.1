<?php

	require ("../conexion/conexion.php");
    
    $id = $_GET['id'];
    $idp = $_POST['id_prestamo'];
    $fecha = $_POST['fecha_prestamo'];
    $monto = $_POST['monto_prestamo'];
    $plazo = $_POST['plazo_prestamo'];
    $actual = $_POST['plazo_actual_prestamo'];
    $comentario = $_POST['comentario_prestamo'];
    $status = $_POST['status_prestamo'];

    $sql = mysqli_query($conexion, "UPDATE `prestamo` SET `fecha_prestamo`= '$fecha', `monto_prestamo`= '$monto', `comentario_prestamo`= '$comentario',
    `plazo_prestamo`= '$plazo', `plazo_actual_prestamo`= '$actual', `status_prestamo`= '$status' WHERE `id_prestamo` = $idp");
    
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab3');
?>
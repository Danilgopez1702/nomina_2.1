<?php

	require ("../conexion/conexion.php");
    
    $id = $_GET['id'];
    $ide = $_POST['id_extra'];
    $horas = $_POST['horas_extras'];
    $comentario = $_POST['comentario_extra'];
    $status_extras = $_POST['status_extras'];

    $sql = mysqli_query($conexion, "UPDATE `horas_extras` SET `horas_extras`= '$horas', `comentario_extra`= '$comentario',
     `status_extras`= '$status_extras'  WHERE `id_extra` = $ide");
    var_dump($id, $ida, $falta, $tipo, $time, $comentario, $sql);
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab5');
?>
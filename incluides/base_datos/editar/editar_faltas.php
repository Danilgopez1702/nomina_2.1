<?php

	require ("../conexion/conexion.php");
    
    $id = $_GET['id'];
    $ida = $_POST['id_asistencia'];
    $falta = $_POST['fecha_asistencia'];
    $tipo = $_POST['tipo_asistencia'];
    $hora = $_POST['hora_asistencia'];
    $comentario = $_POST['comentario_asistencia'];
    $status_asistencia = $_POST['status_asistencia'];
    $time = date('h:i:s' ,strtotime($hora));

    if($tipo = "Retardo"){
        $tipo_a = 1;
    }else if($tipo = "Falta"){
        $tipo_a = 2;
    }else if(stristr($ipo, 'retardo')){
        $tipo_a = 3;
    }

    $sql = mysqli_query($conexion, "UPDATE `asistencia` SET `tipo_asistencia`= '$tipo_a', `fecha_asistencia`= '$falta',
    `hora_asistencia`= '$time',`comentario_asistencia`= '$comentario',`status_asistencia`= '$status_asistencia' WHERE `id_asistencia` = $ida");
    var_dump($id, $ida, $falta, $tipo, $time, $comentario, $sql);
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab1');
?>
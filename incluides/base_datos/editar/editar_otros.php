<?php

	require ("../conexion/conexion.php");
    
    $id = $_GET['id'];
    $ido = $_POST['id_otros'];
    $monto = $_POST['monto_otros'];
    $comentario = $_POST['comentario_otros'];
    $status_otros = $_POST['status_otros'];

    $sql = mysqli_query($conexion, "UPDATE `otros` SET `monto_otros`= '$monto',`comentario_otros`= '$comentario',`status_otros`= '$status_otros' WHERE `id_otros` = $ido");
    var_dump($sql);
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab6');
?>
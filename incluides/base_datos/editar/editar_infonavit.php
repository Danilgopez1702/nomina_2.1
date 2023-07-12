<?php

	require ("../conexion/conexion.php");
    
    $id = $_GET['id'];
    $idp = $_POST['id_infonavit'];
    $monto = $_POST['monto_infonavit'];

    $sql = mysqli_query($conexion, "UPDATE `infonavit` SET `monto_infonavit`= '$monto' WHERE `id_infonavit` = $idp");
    var_dump($id, $ida, $falta, $tipo, $time, $comentario, $sql);
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab4');
?>
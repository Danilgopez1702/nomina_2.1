<?php
if ( empty($_POST['monto']) || empty($_POST['com'])) {

} else {
	require ("../conexion/conexion.php");
    
    $id = $_POST['id'];
    $monto = $_POST['monto'];
    $comentario = $_POST['com'];

    $sql = mysqli_query($conexion, "INSERT INTO `otros`(`id_empleado`, `monto_otros`, `comentario_otros`, `status_otros`) 
    VALUES ('$id','$monto','$comentario',1)");
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab6');
}
?>
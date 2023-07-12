<?php
if ( empty($_POST['fecha_p']) || empty($_POST['monto']) || empty($_POST['plazo']) || empty($_POST['com'])) {

} else {
	require ("../conexion/conexion.php");
    
    $id = $_POST['id'];
    $fecha_p = $_POST['fecha_p'];
    $monto = $_POST['monto'];
    $plazo = $_POST['plazo'];
    $comentario = $_POST['com'];

    $sql = mysqli_query($conexion, "INSERT INTO `prestamo`(`id_empleado`, `fecha_prestamo`, `monto_prestamo`, `comentario_prestamo`, `plazo_prestamo`, `plazo_actual_prestamo`, `status_prestamo`) 
    VALUES ('$id','$fecha_p','$monto','$comentario','$plazo','$plazo',1)");
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab3');
}
?>
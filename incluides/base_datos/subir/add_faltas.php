<?php
if ( empty($_POST['falta']) || empty($_POST['com'])) {

} else {
	require ("../conexion/conexion.php");
    
    $id = $_POST['id'];
    $falta = $_POST['falta'];
    $comentario = $_POST['com'];

    $sql = mysqli_query($conexion, "INSERT INTO `asistencia`(`id_empleado`,  `tipo_asistencia`, `fecha_asistencia`,`status_asistencia`, `comentario_asistencia`) 
    VALUES ('$id','2','$falta','1','$comentario')");
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab1');
}
?>
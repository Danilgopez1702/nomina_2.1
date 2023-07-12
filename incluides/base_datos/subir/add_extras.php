<?php
if ( empty($_POST['extras']) || empty($_POST['com'])) {

} else {
	require ("../conexion/conexion.php");
    
    $id = $_POST['id'];
    $extras = $_POST['extras'];
    $com = $_POST['com'];

    echo ($id.$extras.$com);

    $sql = mysqli_query($conexion, "INSERT INTO `horas_extras`(`id_empleado`, `horas_extras`, `comentario_extra`, `status_extras`)
     VALUES ('$id','$extras','$com',1)");
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab5');
}
?>
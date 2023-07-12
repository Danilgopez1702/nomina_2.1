<?php
if ( empty($_POST['monto']) ) {

} else {
	require ("../conexion/conexion.php");
    
    $id = $_POST['id'];
    $monto = $_POST['monto'];

    $sql = mysqli_query($conexion, "INSERT INTO `infonavit`(`id_empleado`, `monto_infonavit`) VALUES ('$id','$monto')");
	mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab4');
}
?>
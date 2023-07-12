<?php
    require("../conexion/conexion.php");

    $id = $_GET['ide'];
    
    $sql = mysqli_query($conexion, "DELETE FROM asistencia WHERE id_asistencia = '".$_GET['id']."'");
    header('location: ../../admin/caratula.php?id='.$id.'#tab1');
?>


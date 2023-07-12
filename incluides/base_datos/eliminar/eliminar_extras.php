<?php
    require("../conexion/conexion.php");

    $id = $_GET['ide'];
    
    $sql = mysqli_query($conexion, "DELETE FROM horas_extras WHERE id_extra = '".$_GET['id']."'");
    header('location: ../../admin/caratula.php?id='.$id.'#tab5');
?>


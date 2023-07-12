<?php
    require("../conexion/conexion.php");

    $id = $_GET['ide'];
    
    $sql = mysqli_query($conexion, "DELETE FROM infonavit WHERE id_infonavit= '".$_GET['id']."'");
    header('location: ../../admin/caratula.php?id='.$id.'#tab4');
?>


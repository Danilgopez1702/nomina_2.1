<?php
    require("../conexion/conexion.php");

    $id = $_GET['ide'];
    
    $sql = mysqli_query($conexion, "DELETE FROM otros WHERE id_otros = '".$_GET['id']."'");
    header('location: ../../admin/caratula.php?id='.$id.'#tab6');
?>


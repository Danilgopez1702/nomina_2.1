<?php
    require("../conexion/conexion.php");

    $id = $_GET['id'];
    
    $sql = mysqli_query($conexion, "DELETE FROM guardia WHERE id_guradia = '".$_GET['id']."'");
    header('location: ../../admin/guardia.php?id='.$id.'#tab1');
?>


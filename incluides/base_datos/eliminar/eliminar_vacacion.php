<?php
    require("../conexion/conexion.php");

    $id = $_GET['ide'];
    
    $sql = mysqli_query($conexion, "DELETE FROM vacaciones WHERE id_vacaciones = '".$_GET['id']."'");
    header('location: ../../admin/caratula.php?id='.$id.'#tab2');
?>


<?php
    require("../conexion/conexion.php");

    $id = $_GET['ide'];
    
    $sql = mysqli_query($conexion, "DELETE FROM prestamo WHERE id_prestamo = '".$_GET['id']."'");
    header('location: ../../admin/caratula.php?id='.$id.'#tab3');
?>


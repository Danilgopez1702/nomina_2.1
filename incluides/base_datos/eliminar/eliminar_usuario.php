<?php
    require("../conexion/conexion.php");

    $sql = mysqli_query($conexion, "DELETE FROM usuarios WHERE id_usuario = '".$_GET['id']."'");
    header('location: ../../admin/usuarios.php');

?>
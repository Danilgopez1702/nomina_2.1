<?php
    require("../conexion/conexion.php");

    $sql = mysqli_query($conexion, "DELETE FROM `departamento` WHERE `id_departamento` = '".$_GET['id']."'");
    header('location: ../../admin/departamentos.php');

?>
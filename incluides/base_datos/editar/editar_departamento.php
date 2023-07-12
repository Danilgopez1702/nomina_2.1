<?php
    require("../conexion/conexion.php");
if (!empty($_POST['editar_id_departamento'] ) || !empty($_POST['editar_nombre'] ) || !empty($_POST['editar_turno'] )) {
    
    $id = $_POST['editar_id_departamento'];
    $nombre = $_POST['editar_nombre'];
    $turno = $_POST['editar_turno'];    
    
    $sql = mysqli_query($conexion, "UPDATE `departamento` SET `nombre_departamento` = '$nombre',`turno_departamento` = '$turno' WHERE `id_departamento` = $id");
    header('location: ../../admin/departamentos.php');
}else{
echo "no entro";
}
mysqli_close($conexion);

?>
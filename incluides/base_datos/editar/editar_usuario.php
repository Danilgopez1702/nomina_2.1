<?php
    require("../conexion/conexion.php");
if (!empty($_POST['editar_id_usuario'] ) || !empty($_POST['editar_nombre'] ) || !empty($_POST['editar_pass'] ) || !empty($_POST['editar_rol'] )) {
    
    $id = $_POST['editar_id_usuario'];
    $nombre = $_POST['editar_nombre'];
    $pass = $_POST['editar_pass'];
    $cadena_cifrada =  md5 ($pass);
    $rol = $_POST['editar_rol'];    
    
    $sql = mysqli_query($conexion, "UPDATE usuarios SET `nombre`='$nombre',`pass`='$cadena_cifrada',`contra`='$pass',`rol`='$rol' WHERE id_usuario = $id");
    header('location: ../../admin/usuarios.php');
}else{
echo "no entro";
}
mysqli_close($conexion);

?>
<?php
if ( empty($_POST['nombre']) || empty($_POST['pass']) || empty($_POST['rol'])) {

} else {
	require ("../conexion/conexion.php");
    
    
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $cadena_cifrada =  md5 ($pass);
    $rol = $_POST['rol'];

    echo($nombre);
    echo($pass);
    echo($cadena_cifrada);
    echo($rol);


    $sql = mysqli_query($conexion, "INSERT INTO `usuarios`(`nombre`, `pass`, `contra`,  `rol`) 
    VALUES ('$nombre','$cadena_cifrada','$pass','$rol')");

    var_dump($sql);
	mysqli_close($conexion);

	header("location: ../../admin/usuarios.php");
}
?>
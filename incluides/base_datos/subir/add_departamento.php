<?php
if (empty($_POST['nombre_departamento']) || empty($_POST['turno_departamento'])) {

} else {
	require ("../conexion/conexion.php");

    $nombre_departamento = $_POST['nombre_departamento'];
    $turno_departamento = $_POST['turno_departamento'];

    $sql = mysqli_query($conexion, "INSERT INTO `departamento`( `nombre_departamento`, `turno_departamento`) VALUES ('$nombre_departamento','$turno_departamento')");
	mysqli_close($conexion);
var_dump($sql);
	header("location: ../../admin/departamentos.php");
}
?>
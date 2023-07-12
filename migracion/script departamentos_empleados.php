<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
    die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
    die('Could not connect: ' . $con->connect_error);
}

$sql =  mysqli_query($conexion,"SELECT `departamento`, `id_empleado` FROM `empleados` ");


while ($data = mysqli_fetch_assoc($sql)){

    $dep = $data['departamento'];
    $id_empleado = $data['id_empleado'];


    $sql_select =  mysqli_query($con,"SELECT `id_departamento`,`nombre_departamento` FROM `departamento` WHERE `nombre_departamento`  = '$dep' ");
    $data_dep = mysqli_fetch_assoc($sql_select);

    $id_dep = $data_dep['id_departamento'];

    $sql_update =  mysqli_query($con,"UPDATE `empleados` SET `id_departamento` = '$id_dep' WHERE `id_empleado` = '$id_empleado'");

}

?>
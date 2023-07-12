<?php
    require("../base_datos/conexion/conexion.php");
$html = "";
$t1 = "";
$t2 = "";
$nombre = $_POST["nombre_dep"];

$sql = mysqli_query($conexion, "SELECT * FROM `departamento` WHERE `nombre_departamento` = '$nombre'");
$result = mysqli_num_rows($sql);

if ($result > 0) {
    while ($data = mysqli_fetch_assoc($sql)) { 
        $turno = $data['turno_departamento'];
        if($turno == 1){
            $t1 = '<option value="1">Matutino</option>';
        }else{
            $t2 = '<option value="2">Nocturno</option>';
        }


        $html = $t1.$t2;

    }
}

echo $html;	

?>
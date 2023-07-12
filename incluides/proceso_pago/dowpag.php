<?php

//conexion
    include "../base_datos/conexion/conexion.php";
    $sqli_consecutivo = mysqli_query($conexion, "SELECT MAX(id_historico_detalles) FROM historico_detalles");
    $n_consecutivo = mysqli_fetch_assoc($sqli_consecutivo);
    $rest_consecutivo = substr($n_consecutivo['MAX(id_historico_detalles)'], -2);
    $n = $rest_consecutivo; 
   
header("Content-disposition: attachment; filename=NI41178".$n.".pag");
header("Content-type: application/pag");
readfile("archivo.pag");
?>

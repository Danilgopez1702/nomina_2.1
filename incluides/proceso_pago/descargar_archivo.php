<?php 
date_default_timezone_set('America/Mexico_City');
//conexion
require("../base_datos/conexion/conexion.php");
//checar el pago de cada empleado y sumarlo
$sqli = mysqli_query($conexion, "SELECT * FROM `historico` WHERE `status` = 1");
$tt=0;

while ($dd = mysqli_fetch_assoc($sqli)) { 
    $y=$dd['monto_pago']; 
    $tt = $tt + $y;
    $tipo = $dd['modalidad_p'];             
}
$pago_inter = intval($tt);
$pagot = strlen($pago_inter);

if($pagot == 6){
    $tt = "0".$pago_inter;
}else if($pagot == 5){
    $tt = "00".$pago_inter;
}  

$sqli_consecutivo = mysqli_query($conexion, "SELECT MAX(id_historico_detalles) FROM historico_detalles");
$n_consecutivo = mysqli_fetch_assoc($sqli_consecutivo);
$rest_consecutivo = substr($n_consecutivo['MAX(id_historico_detalles)'], -2);
$n = $rest_consecutivo;

$hoy = date("Ymd");
$nex = date("Ymd",strtotime($hoy."+ 1 days")); 
$sql = mysqli_query($conexion, "SELECT h.id_empleado, h.monto_pago, em.no_cuenta, em.banco, em.tipo_pago FROM historico AS h LEFT JOIN empleados AS em ON h.id_empleado = em.id_empleado WHERE h.status = 1");
$p = mysqli_num_rows($sql);;

// archivo escribir.php

$file = fopen("archivo.pag", "w");

    fwrite($file, "HNE41178".$hoy."".$n."0000".$p."000000".$tt."00000000000000000000000000000000000000000000000000000000000000002624559610000000000000000000000000000000000000000000000000000000" . PHP_EOL);

//ciclo

while( $date = mysqli_fetch_assoc($sql) ) 
{
    $id = $date['id_empleado'];
    $pagos = $date['monto_pago'];
    $cuenta = $date['no_cuenta'];
    $banco = $date['banco'];
    $t_pago = $date['tipo_pago'];

    $entero_pago =intval($pagos);

    $ttotal = strlen($entero_pago);
    if($ttotal == 4){
        $pago = "0".$entero_pago;
    }else if($ttotal == 3){
        $pago = "00".$entero_pago;
    }


    fwrite($file, "D".$hoy."".$id."                                                                                00000000".$pago."00".$banco.$t_pago.$cuenta."0 00000000                  " . PHP_EOL);

}
fclose($file);
header("location: dowpag.php");
?>
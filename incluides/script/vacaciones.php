<?php
require("../base_datos/conexion/conexion.php");
/**************     CONSULTA PARA DIAS DE VACACIONES DE MODALIDAD VIEJA         *************/
$sql = mysqli_query($conexion, "SELECT `id_empleado`, `fecha_ingreso` FROM `empleados` WHERE `status` = 1 AND `modalidad_vacacion` = 1 ");
$hoy = date("d-m-Y");
$result = mysqli_num_rows($sql);
if ($result > 0) {
    while ($data = mysqli_fetch_assoc($sql)) { 
        $numero = $data['id_empleado'];
        $f = $data['fecha_ingreso'];
        echo $numero ;
        for($x = 1;$x <35;$x++ ){
            $fecha = date("d-m-Y",strtotime($f."+ ".$x." year"));
            /********  COMPÁRACION SI LA FECHA ES IGUAL  ************/
            if($fecha == $hoy){
                switch ($x) {
                    case ($x == 1):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 6  WHERE `id_empleado` = '$numero'");
                        echo $sql_update."\n";
                        $x = 35;
                        break;
                    case ($x == 2):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 1 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 8  WHERE `id_empleado` = '$numero'");

                        $x = 35;
                        break;
                    case ($x == 3):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 2 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 10  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 4):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 3 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 12  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 5 || $x == 6 || $x == 7 || $x == 8 || $x == 9 ):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 4 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 14  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 10 || $x == 11 || $x == 12 || $x == 13 || $x == 14 ):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 5 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 16  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 15 || $x == 16 || $x == 17 || $x == 18 || $x == 19 ):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 6 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 18  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 20 || $x == 21 || $x == 22 || $x == 23 || $x == 24 ):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 7 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 20  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 25 || $x == 26 || $x == 27 || $x == 28 || $x == 29 ):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 8 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 22  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;    
                    case ($x == 30 || $x == 31 || $x == 32 || $x == 33 || $x == 34 ):
                        $sql_update_vacaciones = mysqli_query($conexion, "UPDATE `vacaciones` SET `periodo_vacacion`= 9 WHERE `status_vacaciones` = 1");
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 24  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                }
            }
        }
    }
}
/*********************     CONSULTA PARA DIAS DE VACACIONES DE MODALIDAD NUEVA         *********************/

$sql = mysqli_query($conexion, "SELECT `id_empleado`, `fecha_ingreso` FROM `empleados` WHERE `status` = 1 AND `modalidad_vacacion` = 2 ");

$hoy = date("d-m-Y");
$result = mysqli_num_rows($sql);
if ($result > 0) {
    while ($data = mysqli_fetch_assoc($sql)) { 
        $numero = $data['id_empleado'];
        $f = $data['fecha_ingreso'];
        for($x = 1;$x <35;$x++ ){
            $fecha = date("d-m-Y",strtotime($f."+ ".$x." year"));
            /********  COMPÁRACION SI LA FECHA ES IGUAL         ************/
            if($fecha == $hoy){
                switch ($x) {
                    case ($x == 1):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 12  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 2):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 14  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 3):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 16  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 4):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 18  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 5):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 20  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 6 || $x == 7 || $x == 8 || $x == 9 || $x == 10 ):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 22  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 11 || $x == 12 || $x == 13 || $x == 14 || $x == 15 ):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 24  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 16 || $x == 17 || $x == 18 || $x == 19 || $x == 20 ):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 26  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ( $x == 21 || $x == 22 || $x == 23 || $x == 24  || $x == 25):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 28  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                    case ($x == 26 || $x == 27 || $x == 28 || $x == 29 || $x == 30 ):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 30  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;    
                    case ($x == 31 || $x == 32 || $x == 33 || $x == 34 || $x == 35):
                        $sql_update = mysqli_query($conexion, "UPDATE `empleados` SET `vacaciones`= 32  WHERE `id_empleado` = '$numero'");
                        $x = 35;
                        break;
                }
            }
        }
    }
}
?>
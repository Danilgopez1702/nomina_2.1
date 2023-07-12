<?php

require("../base_datos/conexion/conexion.php");

$sql = mysqli_query($conexion, "SELECT `id_empleado`, `fecha_ingreso` FROM `empleados` WHERE id_empleado = '0000000025' &&`status` = 0");
$hoy = date ("d-m-Y");


$result = mysqli_num_rows($sql);
if ($result > 0) {

    while ($data = mysqli_fetch_assoc($sql)) { 
        $numero = $data['id_empleado'];
        $f = $data['fecha_ingreso'];
        $x = 1;
        $fecha = date("d-m-Y",strtotime($f."+ ".$x." year"));
var_dump($fecha);
var_dump($hoy);
        $diff = abs($hoy - $fecha); 
        $años_trabajados = floor($diff / (365*60*60*24)); 
        

        
                switch ($años_trabajados) {
                    case ($años_trabajados == 1):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '6',  WHERE id_empleado = $numero");
                        break;
                    case ($años_trabajados == 2):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '8',  WHERE id_empleado = $numero");
                        break;
                    case ($años_trabajados == 3):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '10',  WHERE id_empleado = $numero");
                        break;
                    case ($años_trabajados == 4):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '12',  WHERE id_empleado = $numero");
                        break;
                    case ($años_trabajados == 5 || $años_trabajados == 6 || $años_trabajados == 7 || $años_trabajados == 8 || $años_trabajados == 9 ):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '14',  WHERE id_empleado = $numero");
                        break;
                    case ($años_trabajados == 10 || $años_trabajados == 11 || $años_trabajados == 12 || $años_trabajados == 13 || $años_trabajados == 14 ):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '16',  WHERE id_empleado = $numero");
                        break;
                    case ($años_trabajados==15 || $años_trabajados==16 || $años_trabajados==17 || $años_trabajados==18 || $años_trabajados==19 ):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '18',  WHERE id_empleado = $numero");
                        break;
                    case ($años_trabajados==20 || $años_trabajados==21 || $años_trabajados==22 || $años_trabajados==23 || $años_trabajados==24 ):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '20',  WHERE id_empleado = $numero");
                        break;
                    case ($años_trabajados==25 || $años_trabajados==26 || $años_trabajados==27 || $años_trabajados==28 || $años_trabajados==29 ):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '22',  WHERE id_empleado = $numero");
                        break;    
                    case ($años_trabajados==30 || $años_trabajados==31 || $años_trabajados==32 || $años_trabajados==33 || $años_trabajados==34 ):
                        $sql = mysqli_query($conexion, "UPDATE empleados SET vacaciones = '24',  WHERE id_empleado = $numero");
                        break;
                   

                }
    }
}

?>
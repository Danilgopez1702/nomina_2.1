<?php
    include "../base_datos/conexion/conexion.php";
    date_default_timezone_set("America/Mexico_City");
    $id = $_GET['id'];
        $sqli_finiquito = mysqli_query($conexion, "SELECT * FROM `empleados` WHERE `id_empleado` = $id ");
        $finiquito = mysqli_fetch_assoc($sqli_finiquito);

        //sueldo diario
            $s_d = $finiquito['sueldo_diario'];
        //fecha de Ingreso
            $f_ingreso = $finiquito['fecha_ingreso'];
        //modalidad de vacaciones
            $modalidad_v = $finiquito['modalidad_vacacion'];
        //fecha de salida
            $f_salida = $finiquito['fecha_baja'];
            $f_ingreso1 = new DateTime($f_ingreso);
            $f_salida2 = new DateTime($f_salida);
            $compara = $f_ingreso1->diff($f_salida2);
            $comparar = $compara->days;
        //modalidad de pago
            $f_p = $finiquito['frecuencia_pago'];
        //Sacar sueldo devegado
            $sqli_modalidad = mysqli_query($conexion, "SELECT id_historico_detalles, fecha FROM `historico_detalles` WHERE `modalidad_p` =  $f_p ORDER BY id_historico_detalles DESC");
            $modalidad = mysqli_fetch_assoc($sqli_modalidad);
            
            $ultimo_p = $modalidad['fecha'];
            $dias = substr($ultimo_p, 0,-8);
            $dia = $dias + 1;
            $mes = substr($ultimo_p, 2,-5);
            $fecha = date("Y").$mes."-".$dia;
            $modalidad2 = new DateTime($fecha);
            $d_r = $modalidad2->diff($f_salida2);
            $dr_total = $d_r->days;
            
        
            if($dr_total > 0){
                $s_dev = $dr_total * $s_d;
            }else{
                $s_dev = 0;
            }
            //comparacion si tiene mas de 1 año
                if($comparar >= 365){
                    //calculamos los años que lleva en la empresa
                    $año_ingreso = substr($f_ingreso, 0, 4);
                    $año_egreso = substr($f_salida, 0, 4);
                    $ingreso = intval($año_ingreso);
                    $salida = intval($año_egreso);
                    $vac_t2 = $salida - $ingreso;
                    //acomodamos la fecha de entrada con el 2do año
                        $rest = substr($f_ingreso, -6);
                        $f_e_a = date("Y").$rest;
                    //fecha de inicio de aguinaldo
                        $f_i_aguinaldo = date("Y").'-01-01';
                    //hacemos el calculo de los dias trabajados
                        $f_e_a1 = new DateTime($f_salida);                   
                        $f_i_a = new DateTime($f_i_aguinaldo);                   
                        $dias_t = $f_e_a1->diff($f_i_a);
                    //tomamos la diferencia en numero
                        $d_total = $dias_t->days;
                        $d_t = $d_total + 1;
                    //dias del año
                        $d_a = 365;
                    //factor
                        $fact = $d_t / $d_a;
                    //calculo del aguinaldo
                        $aguinaldo = $s_d * 15 * $fact;
                    //vacaciones
                        $vac_res = $finiquito['vacaciones_restantes'];
                    //calculo de vacaciones
                        $vac_t = $s_d * $vac_res * $fact;
                    //prima vacacional
                        $prima = $vac_t * .25;
                    //hacemos el calculo de los dias trabajados del 2do año
                        $f_e_a2 = new DateTime($f_e_a);                   
                        $dias_t2 = $f_e_a2->diff($f_salida2);  
                    //tomamos la diferencia en numero del 2do año
                        $d_total2 = $dias_t2->days;
                        $d_t2 = $d_total2 + 1;
                    //factor 2do año
                        $fact2 = $d_t2 / $d_a;
                    if($modalidad_v == 1){
                        switch ($vac_t2) {
                            case ($vac_t2 == 1):
                                $vac2 = 6;
                                break;
                            case ($vac_t2 == 2):
                                $vac2 = 8;
                                break;
                            case ($vac_t2 == 3):
                                $vac2 = 10;
                                break;
                            case ($vac_t2 == 4):
                                $vac2 = 12;
                                break;
                            case ($vac_t2 == 5 || $vac_t2 == 6 || $vac_t2 == 7 || $vac_t2 == 8 || $vac_t2 == 9 ):
                                $vac2 = 14;
                                break;
                            case ($vac_t2 == 10 || $vac_t2 == 11 || $vac_t2 == 12 || $vac_t2 == 13 || $vac_t2 == 14 ):
                                $vac2 = 16;
                                break;
                            case ($vac_t2 == 15 || $vac_t2 == 16 || $vac_t2 == 17 || $vac_t2 == 18 || $vac_t2 == 19 ):
                                $vac2 = 18;
                                break;
                            case ($vac_t2 == 20 || $vac_t2 == 21 || $vac_t2 == 22 || $vac_t2 == 23 || $vac_t2 == 24 ):
                                $vac2 = 20;
                                break;
                            case ($vac_t2 == 25 || $vac_t2 == 26 || $vac_t2 == 27 || $vac_t2 == 28 || $vac_t2 == 29 ):
                                $vac2 = 22;
                                break;    
                            case ($vac_t2 == 30 || $vac_t2 == 31 || $vac_t2 == 32 || $vac_t2 == 33 || $vac_t2 == 34 ):
                                $vac2 = 24;
                                break;
                        }
                    }else if($modalidad_v == 2 ){
                        switch ($vac_t2) {
                            case ($vac_t2 == 1):
                                $vac2 = 12;
                                break;
                            case ($vac_t2 == 2):
                                $vac2 = 14;
                                break;
                            case ($vac_t2 == 3):
                                $vac2 = 16;
                                break;
                            case ($vac_t2 == 4):
                                $vac2 = 18;
                                break;
                            case ($vac_t2 == 5):
                                $vac2 = 20;
                                break;
                            case ($vac_t2 == 6 || $vac_t2 == 7 || $vac_t2 == 8 || $vac_t2 == 9 || $vac_t2 == 10 ):
                                $vac2 = 22;
                                break;
                            case ($vac_t2 == 11 || $vac_t2 == 12 || $vac_t2 == 13 || $vac_t2 == 14 || $vac_t2 == 15 ):
                                $vac2 = 24;
                                break;
                            case ($vac_t2 == 16 || $vac_t2 == 17 || $vac_t2 == 18 || $vac_t2 == 19 || $vac_t2 == 20 ):
                                $vac2 = 26;
                                break;
                            case ( $vac_t2 == 21 || $vac_t2 == 22 || $vac_t2 == 23 || $vac_t2 == 24  || $vac_t2 == 25):
                                $vac2 = 28;
                                break;
                            case ($vac_t2 == 26 || $vac_t2 == 27 || $vac_t2 == 28 || $vac_t2 == 29 || $vac_t2 == 30 ):
                                $vac2 = 30;
                                break;    
                            case ($vac_t2 == 31 || $vac_t2 == 32 || $vac_t2 == 33 || $vac_t2 == 34 || $vac_t2 == 35):
                                $vac2 = 32;
                                break;
                        }
                    }
                        
                    //calculo de vacaciones
                        $vac_t3 = $s_d * $vac2 * $fact2;
                    //prima vacacional
                        $prima2 = $vac_t3 * .25;
                    //Calculo total del finiquito 
                    //var_dump($s_dev, $aguinaldo, $vac_t, $ingreso, $salida, $vac_t2,$modalidad_v,$vac2);
                        $finiquito_total = $s_dev + $aguinaldo + $vac_t + $prima + $vac_t3 + $prima2;
                        $sqli_modalidad = mysqli_query($conexion, "INSERT INTO `finiquito`(`id_empleado`, `sueldo_diario`, `fecha_ingreso`, `fecha_salida`, 
                        `dias_trabajados`, `dias_devegados`, `aguinaldo`, `total_devegados`, `vacaciones_1`, `vacaciones_2`, `total_v1`, `total_v2`, `prima1`, 
                        `prima2`, `total`) VALUES ('$id', $s_d, '$f_ingreso', '$f_salida', $d_t, $dr_total , $aguinaldo, $s_dev , $vac_res, $vac2, $vac_t, $vac_t3,
                        $prima, $prima2,$finiquito_total)");

            //Si aun no cumple el año        
                }else{
                    
                    
                    //hacemos el calculo de los dias trabajados
                        $f_e_a1 = new DateTime($f_ingreso);                   
                        $dias_t = $f_e_a1->diff($f_salida2);
                    //tomamos la diferencia en numero
                        $d_total = $dias_t->days;
                        $dr_año = $d_r->y;
                        $d_t = $d_total + 1;
                    //dias del año
                        $d_a = 365;
                    //factor
                        $fact = $d_t / $d_a;
                    //calculo del aguinaldo
                        $aguinaldo = $s_d * 15 * $fact;
                    //vacaciones
                        $vac = $finiquito['vacaciones'];
                    //calculo de vacaciones
                        $vac_t = $s_d * $vac * $fact;
                    //prima vacacional
                        $prima = $vac_t * .25;
            
                        //Calculo total del finiquito
                        $finiquito_total = $s_dev + $aguinaldo + $vac_t + $prima;
            
                        //var_dump($s_dev, $aguinaldo, $vac_t, $prima, $finiquito_total, $dr_año);
                        $sqli_modalidad = mysqli_query($conexion, "INSERT INTO `finiquito`(`id_empleado`, `sueldo_diario`, `fecha_ingreso`, `fecha_salida`, 
                        `dias_trabajados`, `dias_devegados`, `aguinaldo`, `total_devegados`, `vacaciones_1`, `vacaciones_2`, `total_v1`, `total_v2`, `prima1`, 
                        `prima2`, `total`) VALUES ('$id', $s_d, '$f_ingreso', '$f_salida', $d_t, $dr_total , $aguinaldo, $s_dev , $vac_res, 'n/a', $vac_t, 'n/a',
                        $prima, 'n/a',$finiquito_total)");
                }
?>
<meta http-equiv="refresh" content="1; url=../fpdf/finiquito.php?id=<?php echo $id; ?> ">
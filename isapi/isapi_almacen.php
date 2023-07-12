<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	  die("Connection failed: " . $con->connect_error);
}

$oficina = 3; 
error_reporting(E_ALL); 
ini_set( 'display_errors','1');
date_default_timezone_set("America/Mexico_City");

$url_oficina = "10.2.242.139/ISAPI/AccessControl/AcsEvent?format=json";
$username = "admin";
$password = "CARLOS1985";

$hoy = date("Y-m-d",strtotime("-1 days"));
$dia = date("N",strtotime("-1 days"));

$sql =  mysqli_query($con,"SELECT * FROM `empleados` AS e INNER JOIN `departamento` AS d ON d.id_departamento = e.id_departamento WHERE `checador` =  $oficina ");

while ($data = mysqli_fetch_assoc($sql)){

    $emp = $data['id_empleado'];
    $empleado = substr($emp, 7);
    /************** SABER QUE HORARIO TIENE ESE DEPARTAMENTO  ***********************/

    //horario el sabado
    if($dia == 6){
        $horario = $data['h_s'];
    //horario el domingo
    }else if($dia == 7){
        $horario = $data['h_d'];
    //horario martes
    }elseif($dia == 2){

        $sql_select_guardia =  mysqli_query($con,"SELECT * FROM `guardia` WHERE `dia_guardia` = 2 AND `status_guardia` = 1 AND `id_empleado` = '$emp'");
        $data_guardia_num = mysqli_num_rows($sql_select_guardia);
        if($data_guardia_num > 0){
            $data_guardia_info = mysqli_fetch_assoc($sql_select_guardia);
            $horario = $data_guardia_info['hr_guardia'];

        }else{
            $horario = $data['h_lv'];
        }
    //horario de lunes a viernes   
    }else{
        $horario = $data['h_lv'];
    }
        $data_1 = array(
            'searchID' => '0',
            'searchResultPosition' => 0,
            'maxResults' => 1000,
            'major' => 5,
            'minor' => 75,
            'startTime' => $hoy.'T00:00:00-06:00',
            'endTime' => $hoy.'T23:59:59-06:00',
            'employeeNoString' => $empleado
        );
        $post_data = array(
            'AcsEventCond' => $data_1
        );
        
        $options = array(
            CURLOPT_URL            => $url_oficina,
            CURLOPT_HEADER         => true,    
            CURLOPT_VERBOSE        => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,    // for https
            CURLOPT_USERPWD        => $username . ":" . $password,
            CURLOPT_HTTPAUTH       => CURLAUTH_DIGEST,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($post_data) 
        );
        $ch = curl_init();
        curl_setopt_array( $ch, $options );
        //empieza lectura y procesos
        try {
            $raw_response  = curl_exec( $ch );
        
            // validate CURL status
            if(curl_errno($ch))
              throw new Exception(curl_error($ch), 500);
        
            // validate HTTP status code (user/password credential issues)
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($status_code != 200){
              echo "diferente de 200";
              throw new Exception("Response with Status Code [" . $status_code . "].", 500);
            }
        
        } 
        catch(Exception $ex) {
            if ($ch != null) curl_close($ch);
            throw new Exception($ex);
        }
        if ($ch != null) curl_close($ch);
        
        /***********EMPEZAMOS CON LA LECTURA DEL RESULTADO PARA GUARDAR EN VARIABLES ESPECIFICAS *****************/
        
        //separe informacion del text en array
        $x = explode(PHP_EOL, $raw_response);
        //separar resultados individuales
        $body_resultado = explode("[",  $x[19]);
        $try_error = explode(",", $body_resultado[0]);
        $catch_error = explode(":", $try_error[1]);
            
        //no checo este dia
        if($catch_error[1] == 0){ 
            //tomamos la variable de descanso      
            $descanso_e = $data['descanso_e'];
            //si descanso el dia especial 
            if($descanso_e == $dia){
                $falta_nocheco = 0;
            //descansos sabado o domingo
            }else{
                //sabado
                if($dia == 6){
                    $sql_select_descanso =  mysqli_query($con,"SELECT * FROM `empleados` WHERE `h_s` = 50 && `id_empleado` = '$emp'");
                //domingo
                }else if($dia == 7){
                    $sql_select_descanso =  mysqli_query($con,"SELECT * FROM `empleados` WHERE `h_d` = 50 && `id_empleado` = '$emp'");
                //lunes a viernes    
                }else{
                    $sql_select_descanso =  mysqli_query($con,"SELECT * FROM `empleados` WHERE `h_lv` = 50 && `id_empleado` = '$emp'");
                }
                $data_descanso = mysqli_num_rows($sql_select_descanso);
                //no descansaba
                //revisar si no tiene vacaciones en este dia 
                if($data_descanso < 1){
                    $sql_select_vacacion =  mysqli_query($con,"SELECT * FROM `vacaciones` WHERE `fecha_vacacion` = '$hoy' && `id_empleado` = '$emp'");
                    $data_vacacion = mysqli_num_rows($sql_select_vacacion);
                    //no tiene vacaciones
                    //revisar guardia
                    if($data_vacacion < 1){
                        //guardia sabado
                        if($dia == 6){
                            $sql_select_guardia =  mysqli_query($con,"SELECT * FROM `guardia` WHERE `dia_guardia` = 6 AND `status_guardia` = 2 AND `id_empleado` = '$emp'");
                            $data_guardia = mysqli_num_rows($sql_select_guardia);
                        }else{
                            $data_guardia = 0;
                        }
                        if($data_guardia < 1){
                            $falta_nocheco = 1; 
                        }else{
                            $falta_nocheco = 0; 
                        }
                    //si tiene vacaciones  
                    }else{
                        $falta_nocheco = 0;
                    }
                // descansa el trabajador
                }else {
                    $falta_nocheco = 0;
                }
            }
            //colocar o no la falta
            if($falta_nocheco > 0){
                $sql_insert =  mysqli_query($con,"INSERT INTO `asistencia`(`id_empleado`, `tipo_asistencia`, `fecha_asistencia`, `status_asistencia`, `comentario_asistencia`) 
                VALUES ('$emp', 2, '$hoy',1,'No Checo')");
            }
        }else{
            $resultado = explode("}, {", $body_resultado[1]);
            $resultado_individual = $resultado[0];
            //separamos la informacion de cada trabajador
            $z = explode(",", $resultado_individual);
            //tomamos la linea de fecha
            $linea_fecha = $z[2];
            $a = explode('"', $linea_fecha);
            $b = explode('T', $a[3]);
            $c = explode('-', $b[1]);
            $fecha = $b[0];
            //extraemos la pura hora de entrada
            $hora = $c[0];
            //tomamos la linea del id
            $linea_id = $z[7];
            $d = explode('"', $linea_id);
            $id = $d[3];

            var_dump($hora);
            /************* TERMINA LA LECTURA DE RESPUESTA APARTANDO LAS VARIABLES*******************/
        
            /************** INICIA QUERY PARA HACER SUBIDA A LA BASE DE DATOS ****************/
            //inicia hora de retardo
            $inicia_retardo = strtotime ( '+5 minute' , strtotime ($horario) ) ;
            $inicia_retardo = date ( 'H:i:s' , $inicia_retardo); 
    
            //finaliza hora de retardo
            $finaliza_retardo = strtotime ( '+15 minute' , strtotime ($horario) ) ;
            $finaliza_retardo = date ( 'H:i:s' , $finaliza_retardo); 


            //$hora = date ( 'H:i:s' ,$horas);
        
            var_dump($hora);
            //checar si entro en horario de retardo
            if($hora > $inicia_retardo  && $hora < $finaliza_retardo){
        
                //CHECA si ya tiene falta por retardo para no poner otra falta
                $sql_select_check_retardo =  mysqli_query($con,"SELECT * FROM `asistencia` WHERE `id_empleado` = '$emp' && `status` = 1 && `tipo` = 3"); 
                $no_check_retardo = mysqli_num_rows($sql_select_check_retardo);
    
                if($no_check_retardo != 1){

                    //CHECA si ya contiene 2 retardos para colocar falta por retardo
                    $sql_select_fretardo =  mysqli_query($con,"SELECT * FROM `asistencia` WHERE `id_empleado` = '$emp' && `status` = 1 && `tipo` = 1"); 
                    $no_retardo = mysqli_num_rows($sql_select_fretardo);
        
                    if($no_retardo > 2){
                        $sql_insert =  mysqli_query($con,"INSERT INTO `asistencia`(`id_empleado`, `tipo_asistencia`, `fecha_asistencia`, `hora_asistencia`, `status_asistencia`, `comentario_asistencia`) 
                        VALUES ('$emp', 3, '$fecha', '$hora', 1, 'Falta por Acumulacion de Retardos')");
        
                    }else{
                        $sql_insert =  mysqli_query($con,"INSERT INTO `asistencia`(`id_empleado`, `tipo_asistencia`, `fecha_asistencia`, `hora_asistencia`, `status_asistencia`, `comentario_asistencia`) 
                        VALUES ('$emp', 1, '$fecha', '$hora', 1, 'Retardo')");
                    }
                }else {                 
                    $sql_insert =  mysqli_query($con,"INSERT INTO `asistencia`(`id_empleado`, `tipo_asistencia`, `fecha_asistencia`, `hora_asistencia`, `status_asistencia`, `comentario_asistencia`) 
                    VALUES ('$emp', 1, '$fecha', '$hora', 1, 'Retardo')");
                }
                
                //checar si entro en falta por llegar en 15 min mas tarde
            }else if($hora > $finaliza_retardo){
        
                $sql_insert =  mysqli_query($con,"INSERT INTO `asistencia`(`id_empleado`, `tipo_asistencia`, `fecha_asistencia`, `hora_asistencia`, `status_asistencia`, `comentario_asistencia`) 
                VALUES ('$emp', 4, '$fecha', '$hora', 1, 'Checo Despues de los 15 min')");
            }
        }
}

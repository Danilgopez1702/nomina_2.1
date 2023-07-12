<?php
    require("../base_datos/conexion/conexion.php");
//Capturamos fecha actual
    $sumtt = 0;
    $fecha = date("Y-m-d");
    
//select de tabla de pagos    
    $sql_select_pagos = mysqli_query($conexion, "SELECT * FROM historico WHERE status = 1");
    
    
        $no2 = mysqli_num_rows($sql_select_pagos);
        
            
        if($no2>0){
            
//iniciamos ciclo de la tabla de pagos            
            while ($data1 = mysqli_fetch_assoc($sql_select_pagos)) {
                $id = $data1['id_empleado'];
                $nombre = $data1['nombre'];
                $monto = $data1['monto_pago'];
                $falta = $data1['faltas'];
                $prestamo = $data1['prestamo'];
                $otros = $data1['otras_percepciones'];
                $extras = $data1['hora_extra'];
                $infonavit = $data1['infonavit'];
                $modal = $data1['modalidad_p'];
               
           $monto_d =floatval($monto);
           $sumtt += $monto_d;
  
            
//comprovar si existe prestamo y restar pago 
            $sql_prest = mysqli_query($conexion, "SELECT plazo_actual_prestamo FROM prestamo WHERE id_empleado = '$id' AND status_prestamo = 1");
            $no3 = mysqli_fetch_assoc($sql_prest); 

            $sql_prest_total = mysqli_query($conexion, "SELECT plazo_prestamo FROM prestamo WHERE id_empleado = '$id' AND status_prestamo = 1");
            $no4 = mysqli_fetch_assoc($sql_prest); 

            if (!isset($no3)) {
               

            }else{
            $baja = $no3['plazo_actual_prestamo'];
    
            if($baja < 1){
               
               $sql_update_p = mysqli_query($conexion, "UPDATE prestamo SET status_prestamo = 2 WHERE id_empleado = $id");
               
            }else{
                $baja = $baja - 1;
                $sql_update_prestamo = mysqli_query($conexion, "UPDATE prestamo SET plazo_actual_prestamo = $baja WHERE  id_empleado = $id"); 
                
            }
        }
            
            $sql_update_o = mysqli_query($conexion, "UPDATE otros SET status_otros = 2 WHERE  id_empleado = $id");
            $sql_update_hrs = mysqli_query($conexion, "UPDATE horas_extras SET status_extras = 2 WHERE  id_empleado = $id");
            $sql_update_falta = mysqli_query($conexion, "UPDATE asistencia SET status_asistencia = 2 WHERE  id_empleado = $id");
            $sql_ddeliteee = mysqli_query($conexion, "UPDATE historico SET status = 2 WHERE  id_empleado = $id");
            
         
            }        
            
            
//insertar al historico                
                $sql_insert_hhm= mysqli_query($conexion, "INSERT INTO historico_detalles (fecha, monto_total, modalidad_p) VALUES ('$fecha', '$sumtt', '$modal')");
            
                
        }
        
        mysqli_close($conexion);

	header("location: ../admin/nomina.php");

?>
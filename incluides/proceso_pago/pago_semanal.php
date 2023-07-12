<?php
  require("../base_datos/conexion/conexion.php");
  $sql_select = mysqli_query($conexion, "SELECT * FROM empleados WHERE status = 1 AND frecuencia_pago IN (7)");

    while ($dati = mysqli_fetch_assoc($sql_select)) {

      $faltas_totales = 0;
      $faltas_v = 0;
      $Prestado_total = 0;
      $hrs_pago = 0;
      $hrs = 0;
      $t_otro = 0;
      $infona = 0;
      $modal = 7;
//Tomar informacion del select

      $id = $dati['id_empleado'];
      $sd = $dati['sueldo_diario'];
      $sh = $sd/8;
      $frecuencia = $dati['frecuencia_pago']; 
      $n = $dati['nombre_empleado'];
      $ap = $dati['apellido_paterno'];
      $am = $dati['apellido_materno'];
      $fe = $dati['fecha_ingreso']; 
      $fecha_semanal = date("Y-m-d"); 
      
//Unir el nombre con los apellidos 

      $nc = $n . " " .$ap . " " . $am;
   
//Comparar si cumple la frecuencia de pago

      $sql_ultimo_h = mysqli_query($conexion, "SELECT MAX(fecha) FROM historico_detalles WHERE modalidad_p = 14");
      $datt = mysqli_fetch_assoc($sql_ultimo_h);
             
      $fe1 = $datt['MAX(fecha)'];
      
//Condicional por fechas 
            
        if($fe > $fe1){
                
          $fecha_uno = strtotime ( ' + 7 day', strtotime ($fe1));
          $fecha_unos = strtotime ($fe);
          
//Convertir strtotime a date

          $fecha = date('d M Y',$fecha_uno);
          $fechas = date('d M Y',$fecha_unos);
          $datetime1 = date_create($fecha);
          $datetime2 = date_create($fechas);
          
               
//Ver cuanta diferencia hay entre fechas

          $contador = date_diff($datetime1, $datetime2);
          $differenceFormat = '%a';
          $fh = $contador->format($differenceFormat);    
          $frecuencia = $fh;
          
             
        } 
   
//Evaluar si tuvo faltas

      $sql_select_falta = mysqli_query($conexion, "SELECT * FROM asistencia WHERE id_empleado = $id AND tipo_asistencia IN (2,3) AND status_asistencia = 1");
      $faltas_totales = mysqli_num_rows($sql_select_falta);
      $dias_totales =  $frecuencia - $faltas_totales;

//Se convierten en doubles   
          
      
$sueldo = doubleval($sd);
$subtotal = doubleval( $sueldo*$dias_totales);
            
//Comprobar si existe prestamo

      $sql_select_prestamo = mysqli_query($conexion, "SELECT * FROM prestamo WHERE id_empleado = $id && status_prestamo = 1");
      $no2 = mysqli_num_rows($sql_select_prestamo);
        $Prestado_total = 0;

        if($no2 > 0){
          while ($data3 = mysqli_fetch_assoc($sql_select_prestamo)) {

            $prestado = $data3['unitario_prestamo'];
            $baja = $data3['plazo_actual_prestamo'];

              if($baja>0){
                $Prestado_total = $Prestado_total + $prestado;

              }else {
                $Prestado_total = $Prestado_total + 0;
                }    
            }
        }

      $subtotal2 = $subtotal - $Prestado_total;

//Comprobamos si existen horas extras

      $sql_select_hrs = mysqli_query($conexion, "SELECT * FROM horas_extras WHERE id_empleado = $id && status_extras = 1");
      $no3 = mysqli_num_rows($sql_select_hrs);
            
        if($no3 > 0){
          while ($data4 = mysqli_fetch_assoc($sql_select_hrs)) {

            $hrs = $data4['horas_extras'];
            $hrs_pago =$hrs*$sh;
          }    
        }else{
          $hrs = 0;
          $hrs_pago =0;
         }

      $subtotal3 = $subtotal2 + $hrs_pago;
            
//Suma de otras percepciones

      $sql_select_otros = mysqli_query($conexion, "SELECT * FROM otros WHERE id_empleado = $id && status_otros = 1");
      $no5 = mysqli_num_rows($sql_select_otros);
            
        if($no5 > 0){
          while ($data5 = mysqli_fetch_assoc($sql_select_otros)) {

            $d_extra = $data5['monto_otros'];   
            $t_otro = $t_otro + $d_extra;
          }
        }else{

          $t_otro = 0;
         }

      $subtotal4 = $subtotal3 +$t_otro;
                         
//Rebajar infonavit

      $sql_select_infona = mysqli_query($conexion, "SELECT * FROM infonavit WHERE id_empleado = $id");
      $no6 = mysqli_num_rows($sql_select_infona);
            
        if($no6 > 0){
          while ($data6 = mysqli_fetch_assoc($sql_select_infona)) {

            $infona = $data6['monto_infonavit'];
          }
        }else{

          $infona = 0;
          }
      $total = $subtotal4 - $infona;
          
//formato para redondear y dar estetica al formato de dinero 
            $t =round($total);
//insertamos en la tabla de pago
            
      $sql = mysqli_query($conexion, "INSERT INTO historico (fecha_historico, id_empleado, nombre, monto_pago,faltas,prestamo,hora_extra,diario,infonavit, modalidad_p, status ,aguinaldo, monto_aguinaldo,monto_total) 
      VALUES ('$fecha_semanal','$id','$nc','$t','$faltas_totales','$Prestado_total','$hrs','$sd','$infona', '$modal', '1', 1, 0, $t)");
      
    }

    
           
  header("location: ../admin/nomina.php");

?>
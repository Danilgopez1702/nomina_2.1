<?php

//conexion
    include "../base_datos/conexion/conexion.php";

    $sqli_aguinaldo = mysqli_query($conexion, "SELECT `id_empleado`, `nombre_empleado`, `apellido_paterno`, `apellido_materno`, `fecha_ingreso`, `sueldo_diario` 
    FROM `empleados` WHERE `status` = 1");
    $result = mysqli_num_rows($sqli_aguinaldo);
    $hoy1 = "12-31";
    $año = date("Y");
    $hoy = date("Y").$hoy1;

    if ($result > 0) {
        while ($data = mysqli_fetch_assoc($sqli_aguinaldo)) { 
            
            $fecha_entrada = $data['fecha_ingreso'];
            $sueldo_diario = $data['sueldo_diario'];
            $id = $data['id_empleado'];
            $fecha1= new DateTime($fecha_entrada);
            $fecha2= new DateTime($hoy);
            $diff = $fecha1->diff($fecha2);
            $diferencia = $diff->days;
            $sueldo_quincenal = $sueldo_diario * 15;

            $sqli_faltas = mysqli_query($conexion,"SELECT * FROM `asistencia` WHERE `id_empleado` = $id and `tipo_asistencia` IN (2,3) and `fecha_asistencia` like '%$año%'");
            $faltas = mysqli_num_rows($sqli_faltas);

            $sqli_pago = mysqli_query($conexion,"SELECT * FROM `historico` WHERE `id_empleado` = $id");
            $pago = mysqli_fetch_assoc($sqli_pago);

            $pago = floatval( $pago['monto_total']);

            if ($diferencia < 365 ){
                $diferencia_t = $diferencia - $faltas;
                $aguinaldo = $diferencia_t / 365 * $sueldo_quincenal;
                $aguinaldo_t = $aguinaldo + $pago;
                $t = number_format($aguinaldo_t, 2);
                $sqli_update = mysqli_query($conexion,"UPDATE `historico` SET `aguinaldo`= 2 ,`monto_aguinaldo`= '$aguinaldo', `monto_total` = $aguinaldo_t WHERE `id_empleado` = $id");

                var_dump($t);
            }else{
                $diferencia_t = 365 - $faltas;
                $aguinaldo = $diferencia_t / 365 * $sueldo_quincenal;
                $aguinaldo_t = $aguinaldo + $pago;
                $t = number_format($aguinaldo_t, 2);
                $sqli_update = mysqli_query($conexion,"UPDATE `historico` SET `aguinaldo`= 2 ,`monto_aguinaldo`= '$aguinaldo', `monto_total` = $aguinaldo_t WHERE `id_empleado` = $id");

                var_dump($t);
            }

        }
    }

    header('location: ../admin/nomina.php');

?>
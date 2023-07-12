<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
    die('Could not connect: ' . $con->connect_error);
}

$conexion = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomis');
if (!$conexion){
    die('Could not connect: ' . $con->connect_error);
}



$sql =  mysqli_query($conexion,"SELECT `dni`, `id_empleado`, `no_cuenta`, `banco`, `nombre`, `apellido_paterno`, `apellido_materno`, `calle`, `n_exterior`, `n_interior`, `colonia`, `c_postal`, `municipio`, `estado`, `telefono`, `fecha_ingreso`, `sueldo_mensual`, `sueldo_diario`, `departamento`, `frecuencia_pago`, `status`, `foto`, `fecha_baja`, `motivo_baja`, `vacaciones`, `v_restantes` FROM `empleados`");
$sql_t = mysqli_num_rows($sql);


if ($sql_t > 0) {
    while ($data = mysqli_fetch_assoc($sql)){

        $dni = $data['dni'];
        $id_empleado = $data['id_empleado'];
        $no_cuenta = $data['no_cuenta'];
        $banco = $data['banco'];
        $nombre = $data['nombre'];
        $apellido_paterno = $data['apellido_paterno'];
        $apellido_materno = $data['apellido_materno'];
        $calle = $data['calle'];
        $n_exterior = $data['n_exterior'];
        $n_interior = $data['n_interior'];
        $colonia = $data['colonia'];
        $c_postal = $data['c_postal'];
        $municipio = $data['municipio'];
        $estado = $data['estado'];
        $telefono = $data['telefono'];
        $fecha_ingreso = $data['fecha_ingreso'];
        $sueldo_mensual = $data['sueldo_mensual'];
        $sueldo_diario = $data['sueldo_diario'];
        $departamento = $data['departamento'];
        $frecuencia_pago = $data['frecuencia_pago'];
        $status = $data['status'];
        $foto = $data['foto'];
        $foto_nombre = substr($foto, -15);
        $fecha_baja = $data['fecha_baja'];
        $motivo_baja = $data['motivo_baja'];
        $vacaciones = $data['vacaciones'];
        $v_restantes = $data['v_restantes'];
        $foto_real = "../imagenes/".$foto_nombre;


        //$sql_insert =  mysqli_query($con,"INSERT INTO `empleados`(`id_empleado`, `no_cuenta`, `banco`, `nombre_empleado`, `apellido_paterno`, `apellido_materno`, `fecha_ingreso`, `sueldo_mensual`, `sueldo_diario`, `frecuencia_pago`, `foto`, `fecha_baja`, `motivo_baja`, `vacaciones`, `status`, `vacaciones_restantes`)
        //VALUES ('$id_empleado', '$no_cuenta', '$banco','$nombre', '$apellido_paterno', '$apellido_materno', '$fecha_ingreso', $sueldo_mensual, $sueldo_diario, $frecuencia_pago, '$foto_real', '$fecha_baja', '$motivo_baja', '$vacaciones', '$status', '$v_restantes')");
        
        if($dni < 104){
            echo "si entro";
            if($banco == '072'){
                $sql_update = mysqli_query($con, "UPDATE `empleados` SET `no_cuenta` = $no_cuenta, `banco` = '$banco', `tipo_pago` = '01', `sueldo_mensual` = '$sueldo_mensual',
                `sueldo_diario` = '$sueldo_diario',`status`=$status,`finiquito`= 0, `num_guardia_atencion` = 0,
                `guardia_atencion` = 0,`num_guardia_sistemas` = 0,`guardia_sistemas` = 0 WHERE id_empleado = $id_empleado"); 
            }else{
                $sql_update = mysqli_query($con, "UPDATE `empleados` SET `no_cuenta` = $no_cuenta, `banco` = '$banco', `tipo_pago` = '40', `sueldo_mensual` = '$sueldo_mensual',
            `sueldo_diario` = '$sueldo_diario',`status`=$status,`finiquito`= 0, `num_guardia_atencion` = 0,
            `guardia_atencion` = 0,`num_guardia_sistemas` = 0,`guardia_sistemas` = 0 WHERE id_empleado = $id_empleado"); 
            }
                                                                                                                                                                                                                               
        }else{
            echo "no";
            if($banco == '072'){
                $sql_update = mysqli_query($con, "UPDATE `empleados` SET `no_cuenta` = $no_cuenta, `banco` = '$banco', `tipo_pago` = '01', `estado`= '$estado', `municipio` = '$municipio',
                `cp` = $c_postal, `fraccionamiento` = '$colonia', `calle` = '$calle', `numero_ext` = $n_exterior, `numero_int` = $n_interior, `telefono` = '$telefono',
                `sueldo_mensual` = '$sueldo_mensual', `sueldo_diario` = '$sueldo_diario',`status`=$status,`finiquito`= 0, `num_guardia_atencion` = 0, `guardia_atencion` = 0,
                `num_guardia_sistemas` = 0,`guardia_sistemas` = 0 WHERE id_empleado = $id_empleado");
            }else{
                $sql_update = mysqli_query($con, "UPDATE `empleados` SET `no_cuenta` = $no_cuenta, `banco` = '$banco', `tipo_pago` = '40', `estado`= '$estado', `municipio` = '$municipio',
                `cp` = $c_postal, `fraccionamiento` = '$colonia', `calle` = '$calle', `numero_ext` = $n_exterior, `numero_int` = $n_interior, `telefono` = '$telefono',
                `sueldo_mensual` = '$sueldo_mensual', `sueldo_diario` = '$sueldo_diario',`status`=$status,`finiquito`= 0, `num_guardia_atencion` = 0, `guardia_atencion` = 0,
                `num_guardia_sistemas` = 0,`guardia_sistemas` = 0 WHERE id_empleado = $id_empleado");
            }
                
            
            
        }

       

        var_dump($sql_update);

    }
}

?>
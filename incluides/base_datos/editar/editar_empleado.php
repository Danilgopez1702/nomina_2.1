<?php

    require ("../conexion/conexion.php");
    
    $tips = 'jpg';
        $type = array ('image1/jpg' => 'jpg');
        $id = $_POST['id_empleado_editar'];

        $id = preg_replace('([^A-Za-z0-9])', '', $id);
        
        
        $nombrefoto1 = $_FILES['files_editar']['name'];
        $ruta1 = $_FILES['files_editar']['tmp_name'];
        $name = $id.'A.'.$tips;
        if(is_uploaded_file($ruta1)){
            $destinobd = "../imagenes/" . $name;
		    $destino = "../../imagenes/" . $name;
            copy($ruta1,$destino);
        }
    $dni = $_POST['dni_editar'];
    $id = $_POST['id_empleado_editar']; 
    $nombre = $_POST['nombre_editar'];
    $ap = $_POST['ap_editar'];
    $am = $_POST['am_editar'];
    
    $estado = $_POST['estado_editar'];
    $municipio = $_POST['municipio_editar'];
    $cp = $_POST['cp_editar'];
    $fraccionamiento = $_POST['fraccionamiento_editar'];
    $calle = $_POST['calle_editar'];
    $numero_ext = $_POST['numero_ext_editar'];
    $numero_int = $_POST['numero_int_editar'];
    $telefono = $_POST['telefono_editar'];
    $estado_civil = $_POST['estado_civil_editar'];
    $f_nacimineto = $_POST['f_nacimineto_editar'];
    

    $banco = $_POST['banco_editar'];
    $no_cuenta = $_POST['num_cuenta_editar'];
    $vales = $_POST['vales_editar'];
    
    $dep = $_POST['dep_editar'];
    $turno = $_POST['turno_editar'];
    $sm = $_POST['sm_editar'];
    $ss = $_POST['ss_editar'];
    $sd = $_POST['sm_editar']/30.4;
    $fecha = $_POST['fecha_editar'];
    $fp = $_POST['fp_editar'];
    $modalidad = $_POST['mc_editar'];
    $fecha_baja = $_POST['fecha_baja'];
    $motivo_baja = $_POST['motivo_baja'];
    $status = 1;
    $horario_lv = $_POST['lv_editar'];
	$horario_s = $_POST['sabado_editar'];
	$horario_d = $_POST['domingo_editar'];
	$checador = $_POST['checador_editar'];
    
    echo $checador;
    if ($banco == "072"){
		$tipo_pago = "01";

	}else{
		$tipo_pago = "40";
	}
    echo $vales;

    $sql2 = mysqli_query($conexion, "SELECT `id_departamento` FROM `departamento` WHERE nombre_departamento= '$dep' AND `turno_departamento` = $turno");
	$date = mysqli_fetch_assoc($sql2);
	$id_departamento = $date['id_departamento'];
        
        if($fecha_baja != ""){
            $status =2;
        }
      
    if (isset($_POST['descanzo_e_editar'])){
        $descanzo_e = $_POST['descanzo_e_editar'];
        
        if(!isset($destino)){

        
                $sql_insert = mysqli_query($conexion, "UPDATE `empleados` SET
                `id_empleado`='$id', 
                `no_cuenta`='$no_cuenta', 
                `vales`='$vales', 
                `banco`='$banco', 
                `tipo_pago`='$tipo_pago',
                `nombre_empleado`='$nombre', 
                `apellido_paterno`='$ap', 
                `apellido_materno`='$am', 
                `estado`='$estado', 
                `municipio`='$municipio', 
                `cp`='$cp', 
                `fraccionamiento`='$fraccionamiento', 
                `calle`='$calle', 
                `numero_ext`='$numero_ext', 
                `numero_int`='$numero_int', 
                `telefono`='$telefono', 
                `estado_civil`='$estado_civil', 
                `f_nacimineto`='$f_nacimineto', 
                `fecha_ingreso`='$fecha', 
                `sueldo_mensual`= $sm, 
                `sueldo_semanal`= $ss, 
                `sueldo_diario`= $sd, 
                `id_departamento`= $id_departamento,
                `frecuencia_pago`= $fp, 
                `status`= $status, 
                `fecha_baja`='$fecha_baja', 
                `motivo_baja`='$motivo_baja',
                `h_lv`='$horario_lv',
                `h_s`='$horario_s',
                `h_d`='$horario_d',
                `descanso_e`='$descanzo_e',
                `checador`='$checador',
                `modalidad_vacacion`= $modalidad                  WHERE `dni` = $dni");
    
            
        }else{
        
                $sql_insert = mysqli_query($conexion, "UPDATE `empleados` SET 
                `id_empleado`='$id',
                `foto`='$destinobd',
                `no_cuenta`='$no_cuenta', 
                `banco`='$banco', 
                `vales`='$vales',
                `tipo_pago`='$tipo_pago',
                `nombre_empleado`='$nombre', 
                `apellido_paterno`='$ap', 
                `apellido_materno`='$am', 
                `estado`='$estado', 
                `municipio`='$municipio', 
                `cp`='$cp', 
                `fraccionamiento`='$fraccionamiento', 
                `calle`='$calle', 
                `numero_ext`='$numero_ext', 
                `numero_int`='$numero_int', 
                `telefono`='$telefono', 
                `estado_civil`='$estado_civil', 
                `f_nacimineto`='$f_nacimineto', 
                `fecha_ingreso`='$fecha', 
                `sueldo_mensual`= $sm, 
                `sueldo_semanal`= $ss, 
                `sueldo_diario`= $sd, 
                `id_departamento`= $id_departamento,
                `frecuencia_pago`= $fp, 
                `status`= $status, 
                `fecha_baja`='$fecha_baja', 
                `motivo_baja`='$motivo_baja',
                `h_lv`='$horario_lv',
                `h_s`='$horario_s',
                `h_d`='$horario_d',
                `descanso_e`='$descanzo_e',
                `checador`='$checador',
                `modalidad_vacacion`= $modalidad                     WHERE `dni` = $dni");
            
                


        }
	}else{
        if(!isset($destino)){

        
            $sql_insert = mysqli_query($conexion, "UPDATE `empleados` SET
            `id_empleado`='$id', 
            `no_cuenta`='$no_cuenta', 
            `banco`='$banco', 
            `tipo_pago`='$tipo_pago',
            `vales`='$vales', 
            `nombre_empleado`='$nombre', 
            `apellido_paterno`='$ap', 
            `apellido_materno`='$am', 
            `estado`='$estado', 
            `municipio`='$municipio', 
            `cp`='$cp', 
            `fraccionamiento`='$fraccionamiento', 
            `calle`='$calle', 
            `numero_ext`='$numero_ext', 
            `numero_int`='$numero_int', 
            `telefono`='$telefono', 
            `estado_civil`='$estado_civil', 
            `f_nacimineto`='$f_nacimineto', 
            `fecha_ingreso`='$fecha', 
            `sueldo_mensual`= $sm, 
            `sueldo_semanal`= $ss, 
            `sueldo_diario`= $sd, 
            `id_departamento`= $id_departamento,
            `frecuencia_pago`= $fp, 
            `status`= $status, 
            `fecha_baja`='$fecha_baja', 
            `motivo_baja`='$motivo_baja',
            `h_lv`='$horario_lv',
            `h_s`='$horario_s',
            `h_d`='$horario_d',
            `checador`='$checador',
            `modalidad_vacacion`= $modalidad                  WHERE `dni` = $dni");

        
    }else{
    
            $sql_insert = mysqli_query($conexion, "UPDATE `empleados` SET 
            `id_empleado`='$id',
            `foto`='$destinobd',
            `no_cuenta`='$no_cuenta', 
            `banco`='$banco', 
            `tipo_pago`='$tipo_pago',
            `vales`='$vales', 
            `nombre_empleado`='$nombre', 
            `apellido_paterno`='$ap', 
            `apellido_materno`='$am', 
            `estado`='$estado', 
            `municipio`='$municipio', 
            `cp`='$cp', 
            `fraccionamiento`='$fraccionamiento', 
            `calle`='$calle', 
            `numero_ext`='$numero_ext', 
            `numero_int`='$numero_int', 
            `telefono`='$telefono', 
            `estado_civil`='$estado_civil', 
            `f_nacimineto`='$f_nacimineto', 
            `fecha_ingreso`='$fecha', 
            `sueldo_mensual`= $sm, 
            `sueldo_semanal`= $ss, 
            `sueldo_diario`= $sd, 
            `id_departamento`= $id_departamento,
            `frecuencia_pago`= $fp, 
            `status`= $status, 
            `fecha_baja`='$fecha_baja', 
            `motivo_baja`='$motivo_baja',
            `h_lv`='$horario_lv',
            `h_s`='$horario_s',
            `h_d`='$horario_d',
            `checador`='$checador',
            `modalidad_vacacion`= $modalidad                     WHERE `dni` = $dni");
        
            


    }
    }  
    	    
	    mysqli_close($conexion);

        if($status == 2){
            
        }

    
        header("location: ../../admin/empleados_activos.php");
	

?>
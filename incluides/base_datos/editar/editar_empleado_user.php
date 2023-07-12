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
    $banco = $_POST['banco_editar'];
    $no_cuenta = $_POST['num_cuenta_editar'];
    $dep = $_POST['dep_editar'];
    $turno = $_POST['turno_editar'];
    $fecha = $_POST['fecha_editar'];
    $fp = $_POST['fp_editar'];
    $modalidad = $_POST['mc_editar'];
    $fecha_baja = $_POST['fecha_baja'];
    $motivo_baja = $_POST['motivo_baja'];
    $status = 1;

    if ($banco == "072"){
		$tipo_pago = "01";

	}else{
		$tipo_pago = "40";
	}

    $sql2 = mysqli_query($conexion, "SELECT `id_departamento` FROM `departamento` WHERE nombre_departamento= '$dep' AND `turno_departamento` = $turno");
	$date = mysqli_fetch_assoc($sql2);
	$id_departamento = $date['id_departamento'];
        
        if($fecha_baja != ""){
            $status =2;
        }
        
       if(!isset($destino)){

    
	    $sql_insert = mysqli_query($conexion, "UPDATE `empleados` SET `id_empleado`='$id', `no_cuenta`='$no_cuenta', `banco`='$banco', `tipo_pago`='$tipo_pago',`nombre_empleado`='$nombre', `apellido_paterno`='$ap', `apellido_materno`='$am', `fecha_ingreso`='$fecha', `id_departamento`= $id_departamento,`frecuencia_pago`=$fp, `status`=$status, `fecha_baja`='$fecha_baja', `motivo_baja`='$motivo_baja',`modalidad_vacacion`=$modalidad WHERE `dni` = $dni");
   
        
        }else{
    
            $sql_insert = mysqli_query($conexion, "UPDATE `empleados` SET `id_empleado`='$id',`foto`='$destinobd', `no_cuenta`='$no_cuenta', `banco`='$banco', `tipo_pago`='$tipo_pago',`nombre_empleado`='$nombre', `apellido_paterno`='$ap', `apellido_materno`='$am', `fecha_ingreso`='$fecha',`id_departamento`= $id_departamento,`frecuencia_pago`=$fp, `status`=$status, `fecha_baja`='$fecha_baja', `motivo_baja`='$motivo_baja',`modalidad_vacacion`=$modalidad WHERE `dni` = $dni");
        
            echo "foto ";
            var_dump($sql);


        }
	    
    	    
	    mysqli_close($conexion);

    header("location: ../../admin/empleados_activos.php");
	

?>
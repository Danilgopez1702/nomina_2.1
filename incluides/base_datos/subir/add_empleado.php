<?php
if (empty($_POST['id_empleado']) || empty($_POST['nombre']) || empty($_POST['ap']) || empty($_POST['num_cuenta']) || empty($_POST['sm']) 
    || empty($_POST['fecha']) || empty($_POST['turno']) ||  empty($_POST['dep']) ||  empty($_POST['fp']) ||  empty($_POST['banco']) ||  empty($_POST['mc']) ) 
{
} else 
{
	require ("../conexion/conexion.php");
    
	$tips = 'jpg';
	$type = array('image/jpg' => 'jpg');
	$id = $_POST['id_empleado'];
	$id = preg_replace('([^A-Za-z0-9])', '', $id);

	$nombrefoto1 = $_FILES['files']['name'];
	$ruta1 = $_FILES['files']['tmp_name'];
	$name = $id . 'A.' . $tips;
	if (is_uploaded_file($ruta1)) {
		$destinobd = "../imagenes/" . $name;
		$destino = "../../imagenes/" . $name;
		copy($ruta1, $destino);
	}


	$id = $_POST['id_empleado'];
	$nombre = $_POST['nombre'];
	$ap = $_POST['ap'];
	if(empty($_POST['am'])){
		$am = " ";
		
	}else{
		$am = $_POST['am'];
	}
	


    $banco = $_POST['banco'];
    $num_cuenta = $_POST['num_cuenta'];
    $vales = $_POST['vales'];
	$sm = $_POST['sm'];
	$sd = $_POST['sm']/30.4;
	$ss = $_POST['ss'];
	$fecha = $_POST['fecha'];
	$dep = $_POST['dep'];
    $turno = $_POST['turno'];
	$fp = $_POST['fp'];
	$modalidad = $_POST['mc'];
	$status = 1;

	$estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $cp = $_POST['cp'];
    $fraccionamiento = $_POST['fraccionamiento'];
    $calle = $_POST['calle'];
    $numero_ext = $_POST['numero_ext'];
    $numero_int = $_POST['numero_int'];
    $telefono = $_POST['telefono'];
    $estado_civil = $_POST['estado_civil'];
    $f_nacimineto = $_POST['f_nacimineto'];

	$horario_lv = $_POST['lv'];
	$horario_s = $_POST['sabado'];
	$horario_d = $_POST['domingo'];
	$descanzo_e = $_POST['descanzo_e '];
	$checador = $_POST['checador'];
	if ($banco == "072"){
		$tipo_pago = "01";

	}else{
		$tipo_pago = "40";
	}
	var_dump($tipo_pago);
	$sql2 = mysqli_query($conexion, "SELECT `id_departamento` FROM `departamento` WHERE nombre_departamento= '$dep' AND `turno_departamento` = $turno");
	$date = mysqli_fetch_assoc($sql2);
	$id_departamento = $date['id_departamento'];

	$sql = mysqli_query($conexion, "INSERT INTO empleados (id_empleado, nombre_empleado, apellido_paterno, apellido_materno, estado, municipio, cp, fraccionamiento, calle, numero_ext, numero_int, telefono, estado_civil, f_nacimineto, banco, tipo_pago, vales, no_cuenta, fecha_ingreso, sueldo_mensual, sueldo_semanal, sueldo_diario, id_departamento, frecuencia_pago, status, foto, modalidad_vacacion, h_lv, h_s, h_d, descanso_e, checador)
        VALUES ('$id','$nombre','$ap','$am', '$estado', '$municipio', '$cp', '$fraccionamiento', '$calle', '$numero_ext', '$numero_int', '$telefono', '$estado_civil', '$f_nacimineto', '$banco', '$tipo_pago', '$vales', '$num_cuenta', '$fecha','$sm','$ss','$sd',$id_departamento,'$fp','$status', '$destinobd', '$modalidad', '$horario_lv', '$horario_s', '$horario_d', '$descanzo_e', '$checador')");


	var_dump($sql);

	mysqli_close($conexion);

	header("location: ../../admin/empleados_activos.php");
}
?>
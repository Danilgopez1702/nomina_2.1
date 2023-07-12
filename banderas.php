<?php
	require_once "incluides/base_datos/conexion/conexion.php";
	
	$inicio = 1100;
	$fin = 1199;
	

	for($inicio; $inicio < $fin; $inicio++){
		$Bandera = 'A0000'.$inicio;
		$subida = mysqli_query($con,"INSERT INTO `inventarioBandera`(`no_bandera`,`fallo`)
		 VALUES ($Bandera,'NO')");
	}
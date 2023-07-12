<?php

	require ("../conexion/conexion.php");
    
    $id = $_GET['id'];
    $ida = $_POST['id_vacaciones'];
    $mandar = $_POST['mandar_inicio_v'];
    $inicio = $_POST['fecha_inicio_v'];
    $fin = $_POST['fecha_fin_v'];

    $sql_delete = mysqli_query($conexion,"DELETE FROM `vacaciones` WHERE `fecha_inicio_v` = '$mandar'");
    var_dump($sql_delete);

    $fecha_i = date("Y-m-d", strtotime( $inicio)) . "<br>"; 
    $fecha_f = date("Y-m-d", strtotime( $fin)) . "<br>"; 

    for($i=$inicio;$i<=$fin;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
        echo $i . "<br />";

        $fecha_v = date("Y-m-d", strtotime( $i)) . "<br>";   

     $sql = mysqli_query($conexion, "INSERT INTO `vacaciones`(`id_empleado`, `status_vacaciones`, `fecha_inicio_v`, `fecha_fin_v`, `fecha_vacacion`) 
     VALUES ('$id','0','$fecha_i','$fecha_f','$fecha_v')");
    }
   
    mysqli_close($conexion);
    header('location: ../../admin/caratula.php?id='.$id.'#tab2');
?>
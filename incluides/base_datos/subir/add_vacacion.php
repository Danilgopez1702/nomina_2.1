<?php
if ( empty($_POST['fecha_i']) || empty($_POST['fecha_f'])) {

} else {
	require ("../conexion/conexion.php");
    
    $id = $_POST['id'];
    $fecha1 = $_POST['fecha_i'];
    $fecha2 = $_POST['fecha_f'];

    $fecha_i = date("Y-m-d", strtotime( $fecha1)) . "<br>"; 
    $fecha_f = date("Y-m-d", strtotime( $fecha2)) . "<br>"; 

    for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
        echo $i . "<br />";

        $fecha_v = date("Y-m-d", strtotime( $i)) . "<br>";   

     $sql = mysqli_query($conexion, "INSERT INTO `vacaciones`(`id_empleado`, `status_vacaciones`, `fecha_inicio_v`, `fecha_fin_v`, `fecha_vacacion`) 
     VALUES ('$id','1','$fecha_i','$fecha_f','$fecha_v')");
    }
    mysqli_close($conexion);
    
    header('location: ../../admin/caratula.php?id='.$id.'#tab2');
}
?>
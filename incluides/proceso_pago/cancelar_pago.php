<?php
  require("../base_datos/conexion/conexion.php");

  $sql_comprobacion = mysqli_query($conexion, "SELECT * FROM `historico` WHERE `status`= 1 && `aguinaldo` = 2");
  $comprobar = mysqli_num_rows($sql_comprobacion); 

  if($comprobar > 1){
    while($data = mysqli_fetch_assoc($sql_comprobacion)){

      $total = $data['monto_pago'];
      $id = $data['id_empleado'];

      $sql_select = mysqli_query($conexion, "UPDATE `historico` SET `monto_total`= '$total', `aguinaldo` = 0 WHERE id_empleado = $id");
    }
  }else{
    $sql_select = mysqli_query($conexion, "DELETE FROM historico WHERE status = 1");
    mysqli_close($conexion);
  }
  
	header("location: ../admin/nomina.php");
?>
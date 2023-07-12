<?php

	header("Content-Type: application/xls");
	header('Content-Disposition: attachment;filename=Reporte.xls');
	include "../base_datos/conexion/conexion.php";

    $query = mysqli_query($conexion, "SELECT * FROM historico WHERE status = 1");
    $result = mysqli_num_rows($query);
	
?>
  <style>

  table, td{
    border: 1px solid #000000;
    text-align: center;
  }

  </style>

  <table class="table  table-striped table-bordered " id="table">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Faltas</th>
<?php 

  if ($result > 0) {
                                        
?>

        <th>Prestamos</th>

<?php 

  }
                                            
?>

        <th>Infonavit</th>
        <th>Hrs. Extraordiarias</th>
        <th>Monto a pagar</th>
      </tr>
    </thead>
        <tbody>
                                    
<?php                                    
                                        
          if ($result > 0) {

            while ($data = mysqli_fetch_assoc($query)) { 

?>
      <tr>
        <td>"<?php echo $data['id_empleado']; ?>"</td>
        <td><?php echo $data['nombre']; ?></td>
        <td><?php echo $data['faltas']; ?></td>
                                                    
<?php
                                                     
  if ($result > 0) {
                                                
?>
                                                
        <td><?php if ($data['prestamo'] >= 1) {
                                                          
          echo $data['prestamo'];
} ?></td>
                                                
<?php  
        
  }
                                            
?>
                                                    
        <td><?php echo $data['infonavit']; ?></td>
        <td><?php if ($data['hora_extra'] >= 1) {
                                                            
          echo $data['hora_extra'];
                                                        
  } ?></td>
                                                    
      <td><?php $y=$data['monto_pago']; $x = round($y);  echo $x;?></td>
      </tr>
          
<?php }

} 

?>
        </tbody>
  </table>
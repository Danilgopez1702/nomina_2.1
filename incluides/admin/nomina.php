<?php 
session_start();
if($_SESSION['rol'] == NULL){
  header('location: ../../index.php');
}else if ($_SESSION['rol'] == 1) {
  include_once "../header/header_admin.php"; 
  require("../base_datos/conexion/conexion.php");

  $fecha = date("Y-m-d");
  $tott = 0;
  $tt=0;
  $query = mysqli_query($conexion, "SELECT * FROM historico WHERE status = 1");
  $result = mysqli_num_rows($query);

  $query_a = mysqli_query($conexion, "SELECT * FROM historico WHERE aguinaldo = 2");
  $result_a = mysqli_num_rows($query_a);

    if ($result < 1){

?>    
  <div class="form-row" style="margin-bottom: 30px; margin-top: 20px;">
    <div class="form-group" style="position: relative; height: 20px; left: 5px; border-radius: 15px;">
      <a href="../proceso_pago/pago_semanal.php" style="border-radius: 15px; background-color: steelblue; color: white; padding: 10px;">Generar nomina semanal</a>
    </div>
    <div class="form-group" style="position: relative; height: 20px; left: 25px; border-radius: 15px;">
      <a href="../proceso_pago/pago_catorcenal.php" style="border-radius: 15px; background-color: dodgerblue; color: white; padding: 10px;">Generar nomina catorcenal</a>
    </div>
  </div> 

<?php 

    }else if($result > 1){   
      if($result_a < 1){                            
        while ($result = mysqli_fetch_assoc($query)){                                         
          $c = $result['monto_total'];
          $tott = floatval($tott+ $c);                                    
        }
?>

    <div class="form-row" style="margin-bottom: 30px; margin-top: 20px;">  
      <div class="form-group" style="position: relative; height: 20px; left: 5px; border-radius: 15px;">
        <a href="../proceso_pago/aguinaldo.php" style="border-radius: 15px; background-color: darkcyan; color: white; padding: 10px;">Agregar Aguinaldo</a>
      </div> 
      <div class="form-group" style="position: relative; height: 20px; left: 75px; border-radius: 15px;">
        <a href="../proceso_pago/descargar_archivo.php" style="border-radius: 15px; background-color: darkolivegreen; color: white; padding: 10px;">Descargar Archivo de Nomina</a>
      </div>
      <div class="form-group" style="position: relative; height: 0px; left: 95px; border-radius: 15px;">
        <a href="reporte_excel.php?id=<?php echo $fecha?>" style="border-radius: 15px; background-color: darkgreen; color: white; padding: 10px;">Descargar Archivo de Excel</a>
      </div>
      <div class="form-group" style="position: relative; height: 20px; left: 755px; border-radius: 15px;">
        <a href="../proceso_pago/realizar_pago.php" style="border-radius: 15px; background-color: darkblue; color: white; padding: 10px;">Realizar el Pago</a>
      </div> 
      <div class="form-group" style="position: relative; height: 20px; left: 795px; border-radius: 15px;">
        <a href="../proceso_pago/cancelar_pago.php" style="border-radius: 15px; background-color: darkred; color: white; padding: 10px;">Cancelar</a>
      </div> 
    </div>

<?php   

      }else if($result_a > 1){
        while ($result = mysqli_fetch_assoc($query)){                                         
          $c = $result['monto_total'];
          $tott = floatval($tott+ $c);                                    
        }
        ?>
        <div class="form-row" style="margin-bottom: 30px; margin-top: 20px;">  
          <div class="form-group" style="position: relative; height: 20px; border-radius: 15px;">
            <a href="../proceso_pago/descargar_archivo.php" style="border-radius: 15px; background-color: darkolivegreen; color: white; padding: 10px;">Descargar Archivo de Nomina</a>
          </div>
          <div class="form-group" style="position: relative; height: 0px; left: 35px; border-radius: 15px;">
            <a href="reporte_excel.php?id=<?php echo $fecha?>" style="border-radius: 15px; background-color: darkgreen; color: white; padding: 10px;">Descargar Archivo de Excel</a>
          </div>
          <div class="form-group" style="position: relative; height: 20px; left: 755px; border-radius: 15px;">
            <a href="../proceso_pago/realizar_pago.php" style="border-radius: 15px; background-color: darkblue; color: white; padding: 10px;">Realizar el Pago</a>
          </div> 
          <div class="form-group" style="position: relative; height: 20px; left: 795px; border-radius: 15px;">
            <a href="../proceso_pago/cancelar_pago.php" style="border-radius: 15px; background-color: darkred; color: white; padding: 10px;">Quitar aguinaldo</a>
          </div> 
        </div>

      <?php
      }
    }
                            
?>

<?php  
    $tabla = mysqli_query($conexion, "SELECT * FROM historico WHERE status = 1 order by id_empleado desc");
    $contador = mysqli_num_rows($tabla);
    while ($dd = mysqli_fetch_assoc($tabla)) { 
      $y=$dd['monto_pago'];
      $tt = $tt+ $y;                                
    }                               
    $t = number_format($tt, 2, '.', ','); 
                                
?>
    
    <div class="form-row" style="margin-bottom: 20px;">
      <h2 style="color:black ;">TOTAL A PAGAR:  <b><font color="black"> <?php echo "   $".$t; ?> </font></b></h2>
    </div>
    <div class="container-fluid py-4">
    <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Monto a pagar</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $tabla = mysqli_query($conexion, "SELECT * FROM historico WHERE status = 1");
            $contador = mysqli_num_rows($tabla);
            if ($contador > 0) {
              while ($data = mysqli_fetch_assoc($tabla)) { 
          ?>                                        
          <tr>
            <td><?php echo $data['id_empleado']; ?></td>
            <td><?php echo $data['nombre']; ?></td>
            <td><?php $y=$data['monto_total']; $x =number_format($y, 2, '.', ',');  echo $x;?></td>
            <td>                                            
            <button onClick="loadDynamicContentModal('<?php echo $data['id_empleado']; ?>')" class="btn btn-primary btn-link btn-sm" style="border-radius: 15px;">
              <i class="material-icons">Detalles</i>
            </button>
            </td>
          </tr>
          <?php 
              }
            } 
          ?>                                
        </tbody>
      </table>
    </div>

    <div class="modal" id="modal_detalles">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 1000px; height: 700px; position: absolute; left: 25%;">
            <div class="modal-header">
                <h4 class="modal-title">Detalles Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <center>
              <h4>Faltas</h4>
            </center>
            <div class="modal-body">
              <div id="conte-modal"></div>
            </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">

      function loadDynamicContentModal(modal){
        var options = {
          modal: true,
          height:300,
          width:600
        };
            
        $('#conte-modal').load('../modal/pago/detalles_pago.php?id='+modal, function() {
          
          $('#modal_detalles').modal({show:true});
            
        }); 

      }

    </script>   
    
<?php
}else if($_SESSION['rol'] == 2){
  header('location: ../user/index.php');
}
  include_once "../header/header2_admin.php"; 

?>                              
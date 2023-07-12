<?php 
session_start();
if($_SESSION['rol'] == NULL){
  header('location: ../../index.php');
}else if ($_SESSION['rol'] == 1) {
  include_once "../header/header_admin.php"; 
  require("../base_datos/conexion/conexion.php");
?>
<div class="col-md-5 col-xl-11 grid-margin stretch-card" style="top: 20px;">
    <div class="col-md-10 grid-margin stretch-card">
      <h2 class="card-title" style="color:black ;">Historico de Nominas</h2> 
    </div> 
    <form>
      <input type="text" id="buscar" name="buscar" class="form-control" style="border-radius: 15px;" placeholder="Buscar Nomina">
    </form> 
  </div>  
  <div class="container-fluid py-4">
    <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <th> ID </th>
          <th> Fecha de Pago </th>
          <th> Monto de Pago </th>
          <th> Tipo de Nomina </th>
          <th> Acciones </th>
        </thead>
        <tbody id="mytable">
          <?php
            $query = mysqli_query($conexion, "SELECT * FROM `historico_detalles` ");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                  <td><?php echo $data['id_historico_detalles'] ?></td>
                  <td><?php echo $data['fecha'] ?></td>
                  <td><?php echo $data['monto_total'] ?></td>
                  <td><?php 
                    if( $data['modalidad_p'] == '7'){
                      echo "Semanal";
                    }else if($data['modalidad_p'] == '14'){
                      echo "Catorcenal";
                    }
                  ?></td>
                  <td>                                            
                    <a href="reporte_excel.php?id=<?php echo $data['fecha']?>" class="btn" style="border-radius: 15px; background-color: darkgreen; color: white; padding: 10px;">Descargar Reporte excel</a>  
                  </td>
                </tr>
            <?php
              }
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    var busqueda = document.getElementById('buscar');
    var table = document.getElementById("table").tBodies[0];
    buscaTabla = function(){
      texto = busqueda.value.toLowerCase();
      var r=0;
      while(row = table.rows[r++]){
        if ( row.innerText.toLowerCase().indexOf(texto) !== -1 ){
          row.style.display = null;
        }else{
          row.style.display = 'none';
        }
      }
    }
    busqueda.addEventListener('keyup', buscaTabla);
  </script>
<?php
}else if($_SESSION['rol'] == 2){
  header('location: ../user/index.php');
}
    include_once "../header/header2_admin.php"; 
?>
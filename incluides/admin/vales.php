<?php 
session_start();
if($_SESSION['rol'] == NULL){
  header('location: ../../index.php');
}else if ($_SESSION['rol'] == 1) {
  include_once "../header/header_admin.php"; 
  require("../base_datos/conexion/conexion.php");
?>
<div class="form-row" style="margin-bottom: 30px; margin-top: 20px;">  
  <div class="form-group" style="position: relative; height: 20px; left: 75px; border-radius: 15px;">
    <h2 class="card-title" style="color:black ;">Consulta de Insidencias</h2> 
  </div> 
  <div class="form-group" style="position: relative; height: 20px; left: 75px; border-radius: 15px;">
    <a href="../proceso_pago/descargar_archivo.php" style="border-radius: 15px; background-color: darkolivegreen; color: white; padding: 10px; margin-left: 1000px;">Descargar Archivo de Vales</a>
  </div>
</div>
  <form class="forms-sample" method='post' action="calculo_vales.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-6">
        <div class="col-md-4" style="margin-left: 285px;">
          <label class="col-sm-10 col-form-label" style="color: black;">Fecha de Inicio <span class="require">*</span></label>
          <input center type="date" name="fecha_i" id="fecha_i" stylerequired style="border-radius:15px;" required class="form-control">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="col-md-4">
          <label class="col-sm-10 col-form-label" style="color: black;">Fecha Final <span class="require">*</span></label>
          <input center type="date" name="fecha_i" id="fecha_i" stylerequired style="border-radius:15px;" required class="form-control">
        </div>
    </div>
  </div>
  </form>
  <div>
    <div class="col-md-3" style="margin-left: 145px;">
      <label class="col-sm-8 col-form-label">Empleado<span class="require">*</span></label>
      <select class="form-control" id="id_empleado" name="id_empleado" required="" style="border-radius: 5px;">
        <option value="50">Todos Los Empleados </option>
        <?php
          $query = mysqli_query($conexion, "SELECT * FROM empleados WHERE status = 1");
          $result = mysqli_num_rows($query);
          if ($result > 0) {
            while ($data = mysqli_fetch_assoc($query)) { 
        ?>
              <option value="<?php echo $data['id_empleado'] ?>"><?php echo $data['nombre_empleado'] ." ". $data['apellido_paterno'] ." ". $data['apellido_materno']; ?></option>
        <?php 
            }
          }
        ?>
      </select>
    </div>
    <div class="pull-right" style="margin-top: 45px;">
      <input type = "submit" class="btn btn-success col-md-2 col-sm-2" style="margin-left: 950px; border-radius: 5px;"></input>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <th>Id del Empleado</th>
          <th>Nombre del empleado</th>
          <th>Retardos</th>
          <th>Faltas</th>
          <th>Vacaciones</th>
        </thead>
        <tbody id="mytable">
          <?php
            $query = mysqli_query($conexion, "SELECT p.id_empleado, p.retardos_vales, p.faltas_vales, p.vacacion_vales, e.nombre_empleado, e.apellido_paterno, e.apellido_materno FROM `previsualizacion_vales` AS p INNER JOIN empleados AS e ON p.id_empleado = e.id_empleado");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query_d)) { 
                $nombre = $data['nombre_empleado'] . ' ' . $data['apellido_paterno'] . ' ' . $data['apellido_materno'];
                ?>
                <tr>
                    <td><?php echo $data['id_empleado']; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $data['retardos_vales']; ?></td>
                    <td><?php echo $data['faltas_vales']; ?></td>
                    <td><?php echo $data['vacacion_vales']; ?></td>
                    
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
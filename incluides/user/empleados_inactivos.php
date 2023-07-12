<?php 
  session_start();
  if($_SESSION['rol'] == NULL){
    header('location: ../../index.php');
  }else if ($_SESSION['rol'] == 2) {
    include_once "../header/header_user.php"; 
    require("../base_datos/conexion/conexion.php");
?>

  <div class="col-md-12 col-xl-12 grid-margin stretch-card">
    <div class="col-md-10 grid-margin stretch-card">
      <h2 class="card-title">Empleados Inactivos</h2> 
    </div> 
    <form class="nav-link mt-6 mt-md-0 d-none d-lg-flex search">
      <input type="text" id="buscar" name="buscar" class="form-control" style="border-radius: 15px;" placeholder="Buscar Empleados">
    </form>  
  </div>
  <div class="container-fluid py-4">
    <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <th> ID </th>
          <th> Foto </th>
          <th> Nombre</th>
          <th> Fecha de Ingreso </th>
          <th> Fecha de Renuncia</th>
          <th> Sueldo mensual</th>
          <th> Acciones </th>
        </thead>
        <tbody id="myTable">
          <?php
            $query = mysqli_query($conexion, "SELECT * FROM empleados AS e LEFT JOIN  departamento AS d ON e.id_departamento = d.id_departamento WHERE status = 2");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                  <td><?php echo $data['id_empleado'] ?></td>
                  <td>
                    <img src="<?php echo $data['foto'] ?>" alt="image" class="rounded-circle"/> 
                  </td>
                  <td><a href=" caratula.php"><?php echo $data['nombre_empleado'] . " " . $data['apellido_paterno'] . " " . $data['apellido_materno'] ?></a> </td>
                  <td><?php echo $data['fecha_ingreso'] ?></td>
                  <td><?php echo $data['fecha_baja'] ?></td>
                  <td><?php $y=$data['sueldo_mensual']; $x =number_format($y, 2, '.', ',');  echo $x; ?></td>
                  <td><a href="../base_datos/editar/activar_empleados.php?id='<?php echo $data['dni'] ?>'"  class="btn btn-primary" style="border-radius:20px">Activar</a>
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
    <script type="text/javascript">
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
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        [].forEach.call(document.querySelectorAll('.dropimage'), function(img) {
            img.onchange = function(e) {
            var inputfile = this,
            reader = new FileReader();
            reader.onloadend = function() {
              inputfile.style['background-image'] = 'url(' + reader.result + ')';
            }
            reader.readAsDataURL(e.target.files[0]);
          }
        });
      });
    </script>

<?php
  }else if($_SESSION['rol'] == 1){
    header('location: ../admin/empleados_inactivos.php');
  }
    include_once "../header/header2_user.php"; 
?>
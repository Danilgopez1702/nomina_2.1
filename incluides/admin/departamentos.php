<?php  
    session_start();
    if($_SESSION['rol'] == NULL){
      header('location: ../../index.php');
    }else if ($_SESSION['rol'] == 1) {
      include_once "../header/header_admin.php";
      require("../base_datos/conexion/conexion.php");
      include "../modal/agregar/agregar_departamento.php";
      include "../modal/editar/editar_departamento.php";

?>

  <div class="col-md-12 col-xl-12 grid-margin stretch-card">
    <div class="col-md-10 grid-margin stretch-card">
      <h2 class="card-title" style="color:black ;">Departamentos</h2> 
    </div> 
    <form>
      <input type="text" id="buscar" name="buscar" class="form-control" style="border-radius: 15px;" placeholder="Buscar Departamentos">
    </form>   
  </div>
  <div style="left: 20px;">
    <a data-toggle="modal" href="#modal_agregar_departamento" class="btn btn-primary" style="border-radius: 15px;">Agregar Departamento</a>  
  </div> 
  <div class="container-fluid py-4">
    <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <tr>
            <th> Nombre </th>
            <th> Turno </th>
            <th> Acciones </th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
            $query = mysqli_query($conexion, "SELECT * FROM departamento");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                <td><?php echo $data['nombre_departamento'] ?> </td>

                <?php 
                  if($data['turno_departamento'] == 1){
                ?>
                    <td>Matutino</td>
                <?php
                  }else if($data['turno_departamento'] == 2){
                ?>
                  <td>Nocturno</td>
                <?php
                  }
                ?>
                <td> 
                <a data-toggle="modal" href="#modal_editar_departamento"  class="btn btn-primary btn-rounded" 
                    onclick='editar_departamento(
                    "<?php echo $data["id_departamento"];?>", 
                    "<?php echo $data["nombre_departamento"];?>",
                    "<?php echo $data["turno_departamento"];?>"
                    )'>Editar</a>                                      
                <a href="../base_datos/eliminar/eliminar_departamento.php?id=<?php echo $data['id_departamento'] ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>                </td>
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
  function editar_departamento(id_departamento,nombre_departamento,turno_departamento)
    {   
    document.getElementById('editar_id_departamento').value = id_departamento;
    document.getElementById('editar_nombre').value = nombre_departamento;
    document.getElementById('editar_turno').value = turno_departamento;
    }


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

    }else if($_SESSION['rol'] == 2){
      header('location: ../user/departamentos.php');
    }
    include "../header/header2_admin.php"; 
?>
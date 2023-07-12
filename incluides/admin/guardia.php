<?php  
    session_start();
    if($_SESSION['rol'] == NULL){
      header('location: ../../index.php');
    }else if ($_SESSION['rol'] == 1) {
      include_once "../header/header_admin.php";
      require("../base_datos/conexion/conexion.php");
      include "../modal/agregar/agregar_guardia.php";
      include "../modal/editar/editar_guardia.php";

?>
<div class="col-md-12 col-xl-12 grid-margin stretch-card">
    <div class="col-md-10 grid-margin stretch-card">
      <h2 class="card-title" style="color:black ;">Guardias</h2> 
    </div> 
     
    <form>
      <input type="text" id="buscar" name="buscar" class="form-control" style="border-radius: 15px;" placeholder="Buscar Usuarios">
    </form>   
  </div>
  <div style="left: 20px;">
      <a data-toggle="modal" href="#modal_agregar_usuarios" class="btn btn-primary" style="border-radius: 15px;">Agregar guardia</a>  
    </div>
  <div class="container-fluid py-4">
    <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <tr>
            <th> Empleado </th>
            <th> Departamento </th>
            <th> Turno del Departamento </th>
            <th> Dia de Guardia </th>
            <th> Hora de Guardia </th>
            <th> Numero de Acomodo </th>
            <th> Acciones </th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
            $query = mysqli_query($conexion, "SELECT * FROM `guardia` AS g INNER JOIN empleados AS e ON g.id_empleado = e.id_empleado INNER JOIN departamento AS d ON g.id_departamento = d.id_departamento ORDER BY g.id_departamento ASC, g.rol_guardia ASC");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                <td><?php echo $data['nombre_empleado'] . ' ' . $data['apellido_paterno'] . ' ' . $data['apellido_materno'];?></td>
                <td><?php echo $data['nombre_departamento'];?></td>
                <td>
                  <?php 
                  if($data['turno_departamento'] == 1){
                    echo 'MATUTINO';
                  }else{
                    echo 'NOCTURNO';
                  }
                  ?>
                </td>
                <td>
                    <?php 
                    if($data['dia_guardia'] == 1){
                        echo "Lunes";
                    }else if($data['dia_guardia'] == 2){
                        echo "Martes";
                    }else if($data['dia_guardia'] == 3){
                        echo "Miercoles";
                    }else if($data['dia_guardia'] == 4){
                        echo "Jueves";
                    }else if($data['dia_guardia'] == 5){
                        echo "Viernes";
                    }else if($data['dia_guardia'] == 6){
                        echo "Sabado";
                    }else if($data['dia_guardia'] == 7){
                        echo "Domingo";
                    }
                    ?> 
                </td>
                <td><?php echo $data['hr_guardia'] ?> </td>
                <td><?php echo $data['rol_guardia'] ?> </td>
          
                <td> 
                  <a data-toggle="modal" href="#modal_editar_guardia"  class="btn btn-primary btn-rounded" 
                    onclick='editar_guardia(
                    "<?php echo $data["id_guardia"];?>",
                    "<?php echo $data["id_departamento"];?>",
                    "<?php echo $data["dia_guardia"];?>",
                    "<?php echo $data["hr_guardia"];?>",
                    "<?php echo $data["rol_guardia"];?>"
                    )'>Modificar</a>  
                  <a onclick="return confirm('Estás seguro que deseas eliminar la guardia de  <?php echo $data['nombre_empleado'] ?> <?php echo $data['apellido_paterno'] ?> <?php echo $data['apellido_materno'] ?>');"href="../base_datos/eliminar/eliminar_guardia.php?id=<?php echo $data['id_guardia'] ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
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
    function editar_guardia(id_guardia,id_departamento,dia_guardia,hr_guardia,rol_guardia)
    { 
      console.log(id_guardia+' '+id_departamento+' '+dia_guardia+' '+hr_guardia+' '+rol_guardia)
    document.getElementById('id_guardia_editar').value = id_guardia;
    document.getElementById('id_departamento_editar').value = id_departamento;
    document.getElementById('dia_guardia_editar').value = dia_guardia;
    document.getElementById('hr_guardia_editar').value = hr_guardia;
    document.getElementById('rol_guardia_editar').value = rol_guardia;
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

<?php

    }else if($_SESSION['rol'] == 2){
      header('location: ../user/guardia.php');
    }
    include "../header/header2_admin.php"; 
?>
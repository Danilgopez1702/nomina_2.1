<?php 
  session_start();
  if($_SESSION['rol'] == NULL){
    header('location: ../../index.php');
  }else if ($_SESSION['rol'] == 2) {
    include_once "../header/header_user.php"; 
    require("../base_datos/conexion/conexion.php");
    include "../modal/agregar/agregar_empleados.php";
    include "../modal/editar/modal_editar_empleados_user.php";
?>  
<div class="col-md-5 col-xl-11 grid-margin stretch-card" style="top: 20px;">
    <div class="col-md-10 grid-margin stretch-card">
      <h2 class="card-title">Empleados Activos</h2> 
    </div> 
    <form>
      <input type="text" id="buscar" name="buscar" class="form-control" style="border-radius: 15px;" placeholder="Buscar Empleados">
    </form> 
  </div>
  <div style="left: 20px;">
    <a data-toggle="modal" href="#modal_agregar_empleados" class="btn btn-primary" style="border-radius: 15px;">Agregar empleado</a>  
  </div>  
  <div class="container-fluid py-4">
    <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <th> ID </th>
          <th> Foto </th>
          <th> Nombre</th>
          <th> Fecha de Ingreso </th>
          <th> Departamento </th>
          <th> Acciones </th>
        </thead>
        <tbody id="myTable">
          <?php
            $query = mysqli_query($conexion, "SELECT * FROM empleados AS e LEFT JOIN  departamento AS d ON e.id_departamento = d.id_departamento WHERE status = 1   ");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                  <td><?php echo $data['id_empleado'] ?></td>
                  <td>
                    <img src="<?php echo $data['foto'] ?>" alt="image" class="rounded-circle"/> 
                  </td>
                  <td><a  href="caratula.php?id=<?php echo $data['id_empleado'];?>#tab1"><?php echo $data['nombre_empleado'] . " " . $data['apellido_paterno'] . " " . $data['apellido_materno'] ?></a> </td>
                  <td><?php echo $data['fecha_ingreso'] ?></td>
                  <td><?php $y=$data['sueldo_mensual']; $x =number_format($y, 2, '.', ',');  echo $x; ?></td>
                  <td><?php $n=$data['sueldo_diario']; $m =number_format($n, 2, '.', ',' );  echo $m; ?></td>
                  <td><?php echo $data['nombre_departamento'] ?></td>
                  <td><a data-toggle="modal" href="#modal_editar_empleados" class="btn btn-primary" style="border-radius: 15px;" onclick='editar_empleado(
                    "<?php echo $data["dni"];?>", 
                    "<?php echo $data["foto"];?>", 
                    "<?php echo $data["id_empleado"];?>", 
                    "<?php echo $data["nombre_empleado"];?>",
                    "<?php echo $data["apellido_paterno"];?>",
                    "<?php echo $data["apellido_materno"];?>",

                    "<?php echo $data["estado"];?>",
                    "<?php echo $data["municipio"];?>",
                    "<?php echo $data["cp"];?>",
                    "<?php echo $data["fraccionamiento"];?>",
                    "<?php echo $data["calle"];?>",
                    "<?php echo $data["numero_ext"];?>",
                    "<?php echo $data["numero_int"];?>",
                    "<?php echo $data["telefono"];?>",
                    "<?php echo $data["estado_civil"];?>",
                    "<?php echo $data["f_nacimineto"];?>",

                    "<?php echo $data["banco"];?>",
                    "<?php echo $data["no_cuenta"];?>",
                    "<?php echo $data["fecha_ingreso"];?>",
                    "<?php echo $data["nombre_departamento"];?>",
                    "<?php echo $data["turno_departamento"];?>",
                    "<?php echo $data["frecuencia_pago"];?>",
                    "<?php echo $data["modalidad_vacacion"];?>",
                    "<?php echo $data["h_lv"];?>",
                    "<?php echo $data["h_s"];?>",
                    "<?php echo $data["h_d"];?>"
                    )'>Editar</a> 
                  <a href="../base_datos/eliminar/eliminar_empleado.php?id=<?php echo $data['id_empleado'] ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
                  <a href="../fpdf/renuncia.php?id=<?php echo $data['id_empleado'] ?> " class="btn btn-warning" style="border-radius:20px" target="_blank">Carta de renuncia </a></td>
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
       function editar_empleado(dni,foto,id_empleado,nombre_empleado,apellido_paterno,apellido_materno,estado,municipio,cp,fraccionamiento,calle,numero_ext,numero_int,telefono,estado_civil,f_nacimineto,banco,no_cuenta,fecha_ingreso,nombre_departamento,turno_departamento,frecuencia_pago,modalidad,h_lv,h_s,h_d)
    {   

    document.getElementById("foto_editar").src= foto              
    document.getElementById('dni_editar').value = dni
    document.getElementById('id_empleado_editar').value = id_empleado
    document.getElementById('nombre_editar').value = nombre_empleado
    document.getElementById('ap_editar').value = apellido_paterno
    document.getElementById('am_editar').value = apellido_materno
    document.getElementById('estado_editar').value = estado
    document.getElementById('municipio_editar').value = municipio
    document.getElementById('cp_editar').value = cp
    document.getElementById('fraccionamiento_editar').value = fraccionamiento
    document.getElementById('calle_editar').value = calle
    document.getElementById('numero_ext_editar').value = numero_ext
    document.getElementById('numero_int_editar').value = numero_int
    document.getElementById('telefono_editar').value = telefono
    document.getElementById('estado_civil_editar').value = estado_civil
    document.getElementById('f_nacimineto_editar').value = f_nacimineto
    document.getElementById('banco_editar').value = banco
    document.getElementById('num_cuenta_editar').value = no_cuenta
    document.getElementById('fecha_editar').value = fecha_ingreso
    document.getElementById('dep_editar').value = nombre_departamento
    document.getElementById('turno_editar').value = turno_departamento
    document.getElementById('fp_editar').value = frecuencia_pago
    document.getElementById('mc_editar').value = modalidad
    document.getElementById('lv_editar').value = h_lv
    document.getElementById('sabado_editar').value = h_s
    document.getElementById('domingo_editar').value = h_d

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
}else if($_SESSION['rol'] == 1){
  header('location: ../user/empleados_activos.php');
}
    include_once "../header/header2_user.php"; 
?>
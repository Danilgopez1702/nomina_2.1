<?php 
  session_start();
  if($_SESSION['rol'] == NULL){
    header('location: ../../index.php');
  }else if ($_SESSION['rol'] == 1) {
    include_once "../header/header_admin.php"; 
    require("../base_datos/conexion/conexion.php");
    include "../modal/agregar/agregar_usuarios.php";
    include "../modal/editar/editar_usuarios.php";
?> 

  <div class="col-md-12 col-xl-12 grid-margin stretch-card">
    <div class="col-md-10 grid-margin stretch-card">
      <h2 class="card-title" style="color:black ;">Usuarios</h2> 
    </div> 
     
    <form>
      <input type="text" id="buscar" name="buscar" class="form-control" style="border-radius: 15px;" placeholder="Buscar Usuarios">
    </form>   
  </div>
  <div style="left: 20px;">
      <a data-toggle="modal" href="#modal_agregar_usuarios" class="btn btn-primary" style="border-radius: 15px;">Agregar usuario</a>  
    </div>
  <div class="container-fluid py-4">
    <div class="table-responsive">
      <table class="table" id="table">
        <thead>
          <tr>
            <th> Nombre </th>
            <th> Contraseña </th>
            <th> Rol </th>
            <th> Acciones </th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
            $query = mysqli_query($conexion, "SELECT * FROM usuarios");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) { ?>
                <tr>
                <td><?php echo $data['nombre'] ?> </td>
                <td><?php echo $data['contra'] ?> </td>
                <td><?php if ($data['rol'] == '1'){
                  echo "Administrador";}
                  else if ($data['rol'] == '2'){
                    echo  "Usuario";} 
                 ?> </td>
          
                <td> 
                  <a data-toggle="modal" href="#modal_editar_usuarios"  class="btn btn-primary btn-rounded" 
                    onclick='editar_usuario(
                    "<?php echo $data["id_usuario"];?>", 
                    "<?php echo $data["nombre"];?>",
                    "<?php echo $data["contra"];?>",
                    "<?php echo $data["rol"];?>"
                    )'>Modificar</a>  
                  <a onclick="return confirm('Estás seguro que deseas eliminar a <?php echo $data['nombre'];?>');" href="../base_datos/eliminar/eliminar_usuario.php?id=<?php echo $data['id_usuario'] ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
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
    function editar_usuario(id_usuario,nombre,pass,rol)
    {   
    document.getElementById('editar_id_usuario').value = id_usuario;
    document.getElementById('editar_nombre').value = nombre;
    document.getElementById('editar_pass').value = pass;
    document.getElementById('editar_rol').value = rol;
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
  header('location: ../user/usuarios.php');
}
    include_once "../header/header2_admin.php"; 
?>
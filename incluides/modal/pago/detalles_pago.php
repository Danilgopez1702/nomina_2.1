<?php

  include_once("../../base_datos/conexion/conexion.php");
  $id = $_GET['id'];

?>

  <div class="table-responsive table-striped">
    <table class="table " id="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Fecha de falta</th>
          <th>Comentarios</th>
        </tr>
      </thead>
        <tbody>
          <?php

            $tabla = mysqli_query($conexion, "SELECT * FROM asistencia WHERE id_empleado = $id AND status_asistencia = 1");
            $contador = mysqli_num_rows($tabla);

            if ($contador > 0) {

              while ($data = mysqli_fetch_assoc($tabla)) { 
          ?>                                        
          <tr>
            <td><?php echo $data['id_empleado']; ?></td>
            <td><?php echo $data['fecha_asistencia']; ?></td>
            <td><?php echo $data['comentario_asistencia']; ?></td>
          </tr>
          <?php

              }
            } 
          ?>                                
        </tbody>
    </table>
  </div>
  <center>
    <h4>Vacaciones</h4>
  </center>
  <div class="table-responsive table-striped">
      <table class="table " id="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha de vacaciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $tabla = mysqli_query($conexion, "SELECT * FROM vacaciones WHERE id_empleado = $id AND status_vacaciones = 1");
            $contador = mysqli_num_rows($tabla);
            if ($contador > 0) {
              while ($data = mysqli_fetch_assoc($tabla)) { 
          ?>                                        
          <tr>
            <td><?php echo $data['id_empleado']; ?></td>
            <td><?php echo $data['fecha_vacacion']; ?></td>
          </tr>
          <?php 
              }
            } 
          ?>                                
        </tbody>
      </table>
    </div>
  <center>
    <h4>Prestamos</h4>
  </center>
  <div class="table-responsive table-striped">
      <table class="table " id="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha de prestamo</th>
            <th>Monto</th>
            <th>Comentario</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $tabla = mysqli_query($conexion, "SELECT * FROM prestamo WHERE id_empleado = $id AND status_prestamo = 1");
            $contador = mysqli_num_rows($tabla);
            if ($contador > 0) {
              while ($data = mysqli_fetch_assoc($tabla)) { 
          ?>                                        
          <tr>
            <td><?php echo $data['id_empleado']; ?></td>
            <td><?php echo $data['fecha_prestamo']; ?></td>
            <td><?php  $y=$data['monto_prestamo']; $x =number_format($y, 2, '.', ',');  echo $x;?></td>
            <td><?php echo $data['comentario_prestamo']; ?></td>
          </tr>
          <?php 
              }
            } 
          ?>                                
        </tbody>
      </table>
    </div>
  <center>
    <h4>Horas extraordinarias</h4>
  </center>
      <div class="table-responsive table-striped">
      <table class="table " id="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Horas extraordinarias</th>
            <th>Razon</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $tabla = mysqli_query($conexion, "SELECT * FROM horas_extras WHERE id_empleado = $id AND status_extras = 1");
            $contador = mysqli_num_rows($tabla);
            if ($contador > 0) {
              while ($data = mysqli_fetch_assoc($tabla)) { 
          ?>                                        
          <tr>
           <td><?php echo $data3['id_empleado']; ?></td>
           <td><?php echo $data3['horas_extras']; ?></td>
           <td><?php echo $data3['comentario_extra']; ?></td> 
          </tr>
          <?php 
              }
            } 
          ?>                                
        </tbody>
      </table>
    </div>
  <center>
    <h4>Otros</h4>
  </center>
    <div class="table-responsive table-striped">
      <table class="table " id="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Monto</th>
            <th>Razon</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $tabla = mysqli_query($conexion, "SELECT * FROM otros WHERE id_empleado = $id AND status_otros = 1");
            $contador = mysqli_num_rows($tabla);
            if ($contador > 0) {
              while ($data = mysqli_fetch_assoc($tabla)) { 
          ?>                                        
          <tr>
           <td><?php echo $data3['id_empleado']; ?></td>
           <td><?php echo $data3['monto_otros']; ?></td>
           <td><?php  $y=$data3['comentario_otros']; $x =number_format($y, 2, '.', ',');  echo $x;?></td>
          </tr>
          <?php 
              }
            } 
          ?>                                
        </tbody>
      </table>
    </div>
  <div class="container"></div>
    <div class="modal-body">
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
        </div>
    </div>

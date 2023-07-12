<div class="modal" id="modal_agregar_usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Guardia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
              <form class="forms-sample" method='post' action='../base_datos/subir/add_guardia.php' enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-md-12">
                      <div class="row-md-12">
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Empleado <span class="require">*</span></label>
                          <div class="col-sm-10">
                            <select class="form-control" id="empleado" name="empleado" required="" style="border-radius: 5px;">
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
                        </div>
                      </div>
                      <div class="row-md-12">
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Departamento <span class="require">*</span></label>
                          <div class="col-sm-10">
                              <select class="form-control" id="dep" name="dep" required="" style="color: black; border-radius: 5px;">
                                <?php
                                  $query = mysqli_query($conexion, "SELECT * FROM departamento");
                                  $result = mysqli_num_rows($query);
                                  if ($result > 0) {
                                    while ($data = mysqli_fetch_assoc($query)) { 
                                      if($data['turno_departamento'] == 1){
                                        $turno = 'MATUTINO';
                                      }else{
                                        $turno = 'NOCTURNO';
                                      }
                                      ?>
                                        <option value = "<?php echo $data['id_departamento']; ?>" ><?php echo $data['nombre_departamento']; ?> &nbsp;&nbsp; Turno: &nbsp; <?php echo $turno ?></option>
                                      <?php 
                                    }
                                  }
                                ?>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="row-md-12">
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Dia de Guardia <span class="require">*</span></label>
                          <div class="col-sm-10">
                            <select class="form-control" id="dia" name="dia" required="" style="border-radius: 5px;">
                              <option value = '1'>Lunes</option> 
                              <option value = '2'>Martes</option>
                              <option value = '3'>Miercoles</option>
                              <option value = '4'>Jueves</option>
                              <option value = '5'>Viernes</option>
                              <option value = '6'>Sabado</option>
                              <option value = '7'>Domingo</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row-md-12">
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Hora de Entrada de la Guardia <span class="require">*</span></label>
                          <div class="col-sm-10">
                            <select class="form-control" id="hr" name="hr" required="" style="border-radius: 5px;">
                              <?php
                                  for($x = 1; $x <24 ; $x++){
                                    ?>
                                      <option value="<?php echo $x.":00"; ?>"><?php echo $x; ?>:00 hrs</option>
                                    <?php 
                                  } 
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row-md-12">
                        <div class="form-group row">
                          <label class="col-sm-8 col-form-label">Numero de acomodo <span class="require">*</span></label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="aco" name="aco" required="" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary submitBtn">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


</script>



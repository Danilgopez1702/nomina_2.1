<div class="modal" id="modal_agregar_usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='post' action='../base_datos/subir/add_usuario.php' enctype="multipart/form-data">
                      <div class="form-group row">
                      <div class="col-md-12">
                        <p class="card-description" align="center"> Informacion Personal </p>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Nombre <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nombre" name="nombre" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Contraseña <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="pass" name="pass" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">ROL <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="rol" name="rol" required >
                                <option value = '1'>Admin</option> 
                                <option value = '2'>User</option>
                              </select>
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



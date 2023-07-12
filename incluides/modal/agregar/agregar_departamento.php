<div class="modal" id="modal_agregar_departamento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Departamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='post' action='../base_datos/subir/add_departamento.php' enctype="multipart/form-data">
                      <div class="form-group row">
                      <div class="col-md-12">
                        <p class="card-description" align="center"> Informacion  </p>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Nombre Departamento <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" required="" />
                            </div>
                          </div>
                        </div>
                        
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Turno Departamento <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="turno_departamento" name="turno_departamento" required >
                                <option value = '1'>Matutino</option> 
                                <option value = '2'>Nocturno</option>
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

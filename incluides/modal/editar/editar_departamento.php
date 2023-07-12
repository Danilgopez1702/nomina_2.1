<div class="modal" id="modal_editar_departamento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Departamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='post' action='../base_datos/editar/editar_departamento.php' enctype="multipart/form-data">
                      <div class="form-group row">
                      <div class="col-md-12">
                        <p class="card-description" align="center"> Informacion  </p>

                              <input type="hidden" class="form-control" id="editar_id_departamento" name="editar_id_departamento" required=""  />

                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Nombre Departamento <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_nombre" name="editar_nombre" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Turno Departamento <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="editar_turno" name="editar_turno" required >
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

    <div class="modal" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">2nd Modal title</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="container"></div>
                <div class="modal-body">
                    <p>
                        Content for the dialog / modal goes here. Content for the dialog / modal goes here. Content for the dialog / modal goes here. Content for the dialog / modal goes here. Content for the dialog / modal goes here.
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn">Close</a>
                    <a href="#" class="btn btn-primary">Save changes</a>
                </div>
            </div>
        </div>
    </div>
</div>
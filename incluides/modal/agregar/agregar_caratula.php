<!--modal faltas-->
    <div class="modal" id="modal_agregar_faltas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nueva Falta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action="../base_datos/subir/add_faltas.php?id= <?php echo $result['id_empleado']; ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Dia Faltado<span class="require">*</span></label>
                                            <div class="col-sm-10">
                                            <input center type="date" name="falta" id="falta" stylerequired style="border-radius:15px;" class="form-control" require>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Comentario<span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="com" name="com" style="border-radius:15px;" required />
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
        </div>
    </div>

<!--modal Vacaciones-->
    <div class="modal" id="modal_agregar_vacaciones">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nueva Vacacion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action="../base_datos/subir/add_vacacion.php?id= <?php echo $result['id_empleado']; ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Fecha de Inicio <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input center type="date" name="fecha_i" id="fecha_i" stylerequired style="border-radius:15px;" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Fecha de Termino <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input center type="date" name="fecha_f" id="fecha_f" stylerequired style="border-radius:15px;" class="form-control">
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
        </div>
    </div>

<!--modal Prestamos-->
    <div class="modal" id="modal_agregar_prestamos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Prestamo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action='../base_datos/subir/add_prestamo.php' enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Fecha del Prestamo <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input center type="date" name="fecha_p" id="fecha_p" required style="border-radius:15px;" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Monto <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="monto" name="monto" style="border-radius:15px;" required="" />
                                            </div>
                                        </div>
                                    </div>
                                <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Plazo <span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="plazo" name="plazo" style="border-radius:15px;" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Comentario <span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="com" name="com" style="border-radius:15px;" required="" />  
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
        </div>
    </div>

<!--modal Infonavit-->
    <div class="modal" id="modal_agregar_infonavit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Infonavit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action='../base_datos/subir/add_infonavit.php' enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Monto <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="monto" name="monto" style="border-radius:15px;" required=""  />
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
        </div>
    </div>

<!--modal Horas Extraordinarias-->
    <div class="modal" id="modal_agregar_horas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevas Horas Extraordinarias</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action='../base_datos/subir/add_extras.php' enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Horas Extraordinarias <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="extras" name="extras" style="border-radius:15px;" required=""  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Comentario <span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="com" name="com" style="border-radius:15px;" required=""  />
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
        </div>
    </div>

<!--modal Otros-->
    <div class="modal" id="modal_agregar_otros">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Otros</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action='../base_datos/subir/add_otros.php' enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required=""  />    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Monto <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="monto" name="monto" style="border-radius:15px;" required=""  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Razon <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="com" name="com" style="border-radius:15px;" required=""  />
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
        </div>
    </div>
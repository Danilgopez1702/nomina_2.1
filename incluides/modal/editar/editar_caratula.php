<!--modal faltas-->
    <div class="modal" id="modal_editar_faltas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Falta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action="../base_datos/editar/editar_faltas.php?id= <?php echo $id; ?>" enctype="multipart/form-data">
                            <input  hidden class="form-control" id="id_asistencia" name="id_asistencia" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Dia Faltado<span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input center type="date" name="fecha_asistencia" id="fecha_asistencia" stylerequired style="border-radius:15px;" class="form-control" require>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Tipo de Falta<span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tipo_asistencia" name="tipo_asistencia" style="border-radius:15px;" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Hora de la Falta<span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="hora_asistencia" name="hora_asistencia" style="border-radius:15px;" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Comentario<span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="comentario_asistencia" name="comentario_asistencia" style="border-radius:15px;" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Status del Prestamo <span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="status_asistencia" name="status_asistencia" required="" style=" border-radius:15px;">
                                                <option value = '1'>Activo</option>
                                                <option value = '2'>Historico</option>
                                            </select>
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
    <div class="modal" id="modal_editar_vacaciones">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Vacacion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action="../base_datos/editar/editar_vacaciones.php?id= <?php echo $result['id_empleado']; ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id_vacaciones" name="id_vacaciones" value="<?php echo $id; ?>" required=""  />
                            <input type="hidden" class="form-control" id="mandar_inicio_v" name="mandar_inicio_v" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Fecha de Inicio <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input center type="date" name="fecha_inicio_v" id="fecha_inicio_v" stylerequired style="border-radius:15px;" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Fecha de Termino <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input center type="date" name="fecha_fin_v" id="fecha_fin_v" stylerequired style="border-radius:15px;" class="form-control">
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
    <div class="modal" id="modal_editar_prestamos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Prestamo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action="../base_datos/editar/editar_prestamos.php?id= <?php echo $result['id_empleado']; ?>"  enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id_prestamo" name="id_prestamo" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Fecha del Prestamo <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input center type="date" name="fecha_prestamo" id="fecha_prestamo" stylerequired style="border-radius:15px;" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Monto del Prestamo<span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="monto_prestamo" name="monto_prestamo" style="border-radius:15px;" required="" />
                                            </div>
                                        </div>
                                    </div>
                                <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Plazo Total<span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="plazo_prestamo" name="plazo_prestamo" style="border-radius:15px;" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Plazo Actual<span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="plazo_actual_prestamo" name="plazo_actual_prestamo" style="border-radius:15px;" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Comentario <span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="comentario_prestamo" name="comentario_prestamo" style="border-radius:15px;" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Status del Prestamo <span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="status_prestamo" name="status_prestamo" required="" style=" border-radius:15px;">
                                                <option value = '1'>Activo</option>
                                                <option value = '2'>Historico</option>
                                            </select>
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
    <div class="modal" id="modal_editar_infonavit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Infonavit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action="../base_datos/editar/editar_infonavit.php?id= <?php echo $result['id_empleado']; ?>"" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id_infonavit" name="id_infonavit" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Monto de Infonavit<span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="monto_infonavit" name="monto_infonavit" style="border-radius:15px;" required=""  />
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
    <div class="modal" id="modal_editar_extras">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Horas Extraordinarias</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action="../base_datos/editar/editar_extras.php?id= <?php echo $result['id_empleado']; ?>" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id_extra" name="id_extra" value="<?php echo $id; ?>" required=""  />
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Horas Extraordinarias <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="horas_extras" name="horas_extras" style="border-radius:15px;" required=""  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Comentario <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="comentario_extra" name="comentario_extra" style="border-radius:15px;" required=""  />
                                            </div>
                                    </div>
                                    <div class="row-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Status del Prestamo <span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="status_extras" name="status_extras" required="" style=" border-radius:15px;">
                                                <option value = '1'>Activo</option>
                                                <option value = '2'>Historico</option>
                                            </select>
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
        </div>
    </div>

<!--modal Otros-->
    <div class="modal" id="modal_editar_otros">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Otros</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
                </div>
                <div class="container"></div>
                    <div class="modal-body">
                        <form class="forms-sample" method='post' action="../base_datos/editar/editar_otros.php?id= <?php echo $result['id_empleado']; ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id_otros" name="id_otros" value="<?php echo $id; ?>" required=""  />    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Monto <span class="require">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="monto_otros" name="monto_otros" style="border-radius:15px;" required=""  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-8 col-form-label">Razon <span class="require">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="comentario_otros" name="comentario_otros" style="border-radius:15px;" required=""  />
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-8 col-form-label">Status del Prestamo <span class="require">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="status_otros" name="status_otros" required="" style=" border-radius:15px;">
                                                <option value = '1'>Activo</option>
                                                <option value = '2'>Historico</option>
                                            </select>
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
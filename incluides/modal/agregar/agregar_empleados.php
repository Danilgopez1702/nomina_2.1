<div class="modal" id="modal_agregar_empleados">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='post' action='../base_datos/subir/add_empleado.php' enctype="multipart/form-data">
                    <div class="form-group row">
                      <div class="col-sm-4" style="padding-left: 100px;">
                        <div class="col-sm-9">
                          <div class="form-group row">
                            <input type="file" id="files" name="files" required="">
                            <span class="require">*</span>
                            <output id="list"></output>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <p class="card-description" align="center"> Informacion Personal </p>

                        <div class="form-group row">

                        <div class="col-sm-6">

                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID de empleado <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="id_empleado" name="id_empleado" required minlength="10" maxlength="10" size="10"/>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre(s) <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="nombre" name="nombre" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Apellido Paterno*</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="ap" name="ap" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Apellido Materno*</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="am" name="am" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Estado <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="estado" name="estado" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Municipio <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="municipio" name="municipio" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Codigo Postal <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="cp" name="cp" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fraccionamiento <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="fraccionamiento" name="fraccionamiento" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Calle <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="calle" name="calle" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Numero Ext<span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="numero_ext" name="numero_ext" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Numero Int<span class="require"></span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="numero_int" name="numero_int" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telefono <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="telefono" name="telefono" required minlength="10" maxlength="10" size="10" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Estado Civil<span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="estado_civil" name="estado_civil" required >
                                <option value="1">SOLTERO</option>
                                <option value="2">CASADO</option>
                                <option value="3">OTROS</option>
                              </select> 
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha de Nacimiento<span class="require">*</span></label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" placeholder="dd/mm/aaaa" id="f_nacimineto" name="f_nacimineto" required="" />
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-sm-6">
                        <div class="row-md-6">
                          <div class="form-group row" >
                            <label class="col-sm-3 col-form-label">Nombre Banco <span class="require"  >*</span></label>
                            <div class="col-sm-8" >
                              <select class="form-control" id="banco" name="banco" required style="color: black;" >
                                <?php
                                    $query = mysqli_query($conexion, "SELECT * FROM bancos");
                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) { 
                                        ?>
                                            <option value = "<?php echo $data['numero']; ?>"><?php echo $data['nombre'] ; ?></option>
                                        <?php 
                                        }
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No. de cuenta <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="num_cuenta" name="num_cuenta" required minlength="18" maxlength="18" size="18" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No. de cuenta <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="vales" name="vales" required minlength="18" maxlength="18" size="18" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Departamento <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="dep" name="dep" required="" style="color: black;">
                                <?php
                                    $query = mysqli_query($conexion, "SELECT * FROM departamento");
                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) { 
                                        ?>
                                            <option><?php echo $data['nombre_departamento']; ?></option>
                                        <?php 
                                        }
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Turno <span class="require">*</span></label>
                            <div class="col-sm-8">
                            <select class="form-control" id="turno" name="turno" required="" onchange = 'turno1();' style="color: black;">
                              <option value = 1> Matutino </option>
                              <option value = 2> Nocturno </option>
                            </select>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sueldo Mensual <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="sm" name="sm" required="" onblur='salario();' />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sueldo Semanal <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="ss" name="ss" required="" onblur='salario_semanal();' />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sueldo Diario <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="sd" name="sd" required="" disabled readonly style="background: #2A3038;" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha de ingreso*</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" placeholder="dd/mm/aaaa" id="fecha" name="fecha" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Frecuencia de pago <span class="require">*</span></label>
                            <div class="col-sm-8">
                             <select class="form-control" id="fp" name="fp" required="" style="color: black;">
                                <option value="7">Semanal</option>
                                <option value="14">Catorcenal</option>
                              </select> 
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Modalidad de contrato <span class="require">*</span></label>
                            <div class="col-sm-8">
                             <select class="form-control" id="mc" name="mc" required >
                                <option value="1">Antigüo</option>
                                <option value="2">Nuevo</option>
                              </select> 
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6" align="center">
                            <label class="col-form-label" >HORARIO DE ENTRADA<span class="require"></span></label>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lunes a Viernes <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="lv" name="lv" required >
                                <?php
                                for($x = 1; $x <24 ; $x++){
                                if($x <10){
                                ?>
                                    <option value="<?php echo "0".$x.":00"; ?>"><?php echo "0".$x; ?>:00 hrs</option>
                                <?php }else{ ?>
                                    <option value="<?php echo $x.":00"; ?>"><?php echo $x; ?>:00 hrs</option>
                                 <?php } } ?>
                                <option value="23:55">24:00 hrs</option>
                              </select> 
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sabado <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="sabado" name="sabado" required >
                                <option value="50">DESCANSO </option>
                                <?php
                                for($x = 1; $x <24 ; $x++){
                                if($x <10){
                                ?>
                                    <option value="<?php echo "0".$x.":00"; ?>"><?php echo "0".$x; ?>:00 hrs</option>
                                <?php }else{ ?>
                                    <option value="<?php echo $x.":00"; ?>"><?php echo $x; ?>:00 hrs</option>
                                 <?php } } ?>
                                <option value="23:55">24:00 hrs</option>
                              </select> 
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Domingo <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="domingo" name="domingo" required >
                                <option value="50">DESCANSO </option>
                                <?php
                                for($x = 1; $x <24 ; $x++){
                                if($x <10){
                                ?>
                                    <option value="<?php echo "0".$x.":00"; ?>"><?php echo "0".$x; ?>:00 hrs</option>
                                <?php }else{ ?>
                                    <option value="<?php echo $x.":00"; ?>"><?php echo $x; ?>:00 hrs</option>
                                 <?php } } ?>
                                <option value="23:55">24:00 hrs</option>
                              </select> 
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6"  style="display:none;" id = "especial">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Descanso Especial <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="descanzo_e" name="descanzo_e" required >
                                <option value="1">LUNES </option>
                                <option value="2">MARTES </option>
                                <option value="3">MIERCOLES </option>
                                <option value="4">JUEVES </option>
                                <option value="5">VIERNES </option>
                              </select> 
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Checa <span class="require">*</span></label>
                            <div class="col-sm-8">
                            <select class="form-control" id="checador" name="checador" required >
                                <option value="1">No Checa </option>
                                <option value="2">Checa en Oficina</option>
                                <option value="3">Checa en Almacen </option>
                              </select>
                            </div>
                          </div>
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
<script>

function archivo(evt) {
  
var files = evt.target.files; // FileList object
       
//Obtenemos la imagen del campo "file". 
  for (var i = 0, f; f = files[i]; i++) {         
//Solo admitimos imágenes.
    if (!f.type.match('image.*')) {
        continue;
    }
       
var reader = new FileReader();
           
reader.onload = (function(theFile) {
return function(e) {
//Creamos la imagen.
document.getElementById("list").innerHTML = ['<img id="foto" class="img-fluid" style="height:600px;width:600px;padding-top:60px;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 reader.readAsDataURL(f);
       }
}
           
document.getElementById('files').addEventListener('change', archivo, false);


function salario(){
diario = (document.getElementById('sm').value) / 30.4
document.getElementById('sd').value = diario.toFixed(2);
semanal = ((document.getElementById('sm').value) / 30.4) * 7
document.getElementById('ss').value = semanal.toFixed(2);

}

function turno1(){
  var turno =  document.getElementById('turno').value;
  if(turno == 2){

    document.getElementById("especial").style.display = "block";
  }else{
    document.getElementById("especial").style.display = "none";
    document.getElementById('descanzo_e').value = null;


  }

}
function salario_semanal(){

diario = (document.getElementById('ss').value) / 7
document.getElementById('sd').value = diario.toFixed(2);

mensual = ((document.getElementById('ss').value) / 7) * 30.4;
document.getElementById('sm').value = mensual.toFixed(2);

}



</script>



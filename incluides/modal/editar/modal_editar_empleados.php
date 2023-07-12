<div class="modal" id="modal_editar_empleados">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='post' action='../base_datos/editar/editar_empleado.php' enctype="multipart/form-data">
                    <div class="form-group row">
                      <div class="col-sm-4" style="padding-left: 100px;">
                        <div class="col-sm-9">
                          <div class="form-group row">
                            <input type="file" id="files_editar" name="files_editar" >
                            <span class="require">*</span>
                            <output id="list_editar"></output>
                            <img id="foto_editar" class="img-fluid" style="height:500px;width:500px;padding-top:60px;" src="" />
                          </div>
                        </div>  
                      </div>
                      <div class="col-sm-8">
                        <p class="card-description" align="center"> Informacion Personal </p>
                        <div class="form-group row">

                        <div class="col-sm-6">


                        <div class="row-md-6">
                          <div class="form-group row">
                            
                              <input hidden type="text" class="form-control" id="dni_editar" name="dni_editar" required="" />
                            
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">id del empleado <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="id_empleado_editar" name="id_empleado_editar" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre(s) <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="nombre_editar" name="nombre_editar" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Apellido Paterno*</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="ap_editar" name="ap_editar" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Apellido Materno*</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="am_editar" name="am_editar" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Estado <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="estado_editar" name="estado_editar" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Municipio <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="municipio_editar" name="municipio_editar" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Codigo Postal <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="cp_editar" name="cp_editar" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fraccionamiento <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="fraccionamiento_editar" name="fraccionamiento_editar" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Calle <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="calle_editar" name="calle_editar" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Numero Ext<span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="numero_ext_editar" name="numero_ext_editar" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Numero Int<span class="require"></span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="numero_int_editar" name="numero_int_editar" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telefono <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="telefono_editar" name="telefono_editar" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Estado Civil<span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="estado_civil_editar" name="estado_civil_editar" required >
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
                            <input type="date" class="form-control" placeholder="dd/mm/aaaa" id="f_nacimineto_editar" name="f_nacimineto_editar" required="" />
                            </div>
                          </div>
                        </div>
                        
                      </div>  
                      <div class="col-sm-6">
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nombre Banco <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="banco_editar" name="banco_editar" required >
                                <?php
                                    $query = mysqli_query($conexion, "SELECT * FROM bancos");
                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_assoc($query)) { 
                                        ?>
                                            <option value = "<?php echo $data['numero']; ?>"><?php echo $data['nombre']; ?></option>
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
                            <label class="col-sm-3 col-form-label">No. de Cuenta <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="num_cuenta_editar" name="num_cuenta_editar" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tarjeta de Vales<span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="vales_editar" name="vales_editar" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Departamento <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="dep_editar" name="dep_editar" required >
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
                              <select class="form-control" id="turno_editar" name="turno_editar" required  onchange = 'turno1_editar();'>
                                <option value= "1"> Matutino </option>
                                <option value= "2"> Nocturno </option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sueldo Mensual <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="sm_editar" name="sm_editar" required="" onblur='salario_editar();' />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sueldo semanal <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="ss_editar" name="ss_editar" required=""  onblur='salario_semanal_editar();'/>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sueldo Diario <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="sd_editar" name="sd_editar" required="" disabled readonly style="background: #2A3038;" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha de ingreso*</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" placeholder="dd/mm/aaaa" id="fecha_editar" name="fecha_editar" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Frecuencia de pago <span class="require">*</span></label>
                            <div class="col-sm-8">
                             <select class="form-control" id="fp_editar" name="fp_editar" required >
                                <option value="7">Semanal</option>
                                <option value="14">Catorcenal</option>
                              </select> 
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">modalidad de contrato <span class="require">*</span></label>
                            <div class="col-sm-8">
                             <select class="form-control" id="mc_editar" name="mc_editar" required >
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
                              <select class="form-control" id="lv_editar" name="lv_editar" required >
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
                              <select class="form-control" id="sabado_editar" name="sabado_editar" required >
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
                              <select class="form-control" id="domingo_editar" name="domingo_editar" required >
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
                        <div class="row-md-6" style="display:block;" id = "especial_editar">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Descanso Especial <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <select class="form-control" id="descanzo_e_editar" name="descanzo_e_editar" required >
                                <option value="1">LUNES </option>
                                <option value="2">MARTES </option>
                                <option value="3">MIERCOLES </option>
                                <option value="4">JUEVES </option>
                                <option value="5">VIERNES </option>
                              </select> 
                            </div>
                          </div>
                        </div>
                                </br>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Checa <span class="require">*</span></label>
                            <div class="col-sm-8">
                            <select class="form-control" id="checador_editar" name="checador_editar" required >
                                <option value="1">No Checa </option>
                                <option value="2">Checa en Oficina</option>
                                <option value="3">Checa en Almacen </option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-6">
                          <div class="form-group row">
                            <div class="col-sm-3">
                              <label>
                                <input type="checkbox" onclick = "baja_empleado()" name="baja" id="baja">
                                <span class="checkable">Baja</span>
                              </label>
                            </div> 
                          </div>
                        </div>
                        <div style="display:none;" id = "lfecha_baja" class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha de baja <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" placeholder="dd/mm/aaaa" id="fecha_baja" name="fecha_baja" />
                            </div>
                          </div>
                        </div>
                        <div style="display:none;" id = "lmotivo_baja" class="row-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Motivo de baja <span class="require">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="motivo_baja" name="motivo_baja"  />
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
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script language="javascript">

$(document).ready(function(){
    $("#dep_editar").on('change', function () {
        $("#dep_editar option:selected").each(function () {
            nombre_dep=$(this).val();
            $.post("../jquery/editar_empleado_departamento.php", { nombre_dep: nombre_dep }, function(data){
                $("#turno_editar").html(data);
            });			
        }); 
   });
});

function baja_empleado(){

  var checkbox =  document.getElementById('baja');

  if(checkbox.checked == true){
    document.getElementById("lfecha_baja").style.display = "block";
    document.getElementById("lmotivo_baja").style.display = "block";
    document.getElementById("fecha_baja").required = true;
    document.getElementById("motivo_baja").required = true;
  }else{
    document.getElementById("lfecha_baja").style.display = "none";
    document.getElementById("lmotivo_baja").style.display = "none";
    document.getElementById("fecha_baja").required = false;
    document.getElementById("motivo_baja").required = false;
  } 
} 

function turno1_editar(){
  var turno =  document.getElementById('turno_editar').value;
  if(turno == 2){
    document.getElementById("especial_editar").style.display = "block";
    document.getElementById("descanzo_e_editar").required = true;

  }else{
    document.getElementById("especial_editar").style.display = "none";
    document.getElementById('descanzo_e_editar').value = null;
    document.getElementById("descanzo_e_editar").required = false;


  }

}

function salario_semanal_editar(){

diario = (document.getElementById('ss_editar').value) / 7
document.getElementById('sd_editar').value = diario.toFixed(2);

mensual = ((document.getElementById('ss_editar').value) / 7) * 30.4;
document.getElementById('sm_editar').value = mensual.toFixed(2);

}

function salario_editar(){
diario = (document.getElementById('sm_editar').value) / 30.4
document.getElementById('sd_editar').value = diario.toFixed(2);
semanal = ((document.getElementById('sm_editar').value) / 30.4) * 7
document.getElementById('ss_editar').value = semanal.toFixed(2);

}

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
        document.getElementById("foto_editar").src=  e.target.result;
        document.getElementById("foto_editar").title=   escape(theFile.name);
      };
    })(f);
    reader.readAsDataURL(f);
  }
}
           
document.getElementById('files_editar').addEventListener('change', archivo, false);

</script>
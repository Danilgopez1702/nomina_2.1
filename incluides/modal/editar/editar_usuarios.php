<div class="modal" id="modal_editar_usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='post' action='../base_datos/editar/editar_usuario.php' enctype="multipart/form-data">
                      <div class="form-group row">
                      <div class="col-md-12">
                        <p class="card-description" align="center"> Informacion Personal </p>
                              <input  type="hidden" class="form-control" id="editar_id_usuario" name="editar_id_usuario" required="" hide />
                         
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Nombre <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_nombre" name="editar_nombre" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Contraseña <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_pass" name="editar_pass" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">ROL <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="editar_rol" name="editar_rol" required >
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
document.getElementById("list").innerHTML = ['<img id="foto" class="img-fluid" style="height:500px;width:500px;padding-top:60px;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 reader.readAsDataURL(f);
       }
}
           
document.getElementById('files').addEventListener('change', archivo, false);


function salario(){

document.getElementById('sd').value = (document.getElementById('sm').value) / 30.4;
document.getElementById('sd_editar').value = (document.getElementById('sm_editar').value) / 30.4;

}

</script>



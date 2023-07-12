<?php
include("./conexion/db_connection.php");
include("./header/header.php"); 
    $dia = date( "j");
    $mes = date("m");
    $año = date("Y");

    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $mm = $meses[$mes-1];

    $hoy = $dia ." " . $mm . " " . $año;
?>


                <div class="container">
                    <h3 class="mt-5">Previsualizacion de para Vales</h3>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="da">
                                <form class="forms-sample" method='post' action="calculo_vales.php" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="col-sm-8 col-form-label">Fecha de Inicio <span class="require">*</span></label>
                                            <input center type="date" name="fecha_i" id="fecha_i" stylerequired style="border-radius:15px;" required class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-sm-8 col-form-label">Fecha de Fin <span class="require">*</span></label>
                                            <input center type="date" name="fecha_f" id="fecha_f" stylerequired style="border-radius:15px;" required class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-3">
                                        <label class="col-sm-8 col-form-label">Empleado<span class="require">*</span></label>
                                        <select class="form-control" id="id_empleado" name="id_empleado" required="" style="border-radius: 5px;">
                                            <option value="50">Todos Los Empleados </option>
                                            <?php
                                            $query = mysqli_query($con, "SELECT * FROM empleados WHERE status = 1");
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
                                    

                                    <div class="pull-right">
                                        <input type = "bottom" class="btn btn-primary col-md-4" style="margin-left: 650px;" value = "Descargar Archivo"></input>

                                        <input type = "submit" class="btn btn-success col-md-4" style="margin-left: 650px;"></input>
                                    </div>
                                </form>
                                <div class="row" style="margin-top: 25px;">
                                <div class="col-md-12">
                                        <div>
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>Id del Empleado</th>
                                                    <th>Nombre del empleado</th>
                                                    <th>Retardos</th>
                                                    <th>Faltas</th>
                                                    <th>Vacaciones</th>
                                                </tr>
                                                <tbody>
                                                    <?php
                                                        $query_d = mysqli_query($con, "SELECT p.id_empleado, p.retardos_vales, p.faltas_vales, p.vacacion_vales, e.nombre_empleado, e.apellido_paterno, e.apellido_materno FROM `previsualizacion_vales` AS p INNER JOIN empleados AS e ON p.id_empleado = e.id_empleado");
                                                        $result_d = mysqli_num_rows($query_d);
                                                        if ($result_d > 0) {
                                                            while ($data = mysqli_fetch_assoc($query_d)) { 
                                                                $nombre = $data['nombre_empleado'] . ' ' . $data['apellido_paterno'] . ' ' . $data['apellido_materno'];
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $data['id_empleado']; ?></td>
                                                                    <td><?php echo $nombre; ?></td>
                                                                    <td><?php echo $data['retardos_vales']; ?></td>
                                                                    <td><?php echo $data['faltas_vales']; ?></td>
                                                                    <td><?php echo $data['vacacion_vales']; ?></td>
                                                                    
                                                                </tr>
                                                    <?php 
                                                            }
                                                        } 
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
                        <script type="text/javascript" src="js/script.js"></script> 
                    </div>
                </div>
    
<?php
include_once "./header/header2.php"; 
?>
            
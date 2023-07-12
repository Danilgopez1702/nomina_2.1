<?php
include("./conexion/db_connection.php");
include_once "./header/header.php"; 
    $dia = date( "j");
    $mes = date("m");
    $año = date("Y");

    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $mm = $meses[$mes-1];

    $hoy = $dia ." " . $mm . " " . $año;
?>
                <div class="container">
                    <h3 class="mt-5">Previsualizacion de Asistencias</h3>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="da">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <a class="btn btn-success" href="./previsualizacion.php">Realizar Escaneo de Asistencias</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>Id del Empleado</th>
                                                    <th>Nombre del empleado</th>
                                                    <th>Fecha</th>
                                                    <th>Hora</th>
                                                    <th>Tipo de Registro</th>
                                                </tr>
                                                <tbody>
                                                    <?php
                                                        $query_d = mysqli_query($con, "SELECT p.id_empleado, p.fecha_previsualizacion, p.hora_previsualizacion, p.status, e.nombre_empleado, e.apellido_paterno, e.apellido_materno FROM `previsualizacion` AS p INNER JOIN empleados AS e ON p.id_empleado = e.id_empleado");
                                                        $result_d = mysqli_num_rows($query_d);
                                                        if ($result_d > 0) {
                                                            while ($data = mysqli_fetch_assoc($query_d)) {
                                                                $nombre = $data['nombre_empleado'] . ' ' . $data['apellido_paterno'] . ' ' . $data['apellido_materno'];
                                                                if($data['status'] == 1){
                                                                    $asistencia = "Retardo";
                                                                }else if($data['status'] == 4){
                                                                    $asistencia = "Falta por llegar 15 min despues";
                                                                }else if($data['status'] == 2){
                                                                    $asistencia = "No checo";
                                                                }else if($data['status'] == 3){
                                                                    $asistencia = "falata por acumulacion de retardos";
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $data['id_empleado']; ?></td>
                                                                    <td><?php echo $nombre; ?></td>
                                                                    <td><?php echo $data['fecha_previsualizacion']; ?></td>
                                                                    <td><?php echo $data['hora_previsualizacion']; ?></td>
                                                                    <td><?php echo $asistencia; ?></td>
                                                                    
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
<?php
    include_once "./header/header2.php"; 
?>
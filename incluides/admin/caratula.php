<?php 
    session_start();
    if($_SESSION['rol'] == NULL){
        header('location: ../../index.php');
      }else if ($_SESSION['rol'] == 1) {
        include_once "../header/header_admin.php"; 
        require("../base_datos/conexion/conexion.php");

        $id = $_GET['id'];

        $query = mysqli_query($conexion, "SELECT * FROM empleados WHERE id_empleado = $id");
        $result = mysqli_fetch_assoc($query);

        $dep = $result['id_departamento'];
        $vac = $result['vacaciones_restantes'];

        $query_d = mysqli_query($conexion, "SELECT * FROM departamento WHERE id_departamento = $dep");
        $result_d = mysqli_fetch_assoc($query_d);

        $query_aa = mysqli_query($conexion, "SELECT * FROM asistencia WHERE id_empleado = $id && status_asistencia = 0");
        $result_aa = mysqli_num_rows($query_aa);

        $query_a = mysqli_query($conexion, "SELECT * FROM asistencia WHERE id_empleado = $id");
        $result_a = mysqli_num_rows($query_a);

        $query_v = mysqli_query($conexion, "SELECT * FROM vacaciones WHERE id_empleado = $id ORDER BY id_vacaciones DESC");
        $result_v = mysqli_num_rows($query_v);

        $query_pp = mysqli_query($conexion, "SELECT * FROM prestamo WHERE id_empleado = $id && status_prestamo = 1");
        $result_pp = mysqli_num_rows($query_pp);

        $query_p = mysqli_query($conexion, "SELECT * FROM prestamo WHERE id_empleado = $id");
        $result_p = mysqli_num_rows($query_p);

        $query_i = mysqli_query($conexion, "SELECT * FROM infonavit WHERE id_empleado = $id");
        $result_i = mysqli_num_rows($query_i);

        $query_h = mysqli_query($conexion, "SELECT * FROM horas_extras WHERE id_empleado = $id");
        $result_h = mysqli_num_rows($query_h);

        $query_hh = mysqli_query($conexion, "SELECT * FROM horas_extras WHERE id_empleado = $id && status_extras = 1");
        $result_hh = mysqli_num_rows($query_hh);

        $query_o = mysqli_query($conexion, "SELECT * FROM `otros` WHERE `id_empleado` = $id");
        $result_o = mysqli_num_rows($query_o);
        
?> 
        <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
        <div class="container col-sm">
            <div class="row">
                <div class="col-ml-4 grid-margin stretch-card " style="top: 20px;">
                    <div class="col-md-10 grid-margin stretch-card">
                        <img width="310px" height="370px" style="border-radius:15px; position: relative; left: 45px; top: 40px" src ="<?php echo $result['foto']; ?>">
                    </div> 
                </div>
                <div class="card col-md-6 col-xl-8 card-body" style="background-color: #C0C0C0; position: relative; height: 280px; left: 65px; top: 85px; border-radius: 15px;">
                    <div>
                        <h2 class="card-title" style="color: black;">ID: <?php echo $result['id_empleado']; ?> </h2>
                        <h3 class="card-title" style="color: black;">Nombre: <?php echo $result['nombre_empleado']; ?> <?php echo $result['apellido_paterno']; ?> <?php echo $result['apellido_materno']; ?></h3>
                        <h4 class="card-title" style="color: black;">Sueldo Mensual: <?php $y=$result['sueldo_mensual']; $x = number_format($y, 2, '.', ',');  echo $x;?></h4>
                        <h4 class="card-title" style="color: black;">Fecha de ingreso: <?php echo $result['fecha_ingreso']; ?> </h4>
                        <h4 class="card-title" style="color: black;">Numero de cuenta: <?php echo $result['no_cuenta']; ?> </h4>
                        <h4 class="card-title" style="color: black;">Departamento: <?php echo $result_d['nombre_departamento']; ?> </h4>
                        
                    </div>
                </div>
            </div>
        </div>
        <br>

        <h3 style="color: black;">Deducciones</h3>
        <div class="tabs col-sm">
            <div class="tab-container">
                <!--Faltas-->
                <div id="tab1" class="tab"> 
                    <a href="#tab1"><h4>Faltas</h4></a>
                    <div class="tab-content">
                        <br>
                        <div class="container col-sm">
                            <div class="row ">
                                <div class="col-xl-10 col-ml-8" style="top: 8px;">
                                    <div class="col-ml-4 ">
                                        <a data-toggle="modal" href="#modal_agregar_faltas" class="btn btn-success" style="border-radius: 15px;">Agregar Falta</a> 
                                    </div>
                                </div>
                                <div class="col-ml-4">  
                                    <h4>Faltas en el periodo: <?php echo $result_aa; ?></h4>
                                    <h4>Faltas totales: <?php echo $result_a; ?></h>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="background-color: white;">
                            <table class="table  table-striped table-bordered" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Fecha de falta</th>
                                        <th>Tipo de falta</th>
                                        <th>Hora de la falta</th>
                                        <th>Razon de la falta</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($result_a > 0) {
                                            while ($data = mysqli_fetch_assoc($query_a)) { ?>
                                                <tr>
                                                <td><?php echo $data['fecha_asistencia']; ?></td>
                                                    <?php 
                                                        if($data['tipo_asistencia'] == 1){
                                                    ?>
                                                            <td>Retardo</td>
                                                    <?php
                                                        }else if($data['tipo_asistencia'] == 2){
                                                    ?>
                                                            <td>Falta</td>
                                                    <?php
                                                        }else if($data['tipo_asistencia'] == 3){
                                                    ?>
                                                            <td>Falta por Retardo</td>
                                                    <?php
                                                        }
                                                    ?>
                                                    <td><?php echo $data['hora_asistencia']; ?></td>
                                                    <td><?php echo $data['comentario_asistencia']; ?></td>
                                                    <?php 
                                                        if($data['status_asistencia'] == 1){
                                                    ?>
                                                            <td>Activo</td>
                                                    <?php
                                                        }else if($data['status_asistencia'] == 2){
                                                    ?>
                                                            <td>Historico</td>
                                                    <?php
                                                        }
                                                    ?>
                                                    <td>
                                                        <a data-toggle="modal" href="#modal_editar_faltas" class="btn btn-primary" style="border-radius:20px" 
                                                        onclick='editar_asistencia(
                                                        "<?php echo $data["id_asistencia"]; ?>", 
                                                        "<?php echo $data["fecha_asistencia"]; ?>", 
                                                        "<?php echo $data["tipo_asistencia"]; ?>", 
                                                        "<?php echo $data["hora_asistencia"]; ?>", 
                                                        "<?php echo $data["comentario_asistencia"]; ?>",
                                                        "<?php echo $data["status_asistencia"]; ?>"
                                                        )'
                                                        >Editar</a>
                                                        <a onclick="return confirm('Estás seguro que deseas eliminar la falta');" href="../base_datos/eliminar/eliminar_falta.php?id=<?php echo $data['id_asistencia']; ?>&ide=<?php echo $data['id_empleado']; ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
                                                    </td>
                                                                        
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
                <!--Prestamos-->
                <div id="tab2" class="tab">
                    <a href="#tab2"><h4>Prestamos</h4></a>
                    <div class="tab-content">
                    <br>
                        <div class="container col-sm">
                            <div class="row">
                                <div class="col-xl-10">
                                    <div class="col-xl-10 col-ml-8" style="top: 8px;">
                                        <a data-toggle="modal" href="#modal_agregar_prestamos" class="btn btn-success" style="border-radius: 15px;">Agregar Prestamo</a> 
                                    </div>
                                </div>
                                <div class="col-ml-4">
                                    <h4>Prestamos Totales: <?php echo $result_p; ?></h4>
                                    <h4>Prestamos Activos: <?php echo $result_pp; ?></h4>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div    >
                            <table class="table  table-striped table-bordered" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Fecha de falta</th>
                                        <th>Monto del Prestamo</th>
                                        <th>Plazo total del Prestamo</th>
                                        <th>Plazo actual del Prestamo</th>
                                        <th>Comentario</th>
                                        <th>Status del Prestamo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($result_p > 0) {
                                            while ($data = mysqli_fetch_assoc($query_p)) { ?>
                                                <tr>
                                                    <td><?php echo $data['fecha_prestamo']; ?></td>
                                                    <td><?php echo $data['monto_prestamo']; ?></td>
                                                    <td><?php echo $data['plazo_prestamo']; ?></td>
                                                    <td><?php echo $data['plazo_actual_prestamo']; ?></td>
                                                    <td><?php echo $data['comentario_prestamo']; ?></td>
                                                    <?php 
                                                        if($data['status_prestamo'] == 1){
                                                    ?>
                                                            <td>Activo</td>
                                                    <?php
                                                        }else if($data['status_prestamo'] == 2){
                                                    ?>
                                                            <td>Historico</td>
                                                    <?php
                                                        }
                                                    ?>
                                                    <td>
                                                    <a data-toggle="modal" href="#modal_editar_prestamos" class="btn btn-primary" style="border-radius:20px" 
                                                        onclick='editar_prestamo(
                                                            "<?php echo $data["id_prestamo"]; ?>", 
                                                            "<?php echo $data["fecha_prestamo"]; ?>", 
                                                            "<?php echo $data["monto_prestamo"]; ?>", 
                                                            "<?php echo $data["plazo_prestamo"]; ?>",
                                                            "<?php echo $data["plazo_actual_prestamo"]; ?>",
                                                            "<?php echo $data["comentario_prestamo"]; ?>"    
                                                        )'
                                                            >Editar</a>
                                                        <a onclick="return confirm('Estás seguro que deseas eliminar el prestamo');" href="../base_datos/eliminar/eliminar_prestamo.php?id=<?php echo $data['id_prestamo']; ?>&ide=<?php echo $data['id_empleado']; ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
                                                    </td>
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
                <!--Infonavit-->
                <div id="tab3" class="tab">
                    <a href="#tab3"><h4>Infonavit</h4></a>
                    <div class="tab-content">
                    <br>
                        <div class="container col-sm">
                            <div class="row">
                                <div class="col-xl-10">
                                    <div class="col-xl-4 col-ml-4">
                                        <a data-toggle="modal" href="#modal_agregar_infonavit" class="btn btn-success" style="border-radius: 15px;">Agregar Infonavit</a> 
                                    </div>
                                </div>
                                <div class="col-ml-4 stretch-card">
                                    <h4>Infonavit: <?php echo $result_i; ?></h4>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div    >
                            <table class="table  table-striped table-bordered" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Monto de Infonavit</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($result > 0) {
                                            while ($data = mysqli_fetch_assoc($query_i)) { ?>
                                                <tr>
                                                    <td><?php echo $data['monto_infonavit']; ?></td>
                                                    <td>
                                                        <a data-toggle="modal" href="#modal_editar_infonavit" class="btn btn-primary" style="border-radius:20px" 
                                                            onclick='editar_infonavit(
                                                                "<?php echo $data["id_infonavit"]; ?>", 
                                                                "<?php echo $data["monto_infonavit"]; ?>"
                                                            )'
                                                        >Editar</a>
                                                        <a onclick="return confirm('Estás seguro que deseas eliminar el infonavit');" href="../base_datos/eliminar/eliminar_infonavit.php?id=<?php echo $data['id_infonavit']; ?>&ide=<?php echo $data['id_empleado']; ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
                                                    </td>
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
                 <!--Vacaciones-->
                 <div id="tab4" class="tab"> 
                    <a href="#tab4"><h4>Vacaciones</h4></a>
                    <div class="tab-content">
                        <br>
                        <div class="container col-sm">
                            <div class="row">
                                <div class="col-xl-10">
                                    <div class="col-xl-10 col-ml-8" style="top: 8px;">
                                        <a data-toggle="modal" href="#modal_agregar_vacaciones" class="btn btn-success" style="border-radius: 15px;">Agregar Vacaciones</a> 
                                    </div>
                                </div>
                                <div class="col-ml-4"> 
                                    <h4>Vacaciones restantes: <?php echo $vac; ?></h4>
                                    <h4>Vacaciones tomadas: <?php echo $result_v; ?></h4>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div    >
                            <table class="table  table-striped table-bordered" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Fecha de Inicio la Vacaciones</th>
                                        <th>Fecha de Final la Vacaciones</th>
                                        <th>Fecha de las Vacaciones</th>
                                        <th>Periodo de las Vacaciones</th>
                                        <th>Acciones</th>
                                            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($result_v > 0) {
                                            while ($data = mysqli_fetch_assoc($query_v)) { ?>
                                                <tr>
                                                    <td><?php echo $data['fecha_inicio_v']; ?></td>
                                                    <td><?php echo $data['fecha_fin_v']; ?></td>
                                                    <td><?php echo $data['fecha_vacacion']; ?></td>
                                                    <td><?php if($data['status_vacaciones'] == 1) $x = "actual"; else $x = "Periodo Pasado";echo $x?></td>
                                                    <td>
                                                        <a data-toggle="modal" href="#modal_editar_vacaciones" class="btn btn-primary" style="border-radius:20px" 
                                                            onclick='editar_vacaciones(
                                                                "<?php echo $data["id_vacaciones"]; ?>", 
                                                                "<?php echo $data["fecha_inicio_v"]; ?>", 
                                                                "<?php echo $data["fecha_fin_v"]; ?>", 
                                                                "<?php echo $data["fecha_vacacion"]; ?>",
                                                                "<?php echo $data["status_vacaciones"]; ?>"
                                                            )'
                                                            >Editar</a>
                                                        <a onclick="return confirm('Estás seguro que deseas eliminar la vacacion');" href="../base_datos/eliminar/eliminar_vacacion.php?id=<?php echo $data['id_vacaciones']; ?>&ide=<?php echo $data['id_empleado']; ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
                                                    </td>
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

        <h3 style="color: black;">Percepciones</h3>
        <div class="tabs col-sm">
            <div class="tab-container">
                <!--Horas Extras-->
                <div id="tab5" class="tab">
                    <a href="#tab5"><h4>Horas Extraordinarias</h4></a>
                    <div class="tab-content">
                    <br>
                        <div class="container col-sm">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="col-xl-8 col-ml-8" style="top: 8px;">
                                        <a data-toggle="modal" href="#modal_agregar_horas" class="btn btn-success" style="border-radius: 15px;">Agregar Horas Extras</a> 
                                    </div>
                                </div>
                                <div class="col-ml-2">
                                    <h4>Horas Extraordinarias del periodo: <?php echo $result_hh; ?></h4>
                                    <h4>Horas Extraordinarias Totales: <?php echo $result_h; ?></h4>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div >
                            <table class="table  table-striped table-bordered" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Horas Extraordinarias</th>
                                        <th>Comentario</th>
                                        <th>Status</th>
                                        <th>Razon de la falta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($result > 0) {
                                            while ($data = mysqli_fetch_assoc($query_h)) { ?>
                                                <tr>
                                                    <td><?php echo $data['horas_extras']; ?></td>
                                                    <td><?php echo $data['comentario_extra']; ?></td>
                                                    <?php 
                                                        if($data['status_extras'] == 1){
                                                    ?>
                                                            <td>Activo</td>
                                                    <?php
                                                        }else if($data['status_extras'] == 2){
                                                    ?>
                                                            <td>Historico</td>
                                                    <?php
                                                        }
                                                    ?>
                                                    <td>
                                                        <a data-toggle="modal" href="#modal_editar_extras" class="btn btn-primary" style="border-radius:20px" 
                                                            onclick='editar_extras(
                                                                "<?php echo $data["id_extra"]; ?>", 
                                                                "<?php echo $data["horas_extras"]; ?>",
                                                                "<?php echo $data["comentario_extra"]; ?>",
                                                                "<?php echo $data["status_extras"]; ?>"
                                                            )'
                                                        >Editar</a>
                                                        <a onclick="return confirm('Estás seguro que deseas eliminar las horas extra');" href="../base_datos/eliminar/eliminar_extras.php?id=<?php echo $data['id_extra']; ?> && ide=<?php echo $data['id_empleado']; ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
                                                    </td>
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
                <!--Otros-->
                <div id="tab6" class="tab">
                    <a href="#tab6"><h4>Otros</h4></a>
                    <div class="tab-content">
                    <br>
                        <div class="container col-sm">
                            <div class="row">
                                <div class="col-xl-10">
                                    <div class="col-xl-4 col-ml-4">
                                        <a data-toggle="modal" href="#modal_agregar_otros" class="btn btn-success" style="border-radius: 15px;">Agregar Otros</a> 
                                    </div>
                                </div>
                                <div class="col-ml-4 stretch-card">
                                    <h4>Otros: <?php echo $result_o; ?></h4>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div>
                            <table class="table  table-striped table-bordered"  id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Monto</th>
                                        <th>Comentario</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($result_o > 0) {
                                            while ($data = mysqli_fetch_assoc($query_o)) { ?>
                                                <tr>
                                                    <td><?php echo $data['monto_otros']; ?></td>
                                                    <td><?php echo $data['comentario_otros']; ?></td>
                                                    <?php 
                                                        if($data['status_otros'] == 1){
                                                    ?>
                                                            <td>Activo</td>
                                                    <?php
                                                        }else if($data['status_otros'] == 2){
                                                    ?>
                                                            <td>Historico</td>
                                                    <?php
                                                        }
                                                    ?>
                                                    <td>
                                                        <a data-toggle="modal" href="#modal_editar_otros" class="btn btn-primary" style="border-radius:20px" 
                                                            onclick='editar_otros(
                                                                "<?php echo $data["id_otros"]; ?>", 
                                                                "<?php echo $data["monto_otros"]; ?>",
                                                                "<?php echo $data["comentario_otros"]; ?>",
                                                                "<?php echo $data["status_otros"]; ?>"
                                                            )'
                                                        >Editar</a>
                                                        <a onclick="return confirm('Estás seguro que deseas eliminar');"href="../base_datos/eliminar/eliminar_otros.php?id=<?php echo $data['id_otros']; ?>&ide=<?php echo $data['id_empleado']; ?> " class="btn btn-danger" style="border-radius:20px">Eliminar </a>
                                                    </td>
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

        <script type="text/javascript">
            function editar_asistencia(id_asistencia,fecha_asistencia,tipo_asistencia,hora_asistencia,comentario_asistencia,status_asistencia)
                {   
                    document.getElementById("id_asistencia").value= id_asistencia ;              
                    document.getElementById('fecha_asistencia').value = fecha_asistencia;

                    if(tipo_asistencia == '1'){

                        document.getElementById('tipo_asistencia').value = "Retardo";

                    }else if(tipo_asistencia == '2'){

                        document.getElementById('tipo_asistencia').value = "Falta";

                    }else if(tipo_asistencia == '3'){

                        document.getElementById('tipo_asistencia').value = "Falta por retardo";

                    }   

                    document.getElementById('hora_asistencia').value = hora_asistencia;
                    document.getElementById('comentario_asistencia').value = comentario_asistencia;
                    document.getElementById('status_asistencia').value = status_asistencia;
                }

            function editar_vacaciones(id_vacaciones,fecha_inicio_v,fecha_fin_v,fecha_vacacion)
                {   
                    document.getElementById("id_vacaciones").value= id_vacaciones ;              
                    document.getElementById("mandar_inicio_v").value= fecha_inicio_v ;              
                    document.getElementById("fecha_inicio_v").value= fecha_inicio_v ;              
                    document.getElementById('fecha_fin_v').value = fecha_fin_v;
                }

            function editar_prestamo(id_prestamo,fecha_prestamo,monto_prestamo,plazo_prestamo,plazo_actual_prestamo,comentario_prestamo)
                {   
                    document.getElementById("id_prestamo").value= id_prestamo ;              
                    document.getElementById("fecha_prestamo").value= fecha_prestamo ;              
                    document.getElementById('monto_prestamo').value = monto_prestamo;
                    document.getElementById('plazo_prestamo').value = plazo_prestamo;
                    document.getElementById('plazo_actual_prestamo').value = plazo_actual_prestamo;
                    document.getElementById("comentario_prestamo").value = comentario_prestamo;

                }

            function editar_infonavit(id_infonavit,monto_infonavit)
                {   
                    document.getElementById("id_infonavit").value= id_infonavit ;              
                    document.getElementById("monto_infonavit").value= monto_infonavit ;
                }

            function editar_extras(id_extra,horas_extras,comentario_extra,status_extras)
                {   
                    document.getElementById("id_extra").value= id_extra ;              
                    document.getElementById("horas_extras").value= horas_extras ;              
                    document.getElementById('comentario_extra').value = comentario_extra;
                    document.getElementById('status_extras').value = status_extras;
                }

            function editar_otros(id_otros,monto_otros,comentario_otros,status_otros)
                {   
                    document.getElementById("id_otros").value= id_otros ;             
                    document.getElementById('monto_otros').value = monto_otros;
                    document.getElementById('comentario_otros').value = comentario_otros;
                    document.getElementById('status_otros').value = status_otros;
                }

        </script>

<?php
    }else if($_SESSION['rol'] == 2){
        header('location: ../user/caratula.php');
      } 
    include "../modal/editar/editar_caratula.php";
    include "../modal/agregar/agregar_caratula.php";
    include_once "../header/header2_admin.php"; 
?>
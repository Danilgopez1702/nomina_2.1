<?php
	$id = $_GET['id'];
	header("Content-Type: application/xls");
	header('Content-Disposition: attachment;filename=historico_nomina_'.$id.'.xls');

	require("../base_datos/conexion/conexion.php");
    $query = mysqli_query($conexion, "SELECT * FROM `historico` WHERE  fecha_historico = '$id'");
    $result = mysqli_num_rows($query);	

    $query_a = mysqli_query($conexion, "SELECT * FROM `historico` WHERE  fecha_historico = '$id' && aguinaldo = 2");
    $result_a = mysqli_num_rows($query_a);	
    
?>
    <style>
        table, td{
        border: 1px solid #000000;
        text-align: center;
            }
    </style>
    <table class="table  table-striped table-bordered " id="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Faltas</th>
                <th>Prestamos</th>
                <th>Infonavit</th>
                <th>Hrs. Extraordiarias</th>
                <th>Otras Percepciones</th>
                <?php
                    if($result_a != 0){ ?>
                        <th>Pago Nomina</th>
                        <th>Aguinaldo</th>
                    <?php
                    }
                ?>
                <th>Pago Total</th>
            </tr>
        </thead>
        <tbody>
            <?php                                    
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td>"<?php echo $data['id_empleado']; ?>"</td>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['faltas']; ?></td>
                            <td><?php echo $data['prestamo']; ?></td>
                            <td><?php echo $data['infonavit']; ?></td>
                            <td><?php echo $data['hora_extra']; ?></td>
                            <td><?php echo $data['otras_percepciones']; ?></td>
                            <?php
                                if($result_a != 0){ ?>
                            <td><?php $y=$data['monto_pago']; $x =number_format($y, 2, '.', ',');  echo $y;?></td>
                            <td><?php $y=$data['monto_aguinaldo']; $x =number_format($y, 2, '.', ',');  echo $y;?></td>
                            <td><?php $y=$data['monto_total']; $x =number_format($y, 2, '.', ',');  echo $y;?></td>
                            <?php
                                }else{?>
                                    <td><?php $y=$data['monto_total']; $x =number_format($y, 2, '.', ',');  echo $y;?></td>
                                <?php
                                }
                            ?>
                        </tr>
            <?php 
                    }
                } 
            ?>
        </tbody>
    </table>
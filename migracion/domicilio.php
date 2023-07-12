<?php 

include_once("../incluides/base_datos/conexion/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Importación</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<br>
<div class="row">
<form action="subida.php" method="post" enctype="multipart/form-data" id="import_form">
<div class="col-md-3">
<input type="file" name="file" />
</div>
<div class="col-md-5">
<input type="submit" class="btn btn-primary" name="import_data" value="IMPORT">
</div>
</form>
<form action="distancias.php" method="post" enctype="multipart/form-data" id="import_form">
<input type="submit" class="btn btn-success" name="import_data" value="distancia">
</form>
<form action="limpia.php" method="post" enctype="multipart/form-data" id="import_form">
<input type="submit" class="btn btn-danger" name="import_data" value="Limpiar">
</form>
</div>
<br>
<div class="row">
<table class="table table-bordered">
<thead>
<tr>
<th>Id Empleado</th>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Estado</th>
<th>Municipio</th>
<th>C.P</th>
<th>Fraccionamiento</th>
<th>Calle</th>
<th>Numero</th>
<th>Numero int</th>
<th>Telefono</th>
<th>Estado Civil</th>
<th>Fecha de nacimiento</th>

</tr>
</thead>
<tbody>
<?php
$sql = "SELECT  `id_empleado`,`nombre_empleado`, `apellido_paterno`, `apellido_materno`, `estado`, `municipio`, `cp`, `fraccionamiento`,
 `calle`, `numero_ext`, `numero_int`, `telefono`, `estado_civil`, `f_nacimineto` FROM empleados ORDER BY id_empleado ASC ";
$resultset = mysqli_query($conexion, $sql) or die("database error:". mysqli_error($conexion));
if(mysqli_num_rows($resultset)) {
while( $rows = mysqli_fetch_assoc($resultset) ) {
?>
<tr>
<td><?php echo $rows['id_empleado']; ?></td>
<td><?php echo $rows['nombre_empleado']; ?></td>
<td><?php echo $rows['apellido_paterno']; ?></td>
<td><?php echo $rows['apellido_materno']; ?></td>
<td><?php echo $rows['estado']; ?></td>
<td><?php echo $rows['municipio']; ?></td>
<td><?php echo $rows['cp']; ?></td>
<td><?php echo $rows['fraccionamiento']; ?></td>
<td><?php echo $rows['calle']; ?></td>
<td><?php echo $rows['numero_ext']; ?></td>
<td><?php echo $rows['numero_int']; ?></td>
<td><?php echo $rows['telefono']; ?></td>
<td><?php echo $rows['estado_civil']; ?></td>
<td><?php echo $rows['f_nacimineto']; ?></td>

</tr>
<?php } } else { ?>
<tr><td colspan="5">No records to display.....</td></tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</body>
</html>
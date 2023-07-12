<?php
include_once("../incluides/base_datos/conexion/conexion.php");

if(isset($_POST['import_data'])){
//$sql_query = mysqli_query($conexion,"DELETE FROM `reparaciones`");

// validate to check uploaded file is a valid csv file
$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
if(is_uploaded_file($_FILES['file']['tmp_name'])){
$csv_file = fopen($_FILES['file']['tmp_name'], 'r');

//fgetcsv($csv_file);

// get data records from csv file
while(($emp_record = fgetcsv($csv_file)) !== FALSE){

    if($emp_record[0] != NULL){

        if($emp_record[10] == "SOLTERO/A"){
            $civil = 1;
        }else if($emp_record[10] == "CASADO/A"){
            $civil = 2;
        }else{
            $civil = 3;
        }
        
        if($emp_record[7] != NULL){
            $mysql_insert = "UPDATE `empleados` SET `estado`= '".$emp_record[2]."',`municipio`= '".$emp_record[3]."',`cp`= '".$emp_record[4]."',
            `fraccionamiento`= '".$emp_record[5]."',`calle`= '".$emp_record[6]."',`numero_ext`= '".$emp_record[7]."',`numero_int`= '".$emp_record[8]."',
            `telefono`= '".$emp_record[9]."',`estado_civil`= '$civil',`f_nacimineto`='".$emp_record[11]."' WHERE id_empleado = '".$emp_record[0]."'";
        mysqli_query($conexion, $mysql_insert) or die("database error:". mysqli_error($conexion));
        }else{
            $mysql_insert = "UPDATE `empleados` SET `estado`= '".$emp_record[2]."',`municipio`= '".$emp_record[3]."',`cp`= '".$emp_record[4]."',
            `fraccionamiento`= '".$emp_record[5]."',`calle`= '".$emp_record[6]."',`numero_ext`= '".$emp_record[7]."',`numero_int`= '".$emp_record[8]."',
            `telefono`= '".$emp_record[9]."',`estado_civil`= '$civil',`f_nacimineto`='".$emp_record[11]."' WHERE id_empleado = '".$emp_record[0]."'";
        mysqli_query($conexion, $mysql_insert) or die("database error:". mysqli_error($conexion));
        }
    }
}

fclose($csv_file);
$import_status = '?import_status=success';
} else {
$import_status = '?import_status=error';
}
} else {
$import_status = '?import_status=invalid_file';
}
}
header("Location: domicilio.php");
?>
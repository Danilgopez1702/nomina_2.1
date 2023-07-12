<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die("Connection failed: " . $con->connect_error);
}

$sql = mysqli_query($con, "SELECT * FROM `previsualizacion_vales`");

 
while ($data = mysqli_fetch_assoc($sql)) {
    //extraemos la informacion capturada en BD
    $id = $data['id_empleado'];
    $retardo = $data['retardos_vales'];
    $falta = $data['faltas_vales'];
    $vacacion = $data['vacacion_vales'];
    $cuenta = $data['cuenta_vales'];
    //creamos una variable total igual a 0 para hacer  calculo de la resta 

    $total = $id + $retardo + $falta + $vacacion;
    
    switch ($total) {
        case '0':
            $vale = 1200;
            break;
        case '1':
            $vale = 900;
            break;
        case '2':
            $vale = 600;
            break;
        case '3':
            $vale = 300;
            break;
        default:
            $vale = 0;
            break;
    }







}



header('location: ./vales.php');
?>
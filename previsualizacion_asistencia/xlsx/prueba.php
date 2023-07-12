<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die("Connection failed: " . $con->connect_error);
}

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', '03');
$sheet->setCellValue('B1', '001');
$sheet->setCellValue('C1', '032');
$sheet->setCellValue('D1', '22869');
$sheet->setCellValue('E1', '001');
$sheet->setCellValue('F1', 'DIGITALNET, S.A. DE C.V.');


$sql = mysqli_query($con, "SELECT * FROM `previsualizacion_vales`");
$celda = 2; 
$total_dinero = 0;

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

    if($vale != 0){

        $sheet->setCellValue('A'.$celda, $id);
        $sheet->setCellValue('B'.$celda, $cuenta);
        $sheet->setCellValue('C'.$celda, $vale);

        $celda++;
        $total_dinero = $total_dinero + $vale;

    }
    

}

$sheet->setCellValue('G1', $celda-1);
$sheet->setCellValue('H1', $total_dinero);



$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');

?>
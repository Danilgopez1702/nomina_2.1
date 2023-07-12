<?php
// include class
require('vendor/fpdf/fpdf.php');

// En windows
date_default_timezone_set("America/Mexico_City");
$dia = date( "j");
$mes = date("m");
$año = date("Y");
$id = $_GET['id'];
 
 $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 $mm = $meses[$mes-1];
 	include "../base_datos/conexion/conexion.php";
        $consulta = mysqli_query($conexion, "SELECT * FROM `finiquito` AS fin INNER JOIN  empleados AS emp ON fin.id_empleado = emp.id_empleado
         WHERE fin.id_empleado = $id");
		$resultado = mysqli_fetch_assoc($consulta);
		
		$nombre = $resultado["nombre_empleado"] ." ". $resultado["apellido_paterno"] ." ". $resultado["apellido_materno"];
        $fecha_salida = $resultado['fecha_salida'];
        $fecha_ingreso = $resultado['fecha_ingreso'];
        $salario_diario = $resultado['sueldo_diario'];
        $salario_d = number_format($salario_diario, 2, '.', ',');
        $sueldo_devegado = $resultado['total_devegados'];
        $sueldo_dev = number_format($sueldo_devegado, 2, '.', ',');
        $prima_v1 = $resultado['prima1'];
        $prima1 = number_format($prima_v1, 2, '.', ',');
        $prima_v2 = $resultado['prima2'];
        $prima2 = number_format($prima_v2, 2, '.', ',');
        $vacaciones1 = $resultado['total_v1'];
        $vacacion1 = number_format($vacaciones1, 2, '.', ',');
        $vacaciones2 = $resultado['total_v2'];
        $vacacion2 = number_format($vacaciones2, 2, '.', ',');
        $aguinaldos = $resultado['aguinaldo'];
        $aguinaldo = number_format($aguinaldos, 2, '.', ',');
        $totales = $resultado['total'];
        $total = number_format($totales, 2, '.', ',');
// extend class
class KodePDF extends FPDF {
    protected $fontName = 'Arial';

    function renderTitle($text) {
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->fontName, 'B', 24);
        $this->Cell(0, 8, utf8_decode($text), 0, 1);
        $this->Ln();
    }

    function renderSubTitle($text) {
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->fontName, '', 12);
        $this->Cell(0, 14, utf8_decode($text), 0, 1);
        
    }

    function renderText($text) {
        $this->SetTextColor(51, 51, 51);
        $this->SetFont($this->fontName, '', 10);
        $this->MultiCell(0, 4, utf8_decode($text), 0,'J', 0);
        $this->Ln();
    }
    function renderfirm($text) {
        $this->SetTextColor(51, 51, 51);
        $this->SetFont($this->fontName, '', 10);
        $this->MultiCell(0, 4, utf8_decode($text), 0,'C', 0);
        $this->Ln();
    }
}

// create document
$pdf = new KodePDF();
$pdf->AddPage();

// config document
$pdf->SetTitle('Recibo Finiquito');
$pdf->SetAuthor('Digitalnet');
$pdf->SetCreator('FPDF Maker');

// add title
$pdf->renderTitle('                         Recibo Finiquito');
$pdf->Ln();
$pdf->renderText('Fecha Ingreso: '.$fecha_salida.'.');
$pdf->renderText('Fecha Egreso: '.$fecha_ingreso.'.');
$pdf->Ln();
$pdf->renderText('Recibi de la empresa denominada L & F TELECOMUNICACIONES, S.A DE C.V. La cantidad de $'. $total.'.');
$pdf->renderText('Por los siguientes conceptos: ');
$pdf->Ln();
$pdf->Ln();
$pdf->renderText('- Aguinaldo proporcional del '.$año.':                                                                                                $'.$aguinaldo.'.');
$pdf->renderText('- Salario devengado del periodo :                                                                                                  $'.$sueldo_dev.'.');
$pdf->renderText('- Vacaciones proporcionales del 1° año de servicio :                                                                    $'.$vacacion1.'.');
$pdf->renderText('- Prima vacacional del 1° año de servicio :                                                                                    $'.$prima1.'.');
if($vacacion2 =! null){
    $pdf->renderText('- Vacaciones proporcionales del 2° año de servicio :                                                                    $'.$vacacion1.'.');
    $pdf->renderText('- Prima vacacional del 2° año de servicio :                                                                                    $'.$prima1.'.');
}
$pdf->Ln();
$pdf->Ln();
$pdf->renderText('                                                                                               TOTAL:                                           $'.$total.'.');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->renderText('                      Asi mismo manifiesto mi conformidad con el anterior pago y manifiesto que la terminacion de la relación de trabajo fue por la renuncia voluntariaque precente a mi único patrón L & F TELECOMUNICACIONES, S.A DE C.V., y que por lo tanto extiendo el más amplio finiquito que en derecho proceda, ya que durante todo el tiempo que trabaje en la empresa mencionada con antelación, me fueron pagados siempre los salarios puntualmente, no se me adeuda cantidad alguna de aguinaldo, vacaciones, prima vacacional, nunca labore horas extras, días de descanso obligatorios, séptimos días, ni genere primas domicales, ni por ninguna otra prestación, ademas de que durante todo el tiempo que duro la relacion laboral no sufri ningún riesgo de trabajo, por lo tanto no me reservo acción ni derecho alguno de ejercer en su contra, por la via laboral ni por nin guna otra, ya que al momento de la presente renuncia se ha cubierto mi finiquito legal y no se me adeuda el pago de prestación alguna.');
$pdf->Ln();
$pdf->Ln();
$pdf->renderfirm('Aguascalientes, Ags. a '.$dia. ' de '.$mm.' de '.$año);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->renderSubTitle('                                          _______________________________________');
$pdf->renderfirm($nombre);

// output file
$pdf->Output('', 'fpdf-advanced.pdf');

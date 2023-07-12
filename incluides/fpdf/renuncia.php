<?php
// include class
require('vendor/fpdf/fpdf.php');

// En windows
date_default_timezone_set("America/Mexico_City");
$hoy = date( "j");
$mes = date("m");
$año = date("Y");
$id = $_GET['id'];
 
 $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 $mm = $meses[$mes-1];
 	include "../base_datos/conexion/conexion.php";
        $consulta = mysqli_query($conexion, "SELECT `nombre_empleado`, `apellido_paterno`, `apellido_materno` FROM empleados WHERE id_empleado = $id");
		$resultado = mysqli_fetch_assoc($consulta);
		
		$nombre = $resultado["nombre_empleado"] ." ". $resultado["apellido_paterno"] ." ". $resultado["apellido_materno"];
// extend class
class KodePDF extends FPDF {
    protected $fontName = 'Arial';

    function renderTitle($text) {
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->fontName, 'B', 24);
        $this->Cell(0, 10, utf8_decode($text), 0, 1);
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
        $this->MultiCell(0, 7, utf8_decode($text), 0, 1);
        $this->Ln();
    }
}

// create document
$pdf = new KodePDF();
$pdf->AddPage();

// config document
$pdf->SetTitle('Carta de renuncia');
$pdf->SetAuthor('Digitalnet');
$pdf->SetCreator('FPDF Maker');

// add title
$pdf->renderText('                                                                                                 Aguascalientes, Ags. a '.$hoy." de ".$mm." del año ".$año);
$pdf->renderTitle('A QUIEN CORRESPONDA');
$pdf->renderText('AV. GABRIELA MISTRAL 818 SANTA ANITA 4ª SECCION C.P. 20164');
$pdf->renderText('                      Por medio de la presente hago constar que con esta fecha y por así convenir a mis intereses, renuncio en forma espontánea y voluntaria al puesto que desempeñé para esa empresa, laborando siempre dentro de la jornada máxima legal, por lo que doy por terminado el Contrato Individual o Relación de Trabajo que existió, de acuerdo a lo dispuesto por la Fracción I del Artículo 53 de la Ley Federal del Trabajo.');
$pdf->renderText('                      Asimismo manifiesto que hasta esta fecha siempre recibí el pago puntual y oportuno de todas las prestaciones a las que he tenido derecho conforme a la Ley y a mi Contrato de Trabajo, no adeudándoseme cantidad alguna por concepto de Salarios Ordinarios, Extraordinarios, Devengados, Vacaciones, Prima Vacacional, Aguinaldo, Séptimos Días, Días Festivos, Prima Dominical, Participación de Utilidades o a cualquier otro que pudiera tener derecho, derivado de mi Contrato de Trabajo o de la Ley, reconociendo expresamente que jamás laboré jornada extraordinaria alguna y que jamás sufrí riesgo de trabajo alguno y siempre me encontré inscrito ante el I.M.S.S.');
$pdf->Ln();
$pdf->Ln();
$pdf->renderSubTitle('                                                  A   T   E   N   T   A   M   E   N   T   E');
$pdf->Ln();
$pdf->renderSubTitle('                                        _______________________________________');
$pdf->renderText( '                                                            '.$nombre);

// output file
$pdf->Output('', 'fpdf-advanced.pdf');

<?php

require('./fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
 

 
    // Logo
    $this->Image('web/img/ARAAL.png',10,8,55);
    // Arial bold 15
    $this->Ln(10);
    $this->SetFont('Arial','B',32);
    // Movernos a la derecha
    $this->Cell(100);
    // Título
    $this->Cell(30,10,'Araal Electricidad',0,5,'C');
    $this->SetFont('Arial','B',15);
    $this->Cell(30,10, utf8_decode('E-mail: Aia-lalex@hotmail.com'),0,5,'C');
    $this->SetFont('Arial','B',15);
    $this->Cell(30,10,'Telefono: 655948136',0,5,'C');
    $this->Cell(30,10,'Factura',0,0,'C');
    // Salto de línea
    $this->Ln(40);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
  
}
function BasicTable($header, $data)
{
    // Cabecera
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}
function ImprovedTable($header, $data)
{
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
    //    $this->Cell($w[1],6,$row[1],'LR');
     //   $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
     //   $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
function FancyTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(0,255,255);
    $this->SetTextColor(0,0,0);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(42, 90, 40, 20);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[2],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[3],'LR',0,'R',$fill);
        $this->Cell($w[3],6,$row[4],'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
function horasTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(0,255,255);
    $this->SetTextColor(0,0,0);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(132, 40, 20);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[2],'LR',0,'R',$fill);
        $this->Cell($w[2],6,$row[1],'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
function totalTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    
    $this->SetFillColor(0,255,255);
    $this->SetTextColor(0,0,0);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(20,20,30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $this -> SetX(132);
    $fill = false;
    
    foreach($data as $row)
    { 
        $this->Cell($w[0],6,$row[1],'LR',0,'R',$fill);
        $this->Cell($w[1],6,$row[15],'LR',0,'R',$fill);
        $this->Cell($w[2],6,$row[14],'LR',0,'R',$fill);

    
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this -> SetX(132);
    $this->Cell(array_sum($w),0,'','T');
}
}
$headerTotal = array('Total','IVA 21%','Total con IVA');
$headerHoras = array('Numero de horas trabajadas','Coste de las horas', 'Total');
$header = array('Numero de productos', 'Nombre del producto', 'Coste del producto','Total');
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();

$pdf -> AddPage();


foreach ($datos['datos'] as $dato) {
        $pdf->SetFont('Arial','B',13);
        $pdf -> SetY(80);
         $pdf->Cell(130,10,'Nombre de la obra: '.$dato['nombreObra'],1,1);
         $pdf -> SetY(80);
         $pdf -> SetX(140);
         $pdf->Cell(62,10,'Numero de factura: '.$dato['factura'],1,1);
         $pdf -> SetY(90);
         $pdf->Cell(130,10,'Direccion: '.$dato['calle'],1,1);
         $pdf -> SetY(100);
         $pdf -> SetX(140);
         $pdf->Cell(62,10,'Numero: '.$dato['numero'],1,1);
         $pdf -> SetY(90);
         $pdf -> SetX(140);
         $pdf->Cell(62,10,'Localidad: '.$dato['localidad'],1,1);
         $pdf -> SetY(100);
         $pdf->Cell(130,10,'Ciudad: '.$dato['ciudad'],1,1);
         $pdf -> Ln(10);

      }

$pdf -> SetFont('Times','',12);
$pdf -> FancyTable($header,$material['datos']);
$pdf -> Ln(10);
$pdf -> horasTable($headerHoras,$horaSuma['datos']);
$pdf -> Ln(10);
$pdf -> SetX(132);
$pdf -> totalTable($headerTotal,$datos['datos']);


$pdf->Output();

<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/logogamesez.png',7,5,45);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80,10,'Reporte de ventas "Games-ez"',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFont('Arial','B',11);
    $this->Cell(-4);
    $this->Cell(32, 10, 'ID VENTA', 1, 0, 'C', 0);
    $this->Cell(32, 10, 'CODIGO V.', 1, 0, 'C', 0);
    $this->Cell(32, 10, 'ID CLIENTE', 1, 0, 'C', 0);
    $this->Cell(32, 10, 'CANTIDAD', 1, 0, 'C', 0);
    $this->Cell(38, 10, 'FECHA', 1, 0, 'C', 0);
    $this->Cell(32, 10, 'TOTAL VENTA', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página '.$this->PageNo()).'/{nb}',0,0,'C');
}
}

require 'conexion.php';
$consult="SELECT * FROM ventas";
$result= $conexion->query($consult);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);


while($row = $result->fetch_assoc()){
    $pdf->Cell(-4);
    $pdf->Cell(32, 10, $row['id_venta'], 1, 0, 'C', 0);
    $pdf->Cell(32, 10, $row['codigo'], 1, 0, 'C', 0);
    $pdf->Cell(32, 10, $row['id_cliente'], 1, 0, 'C', 0);
    $pdf->Cell(32, 10, $row['cantidad'], 1, 0, 'C', 0);
    $pdf->Cell(38, 10, $row['fecha'], 1, 0, 'C', 0);
    $pdf->Cell(32, 10, $row['total_venta'], 1, 1, 'C', 0);
}

$pdf->Output();
?>
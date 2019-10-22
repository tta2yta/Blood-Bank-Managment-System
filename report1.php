<?php
//require('../fpdf.php');
require("fpdf181/fpdf.php");
class PDF extends FPDF
{

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(10,10,'PHP - The Good Parts!', 0,0,'L');
$pdf->SetX(90);
$pdf->Cell(90,10,'Beware the Ides of March!', 1,0,'C');
$pdf->Output();
?>

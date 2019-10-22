<?php
require('sector.php');

$pdf=new PDF_Sector();
$pdf->AddPage();
$xc=60;
$yc=60;
$r=40;
 $pdf->Cell(60,10,'Packet Catagory',1,0,'C');
$pdf->SetFillColor(120,120,255);
$pdf->Sector($xc,$yc,$r,20,120);
$pdf->SetFillColor(120,255,120);
$pdf->Sector($xc,$yc,$r,120,250);
$pdf->SetFillColor(255,120,120);
$pdf->Sector($xc,$yc,$r,250,20);

$pdf->Output();
?>
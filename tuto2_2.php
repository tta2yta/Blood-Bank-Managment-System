<?php
//require('../fpdf.php');
require("fpdf181/fpdf.php");
class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('logo.png',10,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(30,10,'Title',1,0,'C');
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('P', 'mm', 'A4' );
$pdf->AliasNbPages();
//$pdf->Header();
//$pdf->Footer();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

if(isset($_GET['ser_1'])){
  if($_GET['ser_1']=="all")
    $sql="select * from spl_tbl where date_taken IS NULL ";
  else if($_GET['sr_txt']!=""){
    if($_GET['ser_1']=="mn"){
    $mn_yr=$_GET['sr_txt'];
  $sql="select * from spl_tbl where month(date_created)='$mn_yr'";
}
  else if($_GET['ser_1']=="yr"){
    $mn_yr=$_GET['sr_txt'];
      $sql="select * from spl_tbl where year(date_created)='$mn_yr'";
    }
    }

    $result=mysql_query($sql);
 if(is_resource($result)){
      while($row=mysql_fetch_array($result)){
      	$pdf->Cell(6,1,$row[0],1,0);
      	$sql_spl_ctg="select * from spl_ctg where spl_ctg_id='$row[1]'";
        $result_spl_ctg=mysql_query($sql_spl_ctg);
        $row_spl_ctg=mysql_fetch_array($result_spl_ctg);
        $pdf->Cell(6,1,$row_spl_ctg[1],1,0);
        $pdf->Cell(6,1,$row[3],1,1);
       // $pdf->SetY(20);
    }
}
}
$pdf->Output();
?>

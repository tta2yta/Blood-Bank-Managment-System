<?php
//require('../fpdf.php');
require("fpdf181/fpdf.php");
include_once 'dbconfig.php';
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
}// Page header


// Instanciation of inherited class
$pdf = new PDF('P', 'mm', 'A4' );
$pdf->AliasNbPages();
//$pdf->Header();
//$pdf->Footer();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$mn_yr1="";
if(isset($_GET['ser_1'])){
 if($_GET['sr_txt']!=""){
       if($_GET['ser_1']=="mn"){
    $mn_yr=$_GET['sr_txt']."-01";
    $mn_yr1 = date("F \of Y",strtotime($mn_yr));
    //$mn_yr2 = date($mn_yr1);
    //echo $mn_yr;
  $sql="SELECT Ctg_Id, Ctg_Name, COUNT(Ctg_Name)AS ctg
    
FROM
    donation
    INNER JOIN bl_ctg 
        ON (Bl_type = Ctg_Id)
WHERE MONTH(don_date)=MONTH('$mn_yr') AND YEAR(don_date)=YEAR('$mn_yr')
GROUP BY  Ctg_Name";
}
   else if($_GET['ser_1']=="yr"){
    $mn_yr=$_GET['sr_txt']."-01-01";
    $mn_yr1 = date("Y",strtotime($mn_yr));
    $sql="SELECT Ctg_Id, Ctg_Name, COUNT(Ctg_Name)AS ctg
    
FROM
    donation
    INNER JOIN bl_ctg 
        ON (Bl_type = Ctg_Id)
WHERE YEAR(don_date)='$mn_yr'
GROUP BY  Ctg_Name";
    }
    }
//$pdf->SetXY( 80, 30);
$pdf->SetFont('Times','B',18);
 $pdf->Cell(210,10,"Blood Collections in ".$mn_yr1,0,1,'C');
 $pdf->SetFont('Times','B',14);
$count_1=0;$count_2=0;$count_3=0;$count_4=0;$i=0;
    $result=mysql_query($sql);
 if(is_resource($result)){
 	$pdf->Cell(60,10,'Blood Id',1,0,'C');
      	$pdf->Cell(60,10,'Blood Type',1,0,'C');
      	$pdf->Cell(60,10,'Count',1,1,'C');
      	$pdf->SetFont('Times','',12);
      while($row=mysql_fetch_array($result)){
if($i==0)
  $count_1=$row[2];
elseif ($i==1) 
 $count_2=$row[2];

elseif ($i==2) 
 $count_3=$row[2];

elseif ($i==3) 
 $count_4=$row[2];

      	$pdf->Cell(60,10,$row[0],1,0);
        $pdf->Cell(60,10,$row[1],1,0);
        $pdf->Cell(60,10,$row[2],1,1);
      $i++;
    
}
}
/*
$pdf->Cell(40,10,$count_1,1,0);
        $pdf->Cell(40,10,$count_2,1,0);
        $pdf->Cell(40,10,$count_3,1,1);
        $pdf->Cell(40,10,$count_4,1,1);
        $pdf->Cell(40,10,$mn_yr1,1,1);
  */      

///////////////////////////////////////////////////////////////////////////////////////////////////
$rowLabels = array( "A", "B", "O", "AB" );
$chartXPos = 20;
$chartHeight = 80;
$chartYPos =  $pdf->GetY()+30+$chartHeight;
$chartWidth = 160;

$chartXLabel = "Blood Type";
$chartYLabel = "Values";
$chartYStep = 2;
$chartColours = array(
                  array( 255, 100, 100 ),
                  array( 100, 255, 100 ),
                  array( 100, 100, 255 ),
                  array( 255, 255, 100 ),
                );

 $count_1=90;
  $count_2=30;
   $count_3=50;
    $count_4=10;
$data = array(
          $count_1,$count_2,$count_3,$count_4
        );
$valY = $pdf->GetY();
if($valY+20>$chartYPos-$chartHeight)
$pdf->AddPage();
$xScale = count($rowLabels) / ( $chartWidth - 40 );
$maxTotal = 0;
if($count_1>$count_2 and $count_1 > $count_2)
$maxTotal=$count_1;
elseif($count_2 > $count_3)
$maxTotal=$count_2;
else
$maxTotal=$count_3;
if($maxTotal>=0 and $maxTotal<=10)
$chartYStep=2;
elseif($maxTotal>=10 and $maxTotal<=100)
$chartYStep=10;
elseif($maxTotal>=100 and $maxTotal<=1000)
$chartYStep=100;
elseif($maxTotal>=1000 and $maxTotal<=10000)
$chartYStep=1000;
$yScale = $maxTotal / $chartHeight;
$barWidth = ( 1 / $xScale ) / 1.5;

// Add the axes:

$pdf->SetFont( 'Arial', '', 10 );

// X axis
$pdf->Line( $chartXPos + 30, $chartYPos, $chartXPos + $chartWidth, $chartYPos );

for ( $i=0; $i < count( $rowLabels ); $i++ ) {
  $pdf->SetXY( $chartXPos + 40 +  $i / $xScale, $chartYPos );
  $pdf->Cell( $barWidth, 10, $rowLabels[$i], 0, 0, 'C' );
}

// Y axis
$pdf->Line( $chartXPos + 30, $chartYPos, $chartXPos + 30, $chartYPos - $chartHeight - 8 );

for ( $i=0; $i <= $maxTotal; $i += $chartYStep ) {
  $pdf->SetXY( $chartXPos + 7, $chartYPos - 5 - $i / $yScale );
  $pdf->Cell( 20, 10,number_format( $i ), 0, 0, 'R' );
  $pdf->Line( $chartXPos + 28, $chartYPos - $i / $yScale, $chartXPos + 30, $chartYPos - $i / $yScale );
}

// Add the axis labels
$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->SetXY( $chartWidth / 2 + 20, $chartYPos + 8 );
$pdf->Cell( 30, 10, $chartXLabel, 0, 0, 'C' );
$pdf->SetXY( $chartXPos + 7, $chartYPos - $chartHeight - 12 );
$pdf->Cell( 20, 10, $chartYLabel, 0, 0, 'R' );

// Create the bars
$xPos = $chartXPos + 40;
$bar = 0;


foreach ( $data as $dataRow ) {

  // Total up the sales figures for this product
  $totalSales = $dataRow ;

  // Create the bar
  $colourIndex = $bar % count( $chartColours );
  $pdf->SetFillColor( $chartColours[$colourIndex][0], $chartColours[$colourIndex][1], $chartColours[$colourIndex][2] );
  $pdf->Rect( $xPos, $chartYPos - ( $totalSales / $yScale ), $barWidth, $totalSales / $yScale, 'DF' );
  $xPos += ( 1 / $xScale );
  $bar++;
}
$pdf->Output();
}
?>
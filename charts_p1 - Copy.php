<?php
//require('../fpdf.php');
//require("fpdf181/fpdf.php");
include_once 'dbconfig.php';
require('sector.php');

$pdf=new PDF_Sector();
$pdf->AddPage();
//$pdf->SetFont('Times','B',12);

if(isset($_GET['ser_1'])){
  if($_GET['ser_1']=="all"){
    $sql="select * from spl_tbl where date_taken IS NULL ";
    $sql_1="select * FROM spl_tbl WHERE spl_ctg_id='AAA' and date_taken IS NULL";
$sql_2="select * FROM spl_tbl WHERE spl_ctg_id='BBB' and date_taken IS NULL ";
$sql_3="select * FROM spl_tbl WHERE spl_ctg_id='CCC' and date_taken IS NULL";
$sql_4="select * FROM spl_tbl WHERE spl_ctg_id='DDD' and date_taken IS NULL";

}
  else if($_GET['sr_txt']!=""){
    if($_GET['ser_1']=="mn"){
    $mn_yr=$_GET['sr_txt'];
  $sql="select * from spl_tbl where month(date_created)='$mn_yr'";
  $sql_1="select * FROM spl_tbl WHERE spl_ctg_id='AAA' and month(date_created)='$mn_yr' and date_taken IS NULL";
$sql_2="select * FROM spl_tbl WHERE spl_ctg_id='BBB' and month(date_created)='$mn_yr' and date_taken IS NULL";
$sql_3="select * FROM spl_tbl WHERE spl_ctg_id='CCC' and month(date_created)='$mn_yr' and date_taken IS NULL";
$sql_4="select * FROM spl_tbl WHERE spl_ctg_id='DDD' and month(date_created)='$mn_yr' and date_taken IS NULL";
}
  else if($_GET['ser_1']=="yr"){
    $mn_yr=$_GET['sr_txt'];
      $sql="select * from spl_tbl where year(date_created)='$mn_yr'";
      $sql_1="select * FROM spl_tbl WHERE spl_ctg_id='AAA' and date_taken IS NULL";
$sql_2="select * FROM spl_tbl WHERE spl_ctg_id='BBB' and date_taken IS NULL";
$sql_3="select * FROM spl_tbl WHERE spl_ctg_id='CCC' and date_taken IS NULL";
$sql_4="select * FROM spl_tbl WHERE spl_ctg_id='DDD' and date_taken IS NULL";
    }
    }

$row_1=mysql_query($sql_1);
$row_2=mysql_query($sql_2);
$row_3=mysql_query($sql_3);
$row_4=mysql_query($sql_4);
$count_1= mysql_num_rows($row_1);
$count_2=mysql_num_rows($row_2);
$count_3=mysql_num_rows($row_3);
$count_4=mysql_num_rows($row_4);

    $result=mysql_query($sql);
 if(is_resource($result)){
  $pdf->Cell(60,10,'Packet Number',1,0,'C');
        $pdf->Cell(60,10,'Packet Catagory',1,0,'C');
        $pdf->Cell(60,10,'Split Date',1,1,'C');
        $pdf->SetFont('Times','',12);
      while($row=mysql_fetch_array($result)){

        $pdf->Cell(60,10,$row[0],1,0);
        $sql_spl_ctg="select * from spl_ctg where spl_ctg_id='$row[2]'";
        $result_spl_ctg=mysql_query($sql_spl_ctg);
        $row_spl_ctg=mysql_fetch_array($result_spl_ctg);
        $pdf->Cell(60,10,$row_spl_ctg[1],1,0);
        $pdf->Cell(60,10,$row[4],1,1);
       // $pdf->SetY(20);
    }
}
}
$pdf->SetFont('Times','B',12);
//$pdf->SetY(10);
$pdf->Cell(40,10,'Red= '.$count_1,0,0);
$pdf->Cell(40,10,'White= '.$count_2,0,0);
$pdf->Cell(40,10,'Hemoglopin= '.$count_3,0,0);
$pdf->Cell(40,10,'Unit= '.$count_4,0,0);
//for($i=1;$i<=40;$i++)
  //$pdf->Cell(0,10,'Printing line number '.$i,0,1);
///////////////////////////////////////////////////////////////////////////////////////////////////
$rowLabels = array( "Red", "White", "Hemoglopin", "Unit" );
$chartXPos = 20;
$chartYPos = 250;
$chartWidth = 160;
$chartHeight = 80;
$chartXLabel = "Blood Catagory";
$chartYLabel = "Values";
$chartYStep = 2;
$chartColours = array(
                  array( 255, 100, 100 ),
                  array( 100, 255, 100 ),
                  array( 100, 100, 255 ),
                  array( 255, 255, 100 ),
                );
$data = array(
          $count_1,$count_2,$count_3,$count_4
        );

//$pdf=new PDF_Sector();
//$pdf->AddPage();
$xc=90;
$yc=180;
$r=40;
$tot=$count_1+$count_2+$count_3+$count_4;
$a=($count_1/$tot)*360;
$b=($count_2/$tot)*360;
$c=($count_3/$tot)*360;
$d=($count_4/$tot)*360;
$pdf->SetFillColor(120,120,255);
$pdf->Sector($xc,$yc,$r,0,$a);
$pdf->SetFillColor(120,255,120);
$pdf->Sector($xc,$yc,$r,$a,$a+$b);
$pdf->SetFillColor(255,120,120);
$pdf->Sector($xc,$yc,$r,$a+$b,$a+$b+$c);
$pdf->SetFillColor(255,100,100);
$pdf->Sector($xc,$yc,$r,$a+$b+$c,$a+$b+$c+$d);
//$pdf->Output();
$pdf->Output();
?>
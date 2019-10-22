<?php
include_once 'dbconfig.php';
require('diag.php');
$pdf = new PDF_Diag();
$pdf->AddPage();

//require('sector.php');

//$pdf=new PDF_Sector();
//$pdf->AddPage();
//$pdf->SetFont('Times','B',12);
$mn_yr1="";
if(isset($_GET['ser_1'])){
  if($_GET['ser_1']=="all"){
    $sql="SELECT * ,COUNT(packet_id) AS num FROM spl_tbl WHERE date_taken IS NOT NULL GROUP BY center_id,date_taken,spl_ctg_id";
    $sql_1="select * FROM spl_tbl WHERE spl_ctg_id='AAA' and date_taken IS not NULL";
$sql_2="select * FROM spl_tbl WHERE spl_ctg_id='BBB' and date_taken IS not NULL ";
$sql_3="select * FROM spl_tbl WHERE spl_ctg_id='CCC' and date_taken IS not NULL";
$sql_4="select * FROM spl_tbl WHERE spl_ctg_id='DDD' and date_taken IS not NULL";

}
  else if($_GET['sr_txt']!=""){
    if($_GET['ser_1']=="mn"){
    //$mn_yr=$_GET['sr_txt'];
    $mn_yr=$_GET['sr_txt']."-01";
    $mn_yr1 = date("F \of Y",strtotime($mn_yr));
      $sql=" SELECT * ,COUNT(packet_id) AS num FROM spl_tbl WHERE month(date_created)=month('$mn_yr') and year(date_created)=year('$mn_yr') GROUP BY center_id,date_taken";
  //$sql="select * from spl_tbl where month(date_created)=month('$mn_yr') and year(date_created)=year('$mn_yr') and date_taken IS not NULL";
  $sql_1="select * FROM spl_tbl WHERE spl_ctg_id='AAA' and month(date_created)=month('$mn_yr') and year(date_created)=year('$mn_yr') and date_taken IS not NULL";
$sql_2="select * FROM spl_tbl WHERE spl_ctg_id='BBB' and month(date_created)=month('$mn_yr') and year(date_created)=year('$mn_yr') and date_taken IS not NULL";
$sql_3="select * FROM spl_tbl WHERE spl_ctg_id='CCC' and month(date_created)=month('$mn_yr') and year(date_created)=year('$mn_yr') and date_taken IS not NULL";
$sql_4="select * FROM spl_tbl WHERE spl_ctg_id='DDD' and month(date_created)=month('$mn_yr') and year(date_created)=year('$mn_yr') and date_taken IS not NULL";
}
  else if($_GET['ser_1']=="yr"){
    //$mn_yr=$_GET['sr_txt'];
    $mn_yr=$_GET['sr_txt']."-01-01";
    $mn_yr1 = date("Y",strtotime($mn_yr));
      $sql=" SELECT * ,COUNT(packet_id) AS num FROM spl_tbl WHERE year(date_created)=year('$mn_yr') GROUP BY center_id,date_taken";
      $sql_1="select * FROM spl_tbl WHERE spl_ctg_id='AAA' and date_taken IS NULL";
$sql_2="select * FROM spl_tbl WHERE spl_ctg_id='BBB' and date_taken IS not NULL";
$sql_3="select * FROM spl_tbl WHERE spl_ctg_id='CCC' and date_taken IS not NULL";
$sql_4="select * FROM spl_tbl WHERE spl_ctg_id='DDD' and date_taken IS not NULL";
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
  $pdf->SetFont('Times','B',18);
  if($mn_yr1=="")
 $pdf->Cell(210,10,"List of Splitted Packets Taken".$mn_yr1,0,1,'C');
else
   $pdf->Cell(210,10,"List of Splitted Packets Taken in ".$mn_yr1,0,1,'C');
  $pdf->Cell(45,10,'Center Name',1,0,'C');
        $pdf->Cell(45,10,'Catagory Type',1,0,'C');
        $pdf->Cell(45,10,'Counts',1,0,'C');
        $pdf->Cell(45,10,'Date',1,1,'C');
        $pdf->SetFont('Times','',12);
      while($row=mysql_fetch_array($result)){
$sql_center="select * from center where center_id='$row[3]'";
        $result_center=mysql_query($sql_center);
        $row_center=mysql_fetch_array($result_center);
        $pdf->Cell(45,10,$row_center[1],1,0);
        $sql_spl_ctg="select * from spl_ctg where spl_ctg_id='$row[2]'";
        $result_spl_ctg=mysql_query($sql_spl_ctg);
        $row_spl_ctg=mysql_fetch_array($result_spl_ctg);
        $pdf->Cell(45,10,$row_spl_ctg[1],1,0);
        $pdf->Cell(45,10,$row[8],1,0);
        $pdf->Cell(45,10,$row[5],1,1);
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


//$pdf=new PDF_Sector();
//$pdf->AddPage();



$data = array('Red' => $count_1, 'White' => $count_2, 'Hemoglopin' => $count_3, 'Unit' => $count_4);

//Pie chart
$pdf->SetFont('Arial', 'BIU', 12);
//$pdf->Cell(0, 5, '1 - Pie chart', 0, 1);
$pdf->Ln(8);

$pdf->SetFont('Arial', '', 10);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->SetXY(90, $valY);
$col2=array(100,100,255);
$col1=array(255,100,100);
$col3=array(255,255,100);
$col4=array(000,255,100);
$pdf->PieChart(150, 60, $data, '%l (%p)', array($col1,$col2,$col3,$col4));
$pdf->SetXY($valX, $valY + 40);


$pdf->Output();
?>
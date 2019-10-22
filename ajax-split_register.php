<?php
include_once 'dbconfig.php';
// Retrieve data from Query String
// Escape User Input to help prevent SQL Injection  
$status = mysql_real_escape_string($_GET['st']); 
$btn = mysql_real_escape_string($_GET['btn']);
$packet_id = mysql_real_escape_string($_GET['packet_id']); 
$don_id =mysql_real_escape_string( $_GET['don_id']); 
$da_cr = mysql_real_escape_string($_GET['da_cr']); 
$desc = mysql_real_escape_string($_GET['desc']);
$spl_ctg=mysql_real_escape_string($_GET['spl_ctg']);
if($status=="Add" and $btn=="Register"){

/////////////////
$sql="INSERT INTO spl_tbl (packet_id,donation_id,spl_ctg_id,date_created,descr) VALUES ('$packet_id',
	'$don_id','$spl_ctg','$da_cr','$desc')";
if(mysql_query($sql))
 { 
echo 'New record created successfully'; 
}
else
{
 echo 'Unable to INSERT data: <br />' . $sql .'<br />' . mysql_error(); 
}
}
if($status=="Add" and $btn=="Update"){
	$sql="select COUNT(*) from spl_tbl where packet_id='$packet_id'";
$row=mysql_query($sql);
$count=mysql_fetch_array($row);
if($count[0]==1)
{
	$sql_upd = "UPDATE spl_tbl SET donation_id = '$don_id', spl_ctg_id = '$spl_ctg'
	,date_created='$da_cr', descr='$desc' WHERE packet_id = '$packet_id'" ;
if(mysql_query($sql_upd))
 { 
echo 'Record Update Successfully'; 
}
else
{
 echo 'Unable to UPDATE data: <br />' . $sql_upd .'<br />' . mysql_error(); 
}
}
	}
else if($status=="Remove"){
	//echo 'Record Update Successfully';
$packet_id = mysql_real_escape_string($_GET['packet_id']);
$da_ta = mysql_real_escape_string($_GET['da_ta']);
$center_id=mysql_real_escape_string($_GET['center_id']);

///////////////////////////////
$sql="select COUNT(*),date_taken from spl_tbl where packet_id='$packet_id'";
$row=mysql_query($sql);
$count=mysql_fetch_array($row);
if($count[0]==1 and is_null($count[1]))
{
	$sql_upd = "UPDATE spl_tbl SET date_taken = '$da_ta', center_id = '$center_id' WHERE packet_id = '$packet_id'" ;
if(mysql_query($sql_upd))
 { 
echo 'Record Update Successfully'; 
}
else
{
 echo 'Unable to UPDATE data: <br />' . $sql_upd .'<br />' . mysql_error(); 
}
}
else if($count[0]==1 and $count[1]!=null)
{
 echo "Packet already Taken"; 
}
}
 
?>
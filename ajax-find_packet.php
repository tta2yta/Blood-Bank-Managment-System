<?php
include_once 'dbconfig.php';


	//echo 'Record Update Successfully';
$packet_id = mysql_real_escape_string($_GET['packet_id']);

$sql = "SELECT * from  spl_tbl where packet_id='$packet_id'";

if(mysql_query($sql))
 { 
 	$result=mysql_query($sql);
 $row=mysql_fetch_array($result);
echo $row[0].".".$row[1].".".$row[4].".".$row[7].".".$row[2]; 
//echo $row;
}
else
{
 echo 'Unable to UPDATE data: <br />' . $sql .'<br />' . mysql_error(); 
}
?>
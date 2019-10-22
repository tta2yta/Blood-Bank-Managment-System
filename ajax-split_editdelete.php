<?php
include_once 'dbconfig.php';
// Retrieve data from Query String
// Escape User Input to help prevent SQL Injection  
$pk_id_mn = mysql_real_escape_string($_GET['pk_id_mn']); 
  

//$sql="UPDATE  person_info (Fname,Lname,Age,Gender,Ctg_Id) VALUES (
	//'$f_name','$l_name','$age','$pers_gen','$fv','$ctg_id') WHERE Per_id='$pers_id'";
 $sql = "SELECT * from  spl_tbl where packet_id='$pk_id_mn'";

if(mysql_query($sql))
 { 
 	$result=mysql_query($sql);
 $row=mysql_fetch_array($result);
echo $row[0].".".$row[1]; 
//echo $row;
}
else
{
 echo 'Unable to UPDATE data: <br />' . $sql .'<br />' . mysql_error(); 
}
?>
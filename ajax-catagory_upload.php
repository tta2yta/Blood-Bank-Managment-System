<?php
include_once 'dbconfig.php';
// Retrieve data from Query String
// Escape User Input to help prevent SQL Injection  
$pers_id = mysql_real_escape_string($_GET['pers_id']); 
$f_name =mysql_real_escape_string( $_GET['f_name']); 
$l_name = mysql_real_escape_string($_GET['l_name']); 
$fv = mysql_real_escape_string($_GET['fv']);
$age=mysql_real_escape_string($_GET['age']);
$pers_gen = mysql_real_escape_string($_GET['pers_gen']);
$ctg_id = mysql_real_escape_string($_GET['ctg_id']);  
 

$sql="INSERT INTO person_info (Per_id,Fname,Lname,Age,Gender,Favorite,Ctg_Id) VALUES ('$pers_id',
	'$f_name','$l_name','$age','$pers_gen','$fv','$ctg_id')";
if(mysql_query($sql))
 { 
echo 'New record created successfully'; 
}
else
{
 echo 'Unable to INSERT data: <br />' . $sql .'<br />' . mysql_error(); 
}
?>
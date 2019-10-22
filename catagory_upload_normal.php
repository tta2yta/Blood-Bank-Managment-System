<?php
include_once 'dbconfig.php';
// Retrieve data from Query String
// Escape User Input to help prevent SQL Injection  
$pers_id = mysql_real_escape_string($_GET['pers_id']); 
$f_name =mysql_real_escape_string( $_GET['f_name']); 
$l_name = mysql_real_escape_string($_GET['l_name']);
if(isset($_GET['sw'])){
$sw = mysql_real_escape_string($_GET['sw']);
echo "string";
}
else
$sw="";
if(isset($_GET['fb']))
$fb = mysql_real_escape_string($_GET['fb']);
else
$fb="";
if(isset($_GET['cy']))
$cy = mysql_real_escape_string($_GET['cy']);
else
$cy="";
$fv=$sw . " " . $fb ." " . $cy;
$age=mysql_real_escape_string($_GET['age']);
$pers_gen = mysql_real_escape_string($_GET['gen']);
$dept_name = mysql_real_escape_string($_GET['dept_name']);  
 

$sql="INSERT INTO person_info (Per_id,Fname,Lname,Age,Gender,Favorite,Dept) VALUES ('$pers_id',
	'$f_name','$l_name','$age','$pers_gen','$fv','$dept_name')";
if(mysql_query($sql))
 { 
echo 'New record created successfully'; 
}
else
{
 echo 'Unable to INSERT data: <br />' . $sql .'<br />' . mysql_error(); 
}
?>
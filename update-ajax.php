<?php
include_once 'dbconfig.php';
// Retrieve data from Query String
// Escape User Input to help prevent SQL Injection  
$pers_id = mysql_real_escape_string($_GET['pers_id']); 
$f_name =mysql_real_escape_string( $_GET['f_name']); 
$l_name = mysql_real_escape_string($_GET['l_name']); 
$age=mysql_real_escape_string($_GET['age']);
$pers_gen = mysql_real_escape_string($_GET['gen']);
$ctg_id = mysql_real_escape_string($_GET['ctg_id']);  
 

//$sql="UPDATE  person_info (Fname,Lname,Age,Gender,Ctg_Id) VALUES (
	//'$f_name','$l_name','$age','$pers_gen','$fv','$ctg_id') WHERE Per_id='$pers_id'";
 $sql = "UPDATE person_info SET Fname = '$f_name', Lname = '$l_name',  Gender = '$pers_gen', Ctg_Id ='$ctg_id' WHERE Per_id = '$pers_id'" ;
if(mysql_query($sql))
 { 
echo 'Record Update Successfully'; 
}
else
{
 echo 'Unable to UPDATE data: <br />' . $sql .'<br />' . mysql_error(); 
}
?>
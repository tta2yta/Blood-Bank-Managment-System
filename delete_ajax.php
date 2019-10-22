<?php
include_once 'dbconfig.php';
// Retrieve data from Query String
// Escape User Input to help prevent SQL Injection  
$pers_id = mysql_real_escape_string($_GET['pers_id']); 

 
//$sql="UPDATE  person_info (Fname,Lname,Age,Gender,Ctg_Id) VALUES (
	//'$f_name','$l_name','$age','$pers_gen','$fv','$ctg_id') WHERE Per_id='$pers_id'";
 $sql = "DELETE FROM person_info  WHERE Per_id = '$pers_id'" ;
if(mysql_query($sql))
 { 
echo 'Record Deleted Successfully'; 
}
else
{
 echo 'Unable to Delete data: <br />' . $sql .'<br />' . mysql_error(); 
}
?>
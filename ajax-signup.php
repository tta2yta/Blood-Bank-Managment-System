<?php
include_once 'dbconfig.php';
// Retrieve data from Query String
// Escape User Input to help prevent SQL Injection  

$chk=mysql_real_escape_string($_GET['chk']);
if($chk=="check_donor"){
	$dn_id = mysql_real_escape_string($_GET['dn_id']); 
	$sql="select COUNT(*),donation_id from donation where donation_id='$dn_id'";
$row=mysql_query($sql);
$count=mysql_fetch_array($row);
if($count[0]==1)
{
	
//echo 'Record Update Successfully';
echo "yes." . $count[1] ;  
}
else
{
 echo 'Donor Id Doen Not Exist'; 
}
 }
 else if($chk=="account_donor"){
 	$dn_us_nm = mysql_real_escape_string($_GET['dn_us_nm']); 
 	$dn_pass = mysql_real_escape_string($_GET['dn_pass']); 
 	$dn_id = mysql_real_escape_string($_GET['dn_id']); 
 	$sql="INSERT INTO donor_account (donation_id,username,password,role) VALUES ('$dn_id',
	'$dn_us_nm','$dn_pass','444')";
if(mysql_query($sql))
 { 
echo 'Successfully Registered,Please click login link and enter your credentials'; 
}
else
{
 echo "You may alreddy be registered or Please Try Again"; 
}

 }

?>
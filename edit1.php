<html>
<head>
  <?php
  echo "<script language='javascript' type='text/javascript'> ";
//echo "alert('fff')";

echo "function ajaxFunction()
{
  alert('fff');
}";
echo"</script>";
?>
 <script language="javascript" type="text/javascript">
//alert('fff');
function callv()
{
alert('fff');
} 
function ajaxFunction()
{
alert('fff');
var pers_id = document.getElementById('id').value; 

 var f_name = document.getElementById('fname').value; 
 var l_name = document.getElementById('lname').value; 
 var age = document.getElementById('age').value;
 var gen = document.getElementById('gn').value;
 
var list = document.forms[0].ctg; 

var ctg_id = list.options[list.selectedIndex].value;

var ajaxRequest = new XMLHttpRequest();

ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      //alert('Record Updated Successfully'); 
      var ajaxDisplay = document.getElementById('chk'); 
      ajaxDisplay.innerHTML = ajaxRequest.responseText; 
   } 
 }

 var queryString = '?pers_id=' + pers_id ; 
 queryString +=  '&f_name=' + f_name + '&l_name=' + l_name; 
queryString +=  '&age=' + age + '&gen=' + gen + '&ctg_id=' + ctg_id;
 ajaxRequest.open('GET', 'update-ajax.php' + 
           queryString, true); 
 alert(queryString);
 ajaxRequest.send(null); 
  alert('fff');
}
</script>
</head>
<?php
include_once 'dbconfig.php';

/* Page Load Results */

  // print"</tr>";
//if(isset($_POST['pers_name'])&& !(trim($_POST['pers_name'])=='')){
//$search_value=trim($_POST['pers_name']);
$search_value = mysql_real_escape_string($_GET['pers_name']);
echo "<div id='chk'></div>";
print"<table id=tbl_search width=100% border='0'>";
    print"<tr>";
    print"<th colspan=2 ><h4 align=center><font size=5px><u>Search Results<u></font></h4></b></th>";

$sql="select * from person_info
 where Fname like '%$search_value%'";
  
 $result=mysql_query($sql);
 if(is_resource($result)){
      while($row=mysql_fetch_array($result)){
      	$x=$row[0];
print"<form class='form-horizontal' name='dynamic' role='form' method='GET'>";
      	echo "<tr>";
      	echo "<td><input type='text' id='id' class='form-control' value='$row[0]'></td>";
      	echo "<td><input type='text' id='fname' class='form-control' value='$row[1]'></td>";
      	echo "<td><input type='text' id='lname' class='form-control' value='$row[2]'></td>";
      	echo "<td><input type='text' id='age' size='3' class='form-control' value='$row[3]'></td>";
      	echo "<td><input type='text' id='gn' size='2' class='form-control' value='$row[4]'></td>";
      	
echo "<td><select class='form-control' id='dept' name='ctg'>";
$sql_ctg = "SELECT Ctg_Id,Ctg_Name From BL_Ctg";
  $result_ctg=mysql_query($sql_ctg);
      while($row_ctg=mysql_fetch_array($result_ctg)){
      	if ($row[6]==$row_ctg[0]) {
      		echo "<option value='$row_ctg[0]' selected >" . $row_ctg[1] . "</option>";
      	}
      	else{
          echo "<option value='$row_ctg[0]'>" . $row_ctg[1] . "</option>";
      }
      }
   echo "<td>  <button type='button' class='btn btn-primary' id='add' onclick='ajaxFunction()'>Edit</button></td>";
    echo "<td><button type='button' class='btn btn-danger' id='cl' >Delete</button>";
     echo "</td></td>";
      	echo "</form>";
      	echo "</tr>";
          }

          echo "</table>";
echo"<input type='button' value='click' onclick='callv()'>";
      }
      else
      	echo "bad query";
     // }
     // else
      //	echo "not set";

 ?>
 </html>
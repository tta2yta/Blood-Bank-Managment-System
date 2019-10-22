<?php
include_once 'dbconfig.php';

/* Page Load Results */
//echo $_GET['pers_name'];
  // print"</tr>";
//if(isset($_POST['pers_name'])&& !(trim($_POST['pers_name'])=='')){
//$search_value=trim($_POST['pers_name']);
if(isset($_GET['pers_name'])){
echo "string";
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
      	echo "<td><input type='text' name='id' class='form-control' value='$row[0]'></td>";
      	echo "<td><input type='text' name='fname' class='form-control' value='$row[1]'></td>";
      	echo "<td><input type='text' name='lname' class='form-control' value='$row[2]'></td>";
      	echo "<td><input type='text' name='age' size='3' class='form-control' value='$row[3]'></td>";
      	echo "<td><input type='text' name='gn' size='2' class='form-control' value='$row[4]'></td>";
      	
echo "<td><select class='form-control'  name='ctg'>";
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
   echo "<td>  <button type='button' class='btn btn-primary' id='add' onclick='Edit(this.form)'>Edit</button></td>";
    echo "<td><button type='button' class='btn btn-danger' id='cl' onclick='Delete(this.form)'>Delete</button>";
     echo "</td></td>";
      	echo "</form>";
      	echo "</tr>";
          }

          echo "</table>";

      }
      else
      	echo "bad query";
     // }
     // else
      //	echo "not set";
}
 ?>
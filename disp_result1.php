<?php
include_once 'dbconfig.php';

/* Page Load Results */

  // print"</tr>";
//if(isset($_POST['pers_name'])&& !(trim($_POST['pers_name'])=='')){
//$search_value=trim($_POST['pers_name']);
if(isset($_GET['ser_1'])){
  if($_GET['sts']=="create")
  {
  if($_GET['ser_1']=="all")
    $sql="select * from spl_tbl where date_taken IS NULL ";
  else if($_GET['sr_txt']!=""){
    if($_GET['ser_1']=="mn"){
    //$mn_yr=$_GET['sr_txt'];
    $mn_yr=$_GET['sr_txt']."-01";
  $sql="select * from spl_tbl where MONTH(date_created)=MONTH('$mn_yr') AND YEAR(date_created)=YEAR('$mn_yr') and date_taken IS NULL";
}
  else if($_GET['ser_1']=="yr"){
    //$mn_yr=$_GET['sr_txt'];
    $mn_yr=$_GET['sr_txt']."-01-01";
      $sql="select * from spl_tbl where year(date_created)=year('$mn_yr') and date_taken IS NULL";
    }
    }
  }
  else if($_GET['sts']=="taken")
  {
     if($_GET['ser_1']=="all")
    $sql="select * from spl_tbl where date_taken IS not NULL ";
  else if($_GET['sr_txt']!=""){
    if($_GET['ser_1']=="mn"){
   // $mn_yr=$_GET['sr_txt'];
      $mn_yr=$_GET['sr_txt']."-01";
  $sql="select * from spl_tbl where month(date_created)=month('$mn_yr') and year(date_created)=year('$mn_yr') and date_taken IS not NULL";
}
  else if($_GET['ser_1']=="yr"){
    //$mn_yr=$_GET['sr_txt'];
    $mn_yr=$_GET['sr_txt']."-01-01";
      $sql="select * from spl_tbl where year(date_created)=year('$mn_yr') and date_taken IS not NULL";
    }
    }

  }


echo "<div id='chk'></div>";
print"<table id=tbl_search width=100% border='0'>";
    print"<tr>";
    print"<th colspan=2 ><h4 align=center><font size=5px><u>Search Results<u></font></h4></b></th>";
  
 $result=mysql_query($sql);
 if(is_resource($result)){
      while($row=mysql_fetch_array($result)){
      	//$x=$row[0];
print"<form class='form-horizontal' name='dynamic' role='form' method='GET'>";
      	echo "<tr>";
      	echo "<td><input type='text' id='id' class='form-control' value='$row[0]' readonly></td>";
        $sql_spl_ctg="select * from spl_ctg where spl_ctg_id='$row[2]'";
        $result_spl_ctg=mysql_query($sql_spl_ctg);
        $row_spl_ctg=mysql_fetch_array($result_spl_ctg);
      	echo "<td><input type='text' id='spl_ctg_name' class='form-control' value='$row_spl_ctg[1]' readonly></td>";
      	
      	echo "<td><input type='text' id='date'  class='form-control' value='$row[4]' readonly></td>";
      if($_GET['sts']=="taken"){
        $sql_center="select * from center where center_id='$row[3]'";
        $result_center=mysql_query($sql_center);
        $row_center=mysql_fetch_array($result_center);
        echo "<td><input type='text' id='cname' class='form-control' value='$row_center[1]' readonly></td>";
      }
      	echo "</form>";
      	echo "</tr>";
          }

          echo "</table>";
      }
      else
       echo "No Record Found Please Try Again"; 
     // }
     // else
      //	echo "not set";
}
 ?>
<?php
include_once 'dbconfig.php';

/* Page Load Results */

  // print"</tr>";
//if(isset($_POST['pers_name'])&& !(trim($_POST['pers_name'])=='')){
//$search_value=trim($_POST['pers_name']);
if(isset($_GET['ser_1'])){
  if($_GET['sts']=="create")
  {

   if($_GET['sr_txt']!=""){
    if($_GET['ser_1']=="mn"){
    $mn_yr=$_GET['sr_txt']."-01";
    //echo $mn_yr;
  $sql="SELECT Ctg_Id, Ctg_Name, COUNT(Ctg_Name)AS ctg
    
FROM
    donation
    INNER JOIN bl_ctg 
        ON (Bl_type = Ctg_Id)
WHERE MONTH(don_date)=MONTH('$mn_yr') AND YEAR(don_date)=YEAR('$mn_yr')
GROUP BY  Ctg_Name";
}
  else if($_GET['ser_1']=="yr"){
    $mn_yr=$_GET['sr_txt']."-01-01";
    $sql="SELECT Ctg_Id, Ctg_Name, COUNT(Ctg_Name)AS ctg
    
FROM
    donation
    INNER JOIN bl_ctg 
        ON (Bl_type = Ctg_Id)
WHERE YEAR(don_date)=YEAR('$mn_yr')
GROUP BY  Ctg_Name";
    }
    }
  }
  else if($_GET['sts']=="taken")
  {
     if($_GET['ser_1']=="all")
    $sql="select * from spl_tbl where date_taken IS not NULL ";
  else if($_GET['sr_txt']!=""){
    if($_GET['ser_1']=="mn"){
    $mn_yr=$_GET['sr_txt'];
  $sql="select * from spl_tbl where month(date_created)='$mn_yr' and date_taken IS not NULL";
}
  else if($_GET['ser_1']=="yr"){
    $mn_yr=$_GET['sr_txt'];
      $sql="select * from spl_tbl where year(date_created)='$mn_yr' and date_taken IS not NULL";
    }
    }

  }


echo "<div id='chk'></div>";
print"<table id=tbl_search width=100% border='0'>";
    print"<tr>";
    print"<th colspan=2 ><h4 align=center><font size=5px><u>Search Results<u></font></h4></b></th>";
  print"<form class='form-horizontal' name='dynamic' role='form' method='GET'>";
  echo "<tr>";
echo "<th>Blood Id</th>";
echo "<th>Blood Type</th>";
echo "<th>Counts</th>";
echo "</tr>";
 $result=mysql_query($sql);
 if(is_resource($result)){
      while($row=mysql_fetch_array($result)){
      	//$x=$row[0];

      	echo "<tr>";
      	echo "<td><input type='text' id='id' class='form-control' value='$row[0]' readonly></td>";
      	echo "<td><input type='text' id='spl_ctg_name' class='form-control' value='$row[1]' readonly></td>";
      	echo "<td><input type='text' id='date'  class='form-control' value='$row[2]' readonly></td>";
      	
      	echo "</tr>";
        
          }

          echo "</table>";
          echo "</form>";
      }
      else
       echo "No Record Found Please Try Again"; 
     // }
     // else
      //	echo "not set";
}
 ?>
<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:index.html');
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['role']=='admin'){
 header('location:admin.php');
}
if($_SESSION['user']['role']=='moderator'){
 header('location:moderator.php');
}
?>
<html> 
   <head> 
      <title>Blood Bank Web Site</title> 
      <meta name="viewport" content="width=device-width, initialscale=1.0"> 
      <!-- Bootstrap --> 
      <link href="css/bootstrap.css" rel="stylesheet"> 
      <link href="custome_style.css" rel="stylesheet"> 
	  <script src="js/jquery.js"></script>
	  <script src="js/bootstrap.js"></script>
	  <style>
	  
	  </style>
    <script language="javascript" type="text/javascript"> 

    function ajaxFunction(chk_value){ 
       var ajaxRequest;
var ajax_Request; // The variable that makes Ajax possible! 
 try{ 
   // Opera 8.0+, Firefox, Safari 
   ajaxRequest = new XMLHttpRequest(); 
    ajax_Request = new XMLHttpRequest(); 
 }catch (e){ 
   // Internet Explorer Browsers 
   try{ 
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP"); 
   }catch (e) { 
      try{ 
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP"); 
      }catch (e){ 
         // Something went wrong 
         alert("Your browser broke!"); 
         return false; 
      } 
   } 
 } 

 if (chk_value=="add_pers"){
  //alert("jjj");
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('chk'); 
      ajaxDisplay.innerHTML = ajaxRequest.responseText; 
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 var pers_id = document.getElementById('pid').value; 
 var f_name = document.getElementById('fn').value; 
 var l_name = document.getElementById('ln').value; 
 var sw = document.getElementById('sw').value;
 var ft = document.getElementById('fb').value;
 var cy = document.getElementById('cy').value;
 
 var fv=sw + " " + ft + " " + cy;

 var age = document.getElementById('age').value;
var form = document.forms[0]; 
  for (var i = 0; i < form.gen.length; i++) {
  if (form.gen[i].checked) {
  var pers_gen=form.gen[i].value;
  } 
  } 

  var list = document.forms[0].dept; 
var ctg_id = list.options[list.selectedIndex].value;
 // alert("jjj");
 var queryString = "?pers_id=" + pers_id ; 
 queryString +=  "&f_name=" + f_name + "&l_name=" + l_name; 
queryString +=  "&fv=" + fv + "&age=" + age + "&pers_gen=" + pers_gen + "&ctg_id=" + ctg_id;
/* 
 ajaxRequest.open("GET", "ajax-catagory_upload.php" +  
                              queryString, true); 
*/
 //alert("jjj");
  ajaxRequest.open("GET", "ajax-catagory_upload.php" + 
                              queryString, true); 
 
 ajaxRequest.send(null);  
 }
}

function clear_chk()
{
  var display = document.getElementById('chk'); 
      display.innerHTML = " "; 
}
    </script>
	  </head>
	  <body>


<div class="container-fluid">
  <div class="row"> <nav class="navbar navbar-inverse" style="margin-bottom:0px;">
 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  
</nav>
</div>
  <div class="row" style="background-color:lavender;">
    <div class="col-sm-12 col-md-6 col-lg-2 row" style="margin:0px;padding:0px;" > <img class="img-responsive img_header" src="web_images/img104.jpg" alt="Chania"> </div>
    <div class="col-sm-12 col-md-6 col-lg-8 mid_header" style="margin:0px;padding:0px;"></div>
    <div class="col-sm-12 col-md-12 col-lg-2 row" style="margin:0px;padding:0px;"><img class="img-responsive img_header" src="web_images/img104.jpg" alt="Chania"></div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-md-3 col-lg-3 main_left" style="margin:0px;padding:0px;">.col-xs-6 .col-sm-4</div>
    <div class="col-sm-6 col-md-9 col-lg-9 main_body" style="margin:0px;padding:0px;">
      <div class=" col-sm-12 col-md-6 col-lg-6 row input">
        <a href="display_1.php">Go To Search</a>
  <form class="form-horizontal" role="form" method="GET" action="">
    <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3 control-label" for="pid">Person Id</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
      <input class="form-control" type="text" id="pid" onfocus="clear_chk()">
    </div>
  </div>
  <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3 control-label" for="fn">First Name</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
      <input class="form-control" type="text" id="fn">
    </div>
  </div>
  <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="ln">Last Name</label>
    <div class="col-sm-12 col-md-9 col-lg-9  ">
      <input class="form-control" type="text" id="ln">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm">Sport</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
       <label class="checkbox-inline"><input type="checkbox" value="Swiming" id="sw">Swiming</label>
<label class="checkbox-inline"><input type="checkbox" value="Foot Ball" id="fb" >Foot Ball</label>
<label class="checkbox-inline"><input type="checkbox" value="Cycle" id="cy">Cycle</label>
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm">Gender</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
<label class="radio-inline"><input type="radio" name="gen" id="gen" value="M">Male</label>
<label class="radio-inline"><input type="radio" name="gen" id="gen" value="F">Female</label> 
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm">Age</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
 <input class="form-control" type="text" id="age"> 
    </div>
  </div>


  <div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm">Department</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
        <select class="form-control"  id="dept">
   <?php
   echo "string";
  include_once 'dbconfig.php';
      $sql = "SELECT Ctg_Id,Ctg_Name From BL_Ctg";
      $result=mysql_query($sql);
      while($row=mysql_fetch_array($result)){
          echo "<option value='$row[0]'>" . $row[1] . "</option>";}
   ?>
  </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm">Upload Image</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
 <input class="" type="file" id="img"> 
    </div>
  </div>

  <div class="form-group">
     <label class="col-sm-12 col-md-12 col-lg-12  control-label" id="chk"></label> 
     </div>

   <div class="form-group">
     <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm"></label> 
    <div class="col-sm-12 col-md-9 col-lg-9 ">
    <button type="button" class="btn btn-primary" id="add" onclick="ajaxFunction('add_pers')" >ADD</button>
    <button type="clear" class="btn btn-danger" id="cl" >ClEAR</button>
    </div>
  </div>


</form>
      </div>
    </div> 
  </div> 
  <div class="row">
  	<div class="col-sm-12 col-md-12 col-lg-12 footer" style="margin:0px;padding:0px;">footer
  		footer
  		footer
  	</div>
  </div>
</div>

	  </body>
	  </html>
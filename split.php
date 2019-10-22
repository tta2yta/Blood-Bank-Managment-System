
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

    function register_split(chk_value){ 
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

 if (chk_value=="add_split"){
  
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('chk'); 
      ajaxDisplay.innerHTML = ajaxRequest.responseText; 
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 var packet_id = document.getElementById('pk_id').value; 
 //alert("jjj");
 var don_id = document.getElementById('don_id').value; 
 var da_cr = document.getElementById('da_cr').value; 
 var desc = document.getElementById('desc').value;
  var btn = document.getElementById('add').innerHTML;

var list = document.forms[0].spl_ctg; 
var spl_ctg = list.options[list.selectedIndex].value;
var st="Add";

 var queryString = "?packet_id=" + packet_id ; 
 queryString +=  "&don_id=" + don_id + "&da_cr=" + da_cr; 
queryString +=  "&desc=" + desc + "&spl_ctg=" + spl_ctg +"&st=" + st+ "&btn=" + btn ;
/* 
 ajaxRequest.open("GET", "ajax-catagory_upload.php" +  
                              queryString, true); 
*/
 //alert("jjj");
  ajaxRequest.open("GET", "ajax-split_register.php" + 
                              queryString, true); 
 
 ajaxRequest.send(null);  
 }

 /////////////////////////////////////

if (chk_value=="remove_split"){
  //alert("jjj");
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('chk_1'); 
      ajaxDisplay.innerHTML = ajaxRequest.responseText; 
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 var packet_id = document.getElementById('pc_id').value; 

 var da_ta = document.getElementById('da_ta').value; 
var list = document.forms[1].center; 
var center_id = list.options[list.selectedIndex].value;
 var st="Remove";
 var queryString = "?packet_id=" + packet_id ; 
 queryString +=  "&da_ta=" + da_ta + "&center_id=" + center_id +"&st=" + st ; 

/* 
 ajaxRequest.open("GET", "ajax-catagory_upload.php" +  
                              queryString, true); 
*/
 //alert("jjj");
  ajaxRequest.open("GET", "ajax-split_register.php" + 
                              queryString, true); 

 ajaxRequest.send(null);  
  //alert("jjj");
 }
 if (chk_value=="manage_split"){
  //alert("jjj");
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('chk_2'); 
      var str = ajaxRequest.responseText;
      //ajaxDisplay.innerHTML = ajaxRequest.responseText;
      var splitted = str.split("."); 
      //var res= ajaxRequest.responseText;
      ajaxDisplay.innerHTML = splitted[1];
      document.getElementById('pk_id').value=splitted[0]; 
 //alert("jjj");
document.getElementById('don_id').value=splitted[1]; 
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 var pk_id_mn = document.getElementById('pk_id_mn').value; 
var queryString = "?pk_id_mn=" + pk_id_mn ;
  ajaxRequest.open("GET", "ajax-split_editdelete.php" + 
                              queryString, true); 

 ajaxRequest.send(null);
}
}

function clear_chk()
{
  var display = document.getElementById('chk'); 
  var display_1 = document.getElementById('chk_1'); 
      display.innerHTML = " "; 
      display_1.innerHTML = " "; 
}
function change_label()
{
  //alert("nn");
  var btn = document.getElementById('add'); 
  var check = document.getElementById('upd');
  if(check.checked==true)
  btn.innerHTML="Update"; 
else
  btn.innerHTML="Register"; 
}
function update_call()
{
   ajaxRequest = new XMLHttpRequest(); 
  var check = document.getElementById('upd');
 if(check.checked==true){

 var packet_id = document.getElementById('pk_id').value; 
 var queryString = "?packet_id=" + packet_id ;
   
  ajaxRequest.open("GET", "ajax-find_packet.php" + 
                              queryString, true); 
//alert("yes");
 ajaxRequest.send(null); 
//ajax-find_packet.php
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('chk'); 
      var str = ajaxRequest.responseText;
      //ajaxDisplay.innerHTML = ajaxRequest.responseText;
      var splitted = str.split("."); 
      //var res= ajaxRequest.responseText;
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
      document.getElementById('pk_id').value=splitted[0]; 
 //alert("jjj");
document.getElementById('don_id').value=splitted[1]; 
document.getElementById('da_cr').value=splitted[2];
document.getElementById('desc').value=splitted[3];
if(splitted[4]=="AAA")
  $i=0;
else if(splitted[4]=="BBB")
  $i=1;
else if(splitted[4]=="CCC")
  $i=2;
else if(splitted[4]=="DDD")
  $i=3;
var list = document.forms[0].spl_ctg;  
list.options[$i].selected=true; 
   } 
 } 
 

}

}
function default_check(){
   var check = document.getElementById('upd');
 check.checked=false;
}

    </script>
	  </head>
	  <body onload="default_check()">


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
       <div>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Register New Packet</a></li>
  <li><a data-toggle="tab" href="#menu1">Record Packet Taken</a></li>
  <li><a data-toggle="tab" href="#menu2">Manage</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Register New Packet</h3>
     <form class="form-horizontal" role="form" method="GET" action="">
    <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3 control-label" for="pk_id">Packet Id</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
      <input class="form-control" type="text" id="pk_id" onfocus="clear_chk()" onblur="update_call()">
    </div>
  </div>
  <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3 control-label" for="fn">Donation Id</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
      <input class="form-control" type="text" id="don_id">
    </div>
  </div>
  <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="ln">Date Created</label>
    <div class="col-sm-12 col-md-9 col-lg-9  ">
      <input class="form-control" type="text" id="da_cr">
    </div>
  </div>

  

    <div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm">Description</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
 <input class="form-control" type="text" id="desc"> 
    </div>
  </div>


  <div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm">Split Catagory</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
        <select class="form-control"  id="spl_ctg">
   <?php
   echo "string";
  include_once 'dbconfig.php';
      $sql = "SELECT * From spl_ctg";
      $result=mysql_query($sql);
      while($row=mysql_fetch_array($result)){
          echo "<option value='$row[0]'>" . $row[1] . "</option>";}
   ?>
  </select>
    </div>
  </div>

  <div class="form-group">
     <label class="col-sm-12 col-md-12 col-lg-12  control-label" id="chk"></label> 
     </div>

   <div class="form-group">
     <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm"></label> 
    <div class="col-sm-12 col-md-9 col-lg-9 ">
    <button type="button" class="btn btn-primary" id="add" onclick="register_split('add_split')" >Register</button>
    <button type="clear" class="btn btn-danger" id="cl" >CLEAR</button>
    
       <label class="checkbox-inline"><input type="checkbox" value="update" id="upd" onclick="change_label()">update</label>
  
    </div>
  </div>


</form>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Packet Taken</h3>
    <form class="form-horizontal" role="form" method="GET" action="">
    <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3 control-label" for="pid">Packet Id</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
      <input class="form-control" type="text" id="pc_id" onfocus="clear_chk()">
    </div>
  </div>

  <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="ln">Date Taken</label>
    <div class="col-sm-12 col-md-9 col-lg-9  ">
      <input class="form-control" type="text" id="da_ta">
    </div>
  </div>


  <div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm">Center</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
        <select class="form-control"  id="center">
   <?php
   echo "string";
  include_once 'dbconfig.php';
      $sql = "SELECT * From center";
      $result=mysql_query($sql);
      while($row=mysql_fetch_array($result)){
          echo "<option value='$row[0]'>" . $row[1] . "</option>";}
   ?>
  </select>
    </div>
  </div>

  <div class="form-group">
     <label class="col-sm-12 col-md-12 col-lg-12  control-label" id="chk_1"></label> 
     </div>

   <div class="form-group">
     <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm"></label> 
    <div class="col-sm-12 col-md-9 col-lg-9 ">
    <button type="button" class="btn btn-primary" id="add" onclick="register_split('remove_split')" >Record</button>
    <button type="clear" class="btn btn-danger" id="cl" >CLEAR</button>
    </div>
  </div>


</form>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Manage</h3>
    <form class="form-horizontal" role="form" method="GET" action="">
    <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3 control-label" for="pk_id">Packet Id</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
      <input class="form-control" type="text" id="pk_id_mn" onfocus="clear_chk()">
    </div>
  </div>
  <div class="form-group">
     <label class="col-sm-12 col-md-12 col-lg-12  control-label" id="chk_2"></label> 
     </div>
   <div class="form-group">
     <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm"></label> 
    <div class="col-sm-12 col-md-9 col-lg-9 ">
    <button type="button" class="btn btn-primary" id="add" onclick="register_split('manage_split')" >Update</button>
    <button type="clear" class="btn btn-danger" id="cl" >Delete</button>
    </div>
  </div>
</form>
  </div>
</div>
       </div>
 
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
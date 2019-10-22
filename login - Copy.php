<?php
include_once 'dbconfig.php';
session_start();
if(isset($_POST['login'])){
  $username=mysql_real_escape_string($_POST['username']);
  $password=mysql_real_escape_string($_POST['user_password']);
  if(isset($_POST['dn']))
  $chk_dn=mysql_real_escape_string($_POST['dn']);
else
  $chk_dn="";
  if(empty($username)&&empty($password)){
  $error= 'Fileds are Mandatory';
  }else if ($chk_dn==""){
//$sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
$sql="SELECT roles.role_name, user.username, user.password FROM user INNER JOIN roles ON (roles.role_id = user.role_id) WHERE user.username='$username' AND user.PASSWORD='$password'";
$row=mysql_query($sql);
$result=mysql_fetch_assoc($row);
 $count=mysql_num_rows($row);
 if($count==1){
      $_SESSION['user']=array(
   'username'=>$result['username'],
   'password'=>$result['password'],
   'role'=>$result['role_name']
   );
   $role=$_SESSION['user']['role'];
   //Redirecting User Based on Role
    switch($role){
  case 'user':
  header('location:input_ajax.php');
  //header('location:chk/');
  break;
  case 'moderator':
  header('location:moderator.php');
  break;
  case 'admin':
  header('location:admin.php');
  break;
 }
 }else{
echo 'Your PassWord or UserName is not Found';
 }
}
else if ($chk_dn!=null)
echo "string";
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
/*
    function login_chk(chk_value){ 
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
 //alert("jjj");
 if (chk_value=="login"){
  
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('chk'); 
      //ajaxDisplay.innerHTML = ajaxRequest.responseText; 
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 var username = document.getElementById('username').value; 

 var user_password = document.getElementById('user_password').value; 
 var dn = document.getElementById('dn').value; 
 var queryString = "?username=" + username ; 
 queryString +=  "&user_password=" + user_password; 
queryString +=  "&dn=" + dn;
/* 
 ajaxRequest.open("GET", "ajax-catagory_upload.php" +  
                              queryString, true); 

 //alert("jjj");
  ajaxRequest.open("GET", "login.php" + 
                              queryString, true); 
 
 ajaxRequest.send(null);  
// alert("jjj");
 }
}*/
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
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
  <form class="form-horizontal" name="contact_form" id="contact_form" method="post" action="">
            <input type="hidden" name="mode" value="login" >
 
            <fieldset>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="username"><span class="required">*</span>Username:</label>
                    <div class="col-lg-6">
                        <input type="text" value="" placeholder="User Name" id="username" class="form-control" name="username" required="" >
                    </div>
                </div>
 
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="user_password"><span class="required">*</span>Password:</label>
                    <div class="col-lg-6">
                        <input type="password" value="" placeholder="Password" id="user_password" class="form-control" name="user_password" required="" >
                    </div>
                </div>

                 <div class="form-group">
    <label class="col-lg-3 control-label" for="dn">Donor:&nbsp;&nbsp;</label>
<div class="col-lg-6 checkbox">
<input type="checkbox" value="donor" id="dn" name="dn">
</div>
  </div>
 
 
                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-2">
                        <button class="btn btn-primary" type="submit" name="login" value="login" >Submit</button> 
                    </div>
                </div>
                <div class="form-group">
     <label class="col-sm-12 col-md-12 col-lg-12  control-label" id="chk">
     </label> 
   
     </div>
            </fieldset>
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
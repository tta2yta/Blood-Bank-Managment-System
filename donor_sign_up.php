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

    function siginup_donor(chk_value){ 
      //document.getElementById('chk').innerHTML="jjj"; 
       //alert("jjj");
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
 //alert("dn_id");
 if (chk_value=="signup"){
 
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
   
      var ajaxDisplay = document.getElementById('chk'); 
     ajaxDisplay.innerHTML = ajaxRequest.responseText; 
     
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
  var dn_id ="<?php $x= $_GET['don_id']; 
echo $x;
  ?>";
  
  
 var dn_us_nm = document.getElementById('username').value; 
  var dn_pass = document.getElementById('user_password').value; 
   var dn_pass_cnf = document.getElementById('user_password_conf').value; 
    var chk = "account_donor"; 
   if(dn_pass!=dn_pass_cnf)
    alert("Password doen not match");
else{
 var queryString = "?dn_id=" + dn_id + "&dn_us_nm=" + dn_us_nm + "&dn_pass=" + dn_pass + "&chk=" + chk; 
 
  ajaxRequest.open("GET", "ajax-signup.php" + 
                              queryString, true); 
 
 ajaxRequest.send(null);
}
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
                    <label class="col-lg-6 control-label" for="username"><span class="required">*</span>Username:</label>
                    <div class="col-lg-6">
                        <input type="text" value="" placeholder="User Name" onfocus="clear_chk()" id="username" class="form-control" name="username" required="" >
                    </div>
                </div>
 
                <div class="form-group">
                    <label class="col-lg-6 control-label" for="user_password"><span class="required">*</span>Password:</label>
                    <div class="col-lg-6">
                        <input type="password" value="" placeholder="Password" onfocus="clear_chk()" id="user_password" class="form-control" name="user_password" required="" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-6 control-label" for="user_password"><span class="required">*</span>Confirm Password:</label>
                    <div class="col-lg-6">
                        <input type="password" value="" placeholder="Password" onfocus="clear_chk()" id="user_password_conf" class="form-control" name="user_password" required="" >
                    </div>
                </div>
 
                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-2">
                        <button class="btn btn-primary" type="button" name="login" value="login" onclick="siginup_donor('signup')">Sign Up</button> 
                    </div>
                </div>
                <div class="form-group">
     <label class="control-label" id="chk"></label> 
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
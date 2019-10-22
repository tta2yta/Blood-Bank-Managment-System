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

    function Search(form){ 
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
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      var ajaxDisplay = document.getElementById('res'); 
    //  ajaxDisplay.innerHTML = ajaxRequest.responseText; 
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 var pers_name = document.getElementById('pers_name').value; 


 var queryString = "?pers_name=" + pers_name  ; 
window.location.href = "edit_ajax.php?pers_name=" + pers_name ;
//alert("ff");
/* 
 ajaxRequest.open("GET", "ajax-catagory_upload.php" +  
                              queryString, true); 
*/
 // ajaxRequest.open("GET", "edit_ajax.php" + 
 //                            queryString, true); 
 
  //ajaxRequest.open("GET", form, true); 
 
 //alert(queryString);
 //ajaxRequest.send(null);  
 }

///////////////////////////////////////////
    function Edit(form){ 

//var pers_id = document.getElementById('id').value;
var pers_id = form.id.value;  

 //var f_name = document.getElementById('fname').value
 var f_name = form.fname.value;
 //var l_name = document.getElementById('lname').value;
 var l_name = form.lname.value; 
 //var age = document.getElementById('age').value;
 var age = form.age.value;
 //var gen = document.getElementById('gn').value;
 var gen = form.gn.value;
 
//var list = document.forms[1].ctg; 
var list = form.ctg;
alert('fff');
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
  //alert('fff');
}
function Delete(form){ 

//var pers_id = document.getElementById('id').value;
var pers_id = form.id.value;  

var ajaxRequest = new XMLHttpRequest();

ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
      //alert('Record Updated Successfully'); 
      var ajaxDisplay = document.getElementById('chk'); 
      ajaxDisplay.innerHTML = ajaxRequest.responseText; 
          //form.removeChild(form.id);
          //form.removeChild(form.fname);
          form.removeNode(true);
//ajaxDisplay.removeChild(form);
   } 
 }

 var queryString = '?pers_id=' + pers_id ; 
 ajaxRequest.open('GET', 'delete_ajax.php' + 
           queryString, true); 
 alert(queryString);
 ajaxRequest.send(null); 
  //alert('fff');
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
      <div class=" col-sm-12 col-md-10 col-lg-10 row input">
  <form class="form-horizontal" role="form" method="POST" action="">
    <div class="form-group ">
    <label class="col-sm-12 col-md-3 col-lg-3 control-label" for="pid">Enter Id</label>
    <div class="col-sm-12 col-md-9 col-lg-9 ">
      <input class="form-control" type="text" name="pers_name" id="pers_name">
    </div>
  </div>
  
   <div class="form-group">
     <label class="col-sm-12 col-md-3 col-lg-3  control-label" for="sm"></label> 
    <div class="col-sm-12 col-md-9 col-lg-9 ">
    <button type="button" class="btn btn-primary" id="add" onclick="Search(this.form)" >Search</button>
    <button type="button" class="btn btn-danger" id="cl" >CLEAR</button>
    </div>
  </div>


</form>
<div id="res">

</div>
<div id="php_code">
<?php
include_once 'inc_1.php';
?>
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
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
if($_SESSION['user']['role']=='user'){
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

    function siginup(chk_value){ 
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

 if (chk_value=="signup"){

  
 ajaxRequest.onreadystatechange = function(){ 
   if(ajaxRequest.readyState == 4){ 
    var str = ajaxRequest.responseText;
    var splitted = str.split("."); 
      var ajaxDisplay = document.getElementById('chk'); 
     //ajaxDisplay.innerHTML = ajaxRequest.responseText; 
     
     if(splitted[0]=="yes"){
      document.getElementById('dn_id').value="";
      window.location.href = "donor_sign_up.php?don_id=" + splitted[1]; 
  }
    else{
ajaxDisplay.innerHTML = ajaxRequest.responseText;
document.getElementById('dn_id').value="";
}
   } 
 } 
 // Now get the value from user and pass it to 
 // server script. 
 var dn_id = document.getElementById('dn_id').value; 
 var chk = "check_donor"; 
 var queryString = "?dn_id=" + dn_id + "&chk=" + chk; 
 
  ajaxRequest.open("GET", "ajax-signup.php" + 
                              queryString, true); 
 
 ajaxRequest.send(null);
 // alert("gg");

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

  <div class="row"> 
<nav class="navbar navbar-inverse" style="margin-bottom:0px;">
 
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
        <li><a href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> </a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in" href="logout.php"></span> Logout</a></li>
      </ul>
    </div>
  
</nav>
</div>



  <div class="row" style="background-color:lavender;">
    <div class="col-sm-12 col-md-6 col-lg-2 row" style="margin:0px;padding:0px;" > <img class="img-responsive img_header" src="web_images/img104.jpg" alt="Chania"> </div>
    <div class="col-sm-12 col-md-6 col-lg-8 mid_header" style="margin:0px;padding:0px;"></div>
    <div class="col-sm-12 col-md-12 col-lg-2 row" style="margin:0px;padding:0px;"><img class="img-responsive img_header" src="web_images/img104.jpg" alt="Chania"></div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-12 row">
    <div class="col-sm-6 col-md-3 col-lg-3 main_left menu" style="margin:0px;padding:0px;">
<ul>
<li>The Flight</li>
<li>The City</li>
<li>The Island</li>
<li>The Food</li>
</ul>
    </div>
    <div class="col-sm-6 col-md-9 col-lg-9 main_body" style="margin:0px;padding:0px;">


<!-- Modal -->
<div id="myModal" class="modal fade pos" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Enter Your Donor Id</h4>
      </div>
      <div class="modal-body">
        <form>
<div class="form-group">
<input type="text" class="form-control input-lg" id="dn_id" onfocus="clear_chk()" placeholder="Insert Donor Id">
</div>
<div class="form-group">
<button type="submit" class="btn btn-danger" id="btn"  onclick="siginup('signup')">Submit</button>
</div>
<div class="form-group">
     <label class="control-label" id="chk"></label> 
     </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 row">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Profile</a></li>
    <li><a data-toggle="tab" href="#menu2">Posts/News</a></li>
    <li><a data-toggle="tab" href="#menu3">Comments</a></li>
  </ul>

  <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <h3>Your Profile</h3>
       <div class="col-sm-12 col-md-5 col-lg-5">
      <?php
      include_once 'dbconfig.php';
      //session_start();
      $val=$_SESSION['user']['username'];
      $sql="SELECT donation_id FROM donor_account where username='$val'";
      $row=mysql_query($sql);
      $result=mysql_fetch_assoc($row);
 $count=mysql_num_rows($row);
 if($count==1){
  $ind=$result['donation_id'];
  $sql_dn="SELECT Fname, Lname, gen, Age, address, Ctg_Name FROM donation INNER JOIN bl_ctg ON (Bl_type = Ctg_Id) where donation_id='$ind'";
   $row_dn=mysql_query($sql_dn);
      $result_dn=mysql_fetch_assoc($row_dn);
   echo "<div ><label class='control-label'>Name: ".$result_dn['Fname']." ".$result_dn['Lname'].
   "</label></div>";
  echo "<div style='background-color:lavender;'><label class='control-label'>Gender: ".$result_dn['gen']."</label></div>";
    echo "<div><label class='control-label'>Age: ".$result_dn['Age']."</label></div>";
   echo "<div><label class='control-label'>Adress: ".$result_dn['address']."</label></div>";
    echo "<div><label class='control-label'>Blood Type: ".$result_dn['Ctg_Name']."</label></div>";
}
      ?>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
      <img  class="img-responsive img_header" src=<?php 
$val=$_SESSION['user']['username'];
$file="upload/".$val.".jpg";
if(!file_exists($file))
echo "upload/img105.jpg";
else
echo $file;
      ?>  alt="Chania">
      <form id="upl_img" method="post" action="" enctype="multipart/form-data">
      <div><input type="file" name="file" id="file">
        <button class="btn btn-primary" type="submit" name="chg" value="chg" >Change</button>
        <?php

$folder="upload/";
$error="nn";
if(isset($_POST['chg']))
{   
$error="nnbb"; 
$val=$_SESSION['user']['username'];
//$file=$val."-".$_FILES['file']['name'];

$file_loc=$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
$file_ext=explode('.',$_FILES['file']['name']);
$file_ext=end($file_ext);
$file=$val.".jpg";
// Check filetype
if($file_ext== 'png' or $file_ext=='jpg' or $file_ext=='jpeg'){

// Check filesize
if ($_FILES['file']['size'] > 500000){
    $error='File uploaded exceeds maximum upload size.';
}

// Check if the file exists

else if(file_exists('upload/' . $file)){
   // $error='File with that name already exists.';

if(move_uploaded_file($file_loc,$folder.$file))
 {
 $error='successfully Changed';
 }
}
 else if(move_uploaded_file($file_loc,$folder.$file))
 {
 $error='successfully uploaded';
 }
 else
 {
$error='error while uploading file';
 }
 } 
 else
 $error='Unsupported filetype uploaded.';
}
echo "<div>".$error."</div>";
?>

      </div>
    </form>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
     
    </div>
  </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Posts/News</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Comments</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
    	
    	</div>
    </div> 
  </div> 
  <div class="row footer" >
  	<div class="col-sm-12 col-md-4 col-lg-4 footer" style="background-color:silver;margin:0px;padding:0px;">

<ul>
<li>The Flight</li>
<li>The City</li>
<li>The Island</li>
<li>The Food</li>
</ul>

  	</div>
  	<div class="col-sm-12 col-md-4 col-lg-4 footer" style="background-color:silver;margin:0px;padding:0px;">

<ul>
<li>The Flight</li>
<li>The City</li>
<li>The Island</li>
<li>The Food</li>
</ul>

  	</div>
  	<div class="col-sm-12 col-md-4 col-lg-4 footer" style="background-color:silver;margin:0px;padding:0px;">

<ul>
<li>The Flight</li>
<li>The City</li>
<li>The Island</li>
<li>The Food</li>
</ul>

  	</div>
  </div>
</div>


	  </body>
	  </html>
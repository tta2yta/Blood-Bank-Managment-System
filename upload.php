<?php

$folder="upload/";

if(isset($_POST['btnupload']))
{    

$file=$var1."-".$_FILES['file']['name'];
$file_loc=$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
$file_ext=explode('.',$_FILES['file']['name']);
$file_ext=end($file_ext);
// Check filetype
if($file_ext!= 'png' or $file_ext!='jpg' or $file_ext!='jpeg'){
    $error='Unsupported filetype uploaded.';
}
// Check filesize
elseif ($_FILES['file']['size'] > 500000){
    $error='File uploaded exceeds maximum upload size.';
}

// Check if the file exists
elseif(file_exists('upload/' . $_FILES['file']['name'])){
    $error='File with that name already exists.';
}
 elseif(move_uploaded_file($file_loc,$folder.$file)
 {
 $error='successfully uploaded';
 }
 else
 {
$error='error while uploading file';
 }
 } 
 
?>
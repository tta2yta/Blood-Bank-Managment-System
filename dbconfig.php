<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="root";
$dbname="B_L_BANK";
mysql_connect($dbhost,$dbuser,$dbpass) or die('Can not connect to server');
mysql_select_db($dbname) or die('Database selection problem');
?>
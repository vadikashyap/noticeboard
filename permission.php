<?php
session_start();
include 'database.php';



if (isset($_GET['Ausername'])) {
$r=$_GET['Ausername'];

$updateadmin="UPDATE master_user SET status='A' WHERE username='$r';";
$queryadminup=mysql_query($updateadmin);
header('location:adminview.php');
}


if (isset($_GET['Tusername'])) {
$r=$_GET['Tusername'];

$updateadmin="UPDATE master_user SET status='T' WHERE username='$r';";
$queryadminup=mysql_query($updateadmin);
header('location:adminview.php');
}



 ?>
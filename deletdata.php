<?php
session_start();
include 'database.php';
if (isset($_GET['username'])) {
$r=$_GET['username'];
$s="delete from master_user where username='$r'";
$res=mysql_query($s);
header('location:adminview.php');
}


if (isset($_GET['noticeid'])) {
$r=$_GET['noticeid'];

$notice="delete from board where id='$r'";
$querynotice=mysql_query($notice);
header('location:home.php');
}



if (isset($_GET['id'])) {
$r=$_GET['id'];

$notice="delete from board where id='$r'";
$querynotice=mysql_query($notice);
header('location:home.php');
}



 ?>
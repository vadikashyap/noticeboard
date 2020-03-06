<?php
include "database.php";



if (isset($_GET['notice'])) {
$r=$_GET['notice'];
echo "<pre>$r</pre";
$s="delete from board where notice='$r'";
$res=mysql_query($s);
}


// header('location:home.php');
 ?>
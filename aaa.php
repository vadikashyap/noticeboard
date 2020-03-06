<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="login.css">
<!--===============================================================================================-->


   <style>
.mySlides {display:none;}

.container-login100{
	background-color: #f4511e !important;
}
</style>

</head>
<body>

	
	<div class="limiter">
		<div class="container-login100">
			<font  style="font-size: 6rem; color: white;text-align: center; margin: 5%;">Digital Notice Board</font>
					<div class="wrap-login100">
				<form class="login100-form validate-form"name="login" method="POST" action="index.php">
					<span class="login100-form-title p-b-26">
						
						Login
					</span><BR><BR>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						USERNAME<input class="input100" type="text" name="USERNAME">
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						PASSWORD<input class="input100" type="password" name="PASSWORD">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>
					<BR>
					<div class="text-center">
						
Create Nwe Account
						<a class="txt" href="sinup.php">
							Sinup..
						</a>
					<br>
						

					</div><br><br>
				</form>


				<?php 
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
session_start();
include 'database.php';

$stu="SELECT * FROM `master_user` ";
 $student=mysql_query($stu);

 

 while (($row=mysql_fetch_array($student))) {
 $userstudent=$row['username']; 
$userdept=$row['branch'];
$status=$row['status'];

echo " $userstudent  ";
echo " $userdept ";
echo " $status<br>";
}
exit;
?>



if (isset($_POST["login"])) {
	$A=$_POST['USERNAME'];
	$B=$_POST['PASSWORD'];

	$X=mysql_query("select * from master_user where username='$A' && password='$B'");

	$row=mysql_num_rows($X);

	if ($row==true) {
		$_SESSION['username']=$A;
		header('location:home.php');
	}

	else{
		echo "<h1>Username & Password not match</h1>";
	}
	
}
 ?>
				
			</div>
		</div>
	</div>
	





	


</body>
</html>
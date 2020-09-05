<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <?= link_tag("Assets/css/form.css") //type:2 html helper ?>
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
						
				<!-- <form class="login100-form validate-form"name="login" method="POST" action="index.php"> -->
					<?php  echo form_open('Login_Reg/LoginCondition','class="login100-form validate-form"');  ?>
					<span class="login100-form-title p-b-26">
						
						Login
					</span><BR>

					<?php if($error_login=$this->session->flashdata('login_fail') ) :  ?>
					<div class="alert alert-denger" style="background-color: #F16F45;">

						<?php  echo "$error_login";  ?>
					</div>
				<?php  endif; ?>



					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						USERNAME<input class="input100" type="text" name="USERNAME" required>
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						PASSWORD<input class="input100" type="password" name="PASSWORD" required>
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
						<a class="txt" href="<?php echo base_url()?>Login_Reg/reg_form">
							Sinup..
						</a>
					<br>
						

					</div><br><br>
				</form>


				
			</div>
		</div>
	</div>
	





	


</body>
</html>
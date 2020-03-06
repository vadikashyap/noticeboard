<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Signup. </title>
	<meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--===============================================================================================-->
	
	<link rel='stylesheet' type='text/css' href='login.css'>
<!--===============================================================================================-->


   <style>
.mySlides {display:none;}

.container-login100{
	background-color: #f4511e !important;
}

input:focus{
  border-color:  #f4511e !important;
}

textarea:focus{
  border-color:  #f4511e !important;
}
:focus{
  border-color:  #f4511e !important;
}


.sinupimg{
	width: 100%;
	border-radius: 50px;
	border: solid ;
}
</style>

</head>
<body>

<div class='jumbotron bg-grey' >
	<div class='row '>
	<div class='col-xs-4'>

		<a href='studentsinup.php' target="sinup" >
		<img src='img/StudentRegistration.png' class='sinupimg' >
		
		</a>

		
		
	</div>

	<div class='col-xs-4'>
		<a href='teachersinup.php' target="sinup" >
		<img src='img/TEACHER1.png' class='sinupimg'>
		</a>

		
	</div>

	<div class='col-xs-4'>
		<a href='adminsinup.php' target="sinup">
		<img src='img/ADMIN1.png' class='sinupimg'>	
	</a>

	
	</div>
</div>

<div class="text-center" > Alrady Login Click <a href="index.php"> Login</a></div>

</div>
















<!-- 

	
	<div class='limiter'>
		<div class='container-login100'>
			<div class='wrap-login100'>


				<form class='login100-form validate-form' name='noticedata' method='POST' action='#' enctype='multipart/form-data'>
					<span class='login100-form-title p-b-26'>
						Sinup Student
					</span><BR><BR>

  <div class='form-group'> 
    <label  class='control-label'>USERNAME</label>
    <input type='text' class='form-control'   name='username' placeholder='USERNAME'>
  </div> 

  <div class='form-group'> 
    <label  class='control-label'>PASSWORD</label>
    <input type='text' class='form-control'   name='password' placeholder='PASSWORD'>
  </div>  

  <div class='form-group'> 
    <label  class='control-label'>EMAIL</label>
    <input type='text' class='form-control'   name='email' placeholder='demo@gmail.com'>
  </div> 
  
  <div class='form-group'> Full Name
    <label  class='control-label'>MOBILE NO</label>
    <input type='number' class='form-control'   name='mobile' placeholder='999 999  '>
  </div> 

<div class='form-group'> 
    <label  class='control-label'>BRANCH</label>
   <select class='form-control'>
   	<option></option>
   	<option>Computer</option>
   	<option>Civil</option>
   	<option>Electrical</option>
   	<option>Mechanical</option>
   </select>
  </div> 

  <div class='form-group'> 
    <label  class='control-label'>ENROLLMENT NO</label>
    <input type='number' class='form-control'   name='mobile' placeholder='Er. No'>
  </div><br>
  
  <div class='form-group text-center'> 
    <button type='submit' class='btn ' style='background-color: #f4511e !important; color: white;' name='submit'>Submit!</button>
  </div>     
  
</form> 


				
				
			</div>
		</div>
	</div>

 -->





<iframe src="studentsinup.php" width="100%" height="800px" name="sinup"></iframe>


</body>
</html>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>student Signup. </title>
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
	background-color: #bc3409 !important;
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
	
	<div class='limiter'>
		<div class='container-login100'>
			<div class='wrap-login100'>


<?php include 'database.php'; 

if (isset($_POST['submit'])) {


      
$a=$_POST['username'];
 $b=$_POST['password'];
 $c=$_POST['email'];
 $d=$_POST['mobile'];
 $e=$_POST['branch'];
 $f=$_POST['erno']; 




$sss=mysql_query("select * from master_user where username='$a'");

$num = mysql_num_rows($sss);
if ($num == true) {

     echo "<h2><font color='red'>USER Name Alredy Taken</font></h2>";
   
}
else{




   $pla= "INSERT INTO `master_user` (`username`, `password`, `email`, `mobile`, `branch`, `id`, `status`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', 'S');";

$x=mysql_query($pla);
if ($x == 1) {
  # code...
 echo "<script> alert('Add Data Successful'); </script> ";
}
else{
   echo "<script> alert('Data Not Add Place Try Again'); </script> ";
 }
}
}
?>




         


				<form class='login100-form validate-form' name='studentsinup' method='POST' action='#' enctype='multipart/form-data'>
					<span class='login100-form-title p-b-26'>
						Signup Student
					</span><BR><BR>

  <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>USERNAME</label>
    <input type='text' class='form-control'   name='username' placeholder='USERNAME'>
  </div> 

  <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>PASSWORD</label>
    <input type='password' class='form-control'   name='password' placeholder='PASSWORD'>
  </div>  

  <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>EMAIL</label>
    <input type='email' class='form-control'   name='email' placeholder='demo@gmail.com'>
  </div> 
  
  <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>MOBILE NO</label>
    <input type='number' class='form-control'   name='mobile' placeholder='999 999  '>
  </div> 

<div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>BRANCH</label>
   <select class='form-control' name="branch">
   	<option></option>
   	<option>Computer</option>
   	<option>Civil</option>
   	<option>Electrical</option>
   	<option>Mechanical</option>
   </select>
  </div> 

  <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>ENROLLMENT NO</label>
    <input type='number' class='form-control'   name='erno' placeholder='Er. No'>
  </div><br>
  
  <div class='form-group text-center'> <!-- Submit Button -->
    <button type='submit' class='btn ' style='background-color: #f4511e !important; color: white;' name='submit'>Submit!</button>
  </div>     
  
</form> 


				
				
			</div>
		</div>
	</div>


</body>
</html>
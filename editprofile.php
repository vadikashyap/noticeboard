<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Edit Profile</title>
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


<?php include 'database.php'; ini_set('error_reporting', 0);
ini_set('display_errors', 0);
session_start();

if (isset($_POST['submit'])) {


      
 $c=$_POST['email'];
 $d=$_POST['mobile'];

 $f=$_POST['erno']; 

$name=$_SESSION['username'];




   $pla= "UPDATE master_user SET email = '$c', mobile = '$d', id = '$f' WHERE username = '$name';";

$x=mysql_query($pla);
if ($x == 1) {
  # code...
 echo "<script> alert('UPDATE Successful'); </script> ";
}
else{
   echo "<script> alert('Data Not UPDATE Place Try Again'); </script> ";
 }
}


$ssee=$_SESSION['username'];
$studata="SELECT * FROM `master_user` WHERE username='$ssee'";
 $student=mysql_query($studata);


         while (($row=mysql_fetch_array($student))) {
          $name=$row['username'];
          $pass=$row['password'];
          $email=$row['email'];
          $mobile=$row['mobile'];
          $branch=$row['branch'];
           $id=$row['id'];
?>
				<form class='login100-form validate-form' name='studentsinup' method='POST' action='#' enctype='multipart/form-data'>
					
          <font style="text-align: center;"><a href="home.php">home</a></font>
          <span class='login100-form-title p-b-26'>
						Edit Details
					</span><BR><BR>

   <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>Name</label>
  <input type="text" class='form-control' name="lname" value="<?php echo $name; ?>" disabled>
  </div> 

   <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>Password</label>
    <input type="text" class='form-control' name="lname" value="<?php echo $pass; ?>" disabled>
  </div> 

  <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>EMAIL</label>
    <input type='email' class='form-control'   name='email' placeholder='demo@gmail.com' value="<?php echo $email; ?>">
  </div> 
  
<div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>Branch</label>
    <input type="text" class='form-control' name="lname" value="<?php echo $branch; ?>" disabled>
  </div> 

  <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>MOBILE NO</label>
    <input type='number' class='form-control'   name='mobile' placeholder='999 999  9999' value="<?php echo $mobile; ?>">
  </div> 



  <div class='form-group'> <!-- Full Name -->
    <label  class='control-label'>ID NO</label>
    <input type='number' class='form-control'   name='erno' placeholder='Er. No' value="<?php echo $id; ?>">
  </div><br>
  
  <div class='form-group text-center'> <!-- Submit Button -->
    <button type='submit' class='btn ' style='background-color: #f4511e !important; color: white;' name='submit'>Update!</button>
  </div>     
  
</form> 


				
				<?php } ?>
			</div>
		</div>
	</div>


</body>
</html>
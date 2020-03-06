<?php session_start(); 

ini_set('error_reporting', 0);
ini_set('display_errors', 0);
$A=$_SESSION['username']; 


 if(isset($_SESSION['username']))
                        {
                          

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Digital Notice Board</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="custom-css.css">
<style type="text/css">
input:focus{
  border-color:  #f4511e !important;
}

textarea:focus{
  border-color:  #f4511e !important;
}
:focus{
  border-color:  #f4511e !important;
}
</style>

</head>
<body>
  <?php   
   include 'database.php'; 

  $A=$_SESSION['username']; 

  





$s="select * from master_user where username='$A' AND status = 'A'";
$res=mysql_query($s);

$v=mysql_fetch_array($res);

if ($v == null) {
  echo "You Not Access This Page Place Go To <a href'home.php' style='color:red;'> Home...</a>";
  exit();
}


?>

  

</div>
<nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="#">Welcom : <?php echo "$session";   ?> Admin
                            </a>
                        
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">

                          
                    
                        
                                <li>
                                    <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" style="background-color: white !important; color: red; height: 45px !important; margin: 5%;" type="button" data-toggle="dropdown">Admin
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu" style="color: red !important;">
                                      <li><a href="home.php">Home</a></li>
                                      <li><a  href="adminnotice.php">Add Notice</a></li>
                                      <li><a  href="adminview.php">Show LoginDetails</a></li>
                                      <li><a  href="adminreq.php">Admin Requeat</a></li>
                                      <li><a  href="logout.php">Logout</a></li>
                                      

                                    </ul>
                                  </div>
                                </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="jumbotron text-center">
    <h1><h1 class="text-center">Admin Notice  <?php echo "("; echo $_SESSION['username']; echo ")";


    while (($row=mysql_fetch_array($res))) {

   ?> </h1> 
  <br> 
    <h2 class="text-center">
      <?php  $dpt=$row['dept']; echo$dpt;  $_SESSION['department']=$dpt;?> Department</h2>
       <?php 
    }
    

     ?></h1>
    <br>
    <form>
        <div class="col-sm-4"></div>
        <div class="input-group col-sm-4">
            <input type="email" class="form-control" size="50" placeholder="Email Address" required>
            <div class="input-group-btn">
                <button type="button" class="btn btn-danger">Subscribe</button>
            </div>
        </div>
    </form>
    
</div>



  <div class="container">
     <div class="col-sm-3">
       <?php 

       
if (isset($_POST['submit'])) {


     
 $b=$_POST['subject'];
 $c=$_POST['notice'];
 $date=date("Y-m-d");
 $teachername=$_SESSION['username'];

 $name_file = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $local_image = "uploaded/".$name_file;
    move_uploaded_file($tmp_name,$local_image);



   $pla= "INSERT INTO `board` (`dept`, `subject`, `notice`, `date`, `teachername`, `file`) VALUES ('Admin', '$b', '$c', '$date', '$teachername', '$local_image');";

$x=mysql_query($pla);

echo "$x";
if ($x == 1) {
  # code...
  echo "Add Data Successful";
}
else{
  echo "Data not add";

  echo "$a <br>";
  echo "$b <br>";
  echo "$c <br>";
  echo "$date <br>";
  echo "$teachername";

 }
}
?>
     </div>
  




      <div class="col-sm-6">
        
	<form class="login100-form validate-form" name="noticedata" method="POST" action="#" enctype="multipart/form-data">

  <div class="form-group"> <!-- Full Name -->
    <label for="full_name_id" class="control-label">Subject</label>
    <input type="text" class="form-control"   name="subject" placeholder="Subject">
  </div>  
  

<div class="form-group green-border-focus">
  <label for="exampleFormControlTextarea5">Notice</label>
  <textarea class="form-control"  rows="4" name="notice"></textarea>
</div>

<div class="form-group green-border-focus">
  <label for="exampleFormControlTextarea5">Document</label>
 <input type="file" name="photo" >
</div>
  
  
  <div class="form-group"> <!-- Submit Button -->
    <button type="submit" class="btn btn-danger" name="submit">Submit!</button>
  </div>     
  
</form>   
</div>
</div>

<?php }



else
{
  echo "Page Not Found Place <a href='index.php' style='color:red;'>Login</a>";
}

 ?>

</body>
</html>
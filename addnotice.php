<?php session_start(); 
include "database.php";
ini_set('error_reporting', 0);
ini_set('display_errors', 0);

$A=$_SESSION['username']; 
  



$s="select * from master_user where username='$A' AND status != 'S'";
$res=mysql_query($s);

$xx=mysql_fetch_array($res);


switch ($xx['branch']) {
  case 'Computer':
    $_SESSION['department']="Computer";
    break;

    case 'Civil':
    $_SESSION['department']= "Civil";
    break;

    case 'Electrical':
    $_SESSION['department']= "Electrical";
    break;

    case 'Mechanical':
    $_SESSION['department']= "Mechanical";
    break;

    case 'Admin':
    $_SESSION['department']= "Admin";
    break;
  
  default:
    exit;
    break;
}



// exit;


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

  





$s="select * from master_user where username='$A' AND status != 'S'";
$res=mysql_query($s);

$v=mysql_fetch_array($res);




if ($v == null) {
  echo "You Not Access This Page Place Go To <a href'home.php' style='color:red;'> Home...</a>";
  exit();
}


?>
  <div class="jumbotron " style="background-color: #f4511e;">
     <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['username']; ?> 
                            </a>
                    </div>




                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">

                          
                    
                        
                                <li>
                                    <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" style="background-color: white !important; color: red; height: 45px !important; margin: 5%;" type="button" data-toggle="dropdown">Notice
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu" style="color: red !important;">
                                      <li><a href="home.php">Home</a></li>
                                      <li><a  href="addnotice.php">Add Notice</a></li>
                                      <li><a href="studentdetails.php">Student Details</a></li>
                                      <li><a  href="logout.php">Logout</a></li>
                                      

                                    </ul>
                                  </div>
                                </li>
                        </ul>
                    </div>


                    
                </div>
            </nav>
  
    <h2 class="text-center">
      <?php 
       $dpt=$_SESSION['department'];    echo "$dpt"; ?> Department</h2>
      

    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">

                            <a class="navbar-brand" href="home.php"><font style="color: white;">Home</font></a>
                           <a class="navbar-brand" href="index.php"><font style="color: white;">Logout</font></a>
                            
                        </ul>
                    </div>
  </div>

  <div class="container">
     <div class="col-sm-3">
       <?php 


if (isset($_POST['submit'])) {


     
 $a=$_SESSION['department'];
 $b=$_POST['subject'];
 $c=$_POST['notice'];
 $date=date("Y-m-d");
 $teachername=$_SESSION['username'];

 $name_file = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $local_image = "uploaded/".$name_file;
    move_uploaded_file($tmp_name,$local_image);



   $pla= "INSERT INTO `board` (`dept`, `subject`, `notice`, `date`, `teachername`, `file`) VALUES ('$a', '$b', '$c', '$date', '$teachername', '$local_image');";

$x=mysql_query($pla);


if ($x == 1) {
  # code...
  echo "<script> alert('Add Data Successful'); </script> ";
}
else{
  echo "<script> alert('Place Try Again'); </script> ";

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
</body>
</html>
<?php 
}



else
{
  echo "Page Not Found Place <a href='index.php' style='color:red;'>Login</a>";
}
 ?>

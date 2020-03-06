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

    </style>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
session_start();
include "database.php";

// ***********************************   session start 1st (if condition session) ****************************

$session=$_SESSION['username'];

$q="SELECT * FROM `master_user` WHERE username='$session' AND status='T'";
 $res=mysql_query($q);

while (($row=mysql_fetch_array($res))) {
 $userstudent=$row['username']; 
$userdept=$row['branch'];
echo "$userdept";

$_SESSION['branch']=$userdept;
$status=$row['status'];

}


if(isset($_SESSION['username']))
   {


$ses=$_SESSION['username'];

$stu="SELECT * FROM `master_user` WHERE username='$session' AND status='T' OR status='A' ";
 $student=mysql_query($stu);



 while (($row=mysql_fetch_array($student))) {
 $userstudent=$row['username']; 

$status=$row['status'];

?>

            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Welcom : <?php echo "$session";   ?> Sir/Mem
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







      

                <div class="jumbotron text-center">
                    <h1><?php echo "$userdept";  ?> Department Student Details </h1>
                    <br>                

                </div>


<?php 
$fatch="select * from master_user WHERE `branch`='$userdept' AND status='S'";
$studata=mysql_query($fatch);



?>
<div class="container">
<div class="table-responsive">          
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Email</th>
        <th>MobileNo</th>
        <th>Enrolment No</th>
      </tr>
    </thead>
    <tbody>
        <?php
        while (($row=mysql_fetch_array($studata))) {
            
        ?>
      <tr>
        <td></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['id']; ?></td>
      </tr>
  <?php  } exit;?>
    </tbody>
  </table>
  </div>
</div>
      <?php } 


            }
        
             else {
                echo "Place Loin";
            }
            ?>
            </body>
            </html>
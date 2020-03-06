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
// $q="SELECT * FROM `master_user` WHERE username='$session' AND status='S'";
//  $res=mysql_query($q);

// while (($row=mysql_fetch_array($res))) {
//  $userstudent=$row['username']; 
// $userdept=$row['branch'];
// $_SESSION['branch']=$userdept;
// $status=$row['status'];

// echo "$userdept";
// }

// echo "<br>$session<br>";
// exit;

if(isset($_SESSION['username']))
   {
?>
        <!-- ***************************************Login Student*********************************** -->
        <?php 
$ses=$_SESSION['username'];

$stu="SELECT * FROM `master_user` WHERE username='$ses' AND status='S'";
 $student=mysql_query($stu);

$q="SELECT * FROM `master_user` WHERE username='$ses' || status='S'";
 $res=mysql_query($q);



$result="select status from `master_user` WHERE username='$ses' ";
$demo=mysql_query($result);

$v=mysql_fetch_array($demo);
switch ($v['status']) {
  
case 'A_Req': 
?>
  <div class="jumbotron text-center">
                    <h1>Place Contact Admin After Conform Show Deshboard</h1>
                    <h2><a href="index.php">Login</a></h2>
                    

                </div>
                <?php
  break;

  case 'T_Req': 
?>
  <div class="jumbotron text-center">
                    <h1>Place Contact Admin After Conform Show Deshboard</h1>
                    <h2><a href="index.php">Login</a></h2>
                    

                </div>
                <?php
  break;
// **********************************************************Student*******************************
  case 'S':
    
 while (($row=mysql_fetch_array($student))) {
 $userstudent=$row['username']; 
$userdept=$row['branch'];
$_SESSION['branch']=$userdept;
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
                        <a class="navbar-brand" href="#">Welcom : <?php echo "$session";   ?> 
                            </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="editprofile.php">Edit Profile</a></li>
                            <li><a class="" href="#"><?php echo "$userdept";  ?> Department</a></li>
                            <li><a class="" href="logout.php">Logout </a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php } ?>

                <div class="jumbotron text-center">
                    <h1>Digital Notice Board Student </h1>
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

                <!-- Container (Admin Section) -->

    <?php 

    $s="select * from board where dept='Admin'";
$res=mysql_query($s);

 ?>
        <div class="container slideanim" style="background-color: #f6f6f6;">
            <div id="computer" class="container-fluid ">
                <h2 class="text-center">Genral Notice</h2>
                <div class="row">

                    <div class="timeline ">
                        <?php while (($row=mysql_fetch_array($res))) { ?>
                            <div class="container1 right1 ">
                                <div class="content panel ">


                                   <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$row['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$row['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$row['subject']; echo $dpt; ?> </h2></div>
                                              </div>

                                  
                                    <p><pre><?php  $dpt=$row['notice']; echo $dpt; ?></pre></p>
                                    <p style="text-align: right;"><a href="<?php  $dpt=$row['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>
                                </div>
                            </div>
                            <?php } ?>

                    </div>

                </div>
            </div>
        </div>
        <br>

                <!-- Container (computer Section) -->

                <?php 
                $userdept=$_SESSION['branch'];

    $s="select * from board where dept='$userdept'";
$bres=mysql_query($s); ?>

<div class="container slideanim" style="background-color: #eaeaea;">
                        <div id="computer" class="container-fluid ">
                            <h2 class="text-center"><?php  $userdept=$_SESSION['branch']; echo "$userdept"; ?></h2>
                            <div class="row">

                                <div class="timeline">


                    
                                    <?php while (($row=mysql_fetch_array($bres))) { ?>
                                        <div class="container1 right1">
                                            <div class="content panel">

                                              <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$row['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$row['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$row['subject']; echo $dpt; ?> </h2></div>
                                              </div>
                                              

                                               
                                                
                                                <p><pre><?php  $dpt=$row['notice']; echo $dpt; ?></pre></p>
                                                <p style="text-align: right;"><a href="<?php  $dpt=$row['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>
                                            </div>
                                        </div>
                                        <?php } ?>

                                </div>

                            </div></div></div><br>
                   
                   











 <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>













<!-- *******************************************************teacher************************************** -->

    <?php 
    break;

     case 'T':
     ?>
        <?php   

 while (($rowt=mysql_fetch_array($res))) {
 $userstudent=$rowt['username']; 
$tuserdept=$rowt['branch'];

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

                            <li></li>
                            <li><a href="editprofile.php">Edit Profile</a></li>
                            <li><a class="navbar-brand" href="addnotice.php">Add Notice</a></li>
                            <li><a class="navbar-brand" href="studentdetails.php">Student Details</a></li>
                            <li><a class="navbar-brand" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php } ?>

                <div class="jumbotron text-center">
                    <h1>Digital Notice Board Teacher</h1>
                    <h1><?php echo "$tuserdept";   ?> Department</h1>
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

                <!-- Container (Admin Section) -->

    <?php 

    $s="select * from board where dept='Admin'";
$res=mysql_query($s);

 ?>
        <div class="container slideanim" style="background-color: #f6f6f6;">
            <div id="computer" class="container-fluid ">
                <h2 class="text-center">Genral Notice</h2>
                <div class="row">

                    <div class="timeline">
                        <?php while (($row=mysql_fetch_array($res))) { ?>
                            <div class="container1 right1">
                                <div class="content panel">


                                   <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$row['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$row['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$row['subject']; echo $dpt; ?> </h2></div>
                                              </div>

                                  
                                    <p><pre><?php  $dpt=$row['notice']; echo $dpt; ?></pre></p>
                                    <p style="text-align: right;"><a href="<?php  $dpt=$row['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>
                                </div>
                            </div>
                            <?php } ?>

                    </div>

                </div>
            </div>
        </div>
        <br>

                <!-- Container (computer Section) -->

                <?php 

    $st="select * from board where dept='$tuserdept'";
$tbres=mysql_query($st); ?>

<div class="container slideanim" style="background-color: #d0d0d0;">
                        <div id="computer" class="container-fluid ">
                            <h2 class="text-center"><?php echo "$tuserdept"; ?> Student Notice</h2>
                            <div class="row">

                                <div class="timeline">


                    
                                    <?php while (($ttrow=mysql_fetch_array($tbres))) { ?>
                                        <div class="container1 right1">
                                            <div class="content panel">


                                              <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$ttrow['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$ttrow['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$ttrow['subject']; echo $dpt; ?> </h2></div>
                                              </div>

                                                
                                                <p><pre><?php  $dpt=$ttrow['notice']; echo $dpt; ?></pre></p>
                                                <p style="text-align: right;"><a href="<?php  $dpt=$ttrow['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>
                                                
                                            </div>
                                        </div>
                                        <?php } ?>

                                </div>

                            </div></div></div><br>
                   
                   







 <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>











<!-- 
************************************************Admin***************************** -->
     <?php
    
    break;

     case 'A':
     ?>
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

                          
                          <li><a href="#computer">Computer</a></li>
                          <li><a href="#mechanical">Mechanical</a></li>
                          <li><a href="#civil">Civil</a></li>
                          <li><a href="#electrical">Electrical</a></li>
                        
                                <li>
                                    <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" style="background-color: white !important; color: red; height: 45px !important; margin: 5%;" type="button" data-toggle="dropdown">Admin
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu" style="color: red !important;">
                                      <li><a href="editprofile.php">Edit Profile</a></li>
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
    <h1>Digital Notice Board</h1>
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
<?php include 'database.php'; ?>

 <!-- Container (Admin Section) -->

    <?php 

    $s="select * from board where dept='Admin'";
$res=mysql_query($s);

 ?>
        <div class="container slideanim" style="background-color: #d0d0d0;">
            <div id="computer" class="container-fluid ">
                <h2 class="text-center">Admin</h2>
                <div class="row">

                    <div class="timeline">
                        <?php while (($row=mysql_fetch_array($res))) { ?>
                            <div class="container1 right1">
                                <div class="content panel">


                                   <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$row['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$row['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$row['subject']; echo $dpt; ?> </h2></div>
                                              </div>

                                  
                                    <p><pre><?php  $dpt=$row['notice']; echo $dpt; ?></pre></p>
                                    <p style="text-align: right;"><a href="<?php  $dpt=$row['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>


                                    <button name="update" value="update"><a href="updatenotice.php?id=<?php echo $row['id'] ;?>"><font color="blue">Update</font></a></button>

                                    <button name="delet" value="delet"><a href="deletdata.php?id=<?php echo $row['id'] ;?>"><font color="red">Delete</font></a></button>

                                </div>
                            </div>
                            <?php } ?>

                    </div>

                </div>
            </div>
        </div>
        <br>



    <!-- Container (computer Section) -->

    <?php 

    $s="select * from board where dept='Computer'";
$res=mysql_query($s);

 ?>
        <div class="container slideanim" style="background-color: #d0d0d0;">
            <div id="computer" class="container-fluid ">
                <h2 class="text-center">Computer</h2>
                <div class="row">

                    <div class="timeline">
                        <?php while (($row=mysql_fetch_array($res))) { ?>
                            <div class="container1 right1">
                                <div class="content panel">


                                   <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$row['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$row['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$row['subject']; echo $dpt; ?> </h2></div>
                                              </div>

                                  
                                    <p><pre><?php  $dpt=$row['notice']; echo $dpt; ?></pre></p>
                                    <p style="text-align: right;"><a href="<?php  $dpt=$row['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>

                                    <button name="update" value="update"><a href="updatenotice.php?id=<?php echo $row['id'] ;?>"><font color="blue">Update</font></a></button>
                                    <button name="delet" value="delet"><a href="deletdata.php?id=<?php echo $row['id'] ;?>"><font color="red">Delete</font></a></button>
                                </div>
                            </div>
                            <?php } ?>

                    </div>

                </div>
            </div>
        </div>
        <br>

        <!-- Container (mechanical Section) -->

        <?php 

    $s="select * from board where dept='Mechanical' ORDER BY date";
$res=mysql_query($s);

 ?>
            <div id="mechanical" class="container slideanim bg-grey">
                <div class="container-fluid ">

                    <h2 class="text-center">mechanical</h2>
                    <br>
                    <div class="row">

                        <div class="timeline">

                            <?php while (($row=mysql_fetch_array($res))) { ?>
                                <div class="container1 right1">
                                    <div class="content panel">

                                       <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$row['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$row['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$row['subject']; echo $dpt; ?> </h2></div>
                                              </div>

                                        
                                        <p><pre><?php  $dpt=$row['notice']; echo $dpt; ?></pre></p>
                                        <p style="text-align: right;"><a href="<?php  $dpt=$row['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>

                                        <button name="update" value="update"><a href="updatenotice.php?id=<?php echo $row['id'] ;?>"><font color="blue">Update</font></a></button>
                                        <button name="delet" value="delet"><a href="deletdata.php?id=<?php echo $row['id'] ;?>"><font color="red">Delete</font></a></button>
                                    </div>
                                </div>
                                <?php } ?>

                        </div>

                    </div>
                </div>
            </div>
            <br>

            <!-- Container (civil Section) -->

            <?php 

    $s="select * from board where dept='Civil'";
$res=mysql_query($s);

 ?>
                <div class="container slideanim" style="background-color: #d0d0d0;">
                    <div id="civil" class="container-fluid ">
                        <h2 class="text-center">Civil</h2>
                        <div class="row">

                            <div class="timeline">
                                <?php while (($row=mysql_fetch_array($res))) { ?>
                                    <div class="container1 right1">
                                        <div class="content panel">

                                             <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$row['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$row['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$row['subject']; echo $dpt; ?> </h2></div>
                                              </div>

                                            <p><pre><?php  $dpt=$row['notice']; echo $dpt; ?></pre></p>
                                            <p style="text-align: right;"><a href="<?php  $dpt=$row['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>

                                            <button name="update" value="update"><a href="updatenotice.php?id=<?php echo $row['id'] ;?>"><font color="blue">Update</font></a></button>
                                            <button name="delet" value="delet"><a href="deletdata.php?id=<?php echo $row['id'] ;?>"><font color="red">Delete</font></a></button>
                                        </div>
                                    </div>
                                    <?php } ?>

                            </div>

                        </div>
                    </div>
                </div>
                <br>

                <!-- Container (electrical Section) -->



                <?php 

    $s="select * from board where dept='Electrical'";
$res=mysql_query($s);

 ?>
                    <div class="container slideanim bg-grey">
                        <div id="electrical" class="container-fluid ">

                            <h2 class="text-center">Electrical</h2>
                            <br>
                            <div class="row">

                                <div class="timeline">

                                    <?php while (($row=mysql_fetch_array($res))) { ?>
                                        <div class="container1 right1">
                                            <div class="content panel">

                                                <div class="row">
                                               
                                                <div class="col-sm-5"><p >Upload By :- <?php $teach=$row['teachername']; echo "$teach"; ?> Sir/Mem</p>
                                                  <p >Date :- <?php $teach=$row['date']; echo "$teach"; ?></p>

                                                </div>

                                                 <div class="col-sm-7"> <h2> <?php  $dpt=$row['subject']; echo $dpt; ?> </h2></div>
                                              </div>

                                                <p><pre><?php  $dpt=$row['notice']; echo $dpt; ?></pre></p>
                                                <p style="text-align: right;"><a href="<?php  $dpt=$row['file']; echo $dpt; ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p>
                                                <button name="update" value="update"><a href="updatenotice.php?id=<?php echo $row['id'] ;?>"><font color="blue">Update</font></a></button>
                                                <button name="delet" value="delet"><a href="deletdata.php?id=<?php echo $row['id'] ;?>"><font color="red">Delete</font></a></button>
                                            </div>
                                        </div>
                                        <?php } }?>

                                </div>

                            </div>
                        </div>
                    </div>
                    <br>










<?php include 'footer.php'; ?>


 <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>



     <?php
    
    break;
  

}
else
{
  echo "Place Login After Enter Clich hear to  <a href='index.php' style='color:red;'>LOGIN...</a>";
}


 ?>









</body>

</html>
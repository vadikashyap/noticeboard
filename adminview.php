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


$q="SELECT * FROM `master_user` WHERE username='$session' AND status='S'";
 $res=mysql_query($q);

while (($row=mysql_fetch_array($res))) {
 $userstudent=$row['username']; 
$userdept=$row['branch'];
$_SESSION['branch']=$userdept;
$status=$row['status'];

}

if(isset($_SESSION['username']))
   {


$ses=$_SESSION['username'];

$stu="SELECT * FROM `master_user` WHERE username='$ses' AND status='A'  ";
 $student=mysql_query($stu);

 if ($student == null) {
    echo "string"; exit;

}
else {

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
                    <h1><?php echo "$userdept";  ?>  Details </h1>
                    <br>                

                </div>

<?php 
$fatch="select * from master_user WHERE status='S' ORDER BY branch";
$studata=mysql_query($fatch);

?>
<div class="container slideanim">
<div class="table-responsive ">
<div class="text-center" style="font-size: 4rem;">Student Details</div>  

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Department</th>
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
        <td ><?php echo $row['branch']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td><button name="delet" value="delet"><a href="deletdata.php?username=<?php echo $row['username'] ;?>"><font color="red">Delete</font></a></button></td>
      </tr>
  <?php  } ?>
    </tbody>
  </table>
  </div>
</div>













<?php 
$fatchteach="select * from master_user WHERE status='T' ORDER BY branch";
$teachdata=mysql_query($fatchteach);

?>
<div class="container slideanim">
<div class="table-responsive ">
<div class="text-center" style="font-size: 4rem;">Faculty Details</div>  

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Department</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Email</th>
        <th>MobileNo</th>
        <th>Enrolment No</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php
        while (($row=mysql_fetch_array($teachdata))) {
        ?>
      <tr>
        <td><?php echo $row['branch']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['id']; ?></td>
         <td><button name="delet" value="delet"><a href="deletdata.php?username=<?php echo $row['username'] ;?>"><font color="red">Delete</font></a></button></td>
      </tr>
  <?php  } ?>
    </tbody>
  </table>
  </div>
</div>



















<?php 
$fatchteach="select * from master_user WHERE status='A' ";
$teachdata=mysql_query($fatchteach);

?>
<div class="container slideanim">
<div class="table-responsive ">
<div class="text-center" style="font-size: 4rem;">Admin Details</div>  

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Department</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Email</th>
        <th>MobileNo</th>
        <th>Enrolment No</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php
        while (($row=mysql_fetch_array($teachdata))) {
        ?>
      <tr>
        <td><?php echo $row['branch']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['id']; ?></td>
         <td><button name="delet" value="delet"><a href="deletdata.php?username=<?php echo $row['username'] ;?>"><font color="red">Delete</font></a></button></td>
      </tr>
  <?php  } ?>
    </tbody>
  </table>
  </div>
</div>
      <?php } 


            }
        }
             else {
                echo "<h1>Place Loin click <a href='index.php'> Hear..</a></h1>"; exit;
            }
            ?>



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

            </body>
            </html>
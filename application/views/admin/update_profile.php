

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Registation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
  
  .jumbotron {
    background-color: #f4511e;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  
  .navbar {
    margin-bottom: 0;
    background-color: #f4511e;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  
  
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href='<?php echo base_url();?>admin'>Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#portfolio">PORTFOLIO</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li> -->
        <li><a href="<?php echo base_url()?>Login_Reg/login">LOGIN</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Update Data</h1> 
  <p></p> 

  <!-- <form>
    <div class="col-sm-4"></div>
    <div class="input-group col-sm-4">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form> -->
</div>


<div class="container bg-grey">

<div class="row">
  <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <div class="text-center ">
        <br>
        <h1>
          Update Details
        </h1>
      </div>
    
      
        <?php  echo form_open("Admin/update_details/{$userdata->id}");  ?>


          <div class='form-group'> <!-- Full Name -->
            <label  class='control-label'>USERNAME</label>
            <input type='text' class='form-control'   name='username' placeholder='USERNAME' value="<?= set_value('username',$userdata->username); ?>">
            <?php  echo form_error('username');  ?>
          </div> 

          <div class='form-group'> <!-- Full Name -->
            <label  class='control-label'>PASSWORD</label>
            <input type='password' class='form-control'   name='password' placeholder='PASSWORD' value="<?= set_value('password',$userdata->password); ?>">
            <?php  echo form_error('password');  ?>
          </div>  

          <div class='form-group'> <!-- Full Name -->
            <label  class='control-label'>EMAIL</label>
            <input type='email' class='form-control'   name='email' placeholder='demo@gmail.com' value="<?= set_value('email',$userdata->email); ?>">
            <?php  echo form_error('email');  ?>
          </div> 
          
          <div class='form-group'> <!-- Full Name -->
            <label  class='control-label'>MOBILE NO</label>
            <input type='number' class='form-control'   name='mobile' placeholder='999 999 9999 ' value="<?= set_value('mobile',$userdata->mobile); ?>">
            <?php  echo form_error('mobile');  ?>
          </div> 

        <div class='form-group'> <!-- Full Name -->
            <label  class='control-label'>BRANCH</label>
           <select class='form-control' name="branch" >
            <option><?= set_value('branch',$userdata->branch); ?></option>
            <option>Computer</option>
            <option>Civil</option>
            <option>Electrical</option>
            <option>Mechanical</option>
           </select>
           <?php  echo form_error('branch');  ?>
          </div> 

          <div class='form-group'> <!-- Full Name -->
            <label  class='control-label'>ENROLLMENT NO</label>
            <input type='number' class='form-control'   name='erno' placeholder='Er. No' value="<?= set_value('erno',$userdata->erno); ?>">
            <?php  echo form_error('erno');  ?>
          </div>

          <div class="form-group">
            <label>LoginAs</label>
                 <select class='form-control' name="status" >
                  <option><?= set_value('status',$userdata->status); ?></option>
                  <option>Student</option>
                  <option>Teacher</option>
                  <option>Admin</option>
                 </select>
            <?php  echo form_error('branch');  ?>
          </div>



          <br>
          <div class='form-group '> <!-- Submit Button -->
            <button type='submit' class='btn ' style='background-color: #f4511e !important; color: white; width: 30%' name='submit'>Submit!</button>
          </div> 
          <?php  form_close(); ?>
      
      <br>

    </div>
  <div class="col-sm-2"></div>
  
</div>
<div class="container">
  &nbsp;
  
</div>


</body>
</html>

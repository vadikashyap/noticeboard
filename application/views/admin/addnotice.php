
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
    <?= link_tag("Assets/css/custom-css.css") //type:2 html helper ?>
    <style type="text/css">

    </style>
</head>
<body>

	<?php include 'admin_heder.php';   ?>

	<div class="jumbotron text-center">
      <h1>Add Notice</h1>
      <p>Admin Panel</p> 
      <p>Bhagwan Mahavir University</p>
      
     
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
  <div class="col-sm-2"></div>
<div class="col-sm-8">
        
 
<?php  echo form_open_multipart('admin/notice');  ?>
  <div class="form-group"> <!-- Full Name -->
    <label for="full_name_id" class="control-label">Subject</label>
    <?php  echo form_error('subject');  ?>
    <input type="text" class="form-control" style="border-color: red;"   name="subject" placeholder="Subject" value="<?= set_value('subject'); ?>">
    
  </div>  
  

<div class="form-group green-border-focus">
  <label for="exampleFormControlTextarea5">Notice</label>
  <?php  echo form_error('notice');  ?>
  <textarea class="form-control" style="border-color: red;"  rows="6" name="notice" ><?= set_value('notice'); ?></textarea>
  
</div>

<div class="form-group green-border-focus">

  <label for="exampleFormControlTextarea5">Document</label>
 <input type="file"  name="photo" value="<?= set_value('photo'); ?>">
</div><?php  if (isset($upload_error)) { echo "<div class='alert'>"; echo $upload_error; echo "</div>";} ?>
  <input type="hidden" name="branch" value="<?php //$branch=$this->session->userdata('branch'); echo  $branch; ?>Admin">
  <input type="hidden" name="teachername" value="<?php  $data=$this->session->userdata('username');  echo $data; ?>">
  <input type="hidden" name="date" value="<?php echo date("Y-m-d") ?>">

  
  <div class="form-group"> <!-- Submit Button -->
    <button type="submit" class="btn btn-danger" name="submit">Submit!</button>
  </div>     
  <?php  form_close(); ?>   
</div>

    
 </body>
 </html>
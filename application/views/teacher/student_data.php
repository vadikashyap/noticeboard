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

	<?php include 'teacher_heder.php';   ?>

	<div class="jumbotron text-center">
      <h1>Student Login Details</h1>
      <p>Teacher Panel</p> 
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



    <!-- ****** After Add & Update notice messege show -->
<div class="container" style="margin-top:50px;">
<?php  if($msg=$this->session->flashdata('msg')): 

$msg_class=$this->session->flashdata('msg_class')

 ?>
<div class="row">
<div class="col-lg-6">
<div class="alert <?= $msg_class ?>">
<?= $msg; ?>
</div>
</div>
</div>

<?php endif; ?>

</div>

        
  
  <?php // echo $this->db->last_query(); ?>
<!-- <div class="container" style="background-color: #F7F7F9;">
  <h2>Teacher Details</h2>
           
  <table class="table table-hover">
    <thead>
      <tr class="info">
        <th>No</th>
        <th>User-name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Mobile-Number</th>
        <th>Branch</th>
        <th>Er-no</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($teacherdata)) {
       $count = $this->uri->segment(3); ?>
<?php  foreach ($teacherdata as $data) :  ?>
      <tr>
        <td><?php echo ++$count;   ?></td>
        <td><?php echo $data->username; ?></td>
        <td><?php echo $data->password; ?></td>
        <td><?php echo $data->email; ?></td>
        <td><?php echo $data->mobile; ?></td>
        <td><?php echo $data->branch; ?></td>
        <td><?php echo $data->erno; ?></td>
        <td><?=  anchor("admin/Profile_data/{$data->id}",'Edit',['class'=>'btn btn-primary']);  ?></td>
        <td><?=  anchor("admin/Profile_delete/{$data->id}",'Delete',['class'=>'btn btn-danger']);  ?></td>
      </tr>      
      <?php endforeach;  ?>

                   <?php  
                 }
else { echo "<pre>Data Not Found</pre"; }
?>
    </tbody>
  </table>
<?php  echo $this->pagination->create_links();   ?> 
</div> -->

<br>

<div class="container"  style="background-color: #F7F7F9;">
  <h2>Student Details</h2>
  <p>Login Student table:</p>            
  <table class="table table-hover">
    <thead>
      <tr class="info">
        
        <th>No</th>
        <th>User-name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Mobile-Number</th>
        <th>Branch</th>
        <th>Er-no</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($studentdata)) {
        
       $count=0;
       ?>
<?php  foreach ($studentdata as $data) :  ?>
      <tr>
        <td><?php echo ++$count;   ?></td>
        <td><?php echo $data->username; ?></td>
        <td><?php echo $data->password; ?></td>
        <td><?php echo $data->email; ?></td>
        <td><?php echo $data->mobile; ?></td>
        <td><?php echo $data->branch; ?></td>
        <td><?php echo $data->erno; ?></td>
         <td><?=  anchor("admin/Profile_data/{$data->id}",'Edit',['class'=>'btn btn-primary']);  ?></td>
        <td><?=  anchor("admin/Profile_delete/{$data->id}",'Delete',['class'=>'btn btn-danger']);  ?></td>
      </tr>      
      <?php endforeach;  ?>
                   <?php  
                 }
else { echo "<pre>Data Not Found</pre"; }
?>
    </tbody>
  </table>
  <!-- <?php  echo $this->pagination->create_links();   ?>  -->
</div>
</body>
</html>

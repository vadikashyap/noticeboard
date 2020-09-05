
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
      <h1>Teacher Panel</h1> 
      <p>Bhagwan Mahavir University</p>
      <p>
      <?php $branch=$this->session->userdata('branch'); echo  $branch; ?></p>

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



<!-- *********************************   Admin Notice  ********************* -->
<?php if (count($notice_admin)) { ?>

<div class="container slideanim" style="background-color: #eaeaea;">
    <div id="computer" class="container-fluid ">
        <h2 class="text-center">Admin</h2>
        <div class="row">

            <div class="timeline">

                <!-- <?php// while (($row=mysql_fetch_array($bres))) { ?> -->
                  <?php  foreach ($notice_admin as $notice) :  ?>
                    <div class="container1 right1">
                        <div class="content panel">

                            <div class="row">

                                <div class="col-sm-5">
                                    <p>Upload By :-
                                        <?php // $teach=$row['teachername']; echo "$teach"; 
                                        echo $notice->teachername; ?> Sir/Mem</p>
                                    <p>Date :-
                                        <?php echo $notice->date; ?>
                                    </p>

                                </div>

                                <div class="col-sm-7">
                                    <h2> <?php echo $notice->subject;  ?> </h2></div>
                            </div>

                            <p><pre><?php echo $notice->notice;?></pre></p>
                            <!-- <p style="text-align: right;"><a href="<?php echo $notice->file ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p> -->
                        </div>
                    </div>
                  <?php endforeach;  ?>
                   <?php  
                 }
else { echo "Data Not Found"; }
?>
                <?php // } ?>
            </div>

        </div>
    </div>
 </div>
<br>





<!-- ************************* Branch Notice ********************** -->


<div class="container slideanim" style="background-color: #eaeaea;">
    <div id="computer" class="container-fluid ">
        <h2 class="text-center"><?php  $userdept=$_SESSION['branch']; echo "$userdept"; ?></h2>
        <div class="row">

            <div class="timeline">
              <?php if (count($notice_list)) { ?>
                <!-- <?php// while (($row=mysql_fetch_array($bres))) { ?> -->
                  <?php  foreach ($notice_list as $notice) :  ?>
                    <div class="container1 right1">
                        <div class="content panel">

                            <div class="row">

                                <div class="col-sm-5">
                                    <p>Upload By :-
                                        <?php // $teach=$row['teachername']; echo "$teach"; 
                                        echo $notice->teachername; ?> Sir/Mem</p>
                                    <p>Date :-
                                        <?php echo $notice->date; ?>
                                    </p>

                                </div>

                                <div class="col-sm-7">
                                    <h2> <?php echo $notice->subject;  ?> </h2></div>
                            </div>

                            <p><pre><?php echo $notice->notice;?></pre></p>
                            <!-- <p style="text-align: right;"><a href="<?php echo $notice->file ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a></p> -->
                            <?php

                            if ($notice->teachername == $uname) :
                              # code...e


                            ?>
                            <div align="right">
                              <table>
                                <tr>
                                  <td style="padding: 5px;">
                                    <?=  anchor("teacher/teacher_find_notice/{$notice->id}",'Edit',['class'=>'btn btn-primary']);  ?>
                                  </td>
                                  <td>
                                    <?=
                                      form_open('teacher/teacher_delete_notice'),
                                      form_hidden('id',$notice->id),
                                      form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
                                      form_close();
                                        ?>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          <?php  endif;  ?>
                        </div>
                    </div>
                  <?php  endforeach;  ?>
                   <?php  
                 }
else { echo "Data Not Found"; }
?>
                <?php // } ?>
            </div>

        </div>
    </div>
 </div>
<br>





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
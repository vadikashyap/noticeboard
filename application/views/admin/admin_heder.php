<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href='<?php echo base_url();?>admin'>Welcome
            <?php  $data=$this->session->userdata('username');  echo $data; ?></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url()?>admin/">
              <?php  $BR=$this->session->userdata('branch');  echo $BR; ?>-DEPARTMENT</a></li>
            <li><a href="<?php echo base_url()?>admin/addnotice">ADD-NOTICE</a></li>
            <!-- <li><a href="<?php echo base_url()?>admin/droup">droup</a></li> -->
            <li><a href="<?php echo base_url()?>admin/logindata">LOGIN-DETAILS</a></li>
            <li><a href="<?php echo base_url()?>Admin/logout">LOGOUT</a></li>
          </ul>
        </div>
      </div>
    </nav>

    
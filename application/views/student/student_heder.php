<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href='<?php echo base_url();?>welcome/test'>Welcome
            <?php $uname=$this->session->userdata('username'); echo  $uname; ?></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="<?php echo base_url()?>student/logout">LOGOUT</a></li>
          </ul>
        </div>
      </div>
    </nav>

    
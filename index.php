<?php
    include 'init.php';
    include 'template/header.php';
    
   
?>

<!-- Page Content -->
 <div class="container" style="padding-top: 26px;">

      <div class="pb-5">
    <!-- Page Features -->
    <div class="row">

      <div class="col-lg-7 col-md-7 col-sm-12 ">
      <?php    if(logged_in()){
       header('Location: home.php');
    }
    else{
        echo '<img src="images/landing.png" alt="Register a free account today" class="img-rounded" style="width:100%;"/>';
    }?>
      </div> 
	 <div class="col-lg-5 col-md-5 col-sm-12 ">
		<?php include("./widgets/login.php"); ?>
      </div>

      

     
   
    </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  
  <?php   
    include 'template/footer.php';    
?>
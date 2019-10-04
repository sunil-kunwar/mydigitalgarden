<?php   
    include 'init.php';
    if(logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php'    
?>
<!-- Page Content -->
 <div class="container" style="padding-top: 26px;">

      <div class="pb-5">
    <!-- Page Features -->
    <div class="row">

      <div class="col-lg-7 col-md-7 col-sm-12 ">
		<div class="account-login content">
   

    <?php
        if(isset($_POST['register_email'], $_POST['register_name'], $_POST['register_password'], $_POST['cregister_password'])){
            $register_email = $_POST['register_email'];
            $register_name = $_POST['register_name'];
            $register_password = $_POST['register_password'];
            $cregister_password = $_POST['cregister_password'];
            
            $errors = array();
            if(empty($register_email) || empty($register_name) || empty($register_password) || empty($cregister_password)){
                $errors[] = 'All fields required';
            }
            else{
                if(filter_var($register_email, FILTER_VALIDATE_EMAIL) === false){
                    $errors[] = 'Email address not valid';
                }
                if(strlen($register_email) > 255 || strlen($register_name) > 35 || strlen($register_password) > 35 || strlen($cregister_password) > 35){
                    $errors[] = 'One or more fields contains too many characters';
                }
				if($register_password != $cregister_password){
					$errors[] = 'Password and confirm password not same, Please check again!';
				}
                if(user_exists($conn, $register_email) == true){
                    $errors[] = 'Email already exists';
                }   
            }
            if(!empty($errors)){
                foreach($errors as $error){ ?>
                   <div class="alert alert-danger">
					  <strong>Danger!</strong> <?php echo $error;?>
					</div>
					
					
           <?php     }                
            }
            else{
                $register = user_register($conn, $register_email, $register_name, $register_password);
                $_SESSION['user_id'] = $register;
                //echo 'Your session user id: ' . $_SESSION['user_id'];
                header('Location: home.php');
                exit();
            }

        }
    ?>

   
	
       <form action="" method="post">
			<h2>Register</h2>
			<div class="form-group">
				<label for="register_email">Email address:</label>
				<input type="email" class="form-control" id="register_email" name="register_email">
			</div>
			<div class="form-group">
				<label for="register_name">Full name:</label>
				<input type="text" class="form-control" id="register_name" name="register_name">
			</div>
			<div class="form-group">
				<label for="register_password">Password:</label>
				<input type="password" class="form-control" id="register_password" name="register_password">
			</div>
			<div class="form-group">
				<label for="cregister_password">Confirm Password:</label>
				<input type="password" class="form-control" id="cregister_password" name="cregister_password">
			</div>
			<button type="submit"  class="btn btn-primary">Register</button>
		</form>
		
		
	</div>			
      </div>

      

     
   
    </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php   
    include 'template/footer.php'    
?>
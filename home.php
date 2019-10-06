<?php
    include 'init.php';
	 if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
         
?>

<!-- Page Content -->
 <div class="container border-right border-left" style="padding-top: 26px;">

    <div class="pb-5">
    <!-- Page Features -->
    <div class="row">
	<?php if(!empty($errors)){
            foreach($errors as $error){ ?>
                <div class="alert alert-danger">
					  <strong>Danger!</strong> <?php echo $error;?>
					</div>
        <?php    }
				}
		?>
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right"><p class=""><?php echo 'Hello! ';
			echo user_data($conn, array($_SESSION['user_id'], 'name'));?></p></div>
    </div> 
	
	<div class="row  my-4">

		<div class="col-lg-12 col-md-12 col-sm-12">
			<?php  echo 'Welcome to Digital Garden'; ?>
		</div>
			<div class="col-lg-12 col-md-12 col-sm-12" id="message" style="color:;font-weight: bold;font-size: 15px;">
			<?php if(!empty($_GET['message'])) {echo $message = $_GET['message'];} ?>
			<?php if(!empty($_SESSION['msg'])) {echo $_SESSION['msg'];} ?>	
			</div>


			<div class="col-lg-12 col-md-12 col-sm-12" id="errormessage" style="color: red;font-weight: bold;font-size: 15px;"><?php if(!empty($_GET['errormessage'])) {echo $errormessage = $_GET['errormessage'];} ?><?php if(!empty($_SESSION['error'])) {echo $_SESSION['error'];} ?></div>		
		<div class="col-lg-2 col-md-2 col-sm-6 mt-2"><button type="button" class="btn btn-success" id="add_plant">Add Plant</button></div>
		<div class="col-lg-2 col-md-2 col-sm-6 mt-2"><button type="button" class="btn btn-success" id="add_group">Add Group</button></div>
    </div>
	
	<div id="add_plant_form" style="display:none;">
	<?php
 $errors = array();
	if(isset($_POST["submit"])) { 		
		if($_POST['plant_name']==''){
			 $errors[] = 'Plant name is required';
		}else{
			$plant_name = $_POST['plant_name'];
		}
		//if($_POST['plant_scientific_name']==''){
			//$errors[] = 'scientific name is required';
		//}else{
			//echo $plant_scientific_name = $_POST['plant_scientific_name'];
		//}
		
		if($_POST['number_of_plant']==''){
			$errors[] = 'number of plants is required';
		}else{
			echo  $number_of_plant = $_POST['number_of_plant'];
		}
		
		if($_POST['popular_name']==''){
			$errors[] = 'popular name is required';
		}else{
			echo  $popular_name = $_POST['popular_name'];
		}
		if($_POST['family']==''){
			 $errors[] = 'family name is required';
		}else{
			echo $family = $_POST['family'];
		}
		if($_POST['genera']==''){
			$errors[] = 'genera is required';
		}else{
			echo  $genera = $_POST['genera'];
		}
		if($_POST['species']==''){
			 $errors[] = 'species is required';
		}else{
			echo $species = $_POST['species'];
		}
		if($_POST['description']==''){
			$errors[] = 'description is required';
		}else{
			echo  $description = $_POST['description'];
		}
		//if($_POST['comment']==''){
			 //$errors[] = 'comment is required';
		//}else{
			//echo $comment = $_POST['comment'];
		//}
		if($_POST['age']==''){
			$errors[] = 'plant age is required';
		}else{
			 echo $age = $_POST['age'];
		}
		
		if($_POST['add_date']==''){
			$errors[] = 'add date is required';
		}else{
			echo $add_date = $_POST['add_date'];
		}
		echo $_SESSION['user_id'];
		

       
        if(!empty($errors)){
           
        }
        else{
			

			$target_dir = "uploads/plant_images/";
			 $target_file = $target_dir . basename($_FILES["plant_image"]["name"]);
			$uploadOk = 1;
			 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$errors[] = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["plant_image"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["plant_image"]["name"]). " has been uploaded.";
					 $plant_image = basename( $_FILES["plant_image"]["name"]); 
					  /* add_plant($conn, $plant_name, $species, $plant_scientific_name, $popular_name, $family, $genera, $number_of_plant, $description, $comment, $age, $add_date);	 */	
						$query = mysqli_query($conn, "INSERT INTO plants (`plant_image`, `plant_name`, `species`, `plant_scientific_name`, `popular_name`, `family`, `genera`, `number_of_plant`, `description`, `comment`, `age`, `add_date`, `user_id`) VALUES('".$plant_image."', '".$plant_name."', '".$species."', '".$plant_scientific_name."', '".$popular_name."', '".$family."', '".$genera."', '".$number_of_plant."', '".$description."','".$comment."', '".$age."', '".$add_date."', '".$_SESSION['user_id']."')");					  
					  $_SESSION['msg'] = "Your plant successfully added!";
					  header('Location: home.php');
					  exit(); 
				} else {	
					 $_SESSION['error'] =  "Your plant is not added!";
					$errors[] = "Sorry, there was an error uploading your file.";
					header('Location: home.php');
					exit(); 
				}
			}	
          
        }
    }
   
?>
		<div class="row" style="margin-bottom:20px;">		
			<div class="col-lg-12 col-md-12 col-sm-12"><h2>Add Plant</h2>	</div>
					<form class="form-inline" name="group_form" action="" method="post" enctype="multipart/form-data">
						<div class="form-group col-md-6 col-sm-12">
							<label for="plant_name">Plant Name:</label>
							<input type="text" class="form-control" id="plant_name" name="plant_name" required>
						</div>
						<div class="form-group col-md-6 col-sm-12">
							<label for="popular_name">Popular Name:</label>
							<input type="text" class="form-control" id="popular_name" name="popular_name" required>
						</div>
						<!-- <div class="form-group col-md-6 col-sm-12">
							<label for="plant_scientific_name">Plant Scientific Name:</label>
							<input type="text" class="form-control" id="plant_scientific_name" name="plant_scientific_name" required>
						</div> -->
						<?php
					    $sql2="select* from family;";
					    $result2=$conn->query($sql2);
					    ?>
						<div class="form-group col-md-6 col-sm-12">
							<label for="family">Plant Family:</label>
							<select title="family" name="family" class="form-control" aria-invalid="false">
							<?php foreach($result2 as $key2) {?>
								<option value="<?=$key2['f_name']?>"> <?=$key2['f_name']?></option>
							<?php } ?>
						    </select>
						</div>
						<div class="form-group col-md-6 col-sm-12">
							<label for="number_of_plant">Number of Plant:</label>
							<input type="number" class="form-control" id="number_of_plant" name="number_of_plant" required>
						</div>
						<?php
					    $sql="select* from genera;";
					    $result=$conn->query($sql);
					    ?>
						<div class="form-group col-md-6 col-sm-12">
							<label for="genera">Plant Genera:</label>
							<select title="genera" name="genera" class="form-control" aria-invalid="false">
							<?php foreach($result as $key) {?>
								<option value="<?=$key['gen_name']?>"> <?=$key['gen_name']?></option>
							<?php } ?>
						    </select>
						</div>
						<div class="form-group col-md-6 col-sm-12">
							<label for="age">Age:</label>
							<input type="number" class="form-control" id="age" name="age" required>
						</div>
						<?php
					    $sql1="select* from species;";
					    $result1=$conn->query($sql1);
					    ?>
						<div class="form-group col-md-6 col-sm-12">
							<label for="species">Species:</label>
							<select title="species" name="species" class="form-control" aria-invalid="false">
							<?php foreach($result1 as $key1) {?>
								<option value="<?=$key1['s_name']?>"> <?=$key1['s_name']?></option>
							<?php } ?>
						    </select>
						</div>
						<div class="form-group col-md-6 col-sm-12">
							<label for="description">Description:</label>
							<textarea col='4' rows="2" class="form-control" id="description" name="description" required></textarea>
						</div>
						<!-- <div class="form-group col-md-6 col-sm-12">
							<label for="comment">Comment:</label>
							<textarea col='4' rows="2" class="form-control" id="comment" name="comment" required></textarea>
						</div> -->
						<div class="form-group col-md-6 col-sm-12">
							<label for="add_date">Add Date:</label>
							<input type="text" class="form-control" id="add_date" name="add_date" required>
						</div>
						<div class="form-group col-md-6 col-sm-12">
							<label for="plant_image">Image:</label>
							<input type="file" class="form-control border-0" id="plant_image" name="plant_image" required>
						</div>
						<div class="col-md-12 col-sm-12" style="margin-top: 10px;"><input type="submit" name="submit" value="Add Plant" class="btn btn-primary" /></div>
					</form>
			</div><hr/>
		</div>
		
		<div id="add_group_form" style="display:none;">
		<?php
if(isset($_POST["submit"])) { 
		$errors = array();
		if($_POST['group_name']==''){
			 $errors[] = 'Group name is required';
			
		}else{
			$group_name = $_POST['group_name'];
		}
		if($_POST['location']==''){
			 $errors[] = 'Location is required';
			
		}else{
			$location = $_POST['location'];
		}
		if($_POST['date_added']==''){
			 $errors[] = 'Added Date is required';
			
		}else{
			$date_added = $_POST['date_added'];
		}
		if($_POST['comment']==''){
			 $errors[] = 'Comment is required';
			
		}else{
			$comment = $_POST['comment'];
		}
		
		$plants_id = implode(',', $_POST['plant_id']);

			$target_dir = "uploads/group_images/";
			 $target_file = $target_dir . basename($_FILES["group_image"]["name"]);
			$uploadOk = 1;
			 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$errors[] = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["group_image"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["group_image"]["name"]). " has been uploaded.";
					 $group_image = basename( $_FILES["group_image"]["name"]); 
					  /* add_group($conn, $group_name, $group_image, $location, $date_added, $comment, $plants_id, $_SESSION['user_id']); */
					  $query = mysqli_query($conn, "INSERT INTO groups (`group_name`, `group_image`, `plant_id`, `date_added`, `location`, `comment`, `user_id`) VALUES('".$group_name."', '".$group_image."', '".$plants_id."', '".$date_added."', '".$location."', '".$comment."', '".$_SESSION['user_id']."')");
					  
					  $_SESSION['msg'] = "Your plant group successfully added!";
					  header('Location: home.php');
					  exit(); 
				} else {					
					$errors[] = "Your plant group is not added! Sorry, there was an error uploading your file.";
					header('Location: home.php');
					  exit(); 
				}
			}
}
?>
			<div class="row" style="margin-bottom:20px;">
				<div class="col-lg-12 col-md-12 col-sm-12"><h2>Add Group</h2>	</div>
				<form class="form-inline" name="group_form" action="" method="post" enctype="multipart/form-data">
					<div class="form-group col-md-6 col-sm-12">
						<label for="group_name">Group Name:</label>
						<input type="text" class="form-control" id="group_name" name="group_name" required>
					</div>
					<div class="form-group col-md-6 col-sm-12">
						<label for="group_image">Image:</label>
						<input type="file" class="form-control border-0" id="group_image" name="group_image" required>
					</div>	
					<div class="form-group col-md-6 col-sm-12">
						<label for="location">Location:</label>
						<input type="text" class="form-control" id="location" name="location" required>
					</div>
					<div class="form-group col-md-6 col-sm-12">
						<label for="date_added">Added Date:</label>
						<input type="text" class="form-control" id="date_added" name="date_added" required>
					</div>
					<div class="form-group col-md-6 col-sm-12">
						<label for="comment">Comment:</label>
						<textarea col='4' rows="2" class="form-control" id="comment" name="comment" required></textarea>
					</div>
				<div class="col-lg-12 col-md-12 col-sm-12"><h5>Select Plants for this group</h5></div>
		<div class="col-lg-12 col-md-12 col-sm-12"><div class="row">				
					<?php $sql = "SELECT * FROM plants WHERE user_id ='".$_SESSION['user_id']."'";
						$result = mysqli_query($conn,$sql);
						$rowcountpc = mysqli_num_rows($result);
						if($rowcountpc){
						while($data=mysqli_fetch_array($result))
						{
					?>
						
					 <div class="col-lg-3 col-md-6 mb-4">
						<div class="card h-100">
							<div class="" style="height: 170px;"><img class="card-img-top h-100" src="<?php echo DIR_UPLOAD.$data['plant_image'];?>" alt=""></div>
							<div class="card-body">
								<input type="checkbox" name="plant_id[]" id="plant_id" value="<?php echo $data['plant_id'];?>" style="height:20px;width:20px;"/>
								<h4 class="card-title"><?php echo $data['plant_name'];?></h4>
								<h6 class="card-title">Scientific Name : <?php echo $data['plant_scientific_name'];?></h6>
							</div>
						</div>
					 </div>
						<?php } }else{?>
			<div class="col-lg-12 col-md-12 mb-4">
				You have no any plants to add this group. <a href="add_plant.php">Add Plant.</a>
			  </div>
			<?php } ?> </div>
					 </div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<input type="submit" name="submit" value="Add Group" class="btn btn-primary" /></div>
				</form>
			</div>
			<hr/>
		</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 ">
		<h2>Groups</h2>
      </div> 
	  <?php $sql = "SELECT * FROM groups WHERE user_id ='".$_SESSION['user_id']."' limit 4";
			$result = mysqli_query($conn,$sql);
			$rowcount = mysqli_num_rows($result);
			if($rowcount){
			while($data=mysqli_fetch_array($result))
			{
		?>
				
			  <div class="col-lg-3 col-md-6 mb-4">
				<div class="card h-100"><?php $group_image= DIR_UPLOAD_GROUP.$data['group_image']; ?>
				  <div class="" style="height: 170px;"><img class="card-img-top h-100" src="<?php echo $group_image;?>" alt=""></div>
				  <div class="card-body">
					<h4 class="card-title"><?php echo $data['group_name'];?></h4>
				  </div>
				 
				</div>
			  </div>
			<?php }
			}else{?>
			<div class="col-lg-12 col-md-12 mb-4">
				You have no any plants group. <a href="groups.php">Add groups.</a>
			  </div>
			<?php } ?>
     
     <div class="col-lg-12 col-md-12 col-sm-12 ">
		<a href="groups.php" class="btn btn-warning float-right">More Groups...</a>
      </div> 

   

    </div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 ">
		<h2>Plants</h2>
      </div> 
	  <?php $sqlp = "SELECT * FROM plants WHERE user_id ='".$_SESSION['user_id']."' limit 4";
			$resultp = mysqli_query($conn,$sqlp);
			$rowcountp = mysqli_num_rows($resultp);
			if($rowcountp){
			while($datap=mysqli_fetch_array($resultp))
			{
		?>
	
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100"><?php $plant_image= DIR_UPLOAD.$datap['plant_image']; ?>
          <div class="" style="height: 170px;"><img class="card-img-top h-100" src="<?php echo $plant_image;?>" alt=""></div>
          <div class="card-body">
            <h4 class="card-title"><?php echo $datap['plant_name'];?></h4>
            <h6 class="card-title">Scientific Name : <?php echo $datap['plant_scientific_name'];?></h6>
            <h6 class="card-title">No. of Plants : <?php echo $datap['number_of_plant'];?></h6>
			 <p class="card-title">Description : <?php echo $datap['description'];?></p>
          </div>
         
        </div>
      </div>
			<?php } }else{?>
			<div class="col-lg-12 col-md-12 mb-4">
				You have no any plants. <a href="plants.php">Add Plant.</a>
			  </div>
			<?php } ?>

     
     <div class="col-lg-12 col-md-12 col-sm-12 ">
		<a href="plants.php" class="btn btn-warning float-right">More Plants...</a>
      </div> 

   

    </div>
	
	
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
    <?php   
    include 'template/footer.php'    
?>
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
	<div class="row">
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
					 /*  add_group($conn, $group_name, $group_image, $plants_id, $_SESSION['user_id']); */
					  $query = mysqli_query($conn, "INSERT INTO groups (`group_name`, `group_image`, `plant_id`, `date_added`, `location`, `comment`, `user_id`) VALUES('".$group_name."', '".$group_image."', '".$plants_id."', '".$date_added."', '".$location."', '".$comment."', '".$_SESSION['user_id']."')");
					  
					  $success = "Your plant group successfully added!";
					  header('Location: groups.php?message=Your plant group successfully added!');
					  exit(); 
				} else {					
					$errors[] = "Your plant group is not added! Sorry, there was an error uploading your file.";
					header('Location: add_group.php');
					  exit(); 
				}
			}	
          
   
    
	
	
	if(!empty($errors)){
            foreach($errors as $error){ ?>
               <div class="alert alert-danger">
					  <strong>Danger!</strong> <?php echo $error;?>
					</div>
           <?php }
        }
		
}
?>

		
			<div class="col-lg-12 col-md-12 col-sm-12"><h2>Add Group</h2></div>	
			
			<form name="group_form" action="" method="post" enctype="multipart/form-data">
				
				<div class="col-lg-12 col-md-12 col-sm-12">
					<label for="group_name">Group Name:</label>
					<input type="text" class="form-control" id="group_name" name="group_name" required>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<label for="group_image">Image:</label>
					<input type="file" class="form-control border-0" id="group_image" name="group_image" required>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
						<label for="location">Location:</label>
						<input type="text" class="form-control" id="location" name="location" required>
					</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
						<label for="date_added">Added Date:</label>
						<input type="text" class="form-control" id="date_added" name="date_added" required>
					</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
						<label for="comment">Comment:</label>
						<textarea col='4' rows="2" class="form-control" id="comment" name="comment" required></textarea>
					</div>
		
			<div class="col-lg-12 col-md-12 col-sm-12"><h5>Select Plants for this group</h5></div>
		<div class="col-lg-12 col-md-12 col-sm-12"><div class="row">
			  <?php $sql = "SELECT * FROM plants WHERE user_id ='".$_SESSION['user_id']."'";
					$result = mysqli_query($conn,$sql);
					$rowcountp = mysqli_num_rows($result);
					if($rowcountp){
					while($data=mysqli_fetch_array($result))
					{
				?>
			
			  <div class="col-lg-3 col-md-3 mb-4">
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
			<?php } ?>
					 </div>
					 </div>
					<div class="col-lg-12 col-md-12 col-sm-12"><input type="submit" name="submit" value="Add Group" class="btn btn-primary" /></div>
		
		</form>
	
    </div>
    </div>
    </div>

<?php

   include 'template/footer.php';
?>
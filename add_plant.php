<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
?>
<?php
 $errors = array();
	if(isset($_POST["submit"])) { 		
		if($_POST['plant_name']==''){
			 $errors[] = 'Plant name is required';
		}else{
			$plant_name = $_POST['plant_name'];
		}
		// if($_POST['plant_scientific_name']==''){
		// 	$errors[] = 'scientific name is required';
		// }else{
		// 	echo $plant_scientific_name = $_POST['plant_scientific_name'];
		// }
		
		if($_POST['number_of_plant']==''){
			$errors[] = 'number of plants is required';
		}else{
			echo  $number_of_plant = $_POST['number_of_plant'];
		}
		
		if($_POST['species']==''){
			 $errors[] = 'species is required';
		}else{
			echo $species = $_POST['species'];
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
		if($_POST['description']==''){
			$errors[] = 'description is required';
		}else{
			echo  $description = $_POST['description'];
		}
		// if($_POST['comment']==''){
		// 	 $errors[] = 'comment is required';
		// }else{
		// 	echo $comment = $_POST['comment'];
		// }
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
					  $success = "Your plant successfully added!";
					  header('Location: plants.php?message=Your plant successfully added!');
					  exit(); 
				} else {					
					$errors[] = "Sorry, there was an error uploading your file.";
					header('Location: add_plant.php?errormessage=Your plant is not added!');
					exit(); 
				}
			}	
          
        }
    }
   
?>
<!-- Page Content -->
 <div class="container border-right border-left" style="padding-top: 26px;">
	<div class="pb-5">
		<div class="row">
		<?php if(!empty($errors)){
            foreach($errors as $error){ ?>
                <div class="alert alert-danger">
					  <strong>Danger!</strong> <?php echo $error;?>
					</div>
        <?php    }
				}
		?>
			<div class="col-lg-12 col-md-12 col-sm-12"><h2>Add Plant</h2>	
				<form name="group_form" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="plant_name">Plant Name:</label>
						<input type="text" class="form-control" id="plant_name" name="plant_name" required>
					</div>
					<div class="form-group">
						<label for="popular_name">Popular Name:</label>
						<input type="text" class="form-control" id="popular_name" name="popular_name" required>
					</div>
					<?php
					$sql2="select* from family;";
					$result2=$conn->query($sql2);
					?>
					<div class="form-group">
						<label for="family">Plant Family:</label>
						<select title="family" name="family" class="form-control" aria-invalid="false">
							<option>Select Family</option>
							<?php foreach($result2 as $key2) {?>
								<option value="<?=$key2['f_name']?>"> <?=$key2['f_name']?></option>
							<?php } ?>
						</select>
					</div>

					<?php
					$sql="select* from genera;";
					$result=$conn->query($sql);
					?>
					<div class="form-group">
						<label for="genera">Plant Genera:</label>
						<select title="genera" name="genera" class="form-control" aria-invalid="false">
							<option>Select Genera</option>
							<?php foreach($result as $key) {?>
								<option value="<?=$key['gen_name']?>"> <?=$key['gen_name']?></option>
							<?php } ?>
						</select>
					</div>
					<?php
					$sql1="select* from species;";
					$result1=$conn->query($sql1);
					?>
					<div class="form-group">
						<label for="species">Species:</label>
						<select title="species" name="species" class="form-control" aria-invalid="false">
							<option>Select Species</option>
							<?php foreach($result1 as $key1) {?>
								<option value="<?=$key1['s_name']?>"> <?=$key1['s_name']?></option>
							<?php } ?>
						</select>
					</div>
					<!-- <div class="form-group">
						<label for="plant_scientific_name">Plant Scientific Name:</label>
						<input type="text" class="form-control" id="plant_scientific_name" name="plant_scientific_name" required>
					</div> -->
					<div class="form-group">
						<label for="number_of_plant">Number of Plant:</label>
						<input type="number" class="form-control" id="number_of_plant" name="number_of_plant" required>
					</div>
					<!-- <div class="form-group">
						<label for="comment">Comment:</label>
						<textarea col='4' rows="5" class="form-control" id="comment" name="comment" required></textarea>
					</div> -->
					<div class="form-group">
						<label for="age">Age:</label>
						<input type="number" class="form-control" id="age" name="age" required>
					</div>
					<div class="form-group">
						<label for="add_date">Add Date:</label>
						<input type="text" class="form-control" id="add_date" name="add_date" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea col='4' rows="5" class="form-control" id="description" name="description" required></textarea>
					</div>
					<div class="form-group">
						<label for="plant_image">Image:</label>
						<input type="file" class="form-control border-0" id="plant_image" name="plant_image" required>
					</div>
					<input type="submit" name="submit" value="Add Plant" class="btn btn-primary" />
			
				</form>
			</div>	
		</div>
    </div>
</div>

<?php

   include 'template/footer.php';
?>
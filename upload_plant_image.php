<?php
  include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    
	if(isset($_POST["submit"])) { 		
		if($_POST['plant_name'] == '')){
			$errors[] = 'Plant name is required';
		}else{
			 echo $plant_name = $_POST['plant_name'];
		}
		if(isset($_POST['plant_scientific_name'])){
			$plant_scientific_name = $_POST['plant_scientific_name'];
		}else{
			echo $errors[] = 'scientific name is required';
		}
		
		if(isset($_POST['number_of_plant'])){
			$number_of_plant = $_POST['number_of_plant'];
		}else{
			 $errors[] = 'number of plants is required';
		}
		
		if(isset($_POST['species'])){
			$species = $_POST['species'];
		}else{
			 $errors[] = 'species is required';
		}
		
		if(isset($_POST['popular_name'])){
			$popular_name = $_POST['popular_name'];
		}else{
			 $errors[] = 'popular name is required';
		}
		if(isset($_POST['family'])){
			$family = $_POST['family'];
		}else{
			 $errors[] = 'family name is required';
		}
		if(isset($_POST['genera'])){
			$genera = $_POST['genera'];
		}else{
			 $errors[] = 'genera is required';
		}
		if(isset($_POST['description'])){
			echo $description = $_POST['description'];
		}else{
			 $errors[] = 'description is required';
		}
		if(isset($_POST['comment'])){
			$comment = $_POST['comment'];
		}else{
			 $errors[] = 'comment is required';
		}
		if(isset($_POST['age'])){
			$age = $_POST['age'];
		}else{
			 $errors[] = 'plant age is required';
		}
		
		if(isset($_POST['add_date'])){
			$add_date = $_POST['add_date'];
		}else{
			 $errors[] = 'add date is required';
		}
		
		$errors = array();

       
        if(!empty($errors)){
            foreach($errors as $error){ ?>
                <div class="alert alert-danger">
					  <strong>Danger!</strong> <?php echo $error;?>
					</div>
        <?php    }
        }
        else{
			

			$target_dir = "uploads/plant_images/";
			 $target_file = $target_dir . basename($_FILES["plant_image"]["name"]);
			$uploadOk = 1;
			 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["plant_image"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["plant_image"]["name"]). " has been uploaded.";
					 $plant_image = basename( $_FILES["plant_image"]["name"]); 
					  add_plant($conn, $plant_name, $species, $plant_scientific_name, $popular_name, $family, $genera, $number_of_plant, $description, $comment, $age, $add_date, $_SESSION['user_id']);					  
					  $success = "Your plant successfully added!";
					  header('Location: plants.php?message=Your plant successfully added!');
					  exit(); 
				} else {					
					echo $success = "Your plant is not added!";
					echo "Sorry, there was an error uploading your file.";
					 header('Location: add_plant.php');
					  exit(); 
				}
			}	
          
        }
    }
   
?>
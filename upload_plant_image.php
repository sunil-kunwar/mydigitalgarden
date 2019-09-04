<?php
  include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    
	if(isset($_POST["submit"])) { 
		
		if(isset($_POST['plant_name'])){
			$plant_name = $_POST['plant_name'];
		}else{
			 $errors[] = 'Plant name is required';
		}
		if(isset($_POST['plant_scientific_name'])){
			$plant_scientific_name = $_POST['plant_scientific_name'];
		}else{
			 $errors[] = 'scientific name is required';
		}
		
		if(isset($_POST['number_of_plant'])){
			$number_of_plant = $_POST['number_of_plant'];
		}else{
			 $errors[] = 'number of plants is required';
		}
		
		 $errors = array();

       
        if(!empty($errors)){
            foreach($errors as $error){
                echo "<span style='color:red;font-weight:bold;'>".$error."</span>";
                echo '<br>';
            }
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
					  add_plant($conn, $plant_name, $plant_scientific_name, $number_of_plant, $plant_image, $_SESSION['user_id']);
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
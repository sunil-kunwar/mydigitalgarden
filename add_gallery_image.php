<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	
?>
<?php
$plant_id=$_REQUEST["plant_id"];
$plant_name=$_REQUEST["plant_name"];

if(isset($_POST["submit"])) { 
	$formOk = true;
	
$description=addslashes($_POST["description"]);
$plant_id=$_POST["plant_id"];

	//Assign Variables
	$path = $_FILES['plant_gallery_image']['tmp_name'];
	$name = $_FILES['plant_gallery_image']['name'];
	$size = $_FILES['plant_gallery_image']['size'];
	$type = $_FILES['plant_gallery_image']['type'];
	$target_path = DIR_UPLOAD_GALLERY_IMAGE.$name;

	if ($_FILES['plant_gallery_image']['error'] || !is_uploaded_file($path)) {
		$formOk = false;
		echo "Error: Error in uploading file. Please try again.";
	}

	//check file extension
	if ($formOk && !in_array($type, array('image/jpg', 'image/png', 'image/jpeg'))) {
		$formOk = false;
		echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
	}
	
	echo $formOk;

		 		
	if ($formOk) {
			
			if (move_uploaded_file($_FILES['plant_gallery_image']['tmp_name'], $target_path)) {
		
				$sql = "insert into plant_gallery set description='".$description."',plant_gallery_image='".$name."',plant_id='".$plant_id."'";
				
				if (mysqli_query($conn, $sql)) {
					$uploadOk = true;
					$imageId = mysqli_insert_id($conn);
					$_SESSION['msg']="Successfully Added Gallery Image..";
					header("location:gallery.php?id=$plant_id");
				} else {
					echo "Error: Could not save the data to database. Please try again.";
					$_SESSION['error'] =  'Gallery Image not added. Please try again';
					header("location:add_gallery_image.php?plant_id=$plant_id");
				}
			}

		} else{
			echo "Error: form not ok. Please try again.";
		}
	}
	


?>


<!-- Page Content -->
<div class="container border-right border-left" style="padding-top: 26px;">
<div class="col-lg-12 col-md-12 col-sm-12" id="message" style="color: green;font-weight: bold;font-size: 15px;">
		<?php if(!empty($_GET['message'])) {echo $message = $_GET['message'];} ?><?php if(!empty($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>

		<div class="col-lg-12 col-md-12 col-sm-12" id="errormessage" style="color: red;font-weight: bold;font-size: 15px;"><?php if(!empty($_GET['errormessage'])) {echo $errormessage = $_GET['errormessage'];} ?><?php if(!empty($_SESSION['error'])) {echo $_SESSION['error'];} ?></div>
	<div class="pb-5">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12"><h2>Add New Gallery Image for <?php echo $plant_name; ?></h2>	
				<form name="group_form" action="" method="post" enctype="multipart/form-data">
					<input name="plant_id" type="hidden" value="<?php echo $plant_id;?>">
					<div class="form-group">
						<label for="plant_gallery_image">Image:</label>
					<input type="file" class="form-control border-0" id="plant_gallery_image" name="plant_gallery_image" >
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea col='4' rows="5" class="form-control" id="description" name="description" required></textarea>
					</div>
					<input type="submit" name="submit" value="Add Gallery Image" class="btn btn-primary" />
				</form>
			</div>	
		</div>
	</div>
</div>
	
	<?php

   include 'template/footer.php';
?>

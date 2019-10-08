<?php error_reporting(E_ALL ^ E_NOTICE);
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	
?>
<?php
$group_id=$_REQUEST["group_id"];
$group_name=$_REQUEST["group_name"];


if(isset($_POST["submit"])) { 
	$formOk = true;
	
$description=addslashes($_POST["description"]);
$group_id=$_POST["group_id"];

	//Assign Variables
	$path = $_FILES['group_gallery_image']['tmp_name'];
	$name = $_FILES['group_gallery_image']['name'];
	$size = $_FILES['group_gallery_image']['size'];
	$type = $_FILES['group_gallery_image']['type'];
	$target_path = DIR_UPLOAD_GROUP_GALLERY_IMAGE.$name;

	if ($_FILES['group_gallery_image']['error'] || !is_uploaded_file($path)) {
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
			
			if (move_uploaded_file($_FILES['group_gallery_image']['tmp_name'], $target_path)) {
		
				$sql = "insert into group_gallery set description='".$description."',group_gallery_image='".$name."',group_id='".$group_id."'";
				
				if (mysqli_query($conn, $sql)) {
					$uploadOk = true;
					$imageId = mysqli_insert_id($conn);
					$_SESSION['msg']="Successfully Added Gallery Image..";
					header("location:group_gallery.php?id=$group_id");
				} else {
					echo "Error: Could not save the data to database. Please try again.";
					$_SESSION['error'] =  'Gallery Image not added. Please try again';
					header("location:add_group_gallery_image.php?group_id=$group_id");
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
			<div class="col-lg-12 col-md-12 col-sm-12"><h2>Add New Gallery Image for <?php echo $group_name; ?></h2>	
				<form name="group_form" action="" method="post" enctype="multipart/form-data">
					<input name="group_id" type="hidden" value="<?php echo $group_id;?>">
					<div class="form-group">
						<label for="group_gallery_image">Image:</label>
					<input type="file" class="form-control border-0" id="group_gallery_image" name="group_gallery_image" >
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

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
	
$description=$_POST["description"];
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



<div class="mach_change">

		<div>
			<h1>Add New Gallery Image for <?php echo $plant_name; ?></h1>
		</div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<table width="100%">

<tr>
<td colspan="4" height="30px" style="font-size: 20px; font-weight: bold; color: red;"> <?php echo $_SESSION['add_error'];  $_SESSION['add_error'] = '';?></td> 
</tr>



<tr>

<td>Gallery Image</td> 

<td>:</td>

<td><input name="plant_id" type="hidden" value="<?php echo $plant_id;?>"> <input name="plant_gallery_image" type="file" required></td>

</tr>
<tr>
<td style="width: 15%;">Description</td>

<td style="width: 5%;">:</td>

<td><input name="description" type="text" id="description" value=" " style="width: 50%;padding: 10px;" required /></td>

</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Add Image" style="width: auto;" /></td>
</tr>

</table>
</form>
</div>

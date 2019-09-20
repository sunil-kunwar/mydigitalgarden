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
$plant_gallery_id=$_REQUEST["plant_gallery_id"];
 
if (!empty($_FILES["plant_gallery_image"]["name"])) {

	$file_name=$_FILES["plant_gallery_image"]["name"];
	$temp_name=$_FILES["plant_gallery_image"]["tmp_name"];
	$imgtype=$_FILES["plant_gallery_image"]["type"];
	
	$imagename=$file_name;
	$target_path = DIR_UPLOAD_GALLERY_IMAGE.$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {
	
$sqlc="update `plant_gallery` set plant_gallery_image='".$imagename."' where `plant_gallery_id`='$plant_gallery_id'";
		
$res=mysqli_query($conn,$sqlc) or die(mysqli_error()."Error in Query");}

}


if(isset($_POST['submit']))
{
	$description=$_POST["description"];
	$plant_gallery_id=$_POST["plant_gallery_id"];
	$plant_id=$_POST["plant_id"];

	$sqlc="update `plant_gallery` set description='".$description."' where `plant_gallery_id`='".$plant_gallery_id."'";
	$resv=mysqli_query($conn,$sqlc);
	if($resv){ 
		$_SESSION['msg'] = "Successfully updated Gallery Image.. "; 
		header("location:gallery.php?id=$plant_id");
	}else{ 
		$_SESSION['error'] =  'Gallery Image not updated try again'; 
		header("location:edit_gallery_image.php?plant_gallery_id=$plant_gallery_id&&plant_id=$plant_id&&plant_name=$plant_name");
	 }
	
}

?>

<?php
 $sqlr="select * from plant_gallery where plant_gallery_id='".$plant_gallery_id."'";
$resj=mysqli_query($conn,$sqlr);

$testt=mysqli_fetch_array($resj);

 $plant_gallery_image=$testt["plant_gallery_image"];
 $description=$testt["description"];

?>

<!-- Page Content -->
<div class="container border-right border-left" style="padding-top: 26px;">
	<div class="pb-5">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12"><h2>Edit Gallery Image for <?php echo $plant_name; ?></h2>	
				<form name="group_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
					<input name="plant_id" type="hidden" value="<?php echo $plant_id;?>">
					<input name="plant_gallery_id" type="hidden" value="<?php echo $plant_gallery_id;?>">
					<div class="form-group">
						<label for="plant_gallery_image">Image:</label>
						<img width="150" src="<?php echo DIR_UPLOAD_GALLERY_IMAGE.$plant_gallery_image;?>"><input type="file" class="form-control border-0" id="plant_gallery_image" name="plant_gallery_image" >
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea col='4' rows="5" class="form-control" id="description" name="description" required><?php echo stripslashes($description); ?></textarea>
					</div>
					<input type="submit" name="submit" value="Update Gallery Image" class="btn btn-primary" />
				</form>
			</div>	
		</div>
	</div>
</div>
	
	
<?php

   include 'template/footer.php';
?>








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
	$description=addslashes($_POST["description"]);
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

<td><input name="plant_id" type="hidden" value="<?php echo $plant_id;?>"><input name="plant_name" type="hidden" value="<?php echo $plant_name;?>"><input name="plant_gallery_id" type="hidden" value="<?php echo $plant_gallery_id;?>"> <img width="150" src="<?php echo DIR_UPLOAD_GALLERY_IMAGE.$plant_gallery_image;?>"><input name="plant_gallery_image" type="file"></td>

</tr>
<tr>
<td style="width: 15%;">Description</td>

<td style="width: 5%;">:</td>

<td><input name="description" type="text" id="description" value=" <?php echo $description; ?>" style="width: 50%;padding: 10px;" required /></td>

</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Add Image" style="width: auto;" /></td>
</tr>

</table>
</form>
</div>

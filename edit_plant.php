<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	
?>
<?php 
$id=$_REQUEST["id"];

function GetImageExtension($imagetype)
 {
   if(empty($imagetype)) return false;
   switch($imagetype)
   { 
	   case 'image/bmp': return '.bmp';
	   case 'image/gif': return '.gif';
	   case 'image/jpeg': return '.jpg';
	   case 'image/png': return '.png';
	   case 'image/jpeg': return '.jpeg';
	   default: return false;
   }
 }
 
if (!empty($_FILES["plant_image"]["name"])) {

	$file_name=$_FILES["plant_image"]["name"];
	$temp_name=$_FILES["plant_image"]["tmp_name"];
	$imgtype=$_FILES["plant_image"]["type"];
	
	$imagename=$file_name;
	$target_path = DIR_UPLOAD.$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {
	
$sqlc="update `plants` set plant_image='".$imagename."' where `plant_id`='$id'";
		
$res=mysqli_query($conn,$sqlc) or die(mysqli_error()."Error in Query");}

}


if(isset($_POST['submit']))
{
$plant_name=$_POST['plant_name'];
$species=$_POST['species'];
$plant_scientific_name=$_POST['plant_scientific_name'];
$popular_name=$_POST['popular_name'];
$family=$_POST['family'];
$genera=$_POST['genera'];
$number_of_plant=$_POST['number_of_plant'];
$description=addslashes($_POST['description']);
$comment=addslashes($_POST['comment']);
$age=$_POST['age'];
$add_date=$_POST['add_date'];


echo $sqlc="update `plants` set plant_name='".$plant_name."',species='".$species."',plant_scientific_name='".$plant_scientific_name."',popular_name='".$popular_name."',family='".$family."',genera='".$genera."',number_of_plant='".$number_of_plant."',description='".$description."',comment='".$comment."',age='".$age."',add_date='".$add_date."' where `plant_id`='".$id."'";
$resv=mysqli_query($conn,$sqlc);
if($resv){ header("location:plants.php?message=Successfully updated plant information!");}else{  header("location:plants.php?errormessage=plant information not updated try again!"); }

}

?>


<?php
 $sqlr="select * from plants where plant_id='".$id."'";
$resj=mysqli_query($conn,$sqlr);

$testt=mysqli_fetch_array($resj);

 $plant_image=$testt["plant_image"];
 $plant_name=$testt["plant_name"];
 $species=$testt["species"];
 $plant_scientific_name=$testt["plant_scientific_name"];
 $popular_name=$testt["popular_name"];
 $family=$testt["family"];
 $genera=$testt["genera"];
 $number_of_plant=$testt["number_of_plant"];
 $description=$testt["description"];
 $comment=$testt["comment"];
 $age=$testt["age"];
 $add_date=$testt["add_date"];
?>


<!-- Page Content -->
 <div class="container border-right border-left" style="padding-top: 26px;">
	<div class="pb-5">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12"><h2>Edit Plant <?php echo stripslashes($plant_name); ?></h2>	
				<form name="group_form" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="plant_name">Plant Name:</label>
						<input type="text" class="form-control" id="plant_name" name="plant_name" value="<?php echo stripslashes($plant_name); ?>" required>
					</div>
					<div class="form-group">
						<label for="species">Species:</label>
						<input type="text" class="form-control" id="species" name="species" value="<?php echo stripslashes($species); ?>" required>
					</div>
					<div class="form-group">
						<label for="plant_scientific_name">Plant Scientific Name:</label>
						<input type="text" class="form-control" id="plant_scientific_name" name="plant_scientific_name" value="<?php echo stripslashes($plant_scientific_name); ?>" required>
					</div>
					<div class="form-group">
						<label for="popular_name">Popular Name:</label>
						<input type="text" class="form-control" id="popular_name" name="popular_name" value="<?php echo stripslashes($popular_name); ?>" required>
					</div>
					<div class="form-group">
						<label for="family">Plant Family:</label>
						<input type="text" class="form-control" id="family" name="family" value="<?php echo stripslashes($family); ?>" required>
					</div>
					<div class="form-group">
						<label for="genera">Plant Genera:</label>
						<input type="text" class="form-control" id="genera" name="genera" value="<?php echo stripslashes($genera); ?>" required>
					</div>
					<div class="form-group">
						<label for="number_of_plant">Number of Plant:</label>
						<input type="number" class="form-control" id="number_of_plant" name="number_of_plant" value="<?php echo stripslashes($number_of_plant); ?>" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea col='4' rows="5" class="form-control" id="description" name="description" required><?php echo stripslashes($description); ?></textarea>
					</div>
					<div class="form-group">
						<label for="comment">Comment:</label>
						<textarea col='4' rows="5" class="form-control" id="comment" name="comment" required><?php echo stripslashes($comment); ?></textarea>
					</div>
					<div class="form-group">
						<label for="age">Age:</label>
						<input type="number" class="form-control" id="age" name="age" value="<?php echo stripslashes($age); ?>" required>
					</div>
					<div class="form-group">
						<label for="add_date">Add Date:</label>
						<input type="text" class="form-control" id="add_date" name="add_date" value="<?php echo stripslashes($add_date); ?>" required>
					</div>
					<div class="form-group">
						<label for="plant_image">Image:</label>
						<img width="150" src="<?php echo DIR_UPLOAD.$plant_image;?>"><input type="file" class="form-control border-0" id="plant_image" name="plant_image">
					</div>
					<input type="submit" name="submit" value="Update Plant" class="btn btn-primary" />
			
				</form>
			</div>	
		</div>
    </div>
</div>

<?php

   include 'template/footer.php';
?>
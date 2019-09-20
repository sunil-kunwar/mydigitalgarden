<?php error_reporting(E_All);
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
 $group_id=$_REQUEST["group_id"];

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
 
if (!empty($_FILES["group_image"]["name"])) {

	$file_name=$_FILES["group_image"]["name"];
	$temp_name=$_FILES["group_image"]["tmp_name"];
	$imgtype=$_FILES["group_image"]["type"];
	
	$imagename=$file_name;
	$target_path = DIR_UPLOAD_GROUP.$imagename;
	

	if(move_uploaded_file($temp_name, $target_path)) {		
		$sqlc="update `groups` set group_image='".$imagename."' where `group_id`='".$group_id."'";			
		$res=mysqli_query($conn,$sqlc) or die(mysqli_error()."Error in Query");
	}

}


if(isset($_POST['submit']))
{
$group_name=$_POST['group_name'];
$location=$_POST['location'];
$date_added=$_POST['date_added'];
$comment=$_POST['group_name'];

$plants_id = implode(',', $_POST['plant_id']);


 $sqlc="update `groups` set group_name='".$group_name."',location='".$location."',date_added='".$date_added."',comment='".$comment."',plant_id='".$plants_id."' where `group_id`='".$group_id."'"; 
$resv=mysqli_query($conn,$sqlc);
if($resv){header("location:groups.php?message=Successfully updated plant group information."); }else{header("location:groups.php?message=plant group information not updated try again."); }

}

?>


<?php
 $sqlr="select * from groups where group_id='".$group_id."'";
$resj=mysqli_query($conn,$sqlr);

$testt=mysqli_fetch_array($resj);

 $group_name=$testt["group_name"];
 $location=$testt["location"];
 $date_added=$testt["date_added"];
 $comment=$testt["comment"];
 $plant_id = explode(",",$testt["plant_id"]);

 $group_image=$testt["group_image"];
?>




			<div class="col-lg-12 col-md-12 col-sm-12"><h2>Edit Group <?php echo $group_name; ?></h2>	
			
			<form name="group_form" action="" method="post" enctype="multipart/form-data">
				
				<div class="form-group">
					<label for="group_name">Group Name:</label>
					<input type="text" name="group_name" value="<?php echo stripslashes($group_name); ?>" required />
				</div>
				<div class="form-group">
					<label for="group_image">Image:</label>
					<img width="150" src="<?php echo DIR_UPLOAD_GROUP.$group_image;?>"><input type="file" class="form-control border-0" id="group_image" name="group_image" >
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
						<label for="location">Location:</label>
						<input type="text" class="form-control" id="location" name="location" value="<?php echo stripslashes($location); ?>" required>
					</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
						<label for="date_added">Added Date:</label>
						<input type="text" class="form-control" id="date_added" name="date_added" value="<?php echo stripslashes($date_added); ?>" required>
					</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
						<label for="comment">Comment:</label>
						<textarea col='4' rows="2" class="form-control" id="comment" name="comment" required> <?php echo ($comment); ?></textarea>
					</div>
			<div class="col-lg-12 col-md-12 col-sm-12"><h5>Select Plants for this group</h5></div>
		<div class="col-lg-12 col-md-12 col-sm-12"><div class="row">
		
			  <?php $sql = "SELECT * FROM plants WHERE  user_id ='".$_SESSION['user_id']."'";
					$result = mysqli_query($conn,$sql);
					$rowcountp = mysqli_num_rows($result);
					if($rowcountp){
					while($data=mysqli_fetch_array($result))
					{
				?>
			
			  <div class="col-lg-3 col-md-6 mb-4">
				<div class="card h-100">
				  <div class="" style="height: 170px;"><img class="card-img-top h-100" src="<?php echo DIR_UPLOAD.$data['plant_image'];?>" alt=""></div>
				  <div class="card-body">
					<input type="checkbox" name="plant_id[]" id="plant_id" value="<?php echo $data['plant_id'];?>" <?php if(in_array( $data['plant_id'],$plant_id)) { ?> checked="checked" <?php } ?>  style="height:20px;width:20px;" />
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
					<div class="col-lg-12 col-md-12 col-sm-12">
					<input type="submit" name="submit" value="Update Group" class="btn btn-primary" /></div>
		
		</form>
	</div>	
    </div>
    </div>
    </div>
	
	
<?php

   include 'template/footer.php';
?>
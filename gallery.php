<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	
	
	
	$id=$_REQUEST["id"];
	
	$sql = "select * from plants where plant_id='".$id."'";
	$result = mysqli_query($conn,$sql);
	
	$data_g=mysqli_fetch_array($result); 
	$plant_name = $data_g['plant_name'];
?>

<!-- Page Content -->
 <div class="container border-right border-left" style="padding-top: 26px;">

    <div class="pb-5">
<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12" id="message" style="color: green;font-weight: bold;font-size: 15px;">
		<?php if(!empty($_GET['message'])) {echo $message = $_GET['message'];} ?><?php if(!empty($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>

		<div class="col-lg-12 col-md-12 col-sm-12" id="errormessage" style="color: red;font-weight: bold;font-size: 15px;"><?php if(!empty($_GET['errormessage'])) {echo $errormessage = $_GET['errormessage'];} ?><?php if(!empty($_SESSION['error'])) {echo $_SESSION['error'];} ?></div>
			<div class="col-lg-6 col-md-6 col-sm-12"><h2>Gallery of <?php echo $plant_name; ?></h2></div>
			<div class="col-lg-6 col-md-6 col-sm-12 text-right"><h5><a href="<?php echo "add_gallery_image.php?plant_id=$id&&plant_name=$plant_name"; ?>">Add images for <?php echo $plant_name; ?></a></h5></div>
		
		<?php
			$sqlpg = "SELECT * FROM plant_gallery WHERE plant_id='".$id."'";
			$result_pg = mysqli_query($conn,$sqlpg);
			while($data_pg=mysqli_fetch_array($result_pg))
			{
		?>
		<?php $plant_gallery_id=$data_pg['plant_gallery_id']; ?>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100"><?php $plant_gallery_image= DIR_UPLOAD_GROUP.$data_pg['plant_gallery_image']; ?>
          <div class="" style="height: 170px;"><img class="card-img-top h-100" src="<?php echo DIR_UPLOAD_GALLERY_IMAGE.$data_pg['plant_gallery_image'];?>" alt=""></div>
          <div class="card-body">
            <h4 class="card-title"><?php echo $data_pg['description'];?></h4>
          </div>
         <div class="card-footer">
            <a href="<?php echo "edit_gallery_image.php?plant_gallery_id=$plant_gallery_id&&plant_id=$id&&plant_name=$plant_name"; ?>" class="btn btn-primary">Edit</a>
            <a href="<?php echo "delete_gallery_image.php?plant_gallery_id=$plant_gallery_id&&plant_id=$id"; ?>" class="btn btn-danger float-right">Delete</a>
          </div>
        </div>
      </div>
			<?php } ?>

   

    </div>
    </div>
    </div>


<?php 
   include 'template/footer.php';
?>
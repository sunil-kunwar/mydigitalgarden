<?php
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
			<div class="col-lg-12 col-md-12 col-sm-12" id="message" style="color: green;font-weight: bold;font-size: 15px;">
			<?php if(!empty($_GET['message'])) {echo $message = $_GET['message'];} ?></div>

			<div class="col-lg-12 col-md-12 col-sm-12" id="errormessage" style="color: red;font-weight: bold;font-size: 15px;"><?php if(!empty($_GET['errormessage'])) {echo $errormessage = $_GET['errormessage'];} ?></div>
			<div class="col-lg-6 col-md-6 col-sm-12"><h2>My Plants</h2></div>
			<div class="col-lg-6 col-md-6 col-sm-12 text-right"><h3><a href="add_plant.php">Add Plant</a></h3></div>
		</div>
		<?php $sql = "SELECT * FROM plants WHERE user_id ='".$_SESSION['user_id']."'";
			$result = mysqli_query($conn,$sql);
				$rowcountp = mysqli_num_rows($result);
			if($rowcountp){
			while($data=mysqli_fetch_array($result))
			{
		?>
			<div class="plant_list">
				<div class="row">
				<?php $id=$data['plant_id']; ?>
					<div class="col-lg-5 col-md-5">
						<?php $plant_image= DIR_UPLOAD.$data['plant_image']; ?>
						<div class="" style="height: 230px;text-align: center;"><img class="card-img-top h-100" src="<?php echo $plant_image;?>" alt="" style="width:auto;"></div>
						<div class="row" style="padding:10px 0;">
						<?php
							$sqlpg = "SELECT * FROM plant_gallery WHERE plant_id ='".$id."' LIMIT 8";
							$result_pg = mysqli_query($conn,$sqlpg);
							
							while($data_pg=mysqli_fetch_array($result_pg))
							{
						?>
							<div class="col-md-3"><img style="width: auto;height: 70px;" src="<?php echo DIR_UPLOAD_GALLERY_IMAGE.$data_pg['plant_gallery_image'];?>"></div>
						<?php } ?>
						</div>
					</div>
					 <div class="col-lg-7 col-md-7">
						<div class="card-body pt-0">
							<h4 class="card-title"><?php echo $data['plant_name'];?></h4>
							<div><b>Species:</b> <span><?php echo $data['species'];?></span></div>
							<div><b>Scientific Name:</b> <?php echo $data['plant_scientific_name'];?></span></div>
							<div><b>Popular Name:</b> <?php echo $data['popular_name'];?></span></div>
							<div><b>Plant Family:</b> <?php echo $data['family'];?></span></div>
							<div><b>Plant Genera:</b><?php echo $data['genera'];?></span></div>
							<div><b>Number of Plant:</b> <?php echo $data['number_of_plant'];?></span></div>
							<div><b>Age: </b><?php echo $data['age'];?></span></div>
							<div><b>Add Date: </b><?php echo $data['add_date'];?></span></div>
							<div><b>Description: </b><?php echo $data['description'];?></span></div>
							<div><b>Comment:</b> <?php echo $data['comment'];?></span></div>
						</div>
						<div class="card-footer">
							<div class="row" style="padding:10px 0;">
							 <div class="col-lg-4 col-md-4"><a href="<?php echo "gallery.php?id=$id"; ?>" class="btn btn-success">Gallery</a></div>
							 <div class="col-lg-4 col-md-4"><a href="<?php echo "edit_plant.php?id=$id"; ?>" class="btn btn-primary">Edit</a></div>
							 <div class="col-lg-4 col-md-4"><a href="<?php echo "delete_plant.php?plant_id=$id"; ?>" class="btn btn-danger">Delete</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } }else{?>
			<div class="col-lg-12 col-md-12 mb-4">
				You have no any plants. <a href="plants.php">Add Plant.</a>
			  </div>
			<?php } ?>
	</div>
</div>


<?php

   include ('template/footer.php');
?>
<script>
jQuery(document).ready(function($){ 
	setTimeout(function() {
		$('#message').fadeOut('fast');
	}, 5000); 
});
</script>
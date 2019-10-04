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
			<div class="col-lg-6 col-md-6 col-sm-12"><h2>My Groups</h2></div>
			<div class="col-lg-6 col-md-6 col-sm-12 text-right"><h3><a href="add_group.php">Add Group</a></h3></div>
		</div>
	  <?php $sql = "SELECT * FROM groups WHERE user_id ='".$_SESSION['user_id']."'";
			$result = mysqli_query($conn,$sql);
			$rowcount = mysqli_num_rows($result);
			if($rowcount){
			while($data=mysqli_fetch_array($result))
			{
		?>
	<?php $id=$data['group_id']; ?>
      <div class="plant_list">
				<div class="row">
				<?php $id=$data['group_id']; ?>
					<div class="col-lg-5 col-md-5">
						<?php $group_image= DIR_UPLOAD_GROUP.$data['group_image']; ?>
						<div class="" style="height: 230px;text-align: center;"><img class="card-img-top h-100" src="<?php echo $group_image;?>" alt="" style="width:auto;"></div>
					</div>
					 <div class="col-lg-7 col-md-7">
						<div class="card-body pt-0">
							<h4 class="card-title"><?php echo $data['group_name'];?></h4>
							<div><b>Created Date:</b> <span><?php echo $data['date_added'];?></span></div>
							<div><b>Location:</b> <?php echo $data['location'];?></span></div>
							<div><b>Comment:</b> <?php echo $data['comment'];?></span></div>
						</div>
						<div class="card-footer">
							<div class="row" style="padding:10px 0;">
							 <div class="col-lg-4 col-md-4"><a href="<?php echo "edit_group.php?group_id=$id"; ?>" class="btn btn-primary">Edit</a></div>
							 <div class="col-lg-4 col-md-4 text-right"><a href="<?php echo "delete_group.php?group_id=$id"; ?>" class="btn btn-danger">Delete</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php }
			}else{?>
			<div class="col-lg-12 col-md-12 mb-4">
				You have no any plants group. <a href="add_group.php">Add group.</a>
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
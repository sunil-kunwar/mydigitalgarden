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
<div id="message" style="color: green;font-weight: bold;font-size: 15px;"><?php if(!empty($_GET['message'])) {echo $message = $_GET['message'];} ?><?php if(!empty($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>

<div id="errormessage" style="color: red;font-weight: bold;font-size: 15px;"><?php if(!empty($_SESSION['error'])) {echo $_SESSION['error'];} ?></div>


<div>
	<h3 style="float: left;">Gallery of <?php echo $plant_name; ?></h3>
	<h3 style="float: right;"><a href="<?php echo "add_gallery_image.php?plant_id=$id&&plant_name=$plant_name"; ?>">Add Gallery Image</a></h3>

</div>



<table width="100%">
<tr><td height="10"></td></tr>


<tr bgcolor="green">
<td align="center" style="padding:10px;" class="mech_list"><strong>S.No.</strong></td>
<td align="center" class="mech_list"><strong>Image</strong></td>
<td align="center" class="mech_list"><strong>Description</strong></td>
<td colspan="3" align="center" class="mech_list"><strong>Action</strong></td>
</tr>

<?php
$sqlpg = "SELECT * FROM plant_gallery";
	$result_pg = mysqli_query($conn,$sqlpg);
	
	
$id1=1;
while($data_pg=mysqli_fetch_array($result_pg))
{
?>

<tr bgcolor="#FFCCFF" class="plant_list">
<?php $plant_gallery_id=$data_pg['plant_gallery_id']; ?>
<td align="center" style="padding:10px;"><?php echo $id1; ?></td>
<td align="center"><img width="150" src="<?php echo DIR_UPLOAD_GALLERY_IMAGE.$data_pg['plant_gallery_image'];?>"></td>
<td align="center"><?php echo stripslashes($data_pg['description']);?></td>
<td align="center"><a href="<?php echo "edit_gallery_image.php?plant_gallery_id=$plant_gallery_id&&plant_id=$id&&plant_name=$plant_name"; ?>">Edit</a></td>
<td align="center"><a href="<?php echo "delete_gallery_image.php?plant_gallery_id=$plant_gallery_id&&plant_id=$id"; ?>">Delete</a></td>

</tr>
<?php
$id1++;

}
?>


</table>



<?php
$expireAfter = 1;
$secondsInactive = time() - $_SESSION['msg'];
$secondsInactivede = time() - $_SESSION['error'];
$expireAfterSeconds = $expireAfter * 60;
if($secondsInactive >= $expireAfterSeconds){	
	 unset($_SESSION['msg']);
}
if($secondsInactivede >= $expireAfterSeconds){	
	 unset($_SESSION['error']);
}
   include 'templates/footer.php';
?>
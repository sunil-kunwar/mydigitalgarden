<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
?>
<div id="message" style="color: green;font-weight: bold;font-size: 15px;"><?php if(!empty($_GET['message'])) {echo $message = $_GET['message'];} ?><?php if(!empty($_SESSION['msg'])) {echo $_SESSION['msg'];} ?></div>

<div id="errormessage" style="color: red;font-weight: bold;font-size: 15px;"><?php if(!empty($_SESSION['error'])) {echo $_SESSION['error'];} ?></div>


<div>
	<h3 style="float: left;">Group of Plants</h3>
	<h3 style="float: right;"><a href="add_group.php">Add Group</a></h3>

</div>



<?php $sql = "SELECT * FROM groups";
	$result = mysqli_query($conn,$sql);

$expireAfter = 1;
$secondsInactive = time() - $_SESSION['msg'];
$expireAfterSeconds = $expireAfter * 60;
if($secondsInactive >= $expireAfterSeconds){	
	 unset($_SESSION['msg']);
}


	?>

<table width="100%">
<tr><td height="10"></td></tr>


<tr bgcolor="green">
<td align="center" style="padding:10px;" class="mech_list"><strong>S.No.</strong></td>
<td align="center" class="mech_list"><strong>Image</strong></td>
<td align="center" class="mech_list"><strong>Group Name</strong></td>
<td colspan="2" align="center" class="mech_list"><strong>Action</strong></td>
</tr>

<?php

$id1=1;
while($data=mysqli_fetch_array($result))
{
?>

<tr bgcolor="#FFCCFF" class="plant_list">
<?php $id=$data['group_id']; ?>
<?php $group_image= DIR_UPLOAD_GROUP.$data['group_image']; ?>
<td align="center" style="padding:10px;"><?php echo $id1; ?></td>
<td align="center"><img width="150" src="<?php echo $group_image;?>"></td>
<td align="center"><?php echo $data['group_name'];?></td>
<td align="center"><a href="<?php echo "edit_group.php?group_id=$id"; ?>">Edit</a></td>
<td align="center"><a href="<?php echo "delete_group.php?group_id=$id"; ?>">Delete</a></td>

</tr>
<?php
$id1++;

}
?>


</table>



<?php

    include 'template/footer.php';
?>
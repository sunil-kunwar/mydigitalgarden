<?php error_reporting(E_All);
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	

?>
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

$plants_id = implode(',', $_POST['plant_id']);


echo $sqlc="update `groups` set group_name='".$group_name."',plant_id='".$plants_id."' where `group_id`='".$group_id."'"; 
$resv=mysqli_query($conn,$sqlc);
if($resv){ $_SESSION['msg'] = "Successfully updated plant group information."; }else{  $_SESSION['error'] =  'plant group information not updated try again'; }
header("location:groups.php");
}

?>


<?php
 $sqlr="select * from groups where group_id='".$group_id."'";
$resj=mysqli_query($conn,$sqlr);

$testt=mysqli_fetch_array($resj);

 $group_name=$testt["group_name"];
 $plant_id = explode(",",$testt["plant_id"]);

 $group_image=$testt["group_image"];
?>


    <h3>Edit Group <?php echo $group_name; ?></h3>

   <form  method="post" enctype="multipart/form-data">
        <p>Group Name:<br><input type="text" name="group_name" value="<?php echo stripslashes($group_name); ?>" required /></p>
        <p>Image:<br> <img width="150" src="<?php echo DIR_UPLOAD_GROUP.$group_image;?>"><input type="file" name="group_image" id="group_image" /></p>
		<p><table width="100%">
<tr><td height="10"></td></tr>


<tr bgcolor="green">
<td align="center" style="padding:10px;" class="mech_list"></td>
<td align="center" class="mech_list"><strong>Image</strong></td>
<td align="center" class="mech_list"><strong>Plant Name</strong></td>
<td align="center" class="mech_list"><strong>Plant Scientific Name</strong></td>
</tr>

<?php $sql = "SELECT * FROM plants";
	$result = mysqli_query($conn,$sql);


$id1=1;
while($data=mysqli_fetch_array($result))
{
?>

<tr bgcolor="#FFCCFF" class="plant_list">
<td><input type="checkbox" name="plant_id[]" id="plant_id" value="<?php echo $data['plant_id'];?>" <?php if(in_array( $data['plant_id'],$plant_id)) { ?> checked="checked" <?php } ?> /> </td>
<td align="center"><img width="150" src="<?php echo DIR_UPLOAD.$data['plant_image'];?>"></td>
<td align="center"><?php echo $data['plant_name'];?></td>
<td align="center"><?php echo $data['plant_scientific_name'];?></td>
</tr>
<?php
$id1++;

}
?>




</table></p>
        <p><input type="submit"  name="submit" value="Add Group" /></p>
    </form>

<?php

   include 'templates/footer.php';
?>
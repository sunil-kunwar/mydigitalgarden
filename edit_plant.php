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
$plant_scientific_name=$_POST['plant_scientific_name'];
$number_of_plant=$_POST['number_of_plant'];


$sqlc="update `plants` set plant_name='".$plant_name."',plant_scientific_name='".$plant_scientific_name."',number_of_plant='".$number_of_plant."' where `plant_id`='$id'";
$resv=mysqli_query($conn,$sqlc);
if($resv){ $_SESSION['msg'] = "Successfully updated plant information."; }else{  $_SESSION['error'] =  'plant information not updated try again'; }
header("location:plants.php");
}

?>


<?php
 $sqlr="select * from plants where plant_id='".$id."'";
$resj=mysqli_query($conn,$sqlr);

$testt=mysqli_fetch_array($resj);

 $plant_name=$testt["plant_name"];
 $plant_scientific_name=$testt["plant_scientific_name"];
 $number_of_plant=$testt["number_of_plant"];
 $plant_image=$testt["plant_image"];
?>


    <h3>Edit Plant</h3>

    <form  method="post"  enctype="multipart/form-data">
        <p>Plant Name:<br><input type="text" name="plant_name" value="<?php echo stripslashes($plant_name); ?>" required /></p>
        <p>Plant Scientific Name:<br><input type="text" name="plant_scientific_name" value="<?php echo stripslashes($plant_scientific_name); ?>" required /></p>
        <p>Number of Plant:<br><input type="text" name="number_of_plant" value="<?php echo stripslashes($number_of_plant); ?>" required /></p>
        <p>Image:<br><img width="150" src="<?php echo DIR_UPLOAD.$plant_image;?>"> <input type="file" name="plant_image" id="plant_image"  /></p>
       
        <p><input type="submit"  name="submit" value="Add Plant" /></p>
    </form>

<?php

   include 'templates/footer.php';
?>
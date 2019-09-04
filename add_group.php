<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	

?>

<?php
if(isset($_POST["submit"])) { 
		
		if(isset($_POST['group_name'])){
			$group_name = $_POST['group_name'];
		}else{
			 $errors[] = 'Group name is required';
		}
		
		$plants_id = implode(',', $_POST['plant_id']);
		
		 $errors = array();

       
        if(!empty($errors)){
            foreach($errors as $error){
                echo "<span style='color:red;font-weight:bold;'>".$error."</span>";
                echo '<br>';
            }
        }
        else{
			

			$target_dir = "uploads/group_images/";
			 $target_file = $target_dir . basename($_FILES["group_image"]["name"]);
			$uploadOk = 1;
			 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["group_image"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["group_image"]["name"]). " has been uploaded.";
					 $group_image = basename( $_FILES["group_image"]["name"]); 
					  add_group($conn, $group_name, $group_image, $plants_id, $_SESSION['user_id']);
					  $success = "Your plant group successfully added!";
					  header('Location: groups.php?message=Your plant group successfully added!');
					  exit(); 
				} else {					
					echo $success = "Your plant group is not added!";
					echo "Sorry, there was an error uploading your file.";
					 header('Location: add_group.php');
					  exit(); 
				}
			}	
          
        }
    }
?>



    <h3>Add Group</h3>

 <form name="group_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <p>Group Name:<br><input type="text" name="group_name" required /></p>
        <p>Image:<br> <input type="file" name="group_image" id="group_image" required /></p>
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
<td><input type="checkbox" name="plant_id[]" id="plant_id" value="<?php echo $data['plant_id'];?>" /> </td>
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
<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	


	$plant_gallery_id=$_REQUEST['plant_gallery_id'];
	$plant_id=$_REQUEST['plant_id'];
	


$sql="delete from plant_gallery 
		where plant_gallery_id='$plant_gallery_id'";

$res=mysqli_query($conn,$sql);

if($res)
{
	if($res){ $_SESSION['msg'] = "Gallery Image deleted successfully."; }else{  $_SESSION['error'] =  'Gallery Image not deleted, try again'; }
header("location:gallery.php?id=$plant_id");
}


?>
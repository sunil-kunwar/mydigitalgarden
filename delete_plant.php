<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	


	$plant_id=$_REQUEST['plant_id'];
	

 
$sql="delete from plants 
		where plant_id='$plant_id'";

$res=mysqli_query($conn,$sql);

if($res)
{
	if($res){ $_SESSION['msg'] = "Plant deleted successfully."; }else{  $_SESSION['error'] =  'Plant not deleted, try again'; }
header("location:plants.php");
}


?>
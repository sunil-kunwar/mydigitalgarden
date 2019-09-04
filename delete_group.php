<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	



	$group_id=$_REQUEST['group_id'];
	


$sql="delete from groups 
		where group_id='$group_id'";

$res=mysqli_query($conn,$sql);

if($res)
{
	if($res){ $_SESSION['msg'] = "Plant Group deleted successfully."; }else{  $_SESSION['error'] =  'Plant Group not deleted, try again'; }
header("location:groups.php");
}


?>
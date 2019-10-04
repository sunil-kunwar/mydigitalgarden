<?php
define('DIR_UPLOAD','uploads/plant_images/');
define('DIR_UPLOAD_GROUP','uploads/group_images/'); 
define('DIR_UPLOAD_GALLERY_IMAGE','uploads/gallery_images/'); 

    ob_start();
    session_start();   

    include 'func/album.func.php';
    include 'func/image.func.php';
    include 'func/user.func.php';
    include 'func/thumb.func.php';
    include 'func/function.php';
    
    $servername = "plants.ictatjcub.com";
    $username = "ictatjcu_plants";
    $password = "123zxc";  
    $database = "ictatjcu_plants";

    try{  
        $conn = new mysqli($servername, $username, $password, $database);
    }
    catch (Exception $e){
        echo "FAILS";
    }
?>
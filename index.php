<?php
    include 'init.php';
    include 'template/header.php';
    
    if(logged_in()){
      ?> <center style="margin-top:-45px;"><h3>Welcome to Digital Garden</h3></center><?php

      
        echo '<a href="add_plant.php"> <br><br><br><br><br><li>Add Plant </a><br/><br/><br/><br/>
         <a href="groups.php"><li>New Group</a>';
    }
    else{
        echo "Register your account today";
    }
    
?>
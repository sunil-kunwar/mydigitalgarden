<?php
    include 'init.php';
    include 'template/header.php';
    
    if(logged_in()){
        echo 'Welcome, you can now start <a href="plants.php">Add Plants</a> and <a href="groups.php">create a group of plants</a>';
    }
    else{
        echo '<img src="images/landing.png" alt="Register a free account today" />';
    }
    
?>
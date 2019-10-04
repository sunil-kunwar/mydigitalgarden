<a href="index.php">Home</a> /
<?php
    if(!logged_in()){
?>
        <a href="register.php">Register</a>
<?php
    }
    else{
?>
        <a href="plants.php">My Plants</a> /
        <a href="groups.php">Groups</a> /
        <a href="./widgets/logout.php">Logout</a>

        <!--<a href="upload_image.php">Upload Image</a>-->
<?php
    }
?>

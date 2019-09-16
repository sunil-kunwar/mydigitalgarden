<?php
    include 'init.php';
    if(!logged_in()){
        header('Location: index.php');
        exit();
    }
    include 'template/header.php';
	

?> 

    <h3>Add Plant</h3>

    <form action="upload_plant_image.php" method="post"  enctype="multipart/form-data">
        <p>Plant Name:<br><input type="text" name="plant_name" required /></p>
        <p>Plant Scientific Name:<br><input type="text" name="plant_scientific_name" required /></p>
        <p>Number of Plant:<br><input type="text" name="number_of_plant" required /></p>
        <p>Family:<br><input type="text" name="family" optional /></p>
        <p>Genera:<br><input type="text" name="genera" optional /></p>
        <p>Species:<br><input type="text" name="species" optional /></p>
        <p>Popular Name:<br><input type="text" name="popular name" optional /></p>
        <p>Comments:<br><input type="text" size="50" optional /></p>
        <p>Image:<br> <input type="file" name="plant_image" id="plant_image" required /></p>
       
        <p><input type="submit"  name="submit" value="Add Plant" /></p>
    </form>

<?php

   include 'templates/footer.php';
?>
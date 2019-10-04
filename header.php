<?php error_reporting(E_ALL);?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mydigitalgarden</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/heroic-features.css" rel="stylesheet">
	<link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>

<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="logo" href="index.php"><img src="images/digi.png" alt="VisualUpload"></a>
	 
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php
				if(!logged_in()){
			?>
		
		<ul class="nav navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
			
			<li class="nav-item">
				<a class="nav-link" href="register.php">Register</a>
			</li>
			
        </ul>
			<?php
				}
				else{
			?>
			
		<ul class="navbar-nav ml-auto">
		 <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
			
          <li class="nav-item">
            <a class="nav-link" href="groups.php">My Group</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="plants.php">My Plant</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="./widgets/logout.php">Logout</a>
          </li>
		  
        </ul>
		
		  <?php
		  
    }
?>

		
      </div>
    </div>
  </nav>

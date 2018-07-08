<?php
session_start();
include 'config/database.php';

try{
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
}catch (PDOException $e){
	header('Location: config/setup.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Camagru</title>
	<!--CSS -->
	<link href="css/header-main.css" rel="stylesheet">
</head>
<body>
	<!-- Header -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php">Camagru</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul8 class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<?php if (!$_SESSION["logged_in_user"]):?>
						<li class="nav-item">
							<a class="nav-link" href="index.php?m=sign_in">Sign in</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?m=sign_up">Registration</a>
						</li>
					<?php else:?>
						<li class="nav-item">
							<a class="nav-link" href="index.php?m=profile">User : <span><?php echo $_SESSION["logged_in_user"]; ?></span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link"  href="" onclick="logout()">Logout</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
  </nav>
  <!-- Page Content -->
  <div class="container">
  	<?php
  	if ($_GET["m"] == NULL || $_GET["m"] == "main")
  		include("html/main.php");
  	else if ($_GET["m"] == "sign_in")
  		include("html/sign_in.php");
  	else if ($_GET["m"] == "camera" && $_SESSION["logged_in_user"])
  		include("html/camera.php");
  	else if ($_GET["m"] == "sign_up")
  		include("html/sign_up.php");
  	else if ($_GET["m"] == "gallery")
  		include("html/gallery.php");
  	else if ($_GET["m"] == "forgot")
  		include("html/forgot.php");
  	else if ($_GET["m"] == "profile" && $_SESSION["logged_in_user"])
  		include("html/profile.php");
  	else if ($_GET["m"] == "profile" && !$_SESSION["logged_in_user"])
  		include("html/sign_in.php");
  	else if ($_GET["m"] == "varif")
  	{
  		include("fun/varif.php");
  		include("html/sign_in.php");
  	}
  	else if ($_GET["m"] == "new_pass")
  	{
  		include("html/new_pass.php");
  	}
  	else
  	{
  		include("html/main.php");
  	}
  	?>
  </div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">vibondar &copy; 2018</p>
      </div>
      <!-- /.container -->
    </footer>
  </body>
<script src="scripts/logout.js"></script>
</html>

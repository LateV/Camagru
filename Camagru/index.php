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
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" href="css/Camagru.css">
</head>
<body>
	<div id="wrap">
		<?php include("html/header.html");?>
		<div id="main">
			<?php
			if ($_GET["m"] == NULL || $_GET["m"] == "main")
				include("html/main.html");
			if ($_GET["m"] == "sign_in")
				include("html/sign_in.html");
			if ($_GET["m"] == "camera")
				include("html/camera.html");
			if ($_GET["m"] == "sign_up")
				include("html/sign_up.html");
			if ($_GET["m"] == "galery")
				include("html/galery.html");
			?>
		</div>
		<?php include("html/footer.html");?>
	</div>
</body>
</html>
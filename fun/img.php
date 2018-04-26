<?php
session_start();
include '../config/database.php';
str_replace(" ", "+", $_POST[img_h]);
try{
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO galery (img_h, user_id)
	VALUES ('$_POST[img_h]', '1')";
	$mdb->exec($sql);
}catch (PDOException $e){
	echo "ERROR CREATING img: ".$e->getMessage()." Aborting process\n";
	exit(-1);
}
?>



<?php
session_start();
include '../config/database.php';
$requsest = "SELECT img_h FROM galery";
try {
	$conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare($requsest);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetchAll();
	$data = array();

	foreach ($result as $value) {
		echo "<div><img src=\"" . $value['img_h'] . "\"></div>";
		// print_r($value);
		// $data[] = json_encode( $value);
	}
}
catch (Exception $e){
	$result =  'Error : ' . $e->getMessage();
}

?>

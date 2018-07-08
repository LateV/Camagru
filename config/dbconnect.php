<?php

function sql_req($requsest, $arguments)
{
	include ($_SERVER['DOCUMENT_ROOT'].'config/database.php');
	try {
		$conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare($requsest);
		$stmt->execute($arguments);
		if ($stmt->setFetchMode(PDO::FETCH_ASSOC))
			{
				$result = $stmt->fetchAll();
				return ($result);
			}
		}
		catch (Exception $e) {
			return('Error : ' . $e->getMessage());
		}
}

function sql_send($requsest, $arguments)
{
	include ($_SERVER['DOCUMENT_ROOT'].'config/database.php');
	try {
		$conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare($requsest); 
    	$stmt->execute($arguments);
    	return true;
	}
	catch (Exception $e) {
    	return('Error : ' . $e->getMessage());
	}
}
?>
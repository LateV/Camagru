<?php
session_start();

// require_once $_SERVER['DOCUMENT_ROOT']."config/database.php";
include '../config/database.php';

echo "-->";
echo "$DB_DSN";
echo "<--";
function sql_req($requsest)
{
	try {
		$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = $mdb->prepare($requsest); 
    	$sql->execute();
    	if ($sql->setFetchMode(PDO::FETCH_ASSOC))
    	{
    		$result = $sql->fetchAll();
			return ($result);
		}	
	}
	catch (Exception $e) {
    	return('Error : ' . $e->getMessage());
	}
}

function sql_ins($requsest)
{
	try {
		$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = $mdb->prepare($requsest); 
    	$sql->execute();
    	return("succ");
	}
	catch (Exception $e) {
		echo ($requsest);
    	return('Error : ' . $e->getMessage());
	}
}

function sql_ins_us($requsest){
try{
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mdb->exec($requsest);
	echo "Table users successfully created\n";
}catch (PDOException $e){
	echo "ERROR CREATING user: ".$e->getMessage();
	exit(-1);
}
}
?>

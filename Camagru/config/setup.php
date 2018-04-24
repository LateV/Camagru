<?php
session_start();
include 'database.php';
// CREATE DATABASE
try{
	echo "$DB_DSN_LIGHT"."<br>";
	echo "$DB_USER"."<br>";
	echo "$DB_PASSWORD"."<br>";
	$mdb = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE `".$DB_NAME."`";
	$mdb->exec($sql);
	echo "Database created successfully\n";
}catch (PDOException $e){
	$myerr = "ERROR CREATING DB: \n";
	$sqlerr = $e->getMessage();
	$err = $myerr.$sqlerr."\nAborting process\n";
	echo "$err";
	header('Location: ../index.php');
	exit(-1);
}
// CREATE TABLE USERS
try{
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE users (
	id  INT  AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(100) NOT NULL,
	mail VARCHAR(100) NOT NULL,
	password VARCHAR(200) NOT NULL,
	link VARCHAR (20) NOT NULL,
	varif INT  NOT NULL DEFAULT 1)";
	$mdb->exec($sql);
	echo "Table users successfully created\n";
}catch (PDOException $e){
	echo "ERROR CREATING TABLE: ".$e->getMessage()." Aborting process\n";
	exit(-1);
}

// CREATE ADMIN 

try{
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pass = hash("sha512", $DB_PASSWORD);
	$sql = "INSERT INTO users (login, mail, password, link, varif)
	VALUES ('admin', 'admin@lolkek.com', '$pass' , 'admin', 2)";
	$mdb->exec($sql);
	echo "Admin successfully created\n";
}catch (PDOException $e){
	echo "ERROR CREATING ADMIN: ".$e->getMessage()." Aborting process\n";
	exit(-1);
}
// CREATE GALLERY TABLE
try {
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE galery(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	img_h TEXT (65000)  NOT NULL,
	user_id INT NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id))";
	$mdb->exec($sql);
	echo "Table galery successfully created\n";
}
catch (PDOException $e){
	echo "ERROR CREATEING TABLE 'galery'".$e->getMessage()."Aborting process\n";
	exit(-1);
}

header('Location: ../index.php');
?>
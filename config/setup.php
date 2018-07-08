<?php
session_start();
include "database.php";

// CREATE DATABASE
try{
	$mdb = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE `".$DB_NAME."`";
	$mdb->exec($sql);
	echo "Database created successfully<br>";
}catch (PDOException $e){
	$myerr = "ERROR CREATING DB: \n";
	$sqlerr = $e->getMessage();
	$err = $myerr.$sqlerr."\nAborting process\n";
	echo $err;
	echo "<br>";
	header('Location: ../index.php');
	exit(-1);
}

// CREATE TABLE USERS
try{
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE users (
	id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(255) NOT NULL UNIQUE,
	mail VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(200) NOT NULL,
	date_creation TIMESTAMP,
	token VARCHAR (255) NOT NULL UNIQUE,
	varif BOOLEAN DEFAULT 0 NOT NULL,
	comments_to_mail BOOLEAN DEFAULT 1 NOT NULL)";
	$mdb->exec($sql);
	echo "Table users successfully created<br>";
}catch (PDOException $e){
	echo "ERROR CREATING TABLE 'users': ".$e->getMessage()." Aborting process<br>";
	exit(-1);
}

// CREATE GALLERY TABLE
try {
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE gallery(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	img_h TEXT (65000)  NOT NULL,
	date_creation TIMESTAMP,
	user_id INT UNSIGNED NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id))";
	$mdb->exec($sql);
	echo "Table gallery successfully created<br>";
}
catch (PDOException $e){
	echo "ERROR CREATEING TABLE 'gallery'".$e->getMessage()."Aborting process<br>";
	exit(-1);
}

// CREATE LAKE TABLE
try {
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE likes(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_pic INT UNSIGNED NOT NULL,
	id_user INT UNSIGNED NOT NULL,
	date_creation TIMESTAMP,
	FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_pic) REFERENCES gallery(id) ON DELETE CASCADE)";
	$mdb->exec($sql);
	echo "Table lakes successfully created<br>";
}
catch (PDOException $e){
	echo "ERROR CREATEING TABLE 'lakes'".$e->getMessage()."Aborting process<br>";
	exit(-1);
}

// CREATE COMMENTS TABLE
try {
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE comments(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_pic INT UNSIGNED NOT NULL,
	id_user INT UNSIGNED NOT NULL,
	comment TEXT NOT NULL,
	date_creation TIMESTAMP,
	FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_pic) REFERENCES gallery(id) ON DELETE CASCADE)";
	$mdb->exec($sql);
	echo "Table comments successfully created<br>";
}
catch (PDOException $e){
	echo "ERROR CREATEING TABLE 'comments'".$e->getMessage()."Aborting process<br>";
	exit(-1);
}

// CREATE ADMIN 
try{
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pass = hash("sha512", $DB_PASSWORD);
	$sql = "INSERT INTO users (login, mail, password, token, varif, comments_to_mail)
	VALUES ('admin', 'admin@lolkek.com', '$pass' , 'admin', 1, 1)";
	$mdb->exec($sql);
	echo "Admin successfully created<br>";
}catch (PDOException $e){
	echo "ERROR CREATING 'ADMIN': ".$e->getMessage()." Aborting process<br>";
	exit(-1);
}

// CREATIE gallery(ins)

try{
	$mdb = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$mdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$dir    = '../photo/';
	$files1 = scandir($dir);
	foreach ($files1 as $key => $value) {
		if(preg_match("/.+\.png/", $value, $exp)){
			$value = $dir . $value;
			$sql = "INSERT INTO gallery (img_h, user_id)
			VALUES ('$value', 1)";
			$mdb->exec($sql);
		}
	}
	echo "gallery(ins) successfully created<br>";
}catch (PDOException $e){
	echo "ERROR CREATING 'gallery(ins)': ".$e->getMessage()." Aborting process<br>";
	exit(-1);
}



header('Location: ../index.php');
?>
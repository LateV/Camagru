<?php 
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$passw = htmlspecialchars($_POST[pass]);
$passw = hash("sha512", $passw);
$e = update_user_pass($passw,  $_SESSION["logged_in_user_id"]);
if($e == true)
{
	echo "1";
}
else
{
	echo "error";
}
?>
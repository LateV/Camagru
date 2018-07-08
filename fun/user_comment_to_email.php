<?php 
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$res = user_comment_to_email($_SESSION[logged_in_user_id], $_POST[comment]);

if($res)
{
	$_SESSION["comments_to_mail"] =  $_POST[comment];
	echo $res;
}
else
{
	echo "error";
}

?>
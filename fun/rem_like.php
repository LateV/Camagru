<?php 

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/likes.php';

if(!$_SESSION["logged_in_user_id"])
{
	echo "error";
	return(0);
}

$res = remove_like_from_db($_POST[id], $_SESSION[logged_in_user_id]);
if($res)
{
	echo $res;
}
else
{
	echo "error";
}
?>
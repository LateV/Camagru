<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$mail = htmlspecialchars($_POST[email]);
$result = get_all_users();
foreach ($result as $key => $value) {
	if($value[mail] === $mail)
	{
		$ee = "emailexist";
	}
}
if($ee === "emailexist"){
	echo $ee;
	return(0);
}
$e = update_user_email($mail,  $_SESSION["logged_in_user_id"]);
if($e == true)
{
	echo "1";
}
else
{
	echo "error";
}

?>
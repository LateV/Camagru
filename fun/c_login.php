<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$login = htmlspecialchars($_POST[login]);

$result = get_all_users();
foreach ($result as $key => $value) {
	if($value[login] === $login)
	{
		$le = "loginexist";
	}
}

if($le === "loginexist"){
	echo $le;
	return(0);
}
$e = update_user_login($login,  $_SESSION["logged_in_user_id"]);
if($e == true)
{
	$_SESSION["logged_in_user"] = $login;
	echo "1";
}
else
{
	echo "error";
}

?>
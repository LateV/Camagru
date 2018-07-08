<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$login = htmlspecialchars($_POST[login]);
$passw = htmlspecialchars($_POST[pass]);

$passw = hash("sha512", $passw);
$result = get_all_users();
foreach ($result as $key => $value) {
	$le = NULL;
	$pe = NULL;
	$vr = NULL;
	if($value[login] === $login)
	{
		$le = "loginok";
		if($value[password] === $passw)
		{
			$pe = "passok";
		}
		else{
			$pe = "passfail";
		}
		if($value[varif] == 1)
		{
			$vr = "varok";
		}
		else
			$vr = "varfail";
		$id = $value[id];
		$comment_to_mail = $value[comments_to_mail];
		break;
	}
}
if($le === "loginok" && $pe === "passok" && $vr === "varok"){
	$_SESSION["logged_in_user"] = $login;
	$_SESSION["logged_in_user_id"] = $id;
	$_SESSION["comments_to_mail"] =  $comment_to_mail;
	echo "ok";
	return(0);
}
if(!$le)
{
	echo "wronglogin";
	return(0);
}
if($pe == "passfail")
{
	echo $pe;
	return(0);
}
if($vr ==  "varfail")
{
	echo $vr;
}

?>

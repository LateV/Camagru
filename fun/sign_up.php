<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$login = htmlspecialchars($_POST[login]);
$mail = htmlspecialchars($_POST[email]);
$passw = htmlspecialchars($_POST[pass]);
$passwc = htmlspecialchars($_POST[passc]);


$result = get_all_users();
foreach ($result as $key => $value) {
	if($value[login] === $login)
	{
		$le = "loginexist";
	}
	if($value[mail] === $mail)
	{
		$ee = "emailexist";
	}
}
if($le === "loginexist" || $ee === "emailexist"){
	echo $le.$ee;
	return(0);
}
$token = md5(uniqid().$login);
$token = "lolkekba08f27111f30b5ea296c6d5dd96232b".$token;
$link = "http://localhost:8100/index.php?m=varif&token=".$token;
$passw = hash("sha512", $passw);

$e = add_user_to_db($mail, $login, $passw, $token);

echo $e;
if($e == 1)
{
	$message = "Tnx for registrarion <br><br> To activate your account go to <br><br> ".$link;
	$subject_preferences = array(
		"input-charset" => $encoding,
		"output-charset" => $encoding,
		"line-length" => 76,
		"line-break-chars" => "\r\n");
	$from_name = "Cammagru";
	$from_mail = "Cammagru-ne_proekt_a_pesnya-noreply@project.unit.ua";
	$header = "Content-type: text/html; charset=".$encoding." \r\n";
	$header .= "From: ".$from_name." <".$from_mail."> \r\n";
	$header .= "MIME-Version: 1.0 \r\n";
	$header .= "Content-Transfer-Encoding: 8bit \r\n";
	$header .= "Date: ".date("r (T)")." \r\n";
	$header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);
	if(mail($mail, 'Cammagru registration', $message, $header))
	{
		return true;
	}
	else{
		return false;
	}
}
?>
}
?>

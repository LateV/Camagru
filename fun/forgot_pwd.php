<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$mail = htmlspecialchars($_POST[email]);

$result = get_all_mails_users();
$ee = NULL;
foreach ($result as $key => $value) {
	if($value[mail] === $mail)
	{
		$ee = "emailexist";
		break;
	}
}
if($ee != "emailexist")
{
	echo "emailerr";
}
else
{
	$token = md5(uniqid().$login);
	$token = "forgota08f27111f30b5ea296c6d5dd96232b".$token;
	$e = update_token($mail, $token);
	if($e == 1)
	{
		$message = "<br><br> To recover your password go to <br><br> http://localhost:8100/index.php?m=new_pass&token=".$token."&email=".$mail;
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
		if(mail($mail, 'Cammagru password recovery', $message, $header))
		{
			echo('1');
			return true;
		}
		else{
			echo "error";
			return false;
		}
	}
	else
	{
		echo "error";
	}
	return;
}
?>
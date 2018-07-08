<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$comment = htmlspecialchars($_POST[comment]);

$result = comment_to_db($_SESSION["logged_in_user_id"], $_POST[id], $comment);
// var_dump($_POST[id]);
// var_dump($result);
if($result)
{
	$message = "One of your pictures has been comented by some rediska called <b>".$_SESSION[logged_in_user]."</b><br><br>
		Comment: ".$comment."";
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
	$pic_user = get_user_by_pic_id($_POST[id]);
	var_dump($pic_user[0][comments_to_mail]);
	if($pic_user[0][comments_to_mail] == "1")
	{
		if(mail($pic_user[0][mail], 'Cammagru new comment', $message, $header))
		{
			return true;
		}
		else{
			return false;
		}
	}
}
else
{
	echo "error";
}

 ?>
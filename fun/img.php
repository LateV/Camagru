<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/pic.php';

$overlayPath = "../" . $_POST[template];
$photo = preg_replace("/^.+base64,/", "", $_POST[img_h]);
$photo = str_replace(' ','+',$photo);
$photo = base64_decode($photo);
$name = "../photo/photo".$_SERVER['REQUEST_TIME'].".png";
$gd_photo = imagecreatefromstring($photo);
$gd_filter = imagecreatefrompng($overlayPath);
imagecopy($gd_photo, $gd_filter, 0, 0, 0, 0, imagesx($gd_filter), imagesy($gd_filter));
ob_start();
	imagepng($gd_photo);
	$image_data = ob_get_contents();
ob_end_clean();
$www = file_put_contents($name, $image_data);
$result = add_photo_to_galery($name, $_SESSION[logged_in_user_id]);
if($result == 1)
{
	echo "1";
}
else
{
	echo "error";
}
?>

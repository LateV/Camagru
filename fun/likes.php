<?php session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/likes.php';
require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';


$like = like_from_db($_POST[id], $_SESSION["logged_in_user_id"]);
$count_likes = likes_from_db($_POST[id]);

if($like[0]['COUNT(id)'] == "0")
	echo  ('<a ><i style="margin-top:10px;font-size:30px;" class="far fa-heart" onclick="add_like()"></i></a><h5 style="margin-left: 50px;">'.$count_likes[0]['COUNT(id)'].'</h5>');
if($like[0]['COUNT(id)'] == "1")
	echo  ('<a  ><i style="margin-top:10px;font-size:30px;" class="fas fa-heart" onclick="rem_like()"></i></a><h5 style="margin-left: 50px;">'.$count_likes[0]['COUNT(id)'].'</h5>');

$id_us = get_user_id_by_pic_id($_POST['id']);

if ($_SESSION["logged_in_user_id"] == $id_us[0][id])
{
	echo ('<a href=""><i style="margin-top:10px;font-size:30px;" class="fas fa-trash" onclick="delete_photo('.$_POST[id].')">    Delete</i></a>');
}

?>
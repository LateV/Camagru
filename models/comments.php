<?php  
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'config/dbconnect.php';

// SELECT SECTOR
function comment_from_db($id_pic)
{
	$array = array('id_pic' => $id_pic);
	$sql = "SELECT * FROM comments WHERE id_pic = :id_pic ORDER BY date_creation DESC";
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

// INSERT SECTOR
function comment_to_db($id_user, $id_pic, $comment)
{
	$array = array('id_pic' => $id_pic, 'id_user' => $id_user, 'comment' => $comment);
	$sql = "INSERT INTO comments SET id_user = :id_user , id_pic = :id_pic , comment = :comment";
	$result = sql_send($sql, $array);
	if ($result == true)
		return $result;
	else
		return false;
}
?>
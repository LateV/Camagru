<?php  
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'config/dbconnect.php';


// SELECT SECTOR

function like_from_db($id_pic, $user_id)
{
	$array = array('id_pic' => $id_pic, 'user_id' => $user_id);
	$sql = "SELECT COUNT(id) FROM likes WHERE id_user = :user_id AND id_pic = :id_pic";
	$result = sql_req($sql, $array);
	if ($result)
		return $result;
	else
		return false;
}

function likes_from_db($id_pic)
{
	$array = array('id_pic' => $id_pic);
	$sql = "SELECT COUNT(id) FROM likes WHERE  id_pic = :id_pic";
	$result = sql_req($sql, $array);
	if ($result)
		return $result;
	else
		return false;
}



// INSERT SECTOR
function add_like_to_db($id_pic, $id_user)
{
	$array = array('id_pic' => $id_pic, 'id_user' => $id_user);
	$sql = "INSERT INTO likes SET id_user = :id_user , id_pic = :id_pic";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

// DELETES SECTOR

function remove_like_from_db($id_pic, $id_user)
{
	$array = array('id_pic' => $id_pic, 'id_user' => $id_user);
	$sql = "DELETE FROM likes WHERE id_user = :id_user AND id_pic = :id_pic";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

?>
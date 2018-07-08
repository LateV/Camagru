<?php  
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'config/dbconnect.php';

// SELECT SECTOR
function picture_qty_from_db()
{
	$start = (int)$start;
	$array = array();
	$sql = "SELECT COUNT(id) FROM gallery";
	$result = sql_req($sql, $array);
	if ($result[0])
		return ($result[0]);
	else
		return false;
}


function picture_grid_from_db($start)
{
	$start = (int)$start;
	$array = array();
	$sql = "SELECT img_h,id FROM gallery ORDER BY date_creation DESC LIMIT 25 OFFSET ".$start;
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

function big_picture_from_db($id)
{
	$array = array('id' => $id);
	$sql = "SELECT img_h FROM gallery WHERE id= :id";
	$result = sql_req($sql, $array);
	if ($result)
	{
		return ($result);
	}
	else
	{
		return false;
	}
}


function can_load_pictures_from_db($start)
{
	$start = (int)$start;
	$sql = "SELECT id FROM gallery LIMIT 25 OFFSET ".$start;
	$array = array();
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

// INSERT SECTOR

function add_photo_to_galery($img_h, $user_id)
{
	$array = array('img_h' => $img_h,'user_id' => $user_id);
	$sql = "INSERT INTO gallery (img_h, user_id) VALUES (:img_h, :user_id)";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

// DELETE SECTOR (DANGEROUS SECTOR)

function delete_photo_bd($id)
{
	$array = array('id' => $id);
	$sql = "DELETE FROM gallery WHERE id= :id";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}


?>
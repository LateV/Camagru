<?php 
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'config/dbconnect.php';


// SELECT SECTOR
function get_user_by_id($id)
{
	$array = array('id' => $id);
	$sql = "SELECT * FROM users WHERE id = :id ";
	$result = sql_req($sql, $array);
	if (count($result) == 1)
		return ($result[0]);
	else
		return false;
}

function get_token_by_email($mail)
{
	$array = array('mail' => $mail);
	$sql = "SELECT token FROM users WHERE mail= :mail ";
	$result = sql_req($sql, $array);
	if (count($result) == 1)
		return ($result[0]);
	else
		return false;
}

function get_all_users()
{
	$array = array();
	$sql = "SELECT * FROM users";
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

function get_all_mails_users()
{
	$array = array();
	$sql = "SELECT mail FROM users";
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

function get_user_id_by_pic_id($id_pic)
{
	$array = array('id_pic' => $id_pic);
	
	$sql = "SELECT users.id FROM users INNER JOIN gallery ON users.id=gallery.user_id WHERE gallery.id= :id_pic";

	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

function get_user_by_pic_id($id_pic)
{
	$array = array('id_pic' => $id_pic);

	$sql = "SELECT users.mail, users.comments_to_mail FROM users INNER JOIN gallery ON users.id=gallery.user_id WHERE gallery.id= :id_pic";

	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

// INSERT SECTOR
function add_user_to_db($mail, $login, $password, $token)
{
	$array = array('mail' => $mail, 'login' => $login, 'password' => $password, 'token' => $token);
	$sql = "INSERT INTO users (mail, login, password, token) VALUES (:mail, :login, :password, :token)";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}


// UPDATE SECTOR
function update_token($mail, $token)
{
	$array = array('mail' => $mail,'token' => $token);
	$sql = "UPDATE users SET token= :token WHERE mail= :mail";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function user_comment_to_email($id, $comments_to_mail)
{
	$array = array('id' => $id, 'comments_to_mail' => $comments_to_mail);
	$sql = "UPDATE users SET comments_to_mail= :comments_to_mail WHERE id= :id";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function update_password($mail, $token, $password)
{
	$array = array('mail' => $mail,'token' => $token, 'password' => $password);
	$sql = "UPDATE users SET password= :password , token= :token WHERE mail= :mail";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function update_user_login($login, $id)
{
	$array = array('id' => $id, 'login' => $login);
	$sql = "UPDATE users SET login= :login WHERE id= :id";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function update_user_email($mail, $id)
{
	$array = array('id' => $id, 'mail' => $mail);
	$sql = "UPDATE users SET mail= :mail WHERE id= :id";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function update_user_pass($password, $id)
{
	$array = array('id' => $id, 'password' => $password);
	$sql = "UPDATE users SET password= :password WHERE id= :id";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function farification_function($new_token, $token) 
{
	$array = array('new_token' => $new_token,'token' => $token);
	$sql = "UPDATE users SET varif=1,token= :new_token WHERE token= :token";
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}


?>
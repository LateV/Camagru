<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';
require_once $_SERVER['DOCUMENT_ROOT'].'models/comments.php';

$comments = comment_from_db($_POST[id]);

foreach ($comments as $comment)
{
	$user = get_user_by_id($comment[id_user]);
	echo "<li><strong>";
	echo $user['login'];
	echo ":</strong><br>";
	echo $comment[comment];
	echo "</li>";
}

 ?>
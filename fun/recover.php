<?php

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR0\n");
	return (0);
}

$_POST['email'] = htmlspecialchars($_POST['email']);

$token = md5(uniqid().$_POST['email']);
$token = "passsuccseccrecovera08f27111f30b5ea296c6d5dd96232b".$token;
$password = hash('sha512', $_POST['pass']);
$result = update_password($_POST['email'], $token, $password);
if ($result == true)
{
	echo('1');
}
else
{
	echo "ERROR2";
}

?>

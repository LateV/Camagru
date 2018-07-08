<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$_GET[token] = htmlspecialchars($_GET[token]);

$token = md5(uniqid().$login);
$token = "keklolba08f27111f30b5ea296c6d5dd96232b".$token;
$sqlR = farification_function($token, $_GET[token]);
?>
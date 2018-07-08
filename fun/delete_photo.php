<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/pic.php';

$id = htmlspecialchars($_POST[id]);
$result = delete_photo_bd($_POST[id]);

?>
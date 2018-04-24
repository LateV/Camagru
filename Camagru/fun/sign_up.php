<?php
// session_start();

include 'sql.php';

$login = $_POST[login];
$passw = $_POST[pass];
$mail = $_POST[email];


$passw = hash("sha512", $passw);

$sqlR = "INSERT INTO users (login, mail, password, link)
VALUES ('$login' , '$mail', '$passw', 'random')";
$e = sql_ins_us($sqlR);
echo $e;
?>

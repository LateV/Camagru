<?php session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/pic.php';


$picture = big_picture_from_db($_POST[id]);

$img_l = $picture[0][img_h];
preg_replace("../", "", $img_l);

echo  ('<strong class="none" id="id_ph">'.$_POST[id].'</strong><a href=""><i class="fas fa-times" onclick="return_to_gal()"></i></a><br><img class="img-fluid" src="'. $img_l .'" alt=""> ');

?>
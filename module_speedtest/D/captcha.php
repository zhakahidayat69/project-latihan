<?php
session_start();

$rand = substr(str_shuffle('0123456789'), 0, 4);
$_SESSION['captcha'] = $rand;

$img = imagecreate(110, 50);
$bg = imagecolorallocate($img, 0, 0, 0);
$color = imagecolorallocate($img, 255, 255, 255);
imagestring($img, mt_rand(0,10), mt_rand(0,40), mt_rand(0,30), $rand, $color);
imagepng($img);


?>
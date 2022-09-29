<?php
session_start();

$rand = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 4);
$_SESSION = $rand;

$canvas = imagecreate(150, 100);
$bg = imagecolorallocate($canvas, 0, 0, 0);
$color = imagecolorallocate($canvas, 255, 255, 255);

$lineChance = rand(3, 6);

$lineX = [];
$lineY = [];
$endLineX = [];
$endLineY = [];

for ($i = 0; $i < $lineChance; $i++) { 
    $lineX[] = rand(0, 200);
    $lineY[] = rand(0, 100);
    $endLineX[] = rand(0, 200);
    $endLineY[] = rand(0, 100);

    imageline($canvas, $lineX[$i], $lineY[$i], $endLineX[$i], $endLineY[$i], $color);
}

imagestring($canvas, rand(0, 50), rand(0, 50), rand(0, 50), $rand, $color);
imagepng($canvas);

?>
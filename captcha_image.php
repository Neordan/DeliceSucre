<?php
session_start();

// génération d'une image captcha avec le code stocké dans la variable de session
header('Content-type: image/jpeg');
$captcha_code = $_SESSION["captcha_code"];
$im = imagecreate(80, 30);
$bg_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 0, 0, 0);
imagestring($im, 5, 20, 8, $captcha_code, $text_color);
imagejpeg($im);
imagedestroy($im);
?>
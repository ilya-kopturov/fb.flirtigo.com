<?php
session_start();

$width  = 150;
$height = 40;

$font      = 'fonts/monofont.ttf';
$font_size = $height * 0.75;

$im = @imagecreate($width, $height) or die("Cannot Initialize new GD image stream");

$text_colorr   = imagecolorallocate($im, 158, 191, 241);
/*$text_color[0] = imagecolorallocate($im, 216, 211, 206);
$text_color[1] = imagecolorallocate($im, 236, 132, 132);
$text_color[2] = imagecolorallocate($im, 229, 128, 221);
$text_color[3] = imagecolorallocate($im, 164, 128, 229);
$text_color[4] = imagecolorallocate($im, 122, 183, 184);
$text_color[5] = imagecolorallocate($im, 113, 232, 135);*/

$backgr_color  = imagecolorallocate($im, 233, 207, 200);
$noise_color   = imagecolorallocate($im, 249,  34,  34);

for( $i=0; $i<($width*$height)/3; $i++ ) {
	imagefilledellipse($im, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
}
/*for( $i=0; $i<($width*$height)/150; $i++ ) {
	imageline($im, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
	imageline($im, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $text_color[mt_rand(0,3)]);
}*/

$string = strtoupper($_SESSION['active_code']);//get the string

$textbox = imagettfbbox($font_size, 0, $font, $string) or die('Error in imagettfbbox function');
$x = ($width - $textbox[4])/2;
$y = ($height - $textbox[5])/2;
imagettftext($im, $font_size, 0, $x, $y, $backgr_color, $font , $string) or die('Error');

header ("Content-type: image/jpeg");
imagejpeg($im);
imagedestroy($im);
?>
<?php 
function GenerateCaptchaCode($length = 5) {
    $alphabet = '123456789abcdefghijklmnopqrstuvwxyz';
    return SelectRandomChar($alphabet, $length);
}

function SelectRandomChar($str, $count = 1) {
    $n = strlen($str);
    
    $out = '';
    for($k = 0; $k < $count; $k++) {
        $i = rand(0, $n - 1);
        $out .= substr($str, $i, 1);
    }
    
    return $out;
}

$image = imagecreate(150, 45);
$bkg_color = imagecolorallocate($image, 255, 255, 255);

$blue = imagecolorallocate($image, 50, 160, 255);
$red = imagecolorallocate($image, 255, 80, 150);
$green = imagecolorallocate($image, 200, 255, 200);

imagefilledellipse($image, rand(10, 140), rand(10, 35), 30, 30, $blue);
imagefilledellipse($image, rand(10, 140), rand(10, 35), 30, 30, $red);
imagefilledellipse($image, rand(10, 140), rand(10, 35), 30, 30, $green);

$black = imagecolorallocate($image, 0, 0, 0);
$text = GenerateCaptchaCode();
$_SESSION['captcha']=$text;
$x = 20;
$y = 10;
for($i = 0; $i < strlen($text); $i++) {
    $char = substr($text, $i, 1);
    imagestring($image, 5, $x, $y, $char, $black);
    $x += rand(15, 30);
    $y = rand(10, 20);
}

header('Content-Type: image/png');
imagepng($image);

imagedestroy($image);
?>
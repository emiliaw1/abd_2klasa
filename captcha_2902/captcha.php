<?php
session_start();
$height = 20;
$width = 100;
$image = imagecreatetruecolor($width, $height);
$x = 2;
$y = 2;
$color = imagecolorallocate($image, 235, 235, 235);
imagefill($image, 0, 0, $color);
$color_l1 = imagecolorallocate($image, 54, 1, 1);
$color_l2 = imagecolorallocate($image, 110, 107, 107);
imageline($image, 0, 5, 100, 17, $color_l1);
imageline($image, 0, 20, 100, 3, $color_l2);
$dlugosc = 8;
$text = rand(97,122);
$string = "";
for($i = 0; $i < 7; $i++){
    if(rand(1,36)<=26){
        $char = chr(rand(65,80));
        $x+=10;
        $y = rand(0,5);
        $color_s = imagecolorallocate($image, rand(0,150), rand(0,150), rand(0,150));
    }  
    else{
        $char = chr(rand(48,57));
        $x+=10;
        $y = rand(0,5);
        $color_s= imagecolorallocate($image, rand(0,150), rand(0,150), rand(0,150));
    }
    imagechar($image, 5, $x, $y, $char, $color_s);
    $string .=$char;
} 

$_SESSION['check']=$string;



header("Content-type:image/png");
imagepng($image);
imagedestroy($image);
?>

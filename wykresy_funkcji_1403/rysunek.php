<?php
    $height = 400;
    $width = 400;
    $image = imagecreatetruecolor($height, $width);
    $black = imagecolorallocate($image, 0, 0, 0);
    $white = imagecolorallocate($image, 255, 255, 255);
    $red = imagecolorallocate($image, 255, 0, 0);
    imagefill($image, 0, 0, $black);
    imageline($image, 0, $height/2 , $width, $height/2, $white);
    imageline($image, $width/2, 0, $width/2, $height, $white);
    imagestring($image, 5, $width/2 + 10, 0, "y", $white);
    imagestring($image, 5, $width - 15, $height/2 - 20, "x", $white);
    $punkty = array();
    $a = -$_POST['a'];
    $b = -$_POST['b'];
    $c = -$_POST['c'];
    for($i=$_POST['poczatek']; $i<=$_POST['koniec']; $i++){
        array_push($punkty, $i + $width/2, $a*$i*$i + $b*$i + $c + $height/2);
    }
    imagepolygon($image, $punkty, sizeof($punkty)/2, $red);
    session_start();
    $_SESSION['a'] = $_POST['a'];
    $_SESSION['b'] = $_POST['b'];
    $_SESSION['c'] = $_POST['c'];
    header('Content-Type: image/png');
    imagepng($image, "wykres.png");
    imagepng($image);
    imagedestroy($image);
    header("Location: wykres.php");
?>

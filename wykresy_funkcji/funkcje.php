<?php
        header('Content-type: image/png');
        $width = 500;
        $height = 500;
        $image = imagecreatetruecolor($width, $height);
        $tlo = imagecolorallocate($image,250, 250, 250);
        $wykres = imagecolorallocate($image,0,0,0);
        //zrobic tablice z x i z y, zrobic petle ktora za kazdym razem zwieksza x o zmienna odstep i oblicza na jego podstawie y
        imagefill($image, 0, 0, $tlo);  
        imageline($image, 250, 0, 250, 500, $wykres);
        imageline($image, 0, 250, 500, 250, $wykres);
        imageline($image, 240, 10, 250, 0, $wykres);
        imageline($image, 250, 0, 260, 10, $wykres);
        imageline($image, 490, 240, 500, 250, $wykres);
        imageline($image, 490, 260, 500, 250, $wykres);
        imagepng($image);
        imagedestroy($image);
?>

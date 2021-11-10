<?php

function enToAr($string) {
    return strtr($string, array('0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩'));
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
// mkdir("./1/", 0700);
$dir= dirname(realpath(__FILE__));
$sep=DIRECTORY_SEPARATOR;   
$font =$dir.$sep.'hafs.ttf';


// 286
for ($num = 1; $num <= 287; $num++) {
    echo "The number is: $num <br>";

// mkdir("./data/c$num/", 0700);
// $font="hafs.ttf";
$imageName = "./data/c$num/23.png";
$savePath = $imageName;

$text = enToAr("$num");
$my_img = imagecreate( 64, 64 );                             //width & height
$background  = imagecolorallocate( $my_img, 100,  100,   100 );
$text_colour = imagecolorallocate( $my_img, 150, 150, 150 );

//100 - 2
//10 - 12
//10 - 25
if($num < 10){$xaxis=25;}
else if($num>=10&&$num < 100){$xaxis=15;}
else{

    $xaxis=1;}
imagettftext($my_img, 70, 0, $xaxis, 45, $text_colour, $font, $text);
// imagefilter($my_img, IMG_FILTER_GRAYSCALE);
// imagefilter($my_img, IMG_FILTER_BRIGHTNESS, 20);
// imagefilter($my_img, IMG_FILTER_CONTRAST, 50);
// imagefilter($my_img, IMG_FILTER_COLORIZE, 100, 0, 0);
// imagefilter($my_img, IMG_FILTER_COLORIZE, -100, 100, -100);
imagefilter($my_img, IMG_FILTER_EDGEDETECT);
imagepng( $my_img,$savePath );

} 

?>
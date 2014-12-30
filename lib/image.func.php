<?php
require_once "string.func.php";
function verifyImage($width=100,$height=33,$type=1,$length=4,$pixel = 0,$line = 0,$sess_name="verify")

{

    session_start();
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
   // $black = imagecolorallocate($image, 0, 0, 0);

    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);

    $chars = buildRandomString($type, $length);
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array(
        "setbackt.ttf",
        "Soopafresh.ttf",
        "wetnapkin.ttf",
        "WoollyOutline.ttf"
    );
    $fontfile = "../fonts/" . $fontfiles[mt_rand(0, count($fontfiles) - 1)];
    $color = imagecolorallocate($image, mt_rand(90, 200), mt_rand(50, 90), mt_rand(90, 180));
    for ($i = 0; $i < $length; $i ++) {
        $size = mt_rand($width / $length - 5, $width / $length);
        $angle = mt_rand(- 15, 15);
        $x = $width/10 + $i * $size;
        $y = mt_rand($height * 2 / 3, $height);
        // $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    for ($i = 0; $i < $line; $i ++) {
        $color = imagecolorallocate($image, mt_rand(90, 200), mt_rand(50, 90), mt_rand(90, 180));
        imageline($image, mt_rand(0, $width / 2), mt_rand(0, $height - 1), mt_rand($width / 2, $width - 1), mt_rand(0, $height - 1), $color);
    }
    for ($i = 0; $i < $pixel; $i ++) {
        imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $color);
    }
    /* imagestring($image,5,0,0,"",$color); */
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}
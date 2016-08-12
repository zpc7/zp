<?php

require_once 'string.func.php';
//通过GD库做验证码
function verifyImage($type=1,$length=4,$pixel=0,$line=0,$sess_name = "verify"){
	// session_start();
	//创建画布
	$width = 80;
	$height = 33;
	$image = imagecreatetruecolor ( $width, $height );
	$white = imagecolorallocate ( $image, 255, 255, 255 );
	$black = imagecolorallocate ( $image, 0, 0, 0 );
	//用填充矩形填充画布
	imagefilledrectangle ( $image, 1, 1, $width - 2, $height - 2, $white );
	$chars = buildRandomString ( $type, $length );
	$_SESSION [$sess_name] = $chars;//此句并没有向SESSION中存储到数据，解决是采用了Cookie
	setcookie("verify", $chars, time()+3600);
	//$fontfiles = array ("MSYH.TTF", "MSYHBD.TTF", "SIMLI.TTF", "SIMSUN.TTC", "SIMYOU.TTF", "STZHONGS.TTF" );
	$fontfiles = array ("SIMYOU.TTF");
	//由于字体文件比较大，就只保留一个字体，如果有需要的同学可以自己添加字体，字体在你的电脑中的fonts文件夹里有，直接运行输入fonts就能看到相应字体
	for($i = 0; $i < $length; $i ++) {
		$size = mt_rand ( 14, 18 );
		$angle = mt_rand ( - 15, 15 );
		$x = 5 + $i * $size;
		$y = mt_rand ( 20, 26 );
		$fontfile = "../fonts/".$fontfiles [mt_rand ( 0, count ( $fontfiles ) - 1 )];
		// echo $fontfile;
		$color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
		$text = substr ( $chars, $i, 1 );
		imagettftext ( $image, $size, $angle, $x, $y, $color, "D:/wamp/www/zp/fonts/SIMYOU.TTF", $text );
		//采用了绝对路径
	}
	if ($pixel) {
		for($i = 0; $i < 50; $i ++) {
			imagesetpixel ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $black );
		}
	}
	if ($line) {
		for($i = 1; $i < $line; $i ++) {
			$color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
			imageline ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $color );
		}
	}
	header ( "content-type:image/gif" );
	imagegif ( $image );
	imagedestroy ( $image );
}
?>
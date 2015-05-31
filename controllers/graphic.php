<?php
require_once('models/UsersModel.php');
require_once('Controller.php');

class GraphicController extends Controller {

	// create a blank image
/*$image = imagecreatetruecolor(400, 300);

// fill the background color
$bg = imagecolorallocate($image, 0, 0, 0);

// choose a color for the ellipse
$col_ellipse = imagecolorallocate($image, 255, 255, 255);

// draw the white ellipse
imagefilledellipse($image, 200, 150, 300, 200, $col_ellipse);

// output the picture
header("Content-type: image/png");
imagepng($image);*/

	function index($f = ''){
		gd_info();

		$im = imagecreatetruecolor(600, 600);

		$red = imagecolorallocate($im, 255, 0, 0); 

		$white = imagecolorallocate($im, 255, 255, 255);

		ImageFillToBorder($im, 0, 0, $white, $white);

		for( $i=0; $i <= 2*pi(); $i += 0.01 ){			
			for($a = 1; $a<=4; $a += 0.5){
				
				for($b = 1; $b<=4; $b += 0.5){
					$r = $b + 2*$a*tan($i);
					$x = $r * cos($i);
					$y = $r * sin($i);
					//echo 250 - intval( $y*10 );
					imageellipse( $im , 250 + intval( $x*100 ) , 250 - intval( $y*100 ) , 2 , 2 , $red );
				}
			}
		}

		//	ImageDestroy($im); 
		ImagePNG($im, '1.png');
		$this->showView('gr', $this->vars);
	} 


	
}



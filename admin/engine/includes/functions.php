<?php

	/* Admin logs */
	
	function admin_log($action, $id){
		global $db;
		
		$ip = $_SERVER['REMOTE_ADDR'];
		$params = serialize($_SERVER);
		$post = serialize($_POST);
		
		$db->insert("INSERT INTO `logs` VALUES('', ?, ?, ?, ?, ?, NOW())", $action, $id, $ip, $params, $post);
		
	}


	function resize($in_img, $w, $h){
		$image = imagecreatefrompng ( $in_img );
		$new_image = imagecreatetruecolor ( $w, $h ); // new wigth and height
		imagealphablending($new_image , false);
		imagesavealpha($new_image , true);
		imagecopyresampled ( $new_image, $image, 0, 0, 0, 0, $w, $h, imagesx ( $image ), imagesy ( $image ) );
		$image = $new_image;

		// saving
		imagealphablending($image , false);
		imagesavealpha($image , true);
		imagepng ( $image, bDIR . '/' . admDIR . '/img/temp_logo.png' );
	}	

	function AddWatermark2($img, $watermark){

		//Load the stamp and the photo to apply the watermark to
		$img_path = $img;		
		$img = imagecreatefromjpeg($img);
		$sximg = imagesx($img);
		$syimg = imagesy($img);
		
		$stampw = $sximg * 0.2; // 20% of image
		$stamph = $stampw / 2.54; // watermark w/h 

		$image = imagecreatefrompng ( $watermark );
		$new_image = imagecreatetruecolor ( $stampw, $stamph ); // new wigth and height
		imagealphablending($new_image , false);
		imagesavealpha($new_image , true);
		imagecopyresampled ( $new_image, $image, 0, 0, 0, 0, $stampw, $stamph, imagesx ( $image ), imagesy ( $image ) );
		$stamp = $new_image;

		// get the height/width of the stamp image

		$sx = imagesx($stamp);
		$sy = imagesy($stamp);


		//positionnig the stamp to the center
		$posx = $sximg - ($sx + 10);
		$posy = $syimg - ($sy + 10);

		
		//Create the final resized watermark stamp
		$dest_image = imagecreatetruecolor($stampw, $stamph);

		//keeps the transparency of the picture
		
		imagealphablending($dest_image, false);
		imagesavealpha($dest_image, true);

		//resizes the stamp
		imagecopyresampled($dest_image, $stamp, 0, 0, 0, 0, $stampw, $stamph, $sx, $sy);

		// Copy the resized stamp image onto the photo

		imagecopy($img, $dest_image, round($posx), round($posy), 0, 0, $stampw, $stamph);

		//Output and free memory
		
		// header('Content-type: image/jpg');

		imagepng($img, $img_path);
	    imagedestroy($img);

	}	


	function merge_args($args, $defaults = array()){
		// Set Reference Pointer To $args array
		$r =& $args;
		
		// Overwrite $defaults array by $args' array existing values
		return array_merge( $defaults, $r );
	}
	
	
	function converteDate($full){
		global $t;
		$date = substr($full,0,10);
		$year = substr($date,0,4);
		$month = $t['months'][substr($date,5,2)-1];
		$day = substr($date,8,2);
		$time = substr($full,-9);
		$date = $day.".".$month.".".$year.$time;
		return $date;
	
	
	}
	

?>
<?php
 
	function news_process ($args) { // checked
		global $lang, $t, $invertsubs;

		$width  	  = !empty($args['width'])  ? $args['width'] : 100;
		$height 	  = !empty($args['height']) ? $args['height'] : 60;
		$str_len 	  = !empty($args['str_len']) ? $args['str_len'] : 45;
		$thumb_width  = !empty($args['thumb_width']) ? $args['thumb_width'] : 50;
		$thumb_height = !empty($args['thumb_height']) ? $args['thumb_height'] : 50;

		$data = array();

		foreach($args['data'] as $key => $value) {

			$title = strip_tags($value['title']);

			if (convertDate('Y-m-d G:i:s', 'Y-m-d',$value['published']) == date("Y-m-d")) {
				$date = $t['items']['today'] . ' ' . convertDate('Y-m-d G:i:s', 'G:i',$value['published']);
			}
			else {
				$time = convertDate('Y-m-d G:i:s', 'G:i',$value['published']);
				$day   = convertDate('Y-m-d G:i:s', 'j',$value['published']);
				$year  = convertDate('Y-m-d G:i:s', 'Y',$value['published']);
				$month = convertDate('Y-m-d G:i:s', 'n',$value['published']);
				$date = $day.'.'.$month.'.'.$year.' '.$time;								
			
			}

			if (!empty($args['news_line_date'])) {
				$date = convertDate('Y-m-d G:i:s', 'G:i',$value['published']);
			}
			
			$youtube = array();
			if (!empty($value['youtube'])) {
				$youtube = json_decode($value['youtube'], true);
				$youtube = $youtube[0];	
			}

			$data[$key] = array(

				'id'    	=> $value['id'],
				'title' 	=> mb_strlen($title, 'UTF-8') > $str_len ? mb_substr($title, 0, $str_len, 'UTF-8').'...' : $title,
				'img'   	=> !empty($value['img']) ? thumb($value['img'], $width, $height) : (!empty($youtube) ? yt_img($youtube, $width, $height) : ''),
				'date'      => $date,
				'url'       => createURL("p={$value['id']}", $value['title']),
				'cat_id'    => !empty($value['cat_id']) ? $value['cat_id'] : '',
				
			);
	
			
			if (!empty($args['video'])) {
				$yt_id = json_decode($value['youtube'], true);
				$yt_id = $yt_id[0];
				$data[$key]['video'] = yt_img($yt_id, 155, 103);
			}
			if (!empty($args['desc'])) {

				$data[$key]['desc'] = mb_substr($value['desc'], 0, 200, 'UTF-8');
			}

			// break foreach ------------------------------------------------------------------- //

			if (!empty($args['break']) && $key < $args['break']) break;

		}
		return $data;
	}

	function gen_slider_process($slider_data) { // checked
		global $lang, $invertsubs;

		$data = array();


		foreach($slider_data as $key => $value) {

			$desc = strip_tags($value['desc']);

			$data['big'][$key] = array(
				'id'    => $value['id'],
				'title' => strip_tags($value['title']),
				'desc'  => mb_strlen($desc, 'UTF-8') > 500 ? mb_substr($desc, 0, 500, 'UTF-8').'...' : $desc,
				'img'   => !empty($value['img']) ? ret_img($value['img'], 425, 300) : (!empty($value['youtube']) ? yt_img($value['youtube'], 300, 200) : ''),
				'date'  => convertDate('Y-m-d G:i:s', 'G:i',$value['published']),
				'url'   => createURL("p={$value['id']}", $value['title']),
			);

			$data['small'][$key] = array(
				'id'    => $value['id'],
				'title' => strip_tags($value['title']),
				'img'   => !empty($value['img']) ? ret_img($value['img'], 212, 130) : (!empty($value['youtube']) ? yt_img($value['youtube'], 150, 90) : ''),
				'date'  => convertDate('Y-m-d G:i:s', 'G:i',$value['published']),
				'url'   => createURL("p={$value['id']}", $value['title']),
			);	

		}
		
		return $data;
	}
	
	
	function header_process($slider_data) { // checked
		global $lang, $t, $invertsubs;

		$data = array();


		foreach($slider_data as $key => $value) {

			if (convertDate('Y-m-d G:i:s', 'Y-m-d',$value['published']) == date("Y-m-d")) {
				$date = $t['items']['today'] . ' ' . convertDate('Y-m-d G:i:s', 'G:i',$value['published']);
			}
			else {
				$day   = convertDate('Y-m-d G:i:s', 'j',$value['published']);
				$year  = convertDate('Y-m-d G:i:s', 'Y',$value['published']);
				$month = $t['months'][convertDate('Y-m-d G:i:s', 'n',$value['published']) - 1];
				$date = $day.' '.$month.' '.$year;								
			
			}

			$title = strip_tags($value['title']);

			$data[$key] = array(
				'id'    => $value['id'],
				'title' => mb_strlen($title, 'UTF-8') > 63 ? mb_substr($title, 0, 60, 'UTF-8').'...' : $title,
				'url'   => createURL("p={$value['id']}", $value['title']),
				'date'  => $date, 
			);
		}
		
		return $data;
	}	
	
	

	function most_viewed_process($args) {
		global $lang, $t, $invertsubs;

		$width  =  !empty($args['width'])  ? $args['width'] : 80;
		$height =  !empty($args['height']) ? $args['height'] : 54;
		$str_len = !empty($args['len']) ? $args['len'] : 45;

		$data = array();

		foreach($args['items'] as $value) {

			$title = strip_tags($value['title']);

			$time  = convertDate('Y-m-d G:i:s', 'G:i',$value['published']);
			$day   = convertDate('Y-m-d G:i:s', 'j',$value['published']);
			$year  = convertDate('Y-m-d G:i:s', 'Y',$value['published']);
			$month = $t['months'][convertDate('Y-m-d G:i:s', 'n',$value['published']) - 1];
			$date = $day . '.' . $month . '.' . $year . ' | ' . $time;	
			

			$data[] = array(
				'id'	=> $value['id'],
				'title'	=> mb_strlen($title, 'UTF-8') > $str_len ? mb_substr($title, 0, $str_len, 'UTF-8').'...' : $title,
				'date'  => $date,
				'img'	=> !empty($value['img']) ? ret_img($value['img'], $width, $height) : (!empty($value['youtube']) ? yt_img($value['youtube'], $width, $height) : ''),
				'url'   => createURL("p={$value['id']}", $value['title']),
				'logo'  => '',
			);
		}
		return $data;
	}


	function ticker_process ($ticker_data) { // checked
		global $lang, $invertsubs;

		$data = array();

		foreach($ticker_data as $key => $value) {

			
			$data[$key] = array(
				'title' => $value['title'],
				'url'   => createURL("p={$value['id']}", $value['title']),
				'date'  => convertDate('Y-m-d G:i:s', 'G:i',$value['published'])
			);

		}
		return $data;
	}

	function banners_process($banners) { // ????
		
		$banner = array();
		$allowdExtensions = array('jpeg', 'jpg', 'gif', 'png');


		foreach($banners as $value) {
			
			if($value['ext'] == 'swf') {
				
				$path_2_file = htmDIR.'upload/banners/'.$value['path'];

				$banner[$value['name']][] = "<object width='{$value['width']}%' height='{$value['height']}px'>
														<param name='movie' value='{$path_2_file}'> 
														<param name='wmode' value='transparent'>
														<!--[if !IE]>-->
														<object type='application/x-shockwave-flash' data='{$path_2_file}' width='{$value['width']}%' height='{$value['height']}px'></object>
														<!--<![endif]-->
												    </object>
												    <a href='{$value['url']}' target='_blank' class='banner_btn' style='height:{$value['height']}px'></a>";

			}

			else if ($value['ext'] != '' && $value['ext'] != 'swf'){

				$banner[$value['name']][] =  "<a href='{$value['url']}' target='_blank'><img src='{$value['path']}'/></a>";

			}

			else {
				$banner[$value['name']][] = '';	
			}

		}
		
		return $banner;
	}

	function get_rand_banner($banner) { // ???

		$banners_arr = $banner;
		
		if (!empty($banners_arr[0]) && !empty($banners_arr[1])) {
			return $banners_arr[rand(0, 1)];
		}
		else if (!empty($banners_arr[0])) {
			return $banners_arr[0];
		}
		else if (!empty($banners_arr[1])) {
			return $banners_arr[1];
		}
		else return array();

	}

?>
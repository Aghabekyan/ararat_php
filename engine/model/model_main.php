<?php
	
	// General Slider -------- //

		$gen_slider = general_slider(array('limit' => 4));
		$gen_slider = gen_slider_process($gen_slider);

	// // editor --------------//

	// 	$editor = get_editor(array('limit' => 8));
	// 	$editor = news_process(array('data' => $editor, 'width' => 120, 'height' => 75, 'str_len' => 100));

	// Լրահոս --------------- //

		$news_line = getLineNews(array('limit' => 25));
		$news_line = news_process(array('data' => $news_line, 'width' => 103, 'height' => 55 , 'str_len' => 250));
			
	// Քաղաքական (2), Տնտեսական (3), Հասարակություն (4), Իրավական (6), Աշխարհ (7), Սպորտ (8), Մամուլ (9), Բիզնես (19), Վերլուծություն (18), Ժամանց (16), Տեսանյութեր (10) -- //
		
		$cat_conf = array(
			2  => array('limit' => 3, 'width' => 300, 'height' => 180),
			3  => array('limit' => 3, 'width' => 255, 'height' => 135),
			4  => array('limit' => 3, 'width' => 255, 'height' => 135),
			6  => array('limit' => 3, 'width' => 255, 'height' => 135),
			7  => array('limit' => 4, 'width' => 255, 'height' => 135),
			8  => array('limit' => 3, 'width' => 255, 'height' => 135),
			9  => array('limit' => 3, 'width' => 255, 'height' => 135),
			19 => array('limit' => 3, 'width' => 255, 'height' => 135),
			18 => array('limit' => 3, 'width' => 255, 'height' => 135),
			16 => array('limit' => 4, 'width' => 255, 'height' => 135),
			10 => array('limit' => 4, 'width' => 255, 'height' => 135),
		);

		foreach ($cat_conf as $keys => $value) {
			
			$getcat[$keys] = getNews(array('cat' => $keys, 'limit' => $value['limit']));
			$getcat[$keys] = news_process(array('data' => $getcat[$keys], 'width' => $value['width'], 'height' => $value['height'], 'str_len' => 100));
			
		}	

	// Ամենադիտված ----------------------------------------------------------------------------------------------------------------------- //
			
		$most_viewed = get_most_viewed(array('interval' => 100000, 'limit' => 4));
		$most_viewed = most_viewed_process(array('items' => $most_viewed, 'width' => 240, 'height' => 150, 'len' => 80 ));
		

?>
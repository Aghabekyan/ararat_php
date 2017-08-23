<?php
	
	// General Slider ---------------------------------------------------------------------------------------------------------------- //

		$gen_slider = general_slider(array('limit' => 4));
		$gen_slider = gen_slider_process($gen_slider);

	// editor -------------------------------------------------------------------------------------------------------------------------//

		$editor = get_editor(array('limit' => 8));
		$editor = news_process(array('data' => $editor, 'width' => 120, 'height' => 75, 'str_len' => 100));

	
	// Քաղաքական (2), Տնտեսական (3), Հասարակություն (4), Իրավական (6), Աշխարհ (7), Սպորտ (8), Մամուլ (9), Բիզնես (19), Վերլուծություն (18), Ժամանց (16), Տեսանյութեր (10) -- //
		
		$cat_conf = array(
			2  => array('limit' => 3, 'width' => 180, 'height' => 120),
			3  => array('limit' => 3, 'width' => 180, 'height' => 120),
			4  => array('limit' => 3, 'width' => 180, 'height' => 120),
			6  => array('limit' => 3, 'width' => 180, 'height' => 120),
			7  => array('limit' => 4, 'width' => 180, 'height' => 120),
			8  => array('limit' => 3, 'width' => 180, 'height' => 120),
			9  => array('limit' => 3, 'width' => 180, 'height' => 120),
			19 => array('limit' => 3, 'width' => 180, 'height' => 120),
			18 => array('limit' => 3, 'width' => 180, 'height' => 120),
			16 => array('limit' => 4, 'width' => 180, 'height' => 120),
			10 => array('limit' => 4, 'width' => 320, 'height' => 200),
		);

		foreach ($cat_conf as $keys => $value) {
			
			$getcat[$keys] = getNews(array('cat' => $keys, 'limit' => $value['limit']));
			$getcat[$keys] = array(
				'big' => news_process(array('data' => $getcat[$keys], 'width' => $value['width'], 'height' => $value['height'], 'str_len' => 100)),
			);
			
		}	



?>
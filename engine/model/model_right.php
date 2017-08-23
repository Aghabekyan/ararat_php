<?php

	// Ամենադիտված ----------------------------------------------------------------------------------------------------------------------- //
			
		$most_viewed = get_most_viewed(array('interval' => 1, 'limit' => 4));
		$most_viewed = most_viewed_process(array('items' => $most_viewed, 'width' => 240, 'height' => 150, 'len' => 80 ));
		
	// Լրահոս --------------------------------------------------------------------------------------------------------------------------- //

		$news_line = getLineNews(array('limit' => 25));
		$news_line = news_process(array('data' => $news_line, 'width' => 100, 'height' => 65 , 'str_len' => 250));
		
	
	// Տեսանյութեր (10) -- //
		
		$cat_conf = array(
			10 => array('limit' => 4, 'width' => 320, 'height' => 200),
		);

		foreach ($cat_conf as $keys => $value) {
			
			$getcat[$keys] = getNews(array('cat' => $keys, 'limit' => $value['limit']));
			$getcat[$keys] = array(
				'big' => news_process(array('data' => $getcat[$keys], 'width' => $value['width'], 'height' => $value['height'], 'str_len' => 100)),
			);
			
		}	
		
?>
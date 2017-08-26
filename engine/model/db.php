<?php

	function getLineNews($args) {
		global $db, $lang;

		if ($args['limit']) {

			$res = $db->select("SELECT t1.`id`, `title`,`img`,`gallery`,`published`,`youtube`, t2.`cat_id` 
							    FROM `content` t1 LEFT JOIN `category_rel` t2
							    ON t1.`id` = t2.`id` 
							    WHERE t1.`published` < NOW()
					            AND t1.`state` = 1	
					            AND t1.`lang` = ?
					            GROUP BY t1.`id`
					            ORDER BY t1.`published`  DESC LIMIT 0, ? ", $lang['name'], $args['limit']);							  	
			return $res;
		}
	
		return array();
	}

	function getFromEditor($args) {
		global $db, $lang;

		$res = $db->select("SELECT `id`,`title`,`img`,`gallery`,`published`,`youtube` 
							FROM `content` 
							WHERE `published` < NOW()
							AND `state` = 1	
							AND `lang` = ?
							AND `editor` = 1
							ORDER BY `published` DESC LIMIT 0, ? ", $lang['name'], $args['limit']);							  	
		
		return $res;

	
	}

	function getNews($args) { // checked
		global $db, $lang;

		$video = !empty($args['video']) ? "AND t1.youtube != ''" : '';

		if(!empty($args['cat']) && !empty($args['limit'])) {

			$res = $db->select("SELECT t1.`id`, `title`, `img`, `published`, `youtube`, `gallery`, t2.`cat_id`
								FROM `content` t1 JOIN `category_rel` t2 
								ON t1.`id` = t2.`id` 
								WHERE t2.`cat_id` = ?
								AND t1.`published` < NOW()
								AND t1.`state` = 1
								AND t1.`lang` = ?
								{$video}
								ORDER BY t1.`published`
								DESC LIMIT 0, ?", $args['cat'], $lang['name'], $args['limit']);
						
			return $res;
		}
																		
		return array();
	}

	function general_slider($args) {
		global $db, $lang;

		if(!empty($args['limit'])) {

		$res = $db->select("SELECT `id`,`title`,`published`,`img`,`youtube`
							FROM `content`
							WHERE `published` < NOW()
							AND   `state` = 1
							AND   `lang` = ?
							AND   `gen_slider` = 1
							ORDER BY `published` DESC LIMIT 0, ?", $lang['name'], $args['limit']);
			return $res;
		}
		return array();
	}
	
	function get_editor($args) {
		global $db, $lang;

		if(!empty($args['limit'])) {

		$res = $db->select("SELECT `id`,`title`,`published`,`img`
							FROM `content`
							WHERE `published` < NOW()
							AND   `state` = 1
							AND   `lang` = ?
							AND   `editor` = 1
							ORDER BY `published` DESC LIMIT 0, ?", $lang['name'], $args['limit']);
			return $res;
		}
		return array();
	}
	
	


	function get_most_viewed($args) {
		global $db, $lang;
		
		if(!empty($args['interval']) && !empty($args['limit'])) {

			$res = $db->select("SELECT `id`, `title`, `img`, `hits`, `youtube`, `published`
						FROM  `content`
						WHERE `published` < NOW() 
						AND   `state` = 1
						AND   `show_hits` = 0
						AND   `lang` = ?
						AND   `published` >= DATE_SUB(NOW(), INTERVAL ? day)
						ORDER BY `hits` DESC LIMIT 0,?", $lang['name'], $args['interval'], $args['limit']);

			return $res;
		}

		return array();
	}



	function get_ticker($args) { // checked
		global $lang, $db;

		if(!empty($args['limit'])) {

			$res = $db->select("SELECT `id`,`title`, `published` FROM `content`
								WHERE  `lang` = ?
								AND    `published` < NOW()
								AND    `state` = 1
								AND    `ticker` = 1
								ORDER BY `published`
								DESC LIMIT 0, ?", $lang['name'], $args['limit']);  
				
			return $res;
				
		}
		return array();
	}	


?>
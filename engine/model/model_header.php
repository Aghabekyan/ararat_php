<?php

	$categories_res = $db->select("SELECT `id`, `title_{$lang['name']}` title, `published`  FROM `categories` WHERE `published` != 0 ORDER BY `order`");
	
	foreach ($categories_res as $value) {

		$categories[$value['id']] = $value['title'];
		
	}	
	
	// վազող տող ------------------------------------------------------------------------------------------------------- //

		$ticker = get_ticker(array('limit' => 10));
		$ticker = ticker_process($ticker);
		

?>
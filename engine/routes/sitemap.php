<?php

	ini_set('memory_limit', '-1');
	$res = $db->select("SELECT * FROM `content`
						WHERE `published` < NOW()
						AND `state` = 1	
						AND `lang` = ? ORDER BY `created` DESC", $lang['name']);
						 
						
						

	if(count($res > 0)) foreach ($res as $value) {

		$data[] = array(
			'url' => createbURL("p={$value['id']}", $value['title']),
			'publish_date' => $value['published'],	
		);
	}



	header ("Content-Type:text/xml");
	require(bDIR.'/engine/templates/sitemap.php');


?>
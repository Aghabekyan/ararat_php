<?php 

	require MODELS . 'model_header.php';

	$cat = '';

	if(!empty($_GET['cat'])) {
		$cat = intval($_GET['cat']);
		$cat = "AND t2.cat_id={$cat}";
	}


	$res = $db->select("SELECT t1.`id`, `title`, `desc`, `img`,`published`, t2.cat_id FROM `content` t1
						JOIN category_rel t2 
						ON t1.id = t2.id
						WHERE `published` < NOW()
						AND `state` = 1	
						AND `lang` = ?
						{$cat} 
						GROUP BY t1.`id`
						ORDER BY `published` DESC LIMIT 0, 80", $lang['name']); 

	
	foreach ($res as $key => $value) {

		$desc = strip_tags($value['desc']);
		$desc = html_entity_decode($desc, ENT_QUOTES, 'UTF-8');

		$data[] = array(
			'url'   => createbURL("p={$value['id']}",$value['title']),
			'title' => $value['title'],
			'desc'  => mb_substr($desc,0,170,'UTF-8'),
			'date'  => date('D, d M Y g:i:s O', strtotime($value['published'])),
			'cat'   => isset($categories[$value['cat_id']]) ? $categories[$value['cat_id']] : '',
			'img'   => $value['img'],
		);
	}


	header ("Content-Type:text/xml");
	require(bDIR.'/engine/templates/rss.php');


?>
<?php

	$pid = !empty($_GET['p']) ? intval($_GET['p']) : redirect(createURL());


	$res = $db->selectRow("SELECT * FROM `content` WHERE `id`=?", $pid);

	if (empty($res['id'])) redirect(createURL());
	

	$time  = convertDate('Y-m-d G:i:s', 'G:i',$res['published']);
	$day   = convertDate('Y-m-d G:i:s', 'j',$res['published']);
	$year  = convertDate('Y-m-d G:i:s', 'Y',$res['published']);
	$month = $t['months'][convertDate('Y-m-d G:i:s', 'n',$res['published']) - 1];

	$data = array(
		'id'      => $res['id'], 
		'title'   => $res['title'],
		'desc'    => $res['desc'],
		'img'     => $res['img'],
		'youtube' => empty($res['youtube']) ? array() : json_decode($res['youtube'], true),
		'hits'    => $res['hits'],
		'gallery' => unserialize($res['gallery']),
		'date'    => "{$time} - {$day}/{$month}/{$year}",
		'url'     => createbURL("p={$res['id']}"),	
		'yt_img'  => !empty($value['youtube']) ? 1 : 0,

		'fb_url'  => createbURL("p={$res['id']}"),
		'fb_img'  => bURL . "timthumb.php?src={$res['img']}&w=600&h=400",
		'fb_desc' => mb_substr(strip_tags($res['desc']), 0, 200, 'UTF-8'),    
	);
	
	require (MODELS . 'model_header.php');

	

	
	// Այս թեմայով -------------------------------------------------------------------------------------------------- //

	$suggestions = array();

	$meta = $db->select("SELECT `metakey` FROM `content` WHERE id=?",$pid);
	

	$res = $db->select("SELECT `id`,`title` FROM `content`
				WHERE published < NOW() 
				AND   state = 1  
				AND   lang = ?
				AND   MATCH (metakey) AGAINST (? IN BOOLEAN MODE)
				AND   id != ?
				ORDER BY `published` DESC
				LIMIT 0, ?", $lang['name'], $meta[0]['metakey'], $pid, 5);

	foreach($res as $value) {
		$suggestions[] = array(
			'id' => $value['id'],
			'title' => $value['title'],
			'url' => createURL("p={$value['id']}", $value['title']),
		);
	}


	
	$page_title = 'Ararat TV | ' . $data['title'];
		
	require(bDIR.'/engine/templates/header.php');
	require(bDIR.'/engine/templates/p.php');
	require(bDIR.'/engine/templates/footer.php');


?>
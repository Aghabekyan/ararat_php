<?php
	
	if(!empty($_GET['cat'])) {
		$cat_id = intval($_GET['cat']);
	} 
	else header("Location:".htmDIR);	

	
	require(bDIR.'/engine/model/model_header.php');
	
	

	$res = pageination(array(
			'showOnPage' => 4,
			'pagination_url' => "cat={$cat_id}",
			'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
			'query' => array(
					'count' => array(
							'query' => 'SELECT count(*) count
										FROM `content` t1
										JOIN `category_rel` t2
										ON    t1.id = t2.id
										WHERE t2.cat_id = ?
										AND  `published` < NOW()
										AND  `state` = 1
										AND  `lang`  = ?',
									
							'bind' => array($cat_id, $lang['name'])
						),
					'res' => array(
							'query' => "SELECT t1.`id`,`title`,`desc`,`img`,`published`, `youtube`, t2.`cat_id`
										FROM `content` t1
										JOIN `category_rel` t2
										ON    t1.id = t2.id
										WHERE t2.cat_id = ?
										AND  `published` < NOW()
										AND  `state` = 1
										AND  `lang`  = ?
										ORDER BY `published` DESC",

							'bind' => array($cat_id, $lang['name'])
						)
				)
		));

	extract($res);

	$data = array();

	if(count($result) != 0) {
		foreach($result as $value) {
			$title = strip_tags($value['title']);
			$desc = strip_tags($value['desc']);
			
			$post_time = convertDate('Y-m-d G:i:s', 'Y:m:d', $value['published']);
			$current_time = date('Y:m:d', time());
	
			$youtube = array();
			if (!empty($value['youtube'])) {
				$youtube = json_decode($value['youtube'], true);
				$youtube = $youtube[0];	
			}


			$data[] = array(
				'id' 	=> $value['id'],
				'title' => mb_strlen($title, 'UTF-8') > 83 ? mb_substr($title, 0, 80, 'UTF-8').'...' : $title,
				'desc' 	=> mb_strlen($desc, 'UTF-8') > 180 ? mb_substr($desc, 0, 177, 'UTF-8').'...' : $desc,
				'url'   => createURL("p={$value['id']}", $value['title']),
				'img'   	=> !empty($value['img']) ? thumb($value['img'], 240, 150) : (!empty($youtube) ? yt_img($youtube, 240, 150) : ''),	
				'date' 	=> $post_time == $current_time ? $t['items']['today'].' - '.convertDate('Y-m-d G:i:s', 'G:i',$value['published']) : $value['published'],	
				'yt_img'  => !empty($value['youtube']) ? 1 : 0,
			);
		}
	}
	
	$cat_res = $db->select("SELECT `id`, `title_{$lang['name']}` title FROM `categories` WHERE `published` != 0 ORDER BY `order`");
	
	foreach ($cat_res as $value) {

		$catses[$value['id']] = $value['title'];
		
	}

	$cat_name = isset($catses[$cat_id]) ? $catses[$cat_id] : '';
	
	$page_title = 'Ararat TV | ' . $cat_name;

	require(bDIR.'/engine/templates/header.php');
	require(bDIR.'/engine/templates/cat.php');
	require(bDIR.'/engine/templates/footer.php');
?>
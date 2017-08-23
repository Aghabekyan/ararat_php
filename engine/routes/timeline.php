<?php
	
	require(bDIR.'/engine/model/model_header.php');
	require(bDIR.'/engine/model/model_left.php');
	require(bDIR.'/engine/model/model_center.php');
	require(bDIR.'/engine/model/model_right.php');
	

	$sub_bind = $_SESSION['subdomain'] == 1 ? '' : "AND `subdomain` = {$_SESSION['subdomain']}";

	$res = pageination(array(
			'showOnPage' => 40,
			'pagination_url' => "timeline",
			'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
			'query' => array(
					'count' => array(
							'query' => "SELECT count(*) count
										FROM `content`
										WHERE `publish_date` < NOW()
										AND  `state` = 1
										{$sub_bind}
										AND  `lang`  = ?",
									
							'bind' => array($lang['name'])
						),
					'res' => array(
							'query' => "SELECT `id`,`title`,`desc`,`img`,`publish_date`,youtube
										FROM `content` 
										WHERE `publish_date` < NOW()
										AND  `state` = 1
										{$sub_bind}
										AND  `lang`  = ?
										ORDER BY `publish_date` DESC",

							'bind' => array($lang['name'])
						)
				)
		));

	
	extract($res);

	$cat_res = $result;


	$data = array();

	if(count($cat_res) != 0) {
		foreach($cat_res as $value) {
			$title = strip_tags($value['title']);
			$desc = strip_tags($value['desc']);
			
			$post_time = convertDate('Y-m-d G:i:s', 'Y:m:d', $value['publish_date']);
			$current_time = date('Y:m:d', time());
	
			$data[] = array(
				'id' 	=> $value['id'],
				'title' => mb_strlen($title, 'UTF-8') > 83 ? mb_substr($title, 0, 80, 'UTF-8').'...' : $title,
				'desc' 	=> mb_strlen($desc, 'UTF-8') > 180 ? mb_substr($desc, 0, 177, 'UTF-8').'...' : $desc,
				'url'   => createURL("{$invertsubs[$_SESSION['subdomain']]}&p={$value['id']}",$value['title']),
				'img' 	=> ret_img($value['img'], 240, 120),
				'date' 	=> $post_time == $current_time ? $t['items']['today'].' - '.convertDate('Y-m-d G:i:s', 'G:i',$value['publish_date']) : $value['publish_date'],	
			);
		}
	}
	
	$cat_name = $t['items']['all_timeline'];
	
	require(bDIR.'/engine/templates/header.php');
	require(bDIR.'/engine/templates/cat.php');
	require(bDIR.'/engine/templates/footer.php');
?>
<?php
	

	

	
	require(bDIR.'/engine/model/model_header.php');
	require(bDIR.'/engine/model/model_left.php');
	require(bDIR.'/engine/model/model_right.php');


	$res = pageination(array(
			'showOnPage' => 40,
			'pagination_url' => "news_line",
			'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
			'query' => array(
					'count' => array(
							'query' => 'SELECT count(*) count
										FROM `content`
										WHERE `published` < NOW()
										AND  `state` = 1
										AND  `lang`  = ?',
									
							'bind' => array($lang['name'])
						),
					'res' => array(
							'query' => "SELECT `id`,`title`,`desc`,`img`,`published`,youtube
										FROM `content` 
										WHERE `published` < NOW()
										AND  `state` = 1
										AND  `lang`  = ?
										ORDER BY `published` DESC",

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

			
			$post_time = convertDate('Y-m-d G:i:s', 'Y:m:d', $value['published']);
			$current_time = date('Y:m:d', time());

			$data[] = array(
				'id' 	=> $value['id'],
				'title' => mb_strlen($title, 'UTF-8') > 83 ? mb_substr($title, 0, 80, 'UTF-8').'...' : $title,
				'desc' 	=> mb_strlen($desc, 'UTF-8') > 450 ? mb_substr($desc, 0, 450, 'UTF-8').'...' : $desc,
				'url'   => createURL("p={$value['id']}",$value['title']),
				'img' 	=> !empty($value['img']) ? ret_img($value['img'], 240, 150) : (!empty($value['youtube']) ? yt_img($value['youtube'], 112, 75) : ''),
				'date' 	=> $post_time == $current_time ? $t['items']['today'].' - '.convertDate('Y-m-d G:i:s', 'G:i',$value['published']) : $value['publish_date'],	
			);
		}
	}
	
	$cat_name = $t['items']['all_timeline'];
	
	require(bDIR.'/engine/templates/header.php');
	require(bDIR.'/engine/templates/cat.php');
	require(bDIR.'/engine/templates/footer.php');
?>
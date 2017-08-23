<?

	$s = $db->escape($_GET['s']);

	if($s == '') header('Location: '.htmDIR);

	$cat_name = '<em>" ' . $s . ' "</em> ' . $t['items']['no_res'];	


	if( strlen($s) < 3 ){
		$cat_name = '<em>" ' . $s . ' "</em>' . ' ' . $t['items']['less_3'];
	}
	
		
	$data = array();
	$pagination = '';
	
	if(strlen($s) > 3) {

		$search_words =  explode(" ", $s);

		$phrase='';
		foreach($search_words as $key=>$word){
			$phrase.=$word.'* ';
		}

		if(!empty($_GET['date'])) {
			$res = pageination(array(
				'showOnPage' => 50,
				'pagination_url' => "s=".$s."&date=true",
				'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
				'query' => array(
						'count' => array(
								'query' => 'SELECT count(*) count FROM `content` 
												WHERE `published` < NOW() 
													AND `state` = 1
													AND `lang` = "am"
													AND DATE(`published`) = ?
												ORDER BY published DESC ',
								'bind' => $s
							),
						'res' => array(
								'query' => 'SELECT * FROM content 
												WHERE published < NOW() 
													AND state=1
													AND lang = "am"
													AND DATE(`published`) = ?
												ORDER BY published DESC',
								'bind' => $s
						)
					)
			));

		}
		else {

			$res = pageination(array(
				'showOnPage' => 50,
				'pagination_url' => "s=".$s,
				'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
				'query' => array(
						'count' => array(
								'query' => 'SELECT count(*) count
											FROM `content`
											WHERE MATCH (`title`, `metakey`) AGAINST (? IN BOOLEAN MODE)
											AND `published` < NOW()
											AND `state` = 1
											AND `lang` = "am" ',
								'bind' => array($phrase)
							),
						'res' => array(
								'query' => 'SELECT `id`, `title`,`published`,`desc`,`img`,
												   MATCH (`title`, `metakey`) AGAINST (? IN BOOLEAN MODE) AS rel
											FROM `content`
											WHERE MATCH (`title`, `metakey`) AGAINST (? IN BOOLEAN MODE)
											AND `published` < NOW()
											AND `state` = 1
											AND `lang` = "am"
											ORDER BY `rel` DESC, `published` DESC',
								'bind' => array($phrase, $phrase)
						)
					)
			));
		}


		extract($res);

		if(count($result) != 0) {
			foreach($result as $value) {
				$title = strip_tags($value['title']);
				$desc = strip_tags($value['desc']);

				$post_time = convertDate('Y-m-d G:i:s', 'Y:m:d', $value['published']);
				$current_time = date('Y:m:d', time());

				$data[] = array(
					'id' 	=> $value['id'],
					'title' => mb_strlen($title, 'UTF-8') > 83 ? mb_substr($title, 0, 80, 'UTF-8').'...' : $title,
					'desc' 	=> mb_strlen($desc, 'UTF-8') > 111 ? mb_substr($title, 0, 108, 'UTF-8').'...' : $desc,
					'url'   => createURL("p={$value['id']}",$value['title']),
					'img' 	=> ret_img($value['img'], 240, 150),
					'date' 	=> $post_time == $current_time ? $t['items']['today'].' - '.convertDate('Y-m-d G:i:s', 'G:i',$value['published']) : $value['published'],	
				);
			}

			$cat_name = $t['items']['search_res'].' "<em>'.$s.' </em>" '.$t['items']['search_query'];
		}
	}


		

	require(bDIR.'/engine/model/model_header.php');
	require(bDIR.'/engine/model/model_left.php');
	require(bDIR.'/engine/model/model_right.php');

	require(bDIR.'/engine/templates/header.php');
	require(bDIR.'/engine/templates/cat.php');
	require(bDIR.'/engine/templates/footer.php');

?>
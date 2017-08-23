<?php 
	
	$person_id = !empty($_GET['person_id']) ? intval($_GET['person_id']) : header('Location:'.htmDIR.admDIR);

	$from = !empty($_GET['dp-from']) ? $_GET['dp-from'] : date('Y-m-d', strtotime('- 1 month'));
	$to = !empty($_GET['dp-to']) ? $_GET['dp-to'] : date("Y-m-d");
	

	$res = pageination(array(
			'showOnPage' => 10,
			'pagination_url' => "person_posts&person_id=".$person_id."&dp-from=".$from."&dp-to=".$to,
			'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
			'by_months' => true,
			'query' => array(
					'count' => array(
							'query' => 'SELECT count(*) count
										FROM `content` 
										WHERE `user_id`=?
										AND   DATE(published) BETWEEN ? AND ?',	
							
							'bind' => array($person_id, $from, $to),
						),
					'res' => array(
							'query' => "SELECT `id`, `title`, `state`, `published`, `hits`, `user_id`,`img`,`desc`
									    FROM `content`  
									    WHERE `user_id`=?
									    AND   DATE(published) BETWEEN ? AND ?	 
									    ORDER BY `published` DESC ", 
														 
							'bind' => array($person_id, $from, $to),
						)
				)

		));


	extract($res);

	$show_admin_res = $result;
	$user_post_count = $res['count'];
	
	$data = array();
	
	if(count($show_admin_res) != 0) {
		
		foreach($show_admin_res as $value) {
			$data[] = array(
				'id' => $value['id'],
				'person_id' => $value['user_id'],
				'title' => $value['title'],
				'state' => $value['state'],
				'published' => $value['published'],
				'url' => createURL('p='.$value['id'], $value['title']),
				'hits' => $value['hits'],
			);	
		}
	}	


	require(bDIR.'/'.admDIR.'engine/templates/header.php');
	require(bDIR.'/'.admDIR.'engine/templates/person_posts.php');
	require(bDIR.'/'.admDIR.'engine/templates/footer.php');
?>
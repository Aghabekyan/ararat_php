<?php 

	$day = ( isset($_GET['post_count']) && $_GET['post_count'] != '' ) ? $_GET['post_count'] : header("Location:".htmDIR.admDIR);
		

	$where = ($activeUser['role'] != 3) ? '' : 'WHERE `user_id` = ? AND date(published) = ?'; 
	$bind = ($activeUser['role'] != 3) ? array($day) : array($activeUser['id'], $day);

	$res = pageination(array(
			'showOnPage' => 10,
			'pagination_url' => "post_count={$day}",
			'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
			'query' => array(
					'count' => array(
							'query' => $activeUser['role'] != 3 ? "SELECT count(*) count FROM `content` WHERE date(published) = ?" 
													: 
													"SELECT count(*) count FROM `content` {$where}",
							'bind' => $bind
						),
					'res' => array(
							'query' => $activeUser['role'] != 3 ? "SELECT * 
													 FROM `content` WHERE date(published) = ?
													 ORDER BY `published` DESC" 
													 : 
													"SELECT * FROM `content`
													 {$where} 
													 ORDER BY `published` DESC",
							'bind' => $bind
						)
				)
		));

	extract($res);

	$show_admin_res = $result;

	$data = array();
	foreach($show_admin_res as $value) {
		$data[] = array(
			'id'        => $value['id'],
			'user_id'   => $value['user_id'],
			'title'     => $value['title'],
			'state'     => $value['state'],
			'published' => $value['published'],
			'url'       => createURL('p='.$value['id'], $value['title']),
			'hits'      => $value['hits'],
			'name'      => isset($users[$value['user_id']]['name']) ? $users[$value['user_id']]['name'] : '',
		);	
	}



	$day_counter = $count;

	require(bDIR.'/'.admDIR.'engine/templates/header.php');
	require(bDIR.'/'.admDIR.'engine/templates/index.php');
	require(bDIR.'/'.admDIR.'engine/templates/footer.php');
?>
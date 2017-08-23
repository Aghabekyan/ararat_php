<?php 	
	
	$where = ($activeUser['role'] != 3) ? "WHERE `lang` = '{$lang['name']}'" : "WHERE `user_id` = ? AND `lang` = '{$lang['name']}'"; 
	$bind = ($activeUser['role'] != 3) ? array() : array($activeUser['id']);
	
	$res = pageination(array(
			'showOnPage' => 10,
			'pagination_url' => "index",
			'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
			'query' => array(
					'count' => array(
							'query' => "SELECT count(*) count FROM `content` {$where}", 
							'bind' => $bind
						),
					'res' => array(
							'query' => "SELECT * FROM `content` {$where} ORDER BY `published` DESC",
							'bind' => $bind
						)
				)
		));
	
	extract($res);
	
	$data = array();

	foreach($result as $value) {
			
		$data[] = array(
			'id'        => $value['id'],
			'user_id'   => $value['user_id'],
			'title'     => $value['title'],
			'state'     => $value['state'],
			'published' => $value['published'],
			'url'       => createURL('p='.$value['id'], $value['title']),
			'hits'      => $value['hits'],
			'name'      => isset($users[$value['user_id']]['name']) ? $users[$value['user_id']]['name'] : 'was deleted',
			'fb_url'    => createURL("p={$value['id']}", $value['title']),
			'fb_img'    => ret_img($value['img'], 300, 300),
			'fb_desc'   => mb_substr(strip_tags($value['desc']), 0, 200, 'UTF-8'),    
		);	
	}


	require(bDIR.'/'.admDIR.'engine/templates/header.php');
	require(bDIR.'/'.admDIR.'engine/templates/index.php');
	require(bDIR.'/'.admDIR.'engine/templates/footer.php');
	
?>
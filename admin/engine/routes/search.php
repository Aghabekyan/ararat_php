<?php 

	if (empty($_GET['l'])) {
		$sid = !empty($_POST['search']) ? (int)$_POST['search'] : redirect(createURL(0,0,1));

		$search_res = $db->selectRow("SELECT `lang` FROM `content` WHERE `id`= ?", $sid);	

		header('Location:' . "?search={$_POST['search']}&l={$search_res['lang']}");
	}	
	else {

		$sid = !empty($_GET['search']) ? (int)$_GET['search'] : redirect(createURL(0,0,1));
		
		$search_res = $db->selectRow("SELECT * FROM `content` WHERE `id`= ?", $sid);		

		$data = array();
		
		if(!empty($search_res['id'])) {
			
			$data[] = array(
				'id'        => $search_res['id'],
				'title'     => $search_res['title'],
				'state'     => $search_res['state'],
				'published' => $search_res['published'],
				'hits'      => $search_res['hits'],
				'url'       => createURL("p={$search_res['id']}", $search_res['title']),
				'name'      => $users[$search_res['user_id']]['name'],
				'user_id'   => $users[$search_res['user_id']]['id'],
			);	
		
		}
		
		$pagination = '';
		require(bDIR.'/'.admDIR.'/engine/templates/header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/index.php');
		require(bDIR.'/'.admDIR.'/engine/templates/footer.php');
	}

?>
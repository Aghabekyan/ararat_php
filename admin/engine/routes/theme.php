<?php 

	$action = isset($_GET['action']) ? $_GET['action'] : '';

	require bDIR . '/' . admDIR . "engine/model/model_header.php";

	if ($action == 'new') {
		$is_update = false;	
	}
	else if ($action == 'new_theme') {

		$pid = isset($_POST['id']) ? $_POST['id'] : '';

		$data = array(
			'theme_subs'   => $_POST['theme_subs'],
			'theme_name'   => $_POST['theme_name'],
			'img'          => $_POST['userfile'],
			'tag_names'    => $_POST['tag_names'],
			'published'    => isset($_POST['published']) ? $_POST['published'] : 0,
			'lang'         => $lang['name'],
		);

		$db->insert("INSERT INTO `themes` (`id`, `subdomain`, `theme_name`,`img`,`tag_names`,`published`,`lang`,`date`)
			         VALUES(?, %s,CURRENT_TIMESTAMP)", $pid, $data);	 


		header('Location:'.createURL('theme', false, true));

	}
	else if ($action == 'get_edit') {

		// SELECT data to show in update page -----------------------------------------------

		$data = array();

		$pid = $_GET['id'];

		$data = $db->selectRow("SELECT * FROM `themes`  WHERE `id`= ?", $pid);

		if (empty($data['id'])) header('Location:'.createURL('theme', false, true));

		$is_update = true;

	}
	else if ($action == 'edit') {

		$pid = isset($_GET['id']) ? $_GET['id'] : '';

		$data = array(
			'theme_subs'    => $_POST['theme_subs'],
			'theme_name'   => $_POST['theme_name'],
			'img'          => $_POST['userfile'],
			'tag_names'    => $_POST['tag_names'],
			'published'    => isset($_POST['published']) ? $_POST['published'] : 0,
			'lang'         => $lang['name'],
		);

		$db->update("UPDATE `themes` 
			         SET `subdomain` = ?, `theme_name` = ?, `img` = ?, `tag_names` = ?, `published` = ?, `lang` = ?
			         WHERE `id` = ?", $data['theme_subs'], $data['theme_name'], $data['img'], $data['tag_names'],  $data['published'],  $data['lang'], $pid);

		header('Location:'.createURL('theme', false, true));		
	}
	else {

		$res = pageination(array(
			'showOnPage' => 10,
			'pagination_url' => "theme",
			'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
			'query' => array(
					'count' => array(
							'query' => "SELECT count(*) count FROM `themes`", 
							'bind' => array(),
						),
					'res' => array(
							'query' => "SELECT * FROM `themes`",
							'bind' => array()
						)
				)
		));

		extract($res);



		$data = array();
		foreach($result as $value) {
			$data[] = array(
				'id'         => $value['id'],
				'theme_name' => $value['theme_name'],
				'tag_names'  => $value['tag_names'],
				'published'  => $value['published'],
			);	
		}
	}

	require(bDIR.'/'.admDIR.'engine/templates/header.php');
	require(bDIR.'/'.admDIR.'engine/templates/theme.php');
	require(bDIR.'/'.admDIR.'engine/templates/footer.php');		


?>
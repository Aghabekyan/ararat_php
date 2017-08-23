<?php

	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : exit();	
	$is_update = 0;
	$id = isset($_GET['id']) ? (int)$_GET['id'] : '';

	if ($action == 'add_poll') {
		
		$subdomain = $_POST['subdomain'];
		$current = !empty($_POST['current']) ? 1 : 0;
		
		if ($current) {
			$db->update("UPDATE `poll` SET `current` = 0 WHERE `subdomain` = ? AND `current` = 1", $subdomain);
		}

		// add empty result field --------->

		function nullify() {return 0;}
		$result = array_map('nullify', $_POST['answer']);


		$data['question'] = array(
			'am' => $lang['name'] == 'am' ? $_POST['question'] : '',
			'ru' => $lang['name'] == 'ru' ? $_POST['question'] : '',
			'en' => $lang['name'] == 'en' ? $_POST['question'] : '',
		);

		$data['answer'] = array(
			'am' => $lang['name'] == 'am' ? $_POST['answer'] : '',
			'ru' => $lang['name'] == 'ru' ? $_POST['answer'] : '',
			'en' => $lang['name'] == 'en' ? $_POST['answer'] : '',
			'result' => $result	
		);

		$data['img'] = !empty($_POST['userfile']) ? $_POST['userfile'] : '';

		$answer = json_encode($data['answer']);

		$db->insert("INSERT INTO `poll` (`question_{$lang['name']}`, `answer`, `img`, `date`, `current`, `subdomain`) VALUES (?, ?, ?, now(), ?, ?)", $data['question'][$lang['name']], $answer, $data['img'], $current, $subdomain);

		redirect(createURL('poll&action=new_poll', 0, 1));
	}
	else if ($action == 'del_poll') {
		
		$db->delete("DELETE FROM `poll` WHERE `id` = ?", $id);
		$db->delete("DELETE FROM `poll_ip` WHERE `poll_id` = ?", $id);
		redirect(createURL('poll&action=new_poll', 0, 1));
	}
	else if ($action == 'update_poll') {
		
		$is_update = 1;	
		
		$data = $db->selectRow("SELECT `id`, `question_{$lang['name']}` question, `answer`, `img`,`current`, `subdomain` FROM `poll` WHERE `id` = ?", $id);
		$data['answer'] = json_decode($data['answer'], true);

		require(bDIR.'/'.admDIR.'engine/model/model_header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/poll.php');
		require(bDIR.'/'.admDIR.'/engine/templates/footer.php');

	}
	else if ($action == 'update') {

		$subdomain = $_POST['subdomain'];
		$current = !empty($_POST['current']) ? 1 : 0;

		if ($current) {
			$db->update("UPDATE `poll` SET `current` = 0 WHERE `subdomain` = ? AND `current` = 1", $subdomain);
		}

		$data = $db->selectRow("SELECT * FROM `poll` WHERE `id` = ?", $id);
		
		$data['answer'] = json_decode($data['answer'], true);
		$data['answer'][$lang['name']] = $_POST['answer'];
		$data['answer']['result'] = $_POST['result'];
		$data['answer'] = json_encode($data['answer']); 
		$data['img'] = !empty($_POST['userfile']) ? $_POST['userfile'] : '';

		$db->update("UPDATE `poll` 
					 SET `question_{$lang['name']}` = ?, `answer` = ?, `img` = ?, `current` = ?, `subdomain` = ? 
					 WHERE `id` = ?", $_POST['question'], $data['answer'], $data['img'], $current, $subdomain, $id);	
		
		redirect(createURL('poll&action=new_poll', 0, 1));
	}
	else {
	
		$res = pageination(array(
				'showOnPage' => 20,
				'pagination_url' => "poll&action=new_poll",
				'page' => isset($_GET['paged']) ? intval($_GET['paged']) : 1,
				'query' => array(
						'count' => array(
								'query' => "SELECT count(*) count FROM `poll`", 
								'bind' => array(),
							),
						'res' => array(
								'query' => "SELECT `id`, `question_{$lang['name']}` question, `date`, `current`, `subdomain` FROM `poll` ORDER BY `date` DESC",
								'bind' => array(),
							)
					)
			));
			
		extract($res);

		$sub_res = $db->select("SELECT `id`, `title_{$lang['name']}` title, `name` FROM `subdomains`");

		foreach ($sub_res as $value) {
			$subs[$value['id']] = $value['title'];
			$subn[$value['id']] = $value['name'];
		}

		require(bDIR.'/'.admDIR.'engine/model/model_header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/poll.php');
		require(bDIR.'/'.admDIR.'/engine/templates/footer.php');
	}	

?>
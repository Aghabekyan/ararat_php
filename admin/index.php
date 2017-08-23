<?php

	//$username = empty($_SERVER['REMOTE_USER']) ? $_SERVER['PHP_AUTH_USER'] : $_SERVER['REMOTE_USER'];
	$username = 'root';
	
	if (empty($username)) {
		exit('something got wrong :(');
	}

	$rw_mode = true;
	$lang['name'] = 'am';
	
	require_once('../config.php');
	require_once(bDIR.'/'.admDIR.'engine/includes/functions.php');

	// require language -----------------------------------------------------------------------------------------------//

		$validLanguages = array('am', 'ru', 'en');
		$defaultLanguage = 'am';
		$lang['name'] = (isset($_GET['l']) and in_array($_GET['l'], $validLanguages)) ? $_GET['l'] : $defaultLanguage;
		
		ob_start();
			require(bDIR.'/admin/engine/translations/'.$lang['name'].'.php');
		ob_end_clean();

	// ----------------------------------------------------------------------------------------------------------------//
		
	$route = 'index';
	
	foreach ($_GET as $key => $value) {
		if (!empty($key) && $key != 'l') {
			$route = $key;
			break;
		}
	}
	
	$res = $db->select("SELECT * FROM `users`");

	$users = array();
	$activeUser = array();
	foreach ($res as $key => $value) {
		$users[$value['id']] = array(
			'id'       => $value['id'],
			'name'     => $value['name'],
			'username' => $value['username'],
			'role'     => $value['role'],	
		);
		if ($value['username'] == $username) {	
			$activeUser = $users[$value['id']];
		}
 	}

	unset($res);
	
	// published articles for today ------------------------------------------------------------------------------------------
	
	$post_counter = $db->select("SELECT count(`id`) count FROM `content` WHERE `lang` = 'am' 
																		 AND `create_date` >= CURDATE() ");	
													
																	       	
				
	$post_counter = $post_counter[0]['count'];

	//--------------------------------------------------------------------------------------------------------------------------

	if (file_exists(bDIR.'/'.admDIR."/engine/routes/{$route}.php")) {

		require bDIR.'/'.admDIR."/engine/routes/{$route}.php";
	}



?>
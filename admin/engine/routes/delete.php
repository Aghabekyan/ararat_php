<?php 
	
	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

	if ($action == 'del_post') {

		$pid = $_GET['id'];

		$db->delete("DELETE FROM `content` WHERE `id`=?", $pid);
		$db->delete("DELETE FROM `category_rel` WHERE `id`=?", $pid);

		@admin_log('delete', $pid);
		redirect(createURL('', 0, 1));		
	}
	else if ($action == 'theme') {

		$db->delete("DELETE FROM `themes` WHERE `id` = ?", $_REQUEST['id']);
		redirect(createURL('theme', 0, 1));
	}

?>
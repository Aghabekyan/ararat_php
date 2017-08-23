<?php

	if (isset($_GET['id'])) {
		$pid = $_GET['id'];

		$name = $db->select("SELECT `username` FROM `users` WHERE `id`=?", $pid);
		$db->delete("DELETE FROM `users` WHERE `id`=?", $pid);


		include_once(bDIR.'/engine/includes/htpasswd.php');

		$htpasswd = new htpasswd(bDIR.'/'.admDIR.'/.htpasswd');

		$htpasswd->user_delete($name[0]['username']);
	}

	header('Location:'.createURL('editor_list', 0, 1));

?>
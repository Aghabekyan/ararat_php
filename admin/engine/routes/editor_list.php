<?php 

	$data = array();
	if(count($users) != 0) {
		foreach($users as $value) {
			$data[] = array(
				'id' => $value['id'],
				'name' => $value['name'],
				'role' => $value['role'] == 2 ? 'Խմբագիր ' : ($value['role'] == 3 ? 'Լրագրող ' : ''),
				'username' => $value['username'],
				'url' => htmDIR.admDIR.'?person_posts&person_id='.$value['id'],
			);	
		}
	}	


	include_once(bDIR.'/engine/includes/htpasswd.php');

	$htpasswd = new htpasswd(bDIR.'/'.admDIR.'/.htpasswd'); // path to .htpasswd file


	require(bDIR.'/'.admDIR.'/engine/templates/header.php');
	require(bDIR.'/'.admDIR.'/engine/templates/editor_list.php');
	require(bDIR.'/'.admDIR.'/engine/templates/footer.php');

?>
<?php 
	
	$is_update = true;

	
	if(empty($_GET['id'])) {
		die("no id");
	}



	$pid = intval($_GET['id']);

	$res = $users[$pid];	
			
	$name     = $res['name'];
	$username = $res['username'];
	$role     = $res['role'];

	

	require(bDIR.'/'.admDIR.'/engine/templates/header.php');
	require(bDIR.'/'.admDIR.'/engine/templates/update_editor.php');
	require(bDIR.'/'.admDIR.'/engine/templates/footer.php');

?>
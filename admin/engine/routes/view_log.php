<?php

	$pid = $_GET['id'];

	if (empty($pid)) header('Location:'.htmDIR.admDIR);

	$res = $db->select("SELECT * FROM `logs` WHERE `pid` = ?", $pid);

	$data = array();
	
	foreach ($res as $value) {
		$data[] = array(

			'id'     	=> $value['id'],
			'pid'    	=> $value['pid'],
			'action' 	=> $value['action'],
			'ip'     	=> $value['ip'],
			'params' 	=> unserialize($value['params']),
			'post_data' => unserialize($value['post_data']),
			'log_date'  => $value['log_date'], 

		);
	}

	require(bDIR.'/'.admDIR.'/engine/templates/header.php');
	pp($data);
	require(bDIR.'/'.admDIR.'/engine/templates/footer.php');

?>
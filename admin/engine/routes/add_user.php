<?php

	if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['role'])) {
		exit('Խնդրում  ենք լրացնել բոլոր դաշտերը ');
	}

	$pid = empty($_POST['id']) ? '' : $_POST['id'];


    $userdata = array(
    	'name'     => $_POST['name'],	
    	'username' => $_POST['username'],		
    	'role'     => $_POST['role'],
    );

	include_once(bDIR.'/engine/includes/htpasswd.php');

	$htpasswd = new htpasswd(bDIR.'/'.admDIR.'/.htpasswd'); // path to .htpasswd file


    if($pid != '') {

    	$old_name = $users[$pid];
    	
    	$htpasswd->user_delete($old_name['username']);
    	$htpasswd->user_add($userdata['username'], $_POST['password']);
    	
    	$db->update("UPDATE `users` SET `name`=?, `username`=?, `role`=? WHERE `id` = ?", $userdata, $pid);
		
		header("Location:".createURL('editor_list', 0, 1));    	
    } else 
    if ($pid == '' && !$htpasswd->user_exists($userdata['username'])) {
    	$htpasswd->user_add($userdata['username'], $_POST['password']);
    	$db->insert("INSERT INTO `users` (`name`, `username`, `role`) VALUES (%s)", $userdata);	

    	header("Location:".createURL('editor_list', 0, 1));
    	
    }	
	else echo "Այս ծածկանունով օգտատեր արդեն գոյություն ունի խնդրում ենք փոխել ծածկանունը ";

   	 
?> 
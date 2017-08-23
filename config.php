<?php
	/* startup configs */
	define('bDIR',dirname(__FILE__));
	define('htmDIR','/');
	define('bURL','http://nyut.am/');
	define('admDIR','admin/');
	define('ROUTES', bDIR . '/engine/routes/');
	define('TEMPLATES', bDIR . '/engine/templates/');
	define('MODELS', bDIR . '/engine/model/');
	define('INCLUDES', bDIR . '/engine/includes/');

	/* END startup configs */

	require_once(bDIR."/engine/includes/class.simpleDB.php");
	require_once(bDIR."/engine/includes/class.simpleMysqli.php");
	
	$settings = array(
		'server' => '127.0.0.1',
		'username' => 'root',
		'password' => 'fanatik',
		'db' => 'nyut',
		'port' => 3306,
		'charset' => 'utf8'
	);
	
	$db = new simpleMysqli($settings);
	
	require_once(bDIR.'/engine/includes/functions.php');
	require_once(bDIR.'/engine/model/db.php');
	require_once(bDIR.'/engine/model/process.php');
?>
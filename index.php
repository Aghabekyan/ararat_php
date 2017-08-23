<?php
		
	require_once('config.php');
	$validLanguages = array('am', 'en', 'ru');
	$defaultLanguage = 'am';
	$lang['name'] = (isset($_GET['l']) and in_array($_GET['l'], $validLanguages)) ? $_GET['l'] : $defaultLanguage;
	
	ob_start();
		require(bDIR.'/engine/translations/'.$lang['name'].'.php');
	ob_end_clean();
	
	$validRoutes = array('p', 'cat', 'timeline', 's', 'rss', 'sitemap', 'about', 'contacts', 'ajax_snippets', 'rss', 'news_line');

	$fb_location = array('am' => 'hy_AM', 'ru' => 'ru_RU');


	// subdomains ---------------------------------------------------------------------------------------------------------------------------------------------------------------- //

	$route = 'index';

	foreach ($validRoutes as $value) {
		if (isset($_GET[$value])) {
			$route = $value;
		}
	}
	require bDIR."/engine/routes/{$route}.php";
	
?>
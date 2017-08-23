<?php

	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : exit();

	$id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : '';

	if ($action == 'getcats') {

		$cats = $db->select("SELECT `id`, `title_{$lang['name']}` title FROM `categories` WHERE `subdomain` = ? AND `published` = 1", $id);

	}		

	if ($action == 'most_viewed') {

		$day = (!empty($_REQUEST['day']) && in_array($_REQUEST['day'], array(1, 7, 30))) ? $_REQUEST['day'] : 1;
		$most_viewed = get_most_viewed(array('interval' => $day, 'limit' => 5));
		$most_viewed = most_viewed_process(array('items' => $most_viewed, 'width' => 100, 'height' => 60, 'len' => 80 ));
		
	}		

	if ($action == 'hitcounter') {

		if(!isset($_COOKIE[$id])) {
			$db->update("UPDATE `content` SET hits=hits + 1 WHERE id=?", $id);
		}

		// hits=hits + FLOOR(1 + RAND() * 7)
	}

	if ($action == 'rate') {

		// Rate ----->

		$url = ("http://rate.am/service.aspx");

		if(!$rss = @simplexml_load_file($url)){
			die();
		}
		
		$data['rate'] = array(
			'usd' => round(str_replace(',','.',$rss->cba->rate[0]['value']),1),
			'eur' => round(str_replace(',','.',$rss->cba->rate[1]['value']),1),
			'rur' => round(str_replace(',','.',$rss->cba->rate[2]['value']),2)
		);

		// Metal ----->

		header('Content-Type: text/html; charset=utf-8');

		$page = file_get_contents('https://www.cba.am/am/SitePages/Default.aspx');

		$doc = new DOMDocument();
		@$doc->loadHTML($page);
		$divs = $doc->getElementsByTagName('div');

		foreach($divs as $div) {
			if ($div->getAttribute('id') === 'ctl00_PlaceHolderMain_g_734e1579_1012_431a_812b_6be544d3ef04_updatePanelctl00_PlaceHolderMain_g_734e1579_1012_431a_812b_6be544d3ef04') {
				 $value = $div->nodeValue;
			}
		}

		$marr = str_replace(array('Արծաթ', 'Ոսկի', 'Պլատին'), ' ', $value);
		$marr = explode(' ', $marr);
		

		$data['metal'] = array(
			'silver'   => substr($marr[1], 0, strpos($marr[1], '.')),	
			'gold'     => substr($marr[2], 0, strpos($marr[2], '.')),	
			'platinum' => substr($marr[3], 0, strpos($marr[3], '.'))
		);
		exit(json_encode($data));
	}

	if ($action == 'vote') {


		if (!empty($_REQUEST['quest_id'])) {

			$_SESSION['quest_id'] = (int)$_REQUEST['quest_id'];
			
			exit();
		}
		

		if (!empty($_SESSION['quest_id'])) {
			
			$siteKey = '6Lf39QQTAAAAAACC1BiIftv2pBCmcOsHFfNOh61k'; 
			$secret = '6Lf39QQTAAAAAI-ONMkxIIy0Qaxa-El2rdwn8A6_';

			// Check if new user 

			$poll_id = (int)$_POST['poll_id'];

			$user = $db->selectRow("SELECT `id` FROM `poll_ip` WHERE `poll_id` = ? AND `ip_address` = ?", $poll_id, $_SERVER['REMOTE_ADDR']);

			if (!empty($user['id'])) redirect(createURL($invertsubs[$_POST['subdomain']] . '&poll'));

			function __autoload($name) {
			     include bDIR . '/' .$name . '.php';
			}
			
			// error_reporting(E_ALL);
			// ini_set('display_errors', 1);	
			
			$recaptcha = new \ReCaptcha\ReCaptcha($secret);
			// pp($recaptcha);
			// Make the call to verify the response and also pass the user's IP address
			
			$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		    if ($resp->isSuccess()) {
				
				$data = array(
					'id'        => '',
					'subdomain' => $_SESSION['subdomain'],
					'poll_id'   => $poll_id,
					'quest_id'  => $_SESSION['quest_id'],
					'ip'        => $_SERVER['REMOTE_ADDR'],
					'date'      => date("Y-m-d H:i:s"),
				);	
				pp($data);
				$db->insert("INSERT INTO `poll_ip` VALUES(%s)", $data);
		    	
				$results = $db->selectRow("SELECT `answer` FROM `poll` WHERE `id` = ?", $poll_id);
		    	$results = json_decode($results['answer'], true);
		    	$results['result'][$_SESSION['quest_id']] += 1;
		    	
		    	$results = json_encode($results);

		    	$db->update("UPDATE `poll` SET `answer` = ? WHERE `id` = ?", $results, $poll_id);
		    	setcookie("poll_id", $poll_id, time()+3600000);
		    }
		    else {
			    foreach ($resp->getErrorCodes() as $code) {
		            echo '<tt>' . '1' .$code . '</tt> ';
		        }
		    }
		}
		unset($_SESSION['quest_id']);
		redirect(createURL($invertsubs[$_REQUEST['subdomain']] . '&poll'));
	
	}

	if ($action == 'popup') {

		$subdomain = $_REQUEST['subdomain'];
		$date = $_SESSION['popup'][$subdomain]['start'];

		$data = $db->select("SELECT `id`, `title`, `img` 
							 FROM `content`
							 WHERE `subdomain` = ?
							 AND   state = 1  
							 AND   lang = ?
							 AND `publish_date` < NOW()
							 AND `publish_date` > ?", $subdomain, $lang['name'], $date);

	}	
?>


	<? if ($action == 'getcats'): ?>
		<? foreach($cats as $key => $value):?>
			<div class="cat_item">
				<label><input type="checkbox" name="category[]" value="<?= $value['id'] ?>" /> <?= $value['title'] ?></label>
			</div> 
		<?endforeach;?>
	<? endif; ?>

	<? if ($action == 'most_viewed'): ?>
		<? foreach ($most_viewed as $key => $value): ?>
			<a href="<?= $value['url'] ?>" class="clearfix">
				<img src="<?= $value['img'] ?>">
				<span>
					<time><?= $value['date'] ?></time>
					<?= $value['title'] ?>
				</span>
			</a>
		<? endforeach; ?>
	<? endif; ?>	

	<? if ($action == 'popup'): ?>
			<? foreach ($data as $value): ?>
				<div class="popup_unit">
					<a href="<?= createbURL("{$invertsubs[$subdomain]}&p={$value['id']}") ?>" target="_blank">
						<img src="<?= thumb($value['img'], 120, 75) ?>">
						<span><?= $value['title'] ?></span>
					</a>
					<div class="closePopup"></div>
				</div>
			<? endforeach; ?>
	<? endif; ?>
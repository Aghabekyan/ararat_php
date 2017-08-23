<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= isset($page_title) ? $page_title : 'Nyut.am | ' . $t['items']['header_title'] ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<meta name="author" content="Red Media LLC">
		
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
	
		<? if (isset($_GET['p'])): ?>
			<meta property="og:title" content="<?= $data['title'] ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:description" content="<?= $data['fb_desc'] ?>" />
			<meta property="og:url" content="<?= $data['fb_url'] ?>" />
			<meta property="og:image" content="<?= $data['fb_img'] ?>" />
		<? else: ?>
			<meta property="og:title" content="<?= isset($page_title) ? $page_title : 'Nyut.am' ?>" />
			<meta property="og:type" content="website" />
			<meta property="og:description" content="" />
			<meta property="og:image" content="<?= bURL."img/fb_og_img.jpg" ?>" />
		<? endif; ?>
				
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/fotorama.css">
        <link rel="stylesheet" href="css/main.css">
    </head>


    <script>
     	var htmDIR = "<?= htmDIR ?>";
     	var lang   = "<?= $lang['name'] ?>";
    </script>
      
    <body>
       
	   
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.4&appId=171040006306876";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	   
		<header class="clearfix">
			<div class="logo">
				<a href="<?= createURL() ?>">
					<img src="img/logo.png">
				</a>
			</div>
			<div class="headerRight">
				<div class="useFull clearfix">
					<div class="date">
						<span><?= $t['items']['yerevan'] ?>,</span> <span><?=dateDMY(date("d.m.Y"))?>,</span> <span><div id="hours">--</div><div>:</div><div id="min">--</div>, <div class="weather"></div></span>
					</div>
					<div class="searchBox clearfix">
						<form action="<?= htmDIR ?>" method="GET">
							<input type="search" class="search" placeholder="<?= $t['items']['search'] ?>" name="s" value=""/>
							<input type="submit" value="" class="ssubmit"/>
						</form>
					</div>
					<div class="langBar">
						<a href="<?= langChanger(array('l' => 'am')) ?>" class="<?= $lang['name'] == 'am' ? 'current' : '' ?>">Հայերեն <img src="img/flags/am.png"></a>
						<a href="<?= langChanger(array('l' => 'ru')) ?>" class="<?= $lang['name'] == 'ru' ? 'current' : '' ?>">на Русском <img src="img/flags/ru.png"></a>
						<a href="<?= langChanger(array('l' => 'en')) ?>" class="<?= $lang['name'] == 'en' ? 'current' : '' ?>">in English <img src="img/flags/gb.png"></a>
					</div>
				</div>
				<nav class="menu">
					<? foreach ($categories_res as $value): ?>
						<? if ($value['published'] == 1): ?>	
							<a href="<?= createURL("cat={$value['id']}") ?>">
								<?= mb_strtoupper ($value['title'], 'UTF-8') ?>

								<? if ($value['id'] == 15): ?>
									<div style="display:none">
										<? foreach ($categories_res as $value): ?>
											<?= $value['published'] == 15 ?  "<a href=" . createURL("cat={$value['id']}") . ">" . $value['id'] . "</a>" : '' ?>
										<? endforeach; ?>
									</div>
							    <? elseif ($value['id'] == 11): ?>
							    	<div style="display:none">
								    	<? foreach ($categories_res as $value): ?>
											<?= $value['published'] == 11 ? $value['title'] : '' ?>
										<? endforeach; ?>
									</div>
								<? endif; ?>

							</a>
						<? endif; ?>
					<? endforeach; ?>
				</nav>
			</div>
		</header>
		<div class="runLine">
			<div class="first">
				<div id="ticker-1">
					<? foreach ($ticker as $value): ?>
						<a href="<?= $value['url'] ?>" class="clearfix">
							<span>
								<time><?= $value['date'] ?></time>
								<?= $value['title'] ?>
							</span>
						</a>
					<? endforeach; ?>	
				</div>
			</div>
		</div>


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



<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="fotorama.4.6.3/fotorama/fotorama.css">
		<title><?= isset($page_title) ? $page_title : 'Ararat TV | ' . $t['items']['header_title'] ?></title>
		<link rel="icon" href="images/logo.png" />
		<meta charset="utf-8">
	</head>

	<body>
		<header>
			<div class="info-container">
				<ul class="container clearfix">
					<li class="date left">Երևան 18.07.2017<span class="time">23:41</span></li>
					<li class="weather left"><span class="deg">31</span></li>
					<li class="currency left">
						<ul>
							<li>
								<span class="currency-name">USD 478.82</span>
							</li>
							<li>
								<span class="currency-name">GBP 622.85</span>
							</li>
							<li>
								<span class="currency-name">EUR 557.59</span>
							</li>
							<li>
								<span class="currency-name">RUB 8.14</span>
							</li>
						</ul>
					</li>
					<li class="right social-icons">
						<a class="icon-facebook" href="#"></a>
						<a class="icon-social-youtube" href="#"></a>
						<a class="icon-twitter" href=""></a>
						<a class="icon-vkontakte" href=""></a>
						<a class="icon-social-skype" href=""></a>
					</li>
					<li class="search right">
						<input type="search" placeholder="Որոնում" /><i class="icon-search"></i>
					</li>
					<li class="phone right">
						<span><i class="icon-phone"></i>(010) 587222</span>
					</li>
				</ul>
			</div>
			<ul class="clearfix container logo-menu">
				<li class="left logo"><a href="index.html"></a></li>
				<li class="right main-menu">
					<ul class="list-inline menu">
						<li class="active">
							<a href="index.html">Գլխավոր</a>
						</li><li class="has-submenu">
							<a>Հաղորդումներ<i class="icon-angle-double-down"></i></a>
							<ul class="submenu list-inline">
								<li class="col-50">
									<h4>Լրատվական</h4>
									<ul class="sublist">
										<li><a href="programs.html">Հայլուր</a></li>
										<li><a href="programs.html">Օրակարգ</a></li>
									</ul>
								</li>
								<li class="col-50">
									<h4>Ճանաչողական</h4>
									<ul class="sublist">
										<li><a href="programs.html">Ճանաչենք Մեր Հայրենիքը</a></li>
										<li><a href="programs.html">Հայորդիներ</a></li>
										<li><a href="programs.html">Անտիպատմություն</a></li>
										<li><a href="programs.html">Նաիրյան Հայրենիք</a></li>
									</ul>
								</li>
							</ul>
						</li><li>
							<a>Լուրեր</a>
						</li><li>
							<a>Մեր մասին</a>
						</li><li>
							<a>Հետադարձ Կապ</a>
						</li>
					</ul>
				</li>
			</ul>
		</header>
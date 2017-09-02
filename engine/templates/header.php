

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="fotorama.4.6.3/fotorama/fotorama.css">
		<title><?= isset($page_title) ? $page_title : 'Ararat TV | ' . $t['items']['header_title'] ?></title>
		<link rel="icon" href="images/logo.png" />
		<meta charset="utf-8">
	</head>

	<body  class="programs-categories show-item">
		<header>
			<div class="info-container">
				<ul class="container clearfix">
					<li class="date left">Երևան <?= date("d.m.Y") ?><span class="time"><span id="hours">00</span><span id="sec">:</span><span id="minutes">00</span></span></li>
					<li class="weather left"><span class="deg">31</span></li>
					<li class="currency left">
						<ul>
							<li>
								<span class="currency-name curr_usd">USD</span>
							</li>
							<li>
								<span class="currency-name curr_eur">EUR</span>
							</li>
							<li>
								<span class="currency-name curr_rub">RUB</span>
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
				<li class="left logo"><a href="/"></a></li>
				<li class="right main-menu">
					<ul class="list-inline menu">
						<li class="active">
							<a href="index.html">Գլխավոր</a>
						</li><li class="has-submenu">
							<a>Հաղորդումներ<i class="icon-angle-double-down"></i></a>
							<ul class="submenu list-inline">
								<li class="col-50">
									<ul class="sublist">
										<li><a href="<?= createURL('cat=2') ?>">Հայլուր</a></li>
										<li><a href="programs.html">Օրակարգ</a></li>
									</ul>
								</li>
								<li class="col-50">
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
		<button id="to_top_btn" class="icon-angle-up"></button>
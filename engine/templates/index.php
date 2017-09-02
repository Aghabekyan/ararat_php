<div class="content">
	<div class="container slider-newsfeed">
		<div class="slider col-60">
			<div class="fotorama"
			     data-loop="true"
			     data-width="100%"
			     data-autoplay="false"
			     data-stopautoplayontouch="false"
			     data-arrows="true"
			     data-click="true"
			     data-swipe="true"
			     data-transition="slide">
			     <? foreach($gen_slider as $key => $value): ?>			    
					 <div data-img="<?= $value['img'] ?>">
						<a class="description" href="<?= $value['url'] ?>">
							<p><?= $value['title'] ?></p>
						</a>
					 </div>
			     <? endforeach; ?>
			</div>
		</div>
		<div class="newsfeed col-40">
			<h2 class="heading">Լրահոս</h2>
			<ul>
			    <? foreach($news_line as $key => $value): ?>		
				<li>
					<a href="<?= $value['url'] ?>">
						<img src="<?= $value['img'] ?>">
						<p><span class="date"><?= $value['date'] ?></span>
							<?= $value['title'] ?>
						</p>
					</a>
				</li>
			    <? endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="programs haylur-slider">
		<div class="container">
			<h2 class="heading">ՀԱՅԼՈՒՐ Լրատվական</h2>
			<div class="list_carousel">
				<ul id="haylur_slider">
			    	<? foreach($getcat[2] as $key => $value): ?>	
						<li>
							<a href="<?= $value['url'] ?>">
								<img src="<?= $value['img'] ?>"/>
							</a>
						</li>
			    	<? endforeach; ?>
				</ul>
				<div class="clearfix"></div>
				<a id="prev2" class="prev icon-angle-left" href="#"></a> <a id="next2" class="next icon-angle-right" href="#"></a>
				<div id="pager2" class="pager"></div>
			</div>
		</div>
	</div>
	<div class="watch-live">
		<div class="container">
			<h2 class="heading col-100">Հիմա եթերում</h2>
			<div class=" video-live col-50 icon-youtube-play">
				<img src="images/slide2.jpg">
			</div>
			<div class="tv-program col-50">
				<h3>Ծրագիր</h3>
				<h5 class="today">Այսօր, 22.07.2017 Շաբաթ</h5>
				<ul>
					<li>
						<span class="time">19:00</span>
						<span class="program-name">Հայլուր</span>
					</li>
					<li>
						<span class="time">20:00</span>
						<span class="program-name">Գ/Ֆ Քեյթն ու Լեոն</span>
					</li>
					<li>
						<span class="time">21:30</span>
						<span class="program-name">Նաիրյան արկածներ</span>
					</li>
					<li>
						<span class="time">22:30</span>
						<span class="program-name">Շտապ Օգնություն</span>
					</li>
					<li>
						<span class="time">23:00</span>
						<span class="program-name">Հայլուր</span>
					</li>
					<li>
						<span class="time">00:00</span>
						<span class="program-name">Անտիպատմություն</span>
					</li>
					<li>
						<span class="time">00:00</span>
						<span class="program-name">Անտիպատմություն</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="programs">
		<h2 class="container heading">Հաղորդումներ</h2>
		<ul class="container programs-list">
			<li class="program col-25">
				<a href="#">
					<div class="main-img">
						<img src="images/slide1.jpg">
						<div class="description">
							<h3>Հայլուր</h3>
							<p>Հանրապետության Նախագահը մասնակցել է ԱՊՀ պետությունների ղեկավարների խորհրդի նիստին:</p>
						</div>
					</div>
					<h4>Հայլուր <span>Ամեն օր, 21:00</span></h4>
				</a>
			</li>
			<li class="program col-25">
				<div class="main-img">
					<img src="images/shtapognutyun1.jpg">
					<div class="description">
						<h3>Շտապ Օգնություն</h3>
						<p>Հանրապետության Նախագահը մասնակցել է ԱՊՀ պետությունների ղեկավարների խորհրդի նիստին:</p>
					</div>
				</div>
				<h4>Շտապ Օգնություն <span>Երկ - Ուրբ, 19:00</span></h4>
			</li>
			<li class="program col-25">
				<div class="main-img">
					<img src="images/nairyan1.jpg">
					<div class="description">
						<h3>Նաիրյան Արկածներ</h3>
						<p>Հանրապետության Նախագահը մասնակցել է ԱՊՀ պետությունների ղեկավարների խորհրդի նիստին:</p>
					</div>
				</div>
				<h4>Նաիրյան Արկածներ <span>Կրկ, 22:00</span></h4>
			</li>
			<li class="program col-25">
				<div class="main-img">
					<img src="images/antipatmutyun1.jpg">
					<div class="description">
						<h3>Հայլուր</h3>
						<p>Հանրապետության Նախագահը մասնակցել է ԱՊՀ պետությունների ղեկավարների խորհրդի նիստին:</p>
					</div>
				</div>
				<h4>Անտիպատմություն <span>Ամեն օր, 21:00</span></h4>
			</li>
			<li class="program col-25">
				<div class="main-img">
					<img src="images/oponent1.jpg">
					<div class="description">
						<h3>Նաիրյան Արկածներ</h3>
						<p>Հանրապետության Նախագահը մասնակցել է ԱՊՀ պետությունների ղեկավարների խորհրդի նիստին:</p>
					</div>
				</div>
				<h4>Օպոնենտ <span>Կրկ, 22:00</span></h4>
			</li>
			<li class="program col-25">
				<div class="main-img">
					<img src="images/tohmacar1.jpg">
					<div class="description">
						<h3>Հայլուր</h3>
						<p>Հանրապետության Նախագահը մասնակցել է ԱՊՀ պետությունների ղեկավարների խորհրդի նիստին:</p>
					</div>
				</div>
				<h4>Տոհմածառ <span>Ամեն օր, 21:00</span></h4>
			</li>
			<li class="program col-25">
				<div class="main-img">
					<img src="images/slide2.jpg">
					<div class="description">
						<h3>Շտապ Օգնություն</h3>
						<p>Հանրապետության Նախագահը մասնակցել է ԱՊՀ պետությունների ղեկավարների խորհրդի նիստին:</p>
					</div>
				</div>
				<h4>Շտապ Օգնություն <span>Երկ - Ուրբ, 19:00</span></h4>
			</li>
			<li class="program col-25">
				<div class="main-img">
					<img src="images/slide3.jpg">
					<div class="description">
						<h3>Հայլուր</h3>
						<p>Հանրապետության Նախագահը մասնակցել է ԱՊՀ պետությունների ղեկավարների խորհրդի նիստին:</p>
					</div>
				</div>
				<h4>Հայլուր <span>Ամեն օր, 21:00</span></h4>
			</li>
		</ul>
		<div class="programs-categories">
			<div class="container">
				<div class="col-50">
					<h3>Հայլուր</h3>
					<ul>
	    				<? foreach($getcat[2] as $key => $value): ?>	
							<li class="col-50 <?= $value['yt_img'] ? 'icon-youtube-play' : '' ?>">
								<a href="<?= $value['url'] ?>">
									<img src="<?= $value['img'] ?>">
									<h4 class="title-date">
										<span class="title"><?= $value['title'] ?></span>
										<span class="date"><?= $value['date'] ?></span>
									</h4>
								</a>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
				<div class="col-50">
					<h3>Նաիրյան Արկածներ<span>Կրկ, 22:00</span></h3>
					<ul>
	    				<? foreach($getcat[2] as $key => $value): ?>	
							<li class="col-50 <?= $value['yt_img'] ? 'icon-youtube-play' : '' ?>">
								<a href="<?= $value['url'] ?>">
									<img src="<?= $value['img'] ?>">
									<h4 class="title-date">
										<span class="title"><?= $value['title'] ?></span>
										<span class="date"><?= $value['date'] ?></span>
									</h4>
								</a>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
				<div class="col-50">
					<h3>Շտապ Օգնություն<span>Երկ - Ուրբ, 19:00</span></h3>
					<ul>
	    				<? foreach($getcat[2] as $key => $value): ?>
							<li class="col-50 <?= $value['yt_img'] ? 'icon-youtube-play' : '' ?>">
								<a href="<?= $value['url'] ?>">
									<img src="<?= $value['img'] ?>">
									<h4 class="title-date">
										<span class="title"><?= $value['title'] ?></span>
										<span class="date"><?= $value['date'] ?></span>
									</h4>
								</a>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
				<div class="col-50">
					<h3>Անտիպատմություն<span>Ամեն օր, 17:00</span></h3>
					<ul>
	    				<? foreach($getcat[2] as $key => $value): ?>	
							<li class="col-50 <?= $value['yt_img'] ? 'icon-youtube-play' : '' ?>">
								<a href="<?= $value['url'] ?>">
									<img src="<?= $value['img'] ?>">
									<h4 class="title-date">
										<span class="title"><?= $value['title'] ?></span>
										<span class="date"><?= $value['date'] ?></span>
									</h4>
								</a>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
				<div class="col-50">
					<h3>Տոհմածառ<span>Երք 18:00</span></h3>
					<ul>
	    				<? foreach($getcat[2] as $key => $value): ?>
							<li class="col-50 <?= $value['yt_img'] ? 'icon-youtube-play' : '' ?>">
								<a href="<?= $value['url'] ?>">
									<img src="<?= $value['img'] ?>">
									<h4 class="title-date">
										<span class="title"><?= $value['title'] ?></span>
										<span class="date"><?= $value['date'] ?></span>
									</h4>
								</a>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
				<div class="col-50">
					<h3>Օպոնենտ<span>Երկ, Չրք, 19:30</span></h3>
					<ul>
	    				<? foreach($getcat[2] as $key => $value): ?>
							<li class="col-50 <?= $value['yt_img'] ? 'icon-youtube-play' : '' ?>">
								<a href="<?= $value['url'] ?>">
									<img src="<?= $value['img'] ?>">
									<h4 class="title-date">
										<span class="title"><?= $value['title'] ?></span>
										<span class="date"><?= $value['date'] ?></span>
									</h4>
								</a>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="best-watch-list">
		<div class="container">
			<h2 class="heading">Ամենադիտվածը</h2>
			<ul class="list-inline">
				<? foreach($most_viewed as $key => $value): ?>
					<li class="col-25 <?= $value['yt_img'] ? 'icon-youtube-play' : '' ?>">
						<a href="<?= $value['url'] ?>">
							<img src="<?= $value['img'] ?>">
							<h2 class="program-name"><?= $value['title'] ?></h2>
						</a>
					</li>
				<? endforeach; ?>
			</ul>
		</div>
	</div>
</div>
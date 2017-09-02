<div class="content">
	<div id="make-count" data-id="<?= $data['id'] ?>"></div>
	<div class="container last-videos">
		<div class="col-70">
			<h3><span class="date"><?= $data['date'] ?></span><?= $data['title'] ?></h3>			
			<? if (!empty($data['youtube'])): ?>
				<? foreach ($data['youtube'] as $value): ?>
					<iframe  src="https://www.youtube.com/embed/<?= $value ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				<? endforeach; ?>
			<? endif; ?>

			<? if (!empty($data['img']) && empty($data['gallery'])): ?>
						<img src="<?= $data['img'] ?>">
			<? endif; ?>	

<!-- 			<div class="clearfix">
				<div class="right social-icons">
					<a class="icon-facebook" href="#"></a>
					<a class="icon-social-youtube" href="#"></a>
					<a class="icon-twitter" href=""></a>
					<a class="icon-vkontakte" href=""></a>
					<a class="icon-social-skype" href=""></a>
				</div>
			</div> -->
			<div class="video-description">						
				<?= $data['desc'] ?>
			</div>


			<? if (!empty($data['gallery'])): ?>
				<div class="video-galery slider fotorama"
				     data-loop="true"
				     data-width="100%"
				     data-autoplay="false"
				     data-arrows="true"
				     data-click="true"
				     data-swipe="true"
				     data-transition="slide">
					<? foreach ($data['gallery'] as $value): ?>
						<img src="<?= $value ?>">
					<? endforeach; ?>
				</div>
			<? endif; ?>
				<!-- Saq estex dir commentneri mas@ -->
		</div>
		<ul class="col-30">
			<li>
				<a href="#">
					<div class="col-40 <?= $value['yt_img'] ? 'icon-youtube-play' : '' ?>">
						<img src="images/slide3.jpg">
					</div>
					<h3 class="col-60">Հայ օդաչուի սխրանքը՝ Ստամբուլի օդանավակայանում <span class="date">29.07.2017</span></h3>
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="main clearfix">
	<div id="make-count" data-id="<?= $data['id'] ?>"></div>
	<div class="mainLeft">
		<article class="news">
			<time><?= $data['date'] ?></time>
			<h1><?= $data['title'] ?></h1>
			<div class="recomendBox">
				<div class="recomendBoxUnit" style="margin-top:-1px;">
					<div class="fb-like" data-href="<?= $data['fb_url'] ?>" data-width="300" data-layout="button_count" data-action="recommend" data-show-faces="false" data-share="true"></div>
				</div>
				<div class="recomendBoxUnit">
					<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
			<div class="articleImge">
				<? if (!empty($data['img']) && empty($data['gallery'])): ?>
					<div class="fotorama" data-nav="thumbs" data-width="700" data-allowfullscreen="true" data-ratio="600/400" data-max-width="100%">
							<img src="<?= $data['img'] ?>">
					</div>
				<? endif; ?>
				
				<? if (!empty($data['youtube'])): ?>
					<? foreach ($data['youtube'] as $value): ?>
						<div class="video-container">
							<div class="yt_hide_header"></div>
							<iframe src="http://www.youtube.com/embed/<?= $value ?>?showinfo=1&iv_load_policy=3&modestbranding=1&nologo=1&autoplay=0&ps=docs&rel=0" frameborder="0" width="560" height="315"></iframe>
						</div>
					<? endforeach; ?>
				<? endif; ?>

				<? if (!empty($data['gallery'])): ?>
					<div class="fotorama" data-nav="thumbs" data-width="700" data-allowfullscreen="true" data-ratio="600/400" data-max-width="100%">
						<? foreach ($data['gallery'] as $value): ?>
							<img src="<?= $value ?>">
						<? endforeach; ?>
					</div>
				<? endif; ?>

			</div>

			<div class="articleInner clearfix">
				<? if (!empty($suggestions)): ?>
					<div class="suggestions">
						<h4>Այս թեմայով</h4>
						<ul>
							<? foreach ($suggestions as $value): ?>
								<li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
							<? endforeach; ?>
						</ul>
					</div>
				<? endif; ?>
			</div>
			<?= $data['desc'] ?>
		</article>
		<div class="articleShaher clearfix">
			<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
			<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,gplus" data-yashareTheme="counter"></div> 
		</div>
		<div class="articleComments">
			<div class="fb-comments" data-href="<?= $data['fb_url'] ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
		</div>
	</div>

	<? require (TEMPLATES . 'm_right.php'); ?>

</div>


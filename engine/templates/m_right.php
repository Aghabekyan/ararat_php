<div class="mainRight">
	<div class="titler">
		<a href="<?= createURL('news_line') ?>"><?= $t['items']['news_line'] ?></a>
	</div>
	<div class="timeLine clearfix">
		<? foreach ($news_line as $value): ?>
			<a href="<?= $value['url'] ?>" class="clearfix">
				<img src="<?= $value['img'] ?>">
				<span>
					<time><?= $value['date'] ?></time>
					<? if ($value['cat_id'] == 48): ?>
						<div class="blogTimeline"></div>
					<? endif; ?>
					<?= $value['title'] ?>
				</span>
			</a>
		<? endforeach; ?>
	</div>
	<div class="facebookPlugin">
		<div class="fb-page" data-href="https://www.facebook.com/pages/Nyutam-%D5%BF%D5%A5%D5%B2%D5%A5%D5%AF%D5%A1%D5%BF%D5%BE%D5%A1%D5%AF%D5%A1%D5%B6-%D5%B0%D5%A1%D6%80%D5%A9%D5%A1%D5%AF/174294049412081" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Nyutam-%D5%BF%D5%A5%D5%B2%D5%A5%D5%AF%D5%A1%D5%BF%D5%BE%D5%A1%D5%AF%D5%A1%D5%B6-%D5%B0%D5%A1%D6%80%D5%A9%D5%A1%D5%AF/174294049412081"><a href="https://www.facebook.com/pages/Nyutam-%D5%BF%D5%A5%D5%B2%D5%A5%D5%AF%D5%A1%D5%BF%D5%BE%D5%A1%D5%AF%D5%A1%D5%B6-%D5%B0%D5%A1%D6%80%D5%A9%D5%A1%D5%AF/174294049412081">Nyut.am տեղեկատվական հարթակ</a></blockquote></div></div>
	</div>
	<div class="titler">
		<a href="#"><?= $t['items']['most_viewed'] ?></a>
	</div>
	<select class="selectPopRange">
		<option value="1"><?= $t['items']['today'] ?></option>
		<option  value="7"><?= $t['items']['one_week'] ?></option>
		<option  value="30"><?= $t['items']['one_month'] ?></option>
	</select>
	<div class="timeLine timeLinePop clearfix">
		<? foreach ($most_viewed as $key => $value): ?>
			<a href="<?= $value['url'] ?>" class="clearfix">
				<img src="<?= $value['img'] ?>">
				<span>
					<time><?= $value['date'] ?></time>
					<?= $value['title'] ?>
				</span>
			</a>
		<? endforeach; ?>
	</div>
	<div class="titler">
		<a href="<?= createURL("cat=10") ?>"><?= $categories[10] ?></a>
	</div>
	<div class="fotorama videoRama" data-autoplay="true">
		<? foreach ($getcat[10]['big'] as $value): ?>	
			<div class="videoUnit">
				<a href="<?= $value['url'] ?>">
					<img src="<?= $value['img'] ?>">
					<span><?= $value['title'] ?></span>
					<div class="playBut"></div>
				</a>
			</div>
		<? endforeach; ?>	
	</div>
</div>
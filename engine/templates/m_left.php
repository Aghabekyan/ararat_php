<div class="mainLeft">
	<div class="mainSlider clearfix">
		<div id="wrapper">
			<div id="carousel-wrapper">
				<div id="carousel">
					<? foreach ($gen_slider['big'] as $key => $value): ?>	
						<a href="<?= $value['url'] ?>" id="m<?= $key ?>" class="middleLarge">
							<img src="<?= $value['img'] ?>" />
							<time><?= $value['date'] ?></time>
							<b><?= $value['title'] ?></b>
							<span><?= $value['desc'] ?></span>
						</a>
					<? endforeach; ?>
				</div>
			</div>
			<div id="thumbs-wrapper">
				<div id="thumbs">
					<? foreach ($gen_slider['small'] as $key => $value): ?>	
						<a href="#m<?= $key ?>" class="<?= $key == 0 ? 'selected' : '' ?>">
							<img src="<?= $value['img'] ?>" />
							<b><?= $value['title'] ?></b>
						</a>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="catOnMainBox clearfix">
		<? foreach ($getcat as $keys => $values): ?>
			<? if (in_array($keys, array(2, 3, 4, 6))): ?>
				<div class="catOnMainSQ">
					<div class="titler">
						<a href="<?= createURL("cat={$keys}") ?>"><?= $categories[$keys] ?></a>
					</div>
					<div class="catOnMainSQUnits">
						<? foreach ($values['big'] as $key => $value): ?>
							<? if ($key == 0): ?>
								<a href="<?= $value['url'] ?>" class="clearfix">
									<img src="<?= $value['img'] ?>" />
									<b><time><?= $value['date'] ?></time><?= $value['title'] ?></b>
								</a>
							<? else: ?>
								<a href="<?= $value['url'] ?>" class="clearfix">
									<b><time><?= $value['date'] ?></time><?= $value['title'] ?></b>
								</a>
							<? endif; ?>	
						<? endforeach ?>
					</div>
				</div>
			<? endif; ?>
		<? endforeach; ?>
	</div>
	<div class="catOnMainHR">
		<div class="titler">
			<a href="<?= createURL('cat=7') ?>"><?= $categories[7] ?></a>
		</div>
		<div class="catOnMainHRBox clearfix">
			<? foreach ($getcat[7]['big'] as $value): ?>
				<a href="<?= $value['url'] ?>" class="clearfix">
					<img src="<?= $value['img'] ?>">
					<span>
						<time><?= $value['date'] ?></time>
						<?= $value['title'] ?>
					</span>
				</a>
			<? endforeach; ?>	
		</div>
	</div>
	<div class="catOnMainBox clearfix">
		<? foreach ($getcat as $keys => $values): ?>
			<? if (in_array($keys, array(8, 9, 19, 18))): ?>
				<div class="catOnMainSQ">
					<div class="titler">
						<a href="<?= createURL("cat={$keys}") ?>"><?= $categories[$keys] ?></a>
					</div>
					<div class="catOnMainSQUnits">
						<? foreach ($values['big'] as $key => $value): ?>
							<? if ($key == 0): ?>
								<a href="<?= $value['url'] ?>" class="clearfix">
									<img src="<?= $value['img'] ?>" />
									<b><time><?= $value['date'] ?></time><?= $value['title'] ?></b>
								</a>
							<? else: ?>
								<a href="<?= $value['url'] ?>" class="clearfix">
									<b><time><?= $value['date'] ?></time><?= $value['title'] ?></b>
								</a>
							<? endif; ?>	
						<? endforeach ?>
					</div>
				</div>
			<? endif; ?>
		<? endforeach; ?>
	</div>
	<div class="catOnMainHR">
		<div class="titler">
			<a href="<?= createURL('cat=16') ?>"><?= $categories[16] ?></a>
		</div>
		<div class="catOnMainHRBox clearfix">
			<? foreach ($getcat[16]['big'] as $value): ?>
				<a href="<?= $value['url'] ?>" class="clearfix">
					<img src="<?= $value['img'] ?>">
					<span>
						<time><?= $value['date'] ?></time>
						<?= $value['title'] ?>
					</span>
				</a>
			<? endforeach; ?>	
		</div>
	</div>
</div>
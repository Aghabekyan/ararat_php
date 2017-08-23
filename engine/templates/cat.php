<div class="main clearfix">
	<div class="mainLeft">
		<div class="titler"><h1><?= $cat_name ?></h1></div>
		<div class="catPageUnit">
			<? foreach ($data as $value): ?>
				<a href="<?= $value['url'] ?>" class="clearfix">
					<b><?= $value['title'] ?></b>
					<div class="catPageUnitDesc">
						<img src="<?= $value['img'] ?>">
						<span><?= $value['desc'] ?></span>
					</div>
				</a>
			<? endforeach; ?>
			<?= $pagination; ?>
		</div>
	</div>
	<? require (TEMPLATES . 'm_right.php') ?>		
</div>

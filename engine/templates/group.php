<div class="main clearfix">
	<div class="mainLeft">
		<div class="titler titlerCat"><span><?= $group_name ?></span></div>
		<div class="">
			<? foreach ($cats as $value): ?>
				<a href="<?= createURL("cat={$value['id']}") ?>" class="clearfix">
					<span><?= $value['title'] ?></span>
				</a>
			<? endforeach; ?>
		</div>
	
	</div>
	<? require (TEMPLATES . 'm_right.php') ?>		
</div>

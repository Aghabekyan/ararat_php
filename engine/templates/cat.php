<div class="content">
	<div class="all-list-programs">
		<div class="container">
			<h2 class="heading"><?= $cat_name ?></h2>
			<ul class="program-last-videos list-inline">
				<? foreach ($data as $value): ?>
					<li class="col-25">
					   <a href="<?= $value['url'] ?>">
							<div class="icon-youtube-play">
								<img src="<?= $value['img'] ?>">
							</div>
							<h3><span class="date"><?= $value['date'] ?></span><?= $value['title'] ?></h3>
						</a>
					</li>
				<? endforeach; ?>
	
			</ul>

			<?= $pagination; ?>

			<ul class="pagination list-inline">
				<li><a href="#" class="icon-angle-left"></a></li>
				<li><a href="#" class="active">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#" class="icon-angle-right"></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="main clearfix">
	<div class="btn_cont clearfix">
		<a href="<?= createURL('post', 0, 1) ?>"><?= $t['items']['add_news'] ?></a>
		
		<?if ($activeUser['role'] == 1):?>
			<a href="<?= createURL('editor', 0, 1)?>"><?= $t['items']['add_user'] ?></a>
			<a href="<?= createURL('editor_list', 0, 1) ?>"><?= $t['items']['user_list'] ?></a>
			<!-- <a href="<?//= createURL('admanager', 0, 1) ?>"><?//= $t['items']['ad_manage'] ?></a> -->
		<?endif;?>
		
		<? if($activeUser['role'] != 3): ?>
			<!-- <a href="<?//= createURL('poll&action=new_poll', 0, 1) ?>"><?//= $t['items']['change_poll'] ?></a> -->
		<? endif; ?>

		<!-- <a href="<?//= htmDIR.admDIR.'?theme'?>">Թեմաներ</a> -->
	</div>
	<div class="show_title main_show_title clearfix">
		<div class="column_1"><?= $t['items']['title'] ?></div>
		<div class="column_2"><?= $t['items']['pub_state'] ?></div>
		<div class="column_2"><?= $t['items']['pub_date'] ?></div>
		<div class="column_2"><?= $t['items']['views'] ?></div>
		<? if($activeUser['role'] != 3): ?>
			<div class="column_2"><?= $t['items']['name'] ?></div>
		<? endif; ?>
		<? if($activeUser['role'] != 3): ?>
			<div class="column_3"><img src="<?=htmDIR.admDIR?>/img/delete.png"></div>
		<? endif; ?>
		<div class="column_3"><img src="<?=htmDIR.admDIR?>/img/edit.png"></div>
	</div>
	<div class="show_content clearfix">

		<? foreach($data as $key => $value): ?>
			<div class="show_title cont_line <?= ($key %2 == 0) ? 'cont_line_color2' : '' ?> clearfix">
				<div class="column_1 desc_1"><a href="<?=$value['url']?>" target="_blanck" class="news_url"><?=$value['title']?></a></div>
				<div class="column_2 desc_1"><?= $value['state'] == 1 ? $t['items']['yes'] : $t['items']['no'] ?></div>
				<div class="column_2 desc_1 dateSize" style="<?= $value['published'] > date("Y-m-d H:i:s") ? 'color:red' : ''?>"><?=$value['published']?></div>
				<div class="column_2 desc_1"><?=$value['hits']?></div>

				<? if ($activeUser['role'] != 3): ?>
					<div class="column_2 desc_1">
						<a href="<?= htmDIR . admDIR . '?person_posts&person_id='.$value['user_id']?>" class="role-name-css">
							<?= $value['name'] ?>
						</a>
					</div>
				<? endif; ?>

				<? if($activeUser['role'] != 3): ?>
					<div class="column_3 desc_1"><a class="del_btn" href="<?= createURL("delete&action=del_post&id={$value['id']}", 0, 1) ?>" onclick="return confirm('<?= $t['items']['really_del'] ?>')"><?= $t['items']['delete'] ?></a></div>
				<? endif; ?>

				<div class="column_3 desc_1"><a class="edit_btn" href="<?= createURL("update&id={$value['id']}", 0, 1) ?>" ><?= $t['items']['edit'] ?></a></div>
			</div>
		<? endforeach; ?>
		<?= $pagination ?>
	</div>
</div>
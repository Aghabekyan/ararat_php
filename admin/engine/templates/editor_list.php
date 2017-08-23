<div class="main clearfix">
	<div class="btn_cont clearfix">
		<a href="<?= createURL('editor', 0, 1)?>"><?= $t['items']['add_user'] ?></a>
		<a href="<?= createURL('editor_list', 0, 1) ?>"><?= $t['items']['user_list'] ?></a>
	</div>
	<div class="show_title main_show_title clearfix">
		<div class="column_1"><?= $t['items']['username'] ?></div>
		<div class="column_2 colum_2_editor"><?= $t['items']['state'] ?></div>
		<div class="column_3"><img src="<?=htmDIR.admDIR?>/img/delete.png"></div>
		<div class="column_3"><img src="<?=htmDIR.admDIR?>/img/edit.png"></div>
	</div>
	<div class="show_content clearfix">
		<? foreach($data as $key => $value): ?>
			<div class="show_title cont_line <?= ($key %2 == 0) ? 'cont_line_color2' : '' ?> clearfix">
				<div class="column_1 desc_1"><a href="<?=$value['url']?>" class="news_url"><?=$value['name']?></a></div>
				<div class="column_2 desc_1"><?=$value['role']?></div>
				<?if($value['username'] != 'root'):?>
					<div class="column_3 desc_1"><a class="del_btn" href="<?=htmDIR.admDIR.'?delete_editor&id='.$value['id']?>" onclick="return confirm('<?= $t['items']['really_del'] ?>');"><?= $t['items']['delete'] ?></a></div>
				<?endif;?>
				<div class="column_3 desc_1" style="<?=$value['username'] == 'root' ? 'margin-right: 95px' : ''?>"><a class="edit_btn" href="<?=htmDIR.admDIR.'?update_editor&id='.$value['id']?>" target="_blank"><?= $t['items']['edit'] ?></a></div>
			</div>
		<?endforeach;?>
	</div>
</div>
<div class="main clearfix">
	<div class="btn_cont clearfix">
		<a href="<?= createURL('new_post', 0, 1) ?>">Ավելացնել լուր</a>
		<?if($activeUser['role'] == 1):?>
			<a href="<?= createURL('editor', 0, 1) ?>">Ավելացնել օգտատեր</a>
			<a href="<?= createURL('editor_list', 0, 1) ?>">Օգտատերերի ցանկ</a>
		<?endif;?>
	</div>
	<div class="show_title main_show_title clearfix">
		<div class="column_1">Վերնագիր</div>
		<div class="column_2">Հրապ.</div>
		<div class="column_2">Հրապ. ամս.</div>
		<div class="column_2">Դիտում</div>
		<?if($activeUser['role'] != 3):?>
			<div class="column_3"><img src="<?=htmDIR.admDIR?>/img/delete.png"></div>
		<?endif;?>
		<div class="column_3"><img src="<?=htmDIR.admDIR?>/img/edit.png"></div>
	</div>
	<div class="person-name clearfix">
		<div class="user_post_count">Գտնված նյութերի քանակը` <strong><?=$user_post_count?></strong></div>
		<form  action="<?=htmDIR.admDIR?>" method="GET">
			<input type="hidden" name="person_posts" value="">

			<div class="pr-user-name">
				<select class="pr-user-select" name="person_id">
					<option value="0">բոլորը</option>
					<?foreach($users as $value):?>
						<option <?=$value['id'] == $person_id ? "selected='selected'" : ''?> value="<?=$value['id']?>"><?=$value['name']?></option>
					<?endforeach;?>	
				</select>
			</div>
			


			<input type="submit" class="datepicker-smb" value="Փնտրել">	
		</form>

	</div>
	<div class="show_content clearfix">

		<? foreach($data as $key => $value): ?>
			<div class="show_title cont_line <?= ($key %2 == 0) ? 'cont_line_color2' : '' ?> clearfix">
				<div class="column_1 desc_1"><a href="<?= $value['url'] ?>" target="_blanck" class="news_url"><?=$value['title']?></a></div>
				<div class="column_2 desc_1"><?= $value['state'] == 1 ? $t['items']['yes'] : $t['items']['no'] ?></div>
				<div class="column_2 desc_1 dateSize"><?= $value['published'] ?></div>
				<div class="column_2 desc_1"><?=$value['hits']?></div>

				<? if($activeUser['role'] != 3): ?>
					<div class="column_3 desc_1"><a class="del_btn" href="<?= createURL("delete&action=del_post&id={$value['id']}", 0, 1) ?>" onclick="return confirm('<?= $t['items']['really_del'] ?>')"><?= $t['items']['delete'] ?></a></div>
				<? endif; ?>

				<div class="column_3 desc_1"><a class="edit_btn" href="<?= createURL("update&id={$value['id']}", 0, 1) ?>" ><?= $t['items']['edit'] ?></a></div>
			</div>
		<? endforeach; ?>
		<?= $pagination ?>
	</div>
</div>


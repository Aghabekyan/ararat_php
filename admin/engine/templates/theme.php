<div class="main clearfix">
	<div class="btn_cont clearfix">
		<a href="<?=htmDIR.admDIR.'?new_post'?>">Ավելացնել լուր</a>
		<a href="<?=htmDIR.admDIR.'?editor'?>">Ավելացնել օգտատեր</a>
		<a href="<?=htmDIR.admDIR.'?editor_list'?>">Օգտատերերի ցանկ</a>
		<a href="<?=htmDIR.admDIR.'?admanager'?>">Գովազդի կառավարում</a>
		<a href="<?=htmDIR.admDIR.'poll_admin'?>">Փոխել հարցումը</a>
		<a href="<?=htmDIR.admDIR.'?theme'?>">Թեմաներ</a>
	</div>
	<div class="btn_cont clearfix">
		<a href="<?=htmDIR.admDIR.'?theme&action=new'?>">Ավելացնել նոր թեմա</a>
	</div>
	<? if ($action == 'new' || $action == 'get_edit'): ?>

		<div class="theme_block clearfix">
			<? if ($is_update): ?>
				<form method="POST" action="<?= createURL("theme&action=edit&id={$_GET['id']}", false, true)?>">
			<? else: ?>
				<form method="POST" action="<?= createURL('theme&action=new_theme', false, true)?>">
			<? endif; ?>
				<div class="theme_img">
					<img src="<?= $is_update ? ret_img($data['img'], 117, 112) : ''?>">
						<div class="right_block_item theme_img_add">
							<a href="<?=htmDIR.admDIR.'?imgUploader'?>" data-fancybox-type="iframe" class="chose_img_btn" id="themeImgButton"><?= $t['items']['choose_img'] ?></a>

							<div id="theme_img">	
								<? if ($is_update): ?>
									<input class="img_title" type="hidden" name="userfile" value="<?= $data['img'] ?>">
								<? endif; ?>				
							</div>
					</div>
				</div>
				<div class="theme_block_top">
					<div class="theme_block_l">
						<span>Մուտքագրել թեմայի անունը</span>
						<textarea name="theme_name"><?= $is_update ? $data['theme_name'] : ''?></textarea>
					</div>
					<div class="theme_block_2">
						<span>Ընտրել ենթաբաժին</span>
						<select name="theme_subs">
							<? foreach ($subdomains as $value): ?>
								<option value="<?= $value['id'] ?>" <?= ($is_update && $value['id'] == $data['subdomain']) ? 'selected' : '' ?>><?= $value['title'] ?></option>
							<? endforeach; ?>
						</select>
					</div>
				</div>
				<div class="theme_block_bot">
					<span>Մուտքագրել թեմային առնչվող թեգեր</span>
					<div class="theme_gen">
						<label>Ակտիվ թեմա <input type="checkbox" name="published" value="1" <?= $is_update && $data['published'] == 1 ? 'checked' : ''?> ></label>
					</div>
					<textarea name="tag_names"><?= $is_update ? $data['tag_names'] : ''?></textarea>
				</div>		
				<input class="theme_sbm" type="submit">
				<input type="hidden" name="id" value="<?= $is_update ? $data['id'] : ''?>">
			</form>
		</div>
	<? else: ?>
		<div class="show_title main_show_title clearfix">
			<div class="column_1">Վերնագիր</div>
			<div class="column_3"><img src="<?=htmDIR.admDIR?>/img/delete.png"></div>
			<div class="column_3"><img src="<?=htmDIR.admDIR?>/img/edit.png"></div>
		</div>
		<div class="show_content clearfix">
			<? foreach($data as $key => $value): ?>
				<div class="show_title cont_line <?= ($key %2 == 0) ? 'cont_line_color2' : '' ?> clearfix">
					<div class="column_1 desc_1"><?=$value['theme_name']?></div>
					<div class="column_3 desc_1"><a class="del_btn" href="<?=htmDIR . admDIR . '?delete&action=theme&id=' . $value['id']?>" onclick="return confirm('Իսկապե՞ս ջնջել:');">ջնջել</a></div>
					<div class="column_3 desc_1"><a class="edit_btn" href="<?=htmDIR . admDIR . '?theme&action=get_edit&id=' . $value['id'] ?>">խմբագրել</a></div>
				</div>
			<?endforeach;?>
			<?=$pagination?>
		</div>
	<? endif; ?>	
</div>
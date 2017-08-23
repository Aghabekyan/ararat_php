<div class="main clearfix">
	<? if ($is_update): ?>
		<form method="post" enctype="multipart/form-data" action="<?= createURL("update&action=edit&id={$data['id']}", 0, 1) ?>">
	<? else: ?>
		<form method="post" enctype="multipart/form-data" action="<?= createURL('post&action=new_post', 0, 1) ?>">
	<? endif; ?>	
		<div class="main_left">
			<textarea class="post_title" name="post_title" placeholder="<?= $t['items']['title']?>"><?= $is_update ?  $data['title'] : ''?></textarea>
			<textarea id="text_editor" class="text_editor" name="text_editor"><?=$is_update ?  $data['desc'] : ''?></textarea>
			<textarea class="post_title youTube" name="post_youtube" placeholder="<?= $t['items']['yt_list'] ?>"><?=$is_update ?  $data['youtube'] : ''?></textarea>
			<input class="meta" placeholder="<?= $t['items']['metakey'] ?>" name="post_meta" value="<?=$is_update ?  $data['metakey'] : '' ?>" >
		</div>
		<div class="main_right">
			<div class="right_block_item">

				<? foreach($cats as $keys => $values):?>
					
						<? //if ($keys == 2): ?>
							<!-- <b>Հանրագիտարան</b> -->
						<? //elseif ($keys == 3): ?>
							<!-- <b>Էկո նախագծեր</b> -->
						<? //endif; ?>
						
						<? foreach ($values as $key => $value): ?>
							<div class="cat_item">
								<label><input type="checkbox" name="category[]" value="<?= $key ?>" <?= ($is_update && in_array($key, $cat_select)) ? 'checked' : '' ?>/> <?= $value ?></label>
							</div>
						<? endforeach; ?>
				<? endforeach; 	?>
		
			</div>
			<div class="right_block_item">
				<label>
					<div class="chooseTtl"><?= $t['items']['gen_slider'] ?></div>
					<input type="checkbox" name="gen_slider" class="gen_slider" <?=($is_update && $data['gen_slider'] == 1) ? "checked='checked' " : ''?> >
				</label>
			</div>
			<div class="right_block_item">
				<label>
					<div class="chooseTtl"><?= $t['items']['dont_show'] ?></div>
					<input type="checkbox" name="show_hits" class="gen_slider" <?=($is_update && $data['show_hits'] == 1) ? "checked='checked' " : ''?> >
				</label>
			</div>
			<div class="right_block_item">
				<label>
					<div class="chooseTtl"><?= $t['items']['ticker'] ?></div>
					<input type="checkbox" name="ticker" class="gen_slider" <?=($is_update && $data['ticker'] == 1) ? "checked='checked' " : ''?> >
				</label>
			</div>
					
		<!-- <div class="right_block_item">
				<label>
					<div class="chooseTtl">Կարևոր</div>
					<input type="checkbox" name="editor" class="gen_slider" <?//=($is_update && $data['editor'] == 1) ? "checked='checked' " : ''?> >
				</label>
			</div>	 -->	
			
			<div class="right_block_item">
				<a href="<?=htmDIR.admDIR.'?imgUploader'?>" data-fancybox-type="iframe" class="chose_img_btn" id="mainImgButton"><?= $t['items']['choose_img'] ?></a>

				<div class="wtm">
					<label><?= $t['items']['watermark'] ?> <input type="checkbox" name="img_wtm"></label>
				</div>

				<div id="main_img">	
					<? if ($is_update): ?>
						<img src="<?= thumb($data['img'], 248, 150) ?>">
						<input class="img_title" type="hidden" name="userfile" value="<?= $data['img'] ?>">
						<input class='img_title' type='text' name='main_img_title' value="<?= $data['img_titles']['main'] ?>">
					<? endif; ?>				
				</div>
			</div>
			<div class="right_block_item">
				<a href="<?= createURL('imgUploader&multi', 0, 1) ?>" data-fancybox-type="iframe" class="chose_img_btn" id="galleryImgButton"><?= $t['items']['gallery'] ?></a>
 	
				<div class="wtm">
					<label><?= $t['items']['watermark'] ?> <input type="checkbox" name="gal_wtm"></label>
				</div>
			
				<? if ($is_update): ?>
					<div class="gallery_update">
						<? if (!empty($data['gallery'])) foreach ($data['gallery'] as $key => $value): ?>
							<div class="adm_gallery">
								<span>Delete</span>
								<img src="<?= thumb($value, 248, 150) ?>">
								<input type="hidden" name="gallery_url[]" value="<?= $value ?>">
								<input class="img_title" type="text" name="img_title[]" value="<?= $data['img_titles']['gallery'][$key] ?>">
							</div>
						<? endforeach; ?>
					</div>
				<? else: ?>
					<div id="gallery_url"></div>
				<? endif; ?>
			</div>			
			<div class="right_block_item">
				<div class="bub_date_ttl"><?= $t['items']['pub_long'] ?></div> 
				<img class="btn_hover" src="<?= htmDIR.admDIR.'img/time_reload.png'?>" style="width: 20px" id="setTime"/>
				<input class="pub_time_input" name="published" id="postPublished" value="<?= $is_update ?  $data['published'] : '' ?>"/>
			</div> 
			<div class="right_block_item">
				<div class="publish_title"><?= $t['items']['state_long'] ?></div>
				<select name="publish_status">
					<option value="1" <?= ($is_update && $data['state'] == 1) ? 'selected' : '' ?>><?= $t['items']['pub_yes'] ?></option>
					<option value="0" <?= ($is_update && $data['state'] == 0) ? 'selected' : '' ?>><?= $t['items']['pub_no'] ?></option>
				</select>
			</div>	
			<input type="hidden" name="id" value="<?=$is_update ? $pid : ''?>" />
			<input type="hidden" name="user_id" value="<?=$is_update ? $data['user_id'] : ''?>" />
		</div>
		<div class="submit_btn">
			<input type="submit" value="<?= $t['items']['save'] ?>">
		</div>
	</form>
</div>
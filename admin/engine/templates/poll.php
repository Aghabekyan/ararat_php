<div class="main clearfix">
	<div class="add_poll">Ավելացնել հարցում</div>
	<div style="<?= $action == 'update_poll' ? 'display:block' : 'display:none' ?>" class="poll_cont">
		<? if ($action == 'update_poll'): ?>
			<form method="POST" action="<?= createURL("poll&action=update&id={$id}", 0, 1) ?>">
		<? else: ?>
			<form method="POST" action="<?= createURL('poll&action=add_poll', 0, 1) ?>">
		<? endif; ?>	
			<div class="poll_left">
				<textarea class="post_title" name="question" placeholder="Վերնագիր"><?= $action == 'update_poll' ? $data['question'] : '' ?></textarea>		
				<? if ($action == 'update_poll'): ?>
					<? foreach ($data['answer'][$lang['name']] as $key => $value): ?>
						<div class="poll_unit_box">
							<span id="ans_num"><?= $key + 1 ?></span>
							<input class="poll_ttl" type="text" value="<?= $value ?>" name="answer[<?= $key ?>]">
							<input class="poll_result" type="text" value="<?= $data['answer']['result'][$key] ?>" name="result[<?= $key ?>]">
							<span class="poll_dell del_btn">-</span>
							<span class="poll_add del_btn">+</span>
						</div>
					<? endforeach; ?>
				<? else: ?>
					<div class="poll_unit_box">
						<span id="ans_num">1</span>
						<input class="poll_ttl" type="text" value="" name="answer[]">
						<span class="poll_dell del_btn">-</span>
						<span class="poll_add del_btn">+</span>
					</div>
				<? endif; ?>	
			</div>

			<div class="poll_right">
				<div class="right_block_item">
					<b>Ընտրել ենթաբաժին</b>
					<div>
						<? foreach ($subdomains as $value): ?>
							<label><input type="radio" name="subdomain" required value="<?= $value['id'] ?>" <?= $action == 'update_poll' && $data['subdomain'] == $value['id'] ? 'checked' : '' ?>> <?= $value['title'] ?><br></label>
						<? endforeach; ?>
					</div>
				</div>

			<div class="poll_img">
				

				<div class="theme_img" style="margin:0">
					<img src="<?= $is_update ? ret_img($data['img'], 117, 112) : ''?>">
						<div class="right_block_item theme_img_add">
							<a href="<?= htmDIR . admDIR . '?imgUploader'?>" data-fancybox-type="iframe" class="chose_img_btn" id="themeImgButton"><?= $t['items']['choose_img'] ?></a>

							<div id="theme_img">	
								<? if ($is_update): ?>
									<input class="img_title" type="hidden" name="userfile" value="<?= $data['img'] ?>">
								<? endif; ?>				
							</div>
					</div>
				</div>
			</div>
			</div>

			<div class="poll_sbm_box">
				<input class="poll_sbm" type="submit">
				<div class="current_poll">
					ակտիվ հարցում<br>
					<input type="checkbox" name="current" <?= isset($data['current']) && $data['current'] == 1 ? 'checked' : '' ?>>
				</div>
			</div>

		</form>
	</div>

	
	<? if ($action != 'update_poll'): ?>
		<div class="poll_res">
			<div class="show_content clearfix">
				
				<? foreach($result as $key => $value): ?>
					<div style="width:940px" class="show_title cont_line <?= ($key %2 == 0) ? 'cont_line_color2' : '' ?> clearfix">
						<div style="width:300px" class="column_1 desc_1"><a href="" target="_blanck" class="news_url"><?= $value['question'] ?></a></div>
						<div class="column_2 desc_1 dateSize"><?= $value['date'] ?></div>
						<div class="column_2 desc_1 dateSize"><?= $subs[$value['subdomain']] ?></div>
						<div class="column_2 desc_1 dateSize"><?= $value['current'] == 1 ? 'Ակտիվ' : '' ?></div>
						<div class="column_2 desc_1 dateSize"><span class="get_poll_url" data-url="<?= createBURL($subn[$value['subdomain']] . '&poll') ?>">Հարցման հղում</span></div>
						<div class="column_3 desc_1"><a class="del_btn" href="<?= createURL("poll&action=del_poll&id={$value['id']}", 0, 1) ?>" onclick="return confirm('<?= $t['items']['really_del'] ?>')"><?= $t['items']['delete'] ?></a></div>
						<div class="column_3 desc_1"><a class="edit_btn" href="<?= createURL("poll&action=update_poll&id={$value['id']}", 0, 1) ?>" ><?= $t['items']['edit'] ?></a></div>
					</div>
				<?endforeach;?>
				<?= $pagination ?>
			</div>
		</div>
	<? endif; ?>
</div>
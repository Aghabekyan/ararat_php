<div class="main clearfix">
	<div class="btn_cont clearfix">
		<a href="<?= createURL('new_post', 0, 1) ?>"><?= $t['items']['add_news'] ?></a>
		<a href="<?= createURL('editor', 0, 1)?>"><?= $t['items']['add_user'] ?></a>
		<a href="<?= createURL('editor_list', 0, 1) ?>"><?= $t['items']['user_list'] ?></a>
	</div>
	<div class="show_content show-content-add clearfix">
		<form method="post" action="<?=htmDIR.admDIR."?add_user"?>">
			<div class="add_user_pass_cont">
				<div class="user_pass">
					<span><?= $t['items']['username'] ?></span>
					<input type="text" name="name" value="<?= $is_update ? $name : ''?>" >	
				</div>
				<div class="user_pass">
					<span><?= $t['items']['user_name'] ?></span>
					<? if ($is_update && $username == 'root'): ?>
						<input type="text" value="root" disabled>
						<input type="hidden" name="username" value="root">	
					<? else: ?>
						<input type="text" name="username" value="<?= $is_update ? $username : ''?>">	
					<? endif; ?>
				</div>
				<div class="user_pass">
					<span><?= $t['items']['password'] ?></span>
					<input type="text" name="password">	
				</div>	
				<div class="user_pass">
					<span><?= $t['items']['type'] ?></span>
						<? if ($is_update && $role == 1): ?>
							<input style="width: 92px;" type="text" value="root" disabled>
							<input type="hidden" name="role" value="1">	
						<? else: ?>
							<select name="role">
								<option value="2" <?= $is_update && $role == 2 ? 'selected' : ''?> ><?= $t['items']['editor'] ?></option>	
								<option value="3" <?=$is_update && $role == 3 ? 'selected' : ''?> ><?= $t['items']['jurnalist'] ?></option>	
							</select>
						<? endif; ?>
				</div>								
			</div>	
			<input type="submit" class="eidtor_sbm" value="<?= $t['items']['save'] ?>">
			<? if ($is_update): ?>
				<input type="hidden" name="id" value="<?=$pid?>" >
			<? endif; ?>
		</form>
	</div>
</div>
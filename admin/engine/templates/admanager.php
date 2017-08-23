<div class="ban-edit-main clearfix" >

	<form method="post" enctype="multipart/form-data" action="<?= createURL('updateBanners', 0, 1) ?>" >
		<?foreach($items as $value):?>
			<div>
				<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
				
				<fieldset class="legend-cont">
					<legend class="adm-leg"><?=$value['name']?></legend>
					<div class="banner-show-hid-cont">
						<div class="banner-content">
							<?if(!empty($value['path']) && $value['file_type'] != 'swf'):?>
								<a href="<?=$value['url']?>"><img style="max-width: 920px" src="<?=$value['path']?>"></a>
							<?endif;?>
							<?if(!empty($value['path']) && $value['file_type'] == 'swf'):?>
								<iframe src="<?=htmDIR.'upload/banners/'.$value['path']?>" frameborder="0" width="<?=$value['width']?>%"></iframe>
							<?endif;?>
						</div>
						<div class="row-fluid">
							Հղում`
							<input type="text" value="<?=$value['url']?>" name="<?=$value['id']?>Url" placeholder="url" class="fluid-url-input"> 
							<div class="pull-right">
								Լայնություն: 
								<input type="number" value="<?//=$value['width']?>" placeholder="<?=$value['width']?>" disabled class="fluid-num-input">
								% 		  
								Բարձրություն:
								<input type="number" value="<?=$value['height']?>" name="<?=$value['id']?>Height" class="fluid-num-input">
								px 		 
							</div>						
						</div>
						<div class="pull-items">
							<input name="<?=$value['id']?>" type="file"/>
							<label><input type="checkbox" name="<?=$value['id']?>Del" value="1" /> ջնջել</label>	
						</div>
						<div class="pull-items" style="display:none">
							<span> Alternative img</span>
							<input name="<?=$value['id']?>_alt" type="file"/>
							<label><input type="checkbox" name="<?=$value['id']?>DelAlt" value="1" /> ջնջել</label>	
						</div>
					</div>
				</fieldset>
			</div>
		<?endforeach;?>
		<div class="form-actions">
	        <button type="submit">
	            Պահպանել
	        </button>
	    </div>
	</form>

</div>
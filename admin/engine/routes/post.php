<?php

	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if ($action == 'new_post') {
	
		$is_update = false;
		
		
		// GALLEY OPERATIONS --------------------------------------------------------------------------------------------//

		$gallery = '';
		
		if (!empty($_POST['gallery_url'])) {

			if (!empty($_POST['gal_wtm'])) {

				foreach($_POST['gallery_url'] as $key => $value) {
					$gallery[$key] = AddWatermark2(bDIR . '/' . substr($value, strrpos($value, '/disk')), bDIR . '/' . admDIR . 'img/watermark.png');
				}
								
			}

			$gallery = serialize($_POST['gallery_url']);			
			
		}

		// MAIN IMAGE OPERATIONS --------------------------------------------------------------------------------------------//


		$img = '';
		
		if (!empty($_POST['userfile'])) {

			if (!empty($_POST['img_wtm'])) {
				
				$img = AddWatermark2(bDIR . substr($_POST['userfile'], strrpos($_POST['userfile'], '/disk')),  bDIR . '/' . admDIR . 'img/watermark.png');
			}

			$img = $_POST['userfile'];			
			
		}
		

		// Add iamge titles -----------------------------------------------------------------//

			$img_titles = array(
				'main'    => isset($_POST['main_img_title']) ? $_POST['main_img_title'] : '',
				'gallery' => isset($_POST['img_title']) ? $_POST['img_title'] : '',
			);

			$img_titles = json_encode($img_titles);

		// YouTube process --------------------------------------------------------------//
		
		if (!empty($_POST['post_youtube'])) {
		 	$get_yt_id = explode(',', $_POST['post_youtube']);
		 	
		 	$ytb = array();
		 	foreach ($get_yt_id as $value) {
		 		$ytb[] = youtubeID($value);	
		 	}
		 	$ytb = json_encode($ytb);

		}  else {
		 	$ytb = '';	
		}
		
		//-------------------------------------------------------------------------------//

		$data = array(
			'title'      => isset($_POST['post_title']) ? $_POST['post_title'] : '',
			'desc'       => isset($_POST['text_editor']) ? $_POST['text_editor'] : '',
			'youtube'    => $ytb,
			'meta' 	     => isset($_POST['post_meta']) ? $_POST['post_meta'] : '', 
			'lang'       => $lang['name'],
			'state'      => isset($_POST['publish_status']) ? intval($_POST['publish_status']) : 1,
			'img'	     => $img,		
			'gallery'    => $gallery,
			'img_titles' => $img_titles,
			'gen_slider' => isset($_POST['gen_slider']) ? 1 : 0,
			'ticker'     => isset($_POST['ticker']) ? 1 : 0,
			'editor'     => isset($_POST['editor']) ? 1 : 0,
			'show_hits'  => isset($_POST['show_hits']) ? 1 : 0,
			'created'    => date("Y-m-d G:i:s"),
			'published'  => (isset($_POST['published']) && $_POST['published'] != '') ? $_POST['published'] : date("Y-m-d G:i:s"),
			'user_id'    => empty($_POST['user_id']) ? $activeUser['id'] : $_POST['user_id'],		

		); 
		
			
		$db->insert("INSERT INTO `content` (`title`, `desc`, `youtube`, `metakey`, `lang`, `state`, `img`, `gallery`, `img_titles`, `gen_slider`, `ticker`, `editor`, `show_hits`, `created`, `published`, `user_id`)
			 VALUES(%s)", $data);	 
		
		$pid = $db->queryInfo['insert_id'];

		

		// INSERT INTO category ---------------------------------------------------------//

		if (!empty($_POST['category'])) {
			$category = $_POST['category'];
			$insert_str = '';

			foreach($category as $value) {
				$insert_str .= "(?, ?),";
				$insert_arr[] = $pid;
				$insert_arr[] = $value;
			}

			$insert_str = substr($insert_str, 0, -1);
			$db->insert("INSERT INTO `category_rel` VALUES {$insert_str} ", $insert_arr);
			
		} else {
			$db->insert("INSERT INTO `category_rel` VALUES (? ,?) ", $pid, 0);
		}	
				
		//-------------------------------------------------------------------------------//

		header('Location:' . createURL(0, 0, 1));

	}

	else {

	
		$cats_res = $db->select("SELECT `title_{$lang['name']}` title, `id`, `published` FROM `categories` WHERE `published` != 0");
		
		foreach ($cats_res as $value) {
			$cats[$value['published']][$value['id']] = $value['title'];
		}

			
		$is_update = false;

		require(bDIR.'/'.admDIR.'engine/model/model_header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/post.php');
		require(bDIR.'/'.admDIR.'/engine/templates/footer.php');

	}

?>
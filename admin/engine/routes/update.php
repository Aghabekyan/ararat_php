<?php 
	
	$pid    = (int)$_GET['id'];
	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if ($action == 'edit') {
		
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
			'published'  => !empty($_POST['published']) ? $_POST['published'] : date("Y-m-d G:i:s"),
			'user_id'    => empty($_POST['user_id']) ? $activeUser['id'] : $_POST['user_id'],		

		); 
		
		$db->update("UPDATE `content` 
			         SET `title` = ?, `desc` = ?, `youtube` = ?, `metakey` = ?,`lang` = ?, `state` = ?, `img` = ?, `gallery` = ?, `img_titles` = ?, `gen_slider` = ?, `ticker` = ?, `editor` = ?, `show_hits` = ?, `published` = ?, `user_id` = ?
			         WHERE `id` = ?", $data, $pid);	



		// INSERT INTO category ---------------------------------------------------------//
		if (!empty($_POST['category'])) {

			$db->delete("DELETE FROM `category_rel` WHERE id = ?", $pid);
			
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
		
		redirect(createURL('', 0, 1));	
	}
	else {


		// SELECT data to show in update page ----------------------------------------------------------- //

		$res = $db->selectRow("SELECT * FROM `content`  WHERE `id`= $pid");
		
		if(count($res['id']) == '') {
			redirect(createURL(0, 0, 1));
		}

		// update data array ---------------------------------------------------------------------------- //

			if (!empty($res['youtube'])) {
				$res['youtube'] = json_decode($res['youtube'], true);
				$res['youtube'] = implode(',', $res['youtube']);
				
			}
		
		
		$data = array(
			'id'         => $res['id'],
			'title'      => $res['title'],
			'desc'       => $res['desc'],
			'youtube'    => $res['youtube'],
			'metakey'    => $res['metakey'],
			'state'      => $res['state'],
			'hits'       => $res['hits'],
			'img'        => $res['img'],
			'gallery'    => unserialize($res['gallery']),
			'img_titles' => json_decode($res['img_titles'], true),
			'gen_slider' => $res['gen_slider'],
			'ticker'     => $res['ticker'],
			'editor'     => $res['editor'],
			'show_hits'  => $res['show_hits'],
			'published'  => $res['published'],
			'user_id'    => $res['user_id'],
		);
		


		// category select ------------------------------------------------------------------------------ //

		$cat_select = $db->select("SELECT `cat_id` FROM `category_rel` WHERE `id`=?", $pid);
		
		foreach($cat_select as $key => $value) {
			$cat_select[$key] = $value['cat_id'];
		}

		// SELECT Categories for show in update page -------------------------------------------------------------------------------------------------- //


		$cats_res = $db->select("SELECT `title_{$lang['name']}` title, `id`, `published` FROM `categories` WHERE `published` != 0");
		
		foreach ($cats_res as $value) {
			$cats[$value['published']][$value['id']] = $value['title'];
		}


		//check update page ------------------------------------------------------------------------ //

		$is_update = true;

		require(bDIR.'/'.admDIR.'engine/model/model_header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/header.php');
		require(bDIR.'/'.admDIR.'/engine/templates/post.php');
		require(bDIR.'/'.admDIR.'/engine/templates/footer.php');

	}


?>
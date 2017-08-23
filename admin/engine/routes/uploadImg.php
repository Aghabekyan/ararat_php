<?php
	

	$files = $_FILES['img'];
	$images = $_FILES['img']['tmp_name'];	
	$date = date("d-m-y");
	$do = true;
	$size_name = '';
	foreach($files['size'] as $key => $size){
		if($size > 500000){
		$size_name .= $files['name'][$key].', ';
		$do = false;
		}
	}
	$uploadedImages = array();

	if ($do){
	
		if(!file_exists(bDIR.'/disk')){
			mkdir(bDIR.'/disk', 0777);
		}	
		if(!file_exists(bDIR.'/disk/'.$date)){
			mkdir(bDIR.'/disk/'.$date, 0777);
		}	
		
		if(!empty($images))  foreach($images as $index => $img){
			if(!empty($img)){
				$new_name = md5(microtime()*rand(1,1000));
				$uploaded_img = bDIR.'/disk/'.$date.'/'.$new_name.'.jpg';
				move_uploaded_file($img, $uploaded_img);
				$uploadedImages[] = bURL.'disk/'.$date.'/'.$new_name.'.jpg';
			}
		}
		
		if(!empty($textareaVal))  {
			$textareaVal = substr($textareaVal,0,-2);
		}
	}
	else{

		$size_name = substr($size_name, 0, -2);
		$textareaVal = 'Ձեր նկարի չափսը գերազանցում է 500 կբ-ը: Փոքրեցրեք նկարի չափսը կամ ընտրեք այլ նկար: Տվյալ նկարներն են` '.$size_name;
		echo $textareaVal;
	}

	require bDIR.'/'.admDIR."engine/templates/imgUploaderResults.php";
	
?>
<?
	$type = isset($_GET['multi']) ? 'multi' : 'single';
	$infographic = isset($_GET['infographic']) ? true : false;

	require bDIR.'/'.admDIR."/engine/templates/imgUploader.php";
	
?>
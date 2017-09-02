<?
$url = "http://times.am/?rate";
	// echo 5
$json = file_get_contents($url);
$obj = json_decode($json);
echo $json;
?>
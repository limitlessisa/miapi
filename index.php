<?php 
	if(!isset($_GET['url'])){ exit(); }
	try {
		$url=file_get_contents($_GET['url']);
	} catch (Exception $e) {
	 echo '<div style="display:none"><pre>';
	 print_r($e);
	 echo '</pre></div>';
	}
	if($url){
		if(strpos($url, 'chunklist')){
			$url=substr($_GET['url'], 0, strpos($_GET['url'], 'playlist')).trim(substr($url, strpos($url, 'chunklist')));
		}else{
			$url=$_GET['url'];
		}
	}else{
		$url=$_GET['url'];
	}
	echo $url;
?>

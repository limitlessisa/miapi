<?php 
	header('Content-Type: application/json'); 
	if(!isset($_GET['url'])){ exit(); }
	
	if($_GET['callback']){// Only JSONP
		echo $_GET['callback'].'(';
	}

	try {
		$url=file_get_contents($_GET['url']);
	} catch (Exception $e) {
		echo json_encode($e);
	}
	if($url){
		if(strpos($url, 'chunklist')){
			$url=substr($_GET['url'], 0, strpos($_GET['url'], 'playlist')).trim(substr($url, strpos($url, 'chunklist')));
			$result=array('status'=>1,'url'=>$url);
		}else{
			$url=$_GET['url'];
			$result=array('status'=>0,'url'=>$url);
		}
	}else{
		$url=$_GET['url'];
	}

	echo json_encode($result);
	
	if($_GET['callback']){// Only JSONP
		echo ')';
	}
?>

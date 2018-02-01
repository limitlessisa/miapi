<?php 
	if(!isset($_GET['url'])){ exit(); }
	try {
		$chunklist=file_get_contents($_GET['url']);
	} catch (Exception $e) {
	 echo '<div style="display:none"><pre>';
	 print_r($e);
	 echo '</pre></div>';
	}
	if($chunklist){
		if(strpos($chunklist, 'chunklist')){
			$pos=strpos($chunklist, 'chunklist');
			$chunklist=substr($_GET['url'], 0, $pos).trim(substr($chunklist, $pos));
		}else{
			$chunklist=$_GET['url'];
		}
	}else{
		$chunklist=$_GET['url'];
	}
	echo $chunklist;
?>

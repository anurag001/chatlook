<?php
	include_once('./class.php');
	global $pdo;
	$typeid=htmlspecialchars($_POST['typeid']);
	//$typeid=1;
	if(is_numeric($typeid) and $typeid!=""){
	$vid = $pdo->query("select * from songs where typeid='$typeid'");
	while($v = $vid->fetch())
	{
		$url = $v['url'];
		$link = explode('?v=',$url);
		echo '<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$link[1].'?ecver=2"></iframe>
			</div></br>';
	}
	}

?>
<?php
	include('class.php');
	
	
	global $pdo;
	$str = trim(strtolower($_POST['str']));
	if(!empty($str) and $str!="")
	{
				$sugg = $pdo->prepare("select * from record where username like '%$str%' or name like '%$str%'");
				if($sugg->execute())
				{
					while($row = $sugg->fetch(PDO::FETCH_OBJ))
					{
							echo '<li style="border:1px solid #EAEDED;"><strong>'.$row->name.'</strong>&nbsp;&nbsp;'.$row->username.'</li>';
					}
				}
				
			
		
	}

?>
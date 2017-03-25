<?php
	include('./class.php');
	session_start();

	$id = htmlspecialchars(stripslashes($_SESSION['userid']));
	$from = htmlspecialchars(stripslashes($_POST['from']));
	$to = htmlspecialchars(stripslashes($_POST['to']));
	global $pdo;
		
				$query = $pdo->prepare("select * from chat where sendfromid=? and sendtoid=? or sendfromid=? and sendtoid=? order by chatid asc");
				$query->bindParam(1,$from);
				$query->bindParam(2,$to);
				$query->bindParam(3,$to);
				$query->bindParam(4,$from);
				if($query->execute())
				{
					while($row = $query->fetch(PDO::FETCH_OBJ))
					{
						if($row->sendfromid==$id)
						{
							echo '<span  style="float:left;color:green;"><b>'.$obj->getfromid($row->sendfromid,'name').'</b> &nbsp;&nbsp; '.$row->message.'</span>';
						}
						else
						{
							echo '<span  style="float:right;color:blue;">'.$row->message.'&nbsp;&nbsp;<b>'.$obj->getfromid($row->sendfromid,'name').'</b></span>';
						}
						echo '</br>';
					}
				}
				
	
	
	
?>

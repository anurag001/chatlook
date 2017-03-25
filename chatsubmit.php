<?php
	include('class.php');
	session_start();
	if(isset($_SESSION['userid']))
	{
		$id = htmlspecialchars(stripslashes($_SESSION['userid']));
	}
	else
	{
		$ref=$_SERVER['HTTP_REFERER'];
		header('location:'.$ref);
	}
	$id = htmlspecialchars(stripslashes($_SESSION['userid']));
	$from = htmlspecialchars(stripslashes($_POST['sendfrom']));
	$to = htmlspecialchars(stripslashes($_POST['sendto']));
	$message = htmlspecialchars(trim($_POST['message']));
	global $pdo;

		if(is_numeric($from) and is_numeric($to) and !empty($message) and $message!="")
		{
				$query = $pdo->prepare("insert into chat(sendfromid,sendtoid,message) values(?,?,?)");
				$query->bindParam(1,$from);
				$query->bindParam(2,$to);
				$query->bindParam(3,$message);
				if($query->execute())
				{
					echo '<span style="color:green">Sent succesfully</span>';
				}
		}
		else
		{
			echo '<span style="color:red;">Don\'t leave it blank,please enter something.</span>';
		}	
				
	
	
	
?>

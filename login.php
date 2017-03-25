<?php

	include_once('./class.php');

	$user = htmlspecialchars(trim($_POST['logusername']));
	$pass =	htmlspecialchars(trim($_POST['logpassword']));
	global $pdo;
	if($user!="" and $pass!="")
	{
		$pass=md5($pass);
		$log = $pdo->query("select * from record where username='$user' and password='$pass'");
		if($log->rowCount()>0)
		{
			$row=$log->fetch();
			session_start();
			$id=$row['id'];
			$_SESSION['userid']=$id;
			echo '<span class="alert alert-success">Logged in successfully</span>';
			$pdo=NULL;
			?>
				<script>
					window.location.href="./chat.php";
				</script>
			<?php
		}
		else
		{
			echo '<span class="alert alert-warning">Invalid credentials</span>';
		}
	}
	else
	{
		echo '<span style="color:red;font-size:1.0em;font-family:arial;">Please provide both credentials</span>';
	}

?>
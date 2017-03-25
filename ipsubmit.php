<?php
		include_once('class.php');
		$ip = $obj->getUserIP();
		$name = htmlspecialchars(trim($_POST['name']));
		$password=htmlspecialchars(trim($_POST['password']));
		$username = htmlspecialchars(trim($_POST['username']));
		$time = time();
		
		if($password!="" and $name!="" and $username!="")
		{
			if($obj->checkuser($username)==false)
			{
				global $pdo;
				$password=md5($password);
				$query = $pdo->prepare("insert into record(ip,name,username,password,since) values(?,?,?,?,?)");
				$query->bindParam(1,$ip);
				$query->bindParam(2,$name);
				$query->bindParam(3,$username);
				$query->bindParam(4,$password);
				$query->bindParam(5,$time);
				if($query->execute())
				{
					echo '<span class="alert alert-success">Registered successfully.</span>';
				}
				else
				{
					echo '<span class="alert alert-danger">Please try again,there might be some problem.</span>';
				}
			}
			else
			{
					echo '<span class="alert alert-warning">'.$username.' username already exist.</span>';
			}
			
		}
		else
		{
			echo '<span class="alert alert-danger">Don\'t leave it blank,please enter something.</span>';
		}
?>
<?php

	include_once('./class.php');
	$user = htmlspecialchars(stripslashes(trim($_POST['username'])));
	if($user!="")
	{
		if(strlen($user)>=5)
		{
			$status = $obj->checkuser($user);
			if($status==true)
			{
				echo '<span style="color:red;font-size:1.0em;font-family:arial;">'.$user.' username already exist ,try another one</span>';
			}
			else
			{
				echo '<span style="color:green;font-size:1.0em;font-family:arial;">'.$user.' username is fine</span>';
			}	
		}
		else
		{
			echo '<span style="color:red;font-size:1.0em;font-family:arial;">Username must be at least 5 characters long</span>';
		}
		
	}
	else
	{
		echo '<span style="color:red;font-size:1.0em;font-family:arial;">Please provide any username</span>';
	}
?>
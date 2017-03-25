<?php
	include_once('./class.php');
	session_start();
	global $pdo;
			if(isset($_SESSION['admin']))
			{
				if(!empty($_SESSION['admin']) and $_SESSION['admin']=="chatlooklove")
				{
					$did=$_GET['did'];
					echo '<a href="./chatlookadmin.php">Go Back</a>';
					$q = $pdo->query("delete from record where id = '$did'");
					echo '</br>';
					if($q)
					{
						echo 'success';
					}
					else
					{
						echo 'problem';
					}
				}
			}

?>
<?php
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=chat",'root','');
	}
	catch(PDOException $ex)
	{
		echo $ex->getMessage();
		die();
	}

?>
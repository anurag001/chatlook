<?php
include('dbcon.php');
class chat
{
			
	public function getUserIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}
		return $ip;
	}
	
	public function checkip($ip)
	{
		global $pdo;
		$query = $pdo->prepare("select ip from record where ip = ?");
		$query->bindParam(1,$ip);
		$query->execute();
		if($query->rowCount()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function checkuser($user)
	{
		global $pdo;
		$query = $pdo->prepare("select username from record where username = ?");
		$query->bindParam(1,$user);
		$query->execute();
		if($query->rowCount()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function getfield($ip,$field)
	{
		global $pdo;
		$query = $pdo->prepare("select * from record where ip = ?");
		$query->bindParam(1,$ip);
		if($query->execute())
		{
			$row = $query->fetch(PDO::FETCH_OBJ);
			return $row->$field;
		}
	}
	public function getfieldfromuser($username,$field)
	{
		global $pdo;
		$query = $pdo->prepare("select * from record where username = ?");
		$query->bindParam(1,$username);
		if($query->execute())
		{
			$row = $query->fetch(PDO::FETCH_OBJ);
			return $row->$field;
		}
	}
	
	public function getfromid($id,$field)
	{
		global $pdo;
		$query = $pdo->prepare("select * from record where id = ?");
		$query->bindParam(1,$id);
		if($query->execute())
		{
			$row = $query->fetch(PDO::FETCH_OBJ);
			return $row->$field;
		}
	}
}

$obj = new chat;
?>
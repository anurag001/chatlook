<?php
	include('./class.php');
	global $pdo;
	if(isset($_POST['go']))
	{
		if(!empty($_POST['userpass']) and !empty($_POST['userkey']))
		{
			$key = htmlspecialchars($_POST['userkey']);
			$pass = htmlspecialchars($_POST['userpass']);
			if($key=="chatlooklove" and $pass=="iloveyousomya")
			{
				session_start();
				$_SESSION['admin']='chatlooklove';
			}
		}
	}
?>
<!DOCTYPE HTML>
<html lang="eng">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>Chatlook</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
body{
	background:#fff;
	margin:0px;
}

.footer{
    background: #FCCFC4;
	padding-top:10px;
	padding-left:7px;
	width:100%;
	height:auto;
	text-decoration:none;
	color:#000;
	position: relative;
	padding-bottom:5px;
	margin-bottom:0px;
	bottom: 0px;
	vertical-align: bottom
	margin-top:10px;
}
#heading{
	height:50px;
	width:100%;
	background:#ff9999;
}
.panel{
	box-shadow:0px 0px 10px #b20000;
	padding:20px;
}
.banner{
	font-family:forte;
	color:#cc0000;
	font-size:3.0em;
	font-weight:bold;
	text-shadow:0px 0px 3px #b20000;
}
.mycontainer{
	margin-left:30px;
	margin-right:30px;
}
</style>
	</head>
	<body>
	<div class="mainbox">
		<section>
			<div class="container">
				<div class="banner">
					#include < <span class="glyphicon glyphicon-heart"></span> >
				</div>
			</div>
		</section>
		<?php
			
			if(isset($_SESSION['admin']))
			{
				if(!empty($_SESSION['admin']) and $_SESSION['admin']=="chatlooklove")
				{
			?>
		<section id="frontpart">
			<div class="mycontainer" style="margin-top:50px;">
				<div class="row">
					<div class="panel">
						<a href="adminlogout.php">Logout</a>
					</div>
				</div>
				</hr>
				<div class="row">
					<div class="col-lg-12">
						<table class="table">
							<tr>
								<td>	
									<thead>User id</thead>
								</td>
								<td>	
									<thead>Name</thead>
								</td>
								<td>	
									<thead>User Name</thead>
								</td>
								<td>	
									<thead> Ip </thead>
								</td>
								<td>	
									<thead> Date(Created)</thead>
								</td>
								<td>
									<thead> Status(Delete)</thead>
								</td>
							</tr>
						<?php
								global $pdo;
								$query = $pdo->query("select * from record");
								while($row=$query->fetch())
								{
									echo '<tr>
										<td>'.$row['id'].'</td>
										<td>'.$row['name'].'</td>
										<td>'.$row['username'].'</td>
										<td>'.$row['ip'].'</td>
										<td>'.$row['since'].'</td>
										<td><a href="deluser.php?did='.$row['id'].'">Delete</a></td>
									</tr>';
								}
						?>
							</table>
					</div>
				</div>
			</div>
		</section>
			<?php
				}
			}
			else
			{
				
		?>
		<section id="frontpart">
			<div class="mycontainer" style="margin-top:50px;">
				<div class="row">
					<div class="panel">
						<form action="" method="post">
							<input type="text" class="form-control" id="userkey" name="userkey" placeholder="userkey" required/><br>
							<input type="password" class="form-control" id="userpass" name="userpass" placeholder="userpass" required/><br>
							<input type="submit" value="Access" name="go" class="btn btn-success btn-block"/>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php
			}
		?>
		
	</div>
	</body>
</html>
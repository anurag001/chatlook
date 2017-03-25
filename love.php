<?php
	include('./class.php');
	global $pdo;
	session_start();
	if(isset($_SESSION['userid']))
	{
		$id = htmlspecialchars(stripslashes($_SESSION['userid']));
		$user = $pdo->query("select * from record where id = '$id'");
		$row = $user->fetch();
	}
	else
	{
		header('location:./index.php');
	}
?>
<!DOCTYPE HTML>
<html lang="eng">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>Chatlook | Love</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
		
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
.mainbox{
	box-shadow:0px 0px 20px #b20000;
	margin-left:40px;
	margin-right:35px;
	background:#ffcccc;
}
.banner{
	font-family:forte;
	color:#cc0000;
	font-size:3.0em;
	font-weight:bold;
	text-shadow:0px 0px 3px #b20000;
}
@media only screen and (max-width:768px){
	
	.mainbox{
		box-shadow:0px 0px 20px #b20000;
		margin-left:5px;
		margin-right:5px;
	}
}
		</style>
	</head>
	<body>
		<div class="mainbox">
			<section>
				<div class="container">
					<div class="banner text-right">
						import java.io.<span class="glyphicon glyphicon-heart"></span>*;
					</div>
					</br>
					<div class="text-left">
						<span class="banner">Check your status</span>
						<form name="love" id="love">
						<div class="row">
							<div class="col-lg-5">
								<input type="text" class="form-control" id="lovername" name="lovername" placeholder="Your lover's name" required>
							</div>
							<div class="col-lg-4">
								<input type="date" class="form-control" id="dob" name="dob" placeholder="Your date of birth" required>
							</div>
							<div class="col-lg-3">
								<input type="submit" class="form-control btn btn-danger" value="Estimate">
							</div>
						</div>
						</form>
					</div>
				</div>
			</section>
			</br></br>
			<section>
				<div class="container">
					<div class="row">
						<div id="result">
							<p>Provide your date of birth and your crush name</p>
							<p>You can also get your crush info by providing her dob</p>
						</div>
					</div>
				</div>
			</section>
			</br></br>
			<section class="footer">
				<div class="text-center">
					<b>
						<p>
						Copyright &copy; 2017 - www.chatlook.freevar.com
							<br>
						a Anurag Kumar production
						</p>
					</b>
				</div>
			</section>
			<script>
				$("#love").on('submit',function(e){
					e.preventDefault();
					var data = $("#love").serialize();
					$.ajax({
					url:'./lovecal.php',
					type:"post",
					data:data,
					beforeSend:function()
					{
						$("#result").html('Loading...');
					},
					success:function(resp)
					{
						$("#result").html(resp);
					},
					error:function()
					{
						$("#result").html('Loading is failed due to poor internet connection');
					},
					complete:function()
					{
						
					}
				});
				});
			</script>
		</div>
	</body>
</html>
<?php
	include('./class.php');
	global $pdo;
	session_start();
	if(isset($_SESSION['userid']))
	{
		header('location:./chat.php');
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
	background:#c5e9e8;
	margin:0px;
}

.footer{
    background: #c5e9e8;
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
	background:#c5e9e8;
}
.left{
	padding-left:5px;
	float:left;
}
.right{
	padding-right:5px;
	float:right;
}
#registerbox{
	height:auto;
}
.panel{
	box-shadow:0px 0px 10px #3b4545;
}
.banner{
	font-family:forte;
	color:#768b8b;
	font-size:3.0em;
	font-weight:bold;
	text-shadow:0px 0px 3px #272e2e;
}
#content2{
	background-image:url(./img/bg.jpg);
	background-position: 50% 50%;
    background-repeat: no-repeat;
    background-attachment: fixed;
	background-size: cover;
    background-clip: padding-box;
	min-height:400px;
	width:100%;

}
.mainbox{
	box-shadow:0px 0px 20px #3b4545;
	margin-left:40px;
	margin-right:40px;
	background:#fff;
}
.mycontainer{
	margin-left:25px;
	margin-right:20px;
	color:#fff;
	text-shadow:0px 0px 3px #3b4545;
}
@media only screen and (max-width:768px){
	.mainbox{
		box-shadow:0px 0px 20px #3b4545;
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
				<div class="banner">
					Welcome to chatlook <span class="glyphicon glyphicon-user"></span> ? <span class="glyphicon glyphicon-user"></span>
				</div>
			</div>
		</section>
		<section id="frontpart">
			<div class="container" style="margin-top:50px;">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div id="heading" class="panel-heading">
								<div class="row">
									<div class="col-lg-6">
										<div class="left">
											<strong style="color:#627474;">Welcome to Chatlook</strong>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="right">
											<button class="btn btn-danger" id="logup-form-btn">Signup</button>
											&nbsp;
											<button class="btn btn-danger" id="login-form-btn">Signin</button>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body" id="registerbox">
							<form method="post"  id="ipform">
								<div class="form-group">
									<label for="name">You haven't registered here.Provide your name , username and password.</label>
									<input type="text" class="form-control" id="name" name="name" maxlength="40" placeholder="Enter your name" required>
								</div>
								<div class="form-group">
									<input type="text" onblur="chk_username(this.value)" class="form-control" maxlength="40" id="username" name="username" placeholder="Enter your username" required>
									<span id="user-info" style="display:none;"></span>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" maxlength="40" placeholder="Enter your password" required>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-block btn-success" id="reg-btn" value="Register">
								</div>
							</form>
								</br>
								<div class="form-group">
									<span id="result"></span>
								</div>
							</div>
							<div class="panel-body" id="loginbox" style="display:none;">
								<form method="post" id="loginform">
									<div class="form-group">
										<input type="text" class="form-control" id="logusername" name="logusername" placeholder="Username" required>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" id="logpassword" name="logpassword" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-block btn-info" id="login-btn" value="Login">
									</div>
									</br>
									<div class="form-group">
										<span id="login-result"></span>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		</br>
		<section id="content2">
			<div class="mycontainer">
				<blockquote cite="http://goodmorningmylove.com/short-cute-love-quotes-for-him-from-the-heart/">
					Everyone will find a partner.
					Once all partners are determined, no man and woman in different couples could improve their happiness by running off together.
					Once all partners are determined, every man will have the best partner available to him.
					Once all partners are determined, every woman will end up with the least bad of all the men who approach her.
				</blockquote>
				<br>
				<blockquote>
					Love is not about how many days, weeks or months you've been together, it's all about how much you love each other every day.
				</blockquote>
				</br>
				<blockquote>
					Btw we must remember our real lovers,god,parents and friends.Because we are nothing without them.
				</blockquote>
			</div>
		</section>
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
	</div>
		<?php include_once('./script.php'); ?>

	</body>
</html>

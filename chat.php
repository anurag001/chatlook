<?php
	include('./class.php');
	global $pdo;
	session_start();
	if(isset($_SESSION['userid']))
	{
		$id = $_SESSION['userid'];
		$user = $pdo->query("select * from record where id = '$id'");
		$row = $user->fetch();
	}
	else
	{
		$ref=$_SERVER['HTTP_REFERER'];
		header('location:'.$ref);
	}
?>
<!DOCTYPE HTML>
<html lang="eng">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>Chatlook | Chat</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
		
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
.panel{
	box-shadow:0px 0px 5px #272e2e;
}
#heading{
	height:50px;
	width:100%;
	background:#caebea;
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
#personlist{
	overflow-x:hidden;
	overflow-y:auto;
	width:100%;
	max-height:500px;
}
#postview{
	overflow-x:hidden;
	overflow-y:auto;
	width:100%;
	max-height:250px;
}
#videoview{
	overflow-x:hidden;
	overflow-y:auto;
	width:100%;
	max-height:500px;
}
.mycontainer{
	margin-left:10px;
	margin-right:10px;
}
.banner{
	font-family:forte;
	color:#627474;
	font-size:3.2em;
	font-weight:bold;
	text-shadow:0px 0px 3px #272e2e;
}
.banner-sm{
	font-family:forte;
	color:#272e2e;
}
.mainbox{
	box-shadow:0px 0px 20px #272e2e;
	margin-left:30px;
	margin-right:20px;
	background:#fff;
}
@media only screen and (max-width:768px){
	.mycontainer{
		margin-left:3px;
		margin-right:3px;
	}
	.mainbox{
		box-shadow:0px 0px 20px #272e2e;
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
				<div class="col-lg-6">
					<div class="banner text-left">
						Chatlook <span class="glyphicon glyphicon-user"></span>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="banner-sm text-right">
						<div style="padding-top:10px;">
							<a href="./love.php" style="text-decoration:none;"><button class="btn btn-primary btn-block" style="font-size:1.9em;">Love Estimation</button></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="mycontainer" style="margin-top:40px;">
				<div class="row">
					<div class="col-lg-2">
						<input type="text" class="form-control" id="person-search" onkeyup="personsearch(this.value)" placeholder="Search people.."/></br>
						<div id="personlist">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div id="heading" class="panel-heading">
								<div class="row">
									<div class="col-lg-6">
										<div class="left">
											<strong style="color:#627474;">Hi <?php echo $row['name'];?> ! Welcome to Chatlook</strong>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="right">
											<a href="./signout.php" style="text-decoration:none;color:#fff;"><button class="btn btn-danger" id="logup-form-btn">Signout</button></a>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<div id="postview">
									</div>
								</div>
								<form method="post"  id="chatform">
									<div class="form-group">
										<label for="sendto">Send to</label>
										<input type="text" class="form-control" id="sendto" name="sendto" placeholder="Username of person" disabled="disabled" required>
									</div>
									<div class="form-group">
										<label for="message">Message</label>
										<textarea class="form-control" id="message" name="message" placeholder="Message" required></textarea>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-block btn-primary" value="Send">
									</div>
								</form>
								<div class="form-group">
									<span id="result"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<select id="videosuggest"  class="selectpicker form-control" style="width:100%;">
							<option value="">What song best fits your love situation</option>
							<option value="1">When you have crush on someone</option>
							<option value="2">Can't express your feelings</option>
							<option value="3">Perfect understanding between couples</option>
							<option value="4">When your love is about to break</option>
							<option value="5">When you have missed the chance</option>
							<option value="6">Distance does not matter</option>
							<option value="7">Age gaps doesn't matter</option>
							<option value="8">Fresh love and new adjustment</option>
							<option value="9">After breakup</option>
							<option value="10">Love at first sight</option>
						</select>
						</br></br>
						<div id="videoview">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1hAKxlB1V1E?ecver=2"></iframe>
							</div>
							</br>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/x4AaYr1t3TA?ecver=2"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		</br>
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
		<script>
			
			window.onload=function(){
				pullperson();
				setInterval('pullPost()', 500);
				//-----------------------scroller-------------------
								var elem = document.getElementById('postview');
								elem.scrollTop = elem.scrollHeight;
			};
				

					$("#chatform").on('submit',function(e){
						e.preventDefault();
						var sendto = $("#idsendto").val();
						var sendfrom = <?php echo $id;?>;
						var message = $("#message").val();
						$.ajax({
							url:'./chatsubmit.php',
							type:"post",
							data:"sendfrom="+sendfrom+"&sendto="+sendto+"&message="+message,
							success:function(resp)
							{
								$("#result").html(resp);
								$("#message").val('');
							},
							complete:function()
							{
								pullPost();
								
							}
						});
					});
					
			function pullperson()
			{
				$.ajax({
					url:'./person.php',
					method: "POST",
					data:'id='+<?php echo $id;?>,
					success: function(data) {
						
						$('#personlist').html(data);
					},
					error: function() {
					},
					complete:function(){
						
					}
				});
			}
		
			function personsearch(key)
			{
				$.ajax({
					url:'./personsearch.php',
					method: "POST",
					data:'id='+<?php echo $id;?>+'&key='+key,
					success: function(data) {
						$('#personlist').html(data);
					},
					error: function() {
					},
					complete:function(){
						
					}
				});
			}
		
			function pullPost()
			{
				var sendto = $("#idsendto").val();
				var sendfrom = <?php echo $id;?>;
				$.ajax({
					url: './postview.php',
					method: "POST",
					data:'from='+sendfrom+'&to='+sendto,
					success: function(data) {
						$('#postview').html(data);
					},
					error: function() {
						$("#postview").html('Stopped due to technical error').fadeIn();
					},
					complete:function(){
						var elem = document.getElementById('postview');
						elem.scrollTop = elem.scrollHeight;
					}
				});
			}
		
		
			$("#videosuggest").change(function(){
				var typeid = $("#videosuggest").val();
				$.ajax({
					url:'./video.php',
					type:"post",
					data:'typeid='+typeid,
					beforeSend:function()
					{
						$("#videoview").html('Loading...');
					},
					success:function(resp)
					{
						$("#videoview").html(resp);
					},
					error:function()
					{
						$("#videoview").html('Loading is failed due to poor internet connection');
					},
					complete:function()
					{
						
					}
				});
			});
		</script>
		
		
	</body>
</html>
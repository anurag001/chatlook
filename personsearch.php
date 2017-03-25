<style>
ul li{
	text-decoration:none;
	list-style-type:none;
	display:block;
}
.cell{
	cursor:pointer;
	padding-top:4px;
	padding-bottom:4px;
	text-align:center;
	border-radius:2px;
	width:100%;
	margin-left:-20px;
	box-shadow:0px 0px 5px #627474;
}
</style>
<?php

	include_once('./class.php');
	global $pdo;
	$id = htmlspecialchars(stripslashes($_POST['id']));
	$key = htmlspecialchars(stripslashes(trim($_POST['key'])));
	$people = $pdo->query("select * from record where id!='$id' and name like '%$key%' or username like '%$key%'");
	echo '<input type="hidden" id="idsendto" value=""/>';
	echo '<ul>';
	while($row = $people->fetch())
	{
		if($row['id']!=$id)
		{
			echo '<li class="cell" id="'.$row['id'].':'.$row['name'].'" value="'.$row['name'].'" onclick="sendto(this.id)">'.$row['name'].' @'.$row['username'].'</li>';
		}
	}
	echo '</ul>';

?>
<script>
	function sendto(pid)
	{
		var sendtouser = pid.split(":");
		$("#sendto").val(sendtouser[1]);
		$("#idsendto").val(sendtouser[0]);
			$.ajax({
					url: './postview.php',
					method: "POST",
					data:'from='+<?php echo $id;?>+'&to='+sendtouser[0],
					beforeSend:function(){
						$('#postview').html('Loading...');
					},
					success: function(data) {
						$('#postview').html(data);
					},
					error: function() {
						$("#postview").html('Stopped due to technical error').fadeIn();
					}
				});
	}
	
	
</script>
<?php
	include('./class.php');
	global $pdo;
	if(isset($_POST['songsubmit']))
	{
		$typeid = $_POST['type'];
		$sname=$_POST['songname'];
		$url=$_POST['url'];
		if($typeid==1)
		{
			$type="When you have crush on someone";
		}
		else if($typeid==2)
		{
			$type="Can\'t express your feelings";
		}
		else if($typeid==3)
		{
						$type="Perfect understanding between couples";

		}
		else if($typeid==4)
		{
						$type="When your love is about to break";

		}
		else if($typeid==5)
		{
						$type="When you have missed the chance";

		}
		else if($typeid==6)
		{
						$type="Distance does not matter";

		}
		else if($typeid==7)
		{
						$type="Age gaps doesn\'t matter";

		}
		else if($typeid==8)
		{
						$type="Fresh love and new adjustment";

		}
		else if($typeid==9)
		{
						$type="After breakup";
		}
		else if($typeid==10)
		{
				$type="Love at first sight";

		}
		
		$ins = $pdo->query("insert into songs(songname,typeid,type,url) values('$sname','$typeid','$type','$url')");
		if($ins)
		{
			echo 'success : '.$sname;
		}
		else
		{
			echo 'error<br>'.mysql_error();
		}
	}
?>
					<form method="post" action="">
						Type:<select id="videosuggest" name="type"  class="selectpicker form-control" required >
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
						<br></br>
						Song name:<input type="text" name="songname" required></br></br>
						song url:<input type="text" name="url" required></br></br>
						<input type="submit" value="submit" name="songsubmit">
					</form>

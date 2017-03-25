<script>
			function chk_username(username)
			{
				if(username.length!=0 && username!="")
				{
					$.ajax({
						url:'./chkusername.php',
						method:"post",
						data:'username='+username,
						success:function(resp)
						{
							$("#user-info").show();
							$("#user-info").html(resp);
						}
					});
				}
			}
			
				$("#ipform").on('submit',function(e){
						e.preventDefault();
						var dataip = $("#ipform").serialize();
						$.ajax({
							url:'./ipsubmit.php',
							method:"post",
							data:dataip,
							beforeSend:function(){
								$("#reg-btn").attr("disabled",true);
								$("#reg-btn").html("Registering....");
							},
							success:function(resp)
							{
								$("#result").html(resp);
							},
							complete:function()
							{
								$("#reg-btn").html("Completed");
							}
						});
					});
					
			$("#login-form-btn").click(function(){
				$("#registerbox").hide();
				$("#loginbox").show();
			});
			$("#logup-form-btn").click(function(){
				$("#registerbox").show();
				$("#loginbox").hide();
			});
			
			$("#loginform").on('submit',function(e){
				e.preventDefault();
				var logdata = $("#loginform").serialize();
					$.ajax({
							url:'./login.php',
							method:"post",
							data:logdata,
							beforeSend:function(){
								$("#login-btn").attr("disabled",true);
								$("#login-btn").html("Logging in....");
							},
							success:function(resp)
							{
								$("#login-result").html(resp);
							},
							complete:function()
							{
								$("#login-btn").html("Completed");
								$("#login-btn").attr("disabled",false);
							}
					});

			});
</script>
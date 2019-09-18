<?php
	session_start();

	if (isset($_SESSION["fullname"]) && isset($_SESSION["admin"]) && isset($_SESSION["network"]) && isset($_SESSION["support"]) && !isset($_SESSION["helpdesk"]) && isset($_SESSION["loggedIn"])) {
		header("Location: main.php");
		exit();
	}
?>
<html lang="en" class="fullscreen-bg">
	<head>
		<title>Inventory</title>
		<link href="libraries/semantic.min.css" rel="stylesheet" type="text/css">
		<link href="libraries/login.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="libraries/bootstrap.min.v4.1.3.css">
		<script src="libraries/jquery-3.3.1.min.js"></script>
		<script src="libraries/semantic.min.js"></script>
	  <script src="libraries/bootstrap-notify.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".pcontainer").hide();
			});
			function notif_promt(){
				setTimeout(function(){
					$(".pcontainer").hide();
				},1000);
			}
			$(document).on('click','#login',function()/*If Admin click the Login Button*/
			{
			/*If the Admin Login Success*/
			var login_username = $('#username').val();
			var login_pass = $('#password').val();
			$.ajax({
				url:"main-query/login_serv.php",
				method:'POST',
				data:{login_username:login_username,login_pass:login_pass},
				success:function(response)
				{
					// alert(response);
					if(response === "Valid")
					{
						window.location.href = "main.php";
					}
					else
					{
						$(".pcontainer").show();
						notif_promt();
					}
				}
			})
			});
		</script>
	</head>
	<body class="login_body" >
		<div id="wrapper">
			<div class="vertical-align-wrap">
				<div class="vertical-align-middle" >
					<div class="auth-box">
						<div class="content">
							<div class="header">
								<div class="logo align-center">
									<img src="libraries/GICF.png" style="width:250px;">
								</div>
							</div>
							<div class="form-auth-small ui form">
								<div class="fields">
									<div class="sixteen wide field">
										<label for="username" class="color-black">Username</label>
										<input type="text" name="username" id = "username" placeholder="Enter Username" autocomplete="off" required autofocus>
									</div>
								</div>
								<div class="fields">
									<div class="sixteen wide field">
										<label for="password" class="color-black">Password</label>
										<input id="password" type="password" name="password" placeholder="Enter Password" required>
									</div>
								</div>
								<div class="fields">
									<div class="sixteen wide field">
										<button type="submit" id = "login" class="ui green button large fluid">SIGN IN</button>
									</div>
								</div>
								<div class="pcontainer">
									<p class = "alert">Invalid Credentials !</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

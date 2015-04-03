<!DOCTYPE! html>

<?php
	session_start();
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		header("Location: home.php");
	}
?>

<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>


	<body>
		<div class="wrapper">
			<div id="login_wrapper">
				<div id="login_image">
					<img src="images/loginimage.jpg" alt="loginimage">
				</div>
				<form id="login_form" name="input" action="verify_user.php" method="post">
					Username: <input type="text" name="username"><br>
					Password: <input type="password" name="password"><br>

					<div id="error_box">
						<?php
						$error1 = $_GET['error1'];
						$error2 = $_GET['error2'];
						echo $error1 . "<br />" . $error2;
						?>
					</div>	

					<div id="stay_logged">
						<p>Stay logged in for:</p>
						<select name="countdown_time">
							<option value="6">6 seconds (Quick test)</option>
							<option value="30">30 seconds</option>
							<option value="5*60">5 minutes</option>
							<option value="24*60*60">1 day</option>
						</select>
					</div>	
					
					<input id="submit_button" type="submit" value="submit">
				</form>	
			</div>


		</div>
	</body>

</html>	






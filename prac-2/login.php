<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" />
<link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand">Asianic Food Culture</a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="disabled"><a>Login</a></li>
        <?php /*?><?php 
		session_start();
		if (isset($_SESSION["Username"]))
		{
			echo "<li><a href=\"logout.php\">Logout</a></li>";
			}
			else
			{
				echo "<li class=\"disabled\"><a href=\"login.php\">Login</a></li>";
			}
			?><?php */?>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>
<?php include('login_action.php'); ?>
<form name="formLogin" id="formLogin" class="formLogin" method="post">
  <h2>Please login to continue</h2>
  <label for="username" class="sr-only">Username</label>
  <input type="text" name="Username" id="username" class="form-control" placeholder="Username" required autofocus>
  <label for="password" class="sr-only">Password</label>
  <input type="password" name="Password" id="password" class="form-control" placeholder="Password" required>
  <span style="color:red;">Forget my Password</span><br>
  <span style="color:blue;">Not a member? Join Now!</span>
  <p>Stay Logged in for:
    <select name="Timeout" class="form-control">
      <option value="03" selected>3 Sec</option>
      <option value="10">10 Sec</option>
      <option value="30">30 Sec</option>
      <option value="86400">1 Day</option>
    </select>
  </p>
  <button name="Submit" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  <?php if(isset($msg)) { ?>
  <span class="center-block"><?php echo $msg; ?></span>
  <?php } ?>
</form>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<script src="js/lightbox.js"></script> 
<script src="js/googleMapAPI.js"></script> 
<script src="js/main.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Homepage</title>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
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
        <li class="active"><a>Home</a></li>
        <?php 
		session_start();
		if (isset($_SESSION['Username']))
		{
			echo "<li><a href=\"logout.php\">Logout</a></li>";
			echo "<p class=\"navbar-text navbar-right\">Logged in User: " . $_SESSION["Username"] . "</p>";
			}
			else
			{
				echo "<li><a href=\"login.php\">Login</a></li>";
			}
			?>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>
<?php /*?><?php 
if (isset($_GET['handler']))
{
	echo "<div class=\"welcomeMsg\">" . base64_decode(urldecode($_GET["handler"])) . "</div>";
}
?><?php */?>
<div class="getGeolocation"></div>
<div class="container" role="main">
  <div class="col-lg-7" style="height:400px;">
    <div id="map-canvas"></div>
  </div>
  <div class="col-lg-5">
    <!--<div class="scrollableTableContainer">-->
      <table class="tableLegend">
        <tr>
          <td id="legend"></td>
        </tr>
      </table>
    <!--</div>-->
  </div>
</div>
<script type="text/javascript">
    var loginTimeout = <?php echo $_SESSION['Timeout']; ?>;
    var loggedIn = <?php echo $_SESSION['isLoggedIn']; ?>;
    if(loggedIn) {
        $(function() {
            initCountdown(loginTimeout);
        });
    }
</script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<script src="js/lightbox.js"></script> 
<script src="js/googleMapAPI.js"></script> 
<script src="js/main.js"></script>
</body>
</html>
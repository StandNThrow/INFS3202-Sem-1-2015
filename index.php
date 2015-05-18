<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Index of INFS3202-MH609</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand">Index of INFS3202-MH609</a> 
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				</ul>
			</div>
			<!--/.nav-collapse --> 
		</div>
	</nav>
	<div class="jumbotron">
		<div class="container">
			<h1>My Projects</h1>
		</div>
	</div>
	<?php
	$folder = "D:\home\site\wwwroot"; // path of htdocs

	if(!$open = @opendir($folder)) 
		die("The directory is not available!");

	$list_dir = "";
	$list_file = "";

	while(($namearq = readdir($open)) !== false) {

		if($namearq == "." or $namearq == "..") continue;

		$dir = "D:\home\site\wwwroot" . $namearq;

		if(is_dir($dir)) {

			$list_dir .= "<img src=\"folder.png\" width=\"18\" height=\"15\" alt=\"\"><a href=\"/$namearq\" target=\"top\">$namearq<br></a>\n";
		} else {
			$list_file .= "<img src=\"file.png\" width=\"18\" height=\"16\" alt=\"\"><a href=\"$namearq\" target=\"top\">$namearq<br></a>\n";
		}
	}
	?>
	<div class="panel panel-primary">
		<div class="panel-heading">Project Files</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Directories</th>
					<th>Files</th>
				</tr>
			</thead>
			<tr>
				<td><?php echo $list_dir; ?></td>
				<td><?php echo $list_file; ?></td>
			</tr>
		</table>
	</div>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<!-- Latest compiled and minified JavaScript --> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
</body>
</html>
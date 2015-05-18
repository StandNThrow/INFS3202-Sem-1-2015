<%@ page import="java.io.*,java.text.*,java.util.*" %>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Welcome to INFS3202 - Prac 6</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="images/favicon.png">

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
				<a class="navbar-brand">INFS3202 - Prac 6</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.jsp">Home</a></li>
					<!-- <%
					String sessionUsername = (String) session.getAttribute("username");
					if (sessionUsername == null) {
					%>
					<li><a href="login.jsp">Login</a></li>
					<%  } else { %>
					<li><a href="admin.jsp">Admin Panel</a></li>
					<li><a href="logout.jsp">Logout</a></li>
					<li>
						<p class="navbar-text">Welcome back, <a class="navbar-link"><%=sessionUsername %></a></p>
					</li>
					<% } %> -->
				</ul>
			</div>
		</div>
	</nav>
	<%
	int refreshTimer = 2;
	response.setIntHeader("Refresh", refreshTimer);
	Integer hitCount = (Integer)application.getAttribute("hitCounter");
	if (hitCount == null || hitCount == 0 ) {
	/* First visit */
	/*
	out.println("Welcome to my INFS3202!");
	out.println("<br>");
	out.println("Page will auto refresh every" + refreshTimer);
	*/
	out.println("<div class=\"jumbotron\">");
	out.println("<div class=\"container\">");
	out.println("<h2>Welcome to my INFS3202 - Prac 6!</h2>");
	out.println("<!-- <p><a class=\"btn btn-primary btn-lg\" href=\"#\" role=\"button\">Learn more &raquo;</a></p> -->");
	out.println("</div>");
	out.println("</div>");
	hitCount = 1;
} else {
/* Returning visitors */
/*
out.println("Welcome back to my INFS3202!");
*/
out.println("<div class=\"jumbotron\">");
out.println("<div class=\"container\">");
out.println("<h2>Welcome back to my INFS3202 - Prac 6!</h2>");
out.println("<!-- <p><a class=\"btn btn-primary btn-lg\" href=\"#\" role=\"button\">Learn more &raquo;</a></p> -->");
out.println("</div>");
out.println("</div>");
hitCount += 1;
}

application.setAttribute("hitCounter", hitCount);

%>
<center>
	<h2><b>Total number of visits: </b><%= hitCount%></h2>
	<%
	out.println("<h3><b>Page will auto refresh every " + refreshTimer + " second(s)</b></h3>");
	%>
	<% DateFormat dateFormat = new SimpleDateFormat("HH:mm:ss"); %>
	<h3><b>Current Time: </b><%=dateFormat.format(new java.util.Date()) %></h3>
</center>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<script src="js/main.js"></script>
<script>
function getTimeZoneId(){
	var timezone=String(new Date());
	document.getElementById("timeZone").innerHTML = timezone.substring(timezone.lastIndexOf('(')+1).replace(')','').trim();
	return timezone.substring(timezone.lastIndexOf('(')+1).replace(')','').trim();
}
</script>
</body>
</html>
<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>Custom Search Page</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="wrapper">
		<div class="site_title">
			<img id="left_image" src="images/flankimages1.jpg" alt="loginimage">
			<a href = "http://infs3202-013.uqcloud.net/prac6/home.php">
				<img id="main_image" src="images/loginimage.jpg" alt="loginimage">
			</a>
			<img id="right_image" src="images/flankimages2.jpg" alt="loginimage">
		</div>

		<div id="login_details_tab">
			<a href="search_page.jsp"><h5>Custom Search |</h5></a>
			<a href="dynamic_search_page.html"><h5>| Quick Search</h5></a>
			</h4>
		</div>

		<form action="db_search.jsp" method="POST">
			Keyword:<input type="text" name="name"><br>
			Price: $<input type="text" name="price"><br>
			Location: <input type="text" name="location"><br>
			<input type="submit" name="search" value="Submit Changes">
		</form>

	</div>	
</body>
</html>
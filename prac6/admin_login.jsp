<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>

<html> 

<head>
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
	<div class="wrapper">
		<div id="login_wrapper">
			<div id="login_image">
				<img src="images/loginimage.jpg" alt="loginimage">
			</div>
			Admin Login
			<form id="admin_login_form" name="admin_input" action="verify_admin.jsp" method="post">
				Username: <input type="text" name="username"><br>
				Password: <input type="password" name="password"><br>


				<input id="submit_button2" type="submit" value="submit">
			</form>	
		</div>
	</div>

<%

%>



</body>

</html>
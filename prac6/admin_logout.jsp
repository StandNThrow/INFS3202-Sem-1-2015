<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>

<html> 

<head>
<title>Admin Logout</title>

</head>

<body> 
	<% 
	session.removeAttribute("username"); 
	session.removeAttribute("password"); 
	session.invalidate();
	response.sendRedirect("admin_login.jsp");
	%> 
</body>


</html>
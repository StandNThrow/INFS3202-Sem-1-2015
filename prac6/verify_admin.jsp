<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>

<html> 

<head>
<title>Verify Admin</title>

</head>


<body>


<%
	String username = request.getParameter("username");
	String password = request.getParameter("password");

	if ((username.equals("admin") && password.equals("password"))) {
		session.setAttribute("username",username);
		session.setAttribute("password",password);
		response.sendRedirect("admin_page.jsp");
	} else {
		response.sendRedirect("admin_login_error_page.jsp");
	}

%>


</body>

</html>
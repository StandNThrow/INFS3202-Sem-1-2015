<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>

<html>
<head>
	<title>Confirm Deletion</title>
</head>



<body>

<%
String promoID = request.getParameter("promoID");	

%>


Are you sure you want to delete this deal?

<a href="db_delete.jsp?promoID=<%=promoID%>">Yes</a>
<a href="admin_page.jsp">No</a>

</body>
<html>
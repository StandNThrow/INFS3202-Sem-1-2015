<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>db_delete</title>
</head>


<body>
<%
String url = "jdbc:mysql://localhost:3306/leon"; 
Class.forName("com.mysql.jdbc.Driver"); 
Connection con = DriverManager.getConnection(url,"leon", "leon"); 

String promoID = request.getParameter("promoID");	

Statement statement = con.createStatement();
String deleteQuery = "DELETE FROM MyPromotions WHERE promoID="+promoID+" ";

out.println("The following SQL was written:");
out.println(deleteQuery);

statement.executeUpdate(deleteQuery);
statement.close(); 
con.close(); 

String redirectURL = "admin_page.jsp";
response.sendRedirect(redirectURL);
%>



</body>

</html>
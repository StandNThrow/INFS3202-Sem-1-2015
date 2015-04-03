<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>db_edit</title>
</head>


<body>
<%
String url = "jdbc:mysql://localhost:3306/leon"; 
Class.forName("com.mysql.jdbc.Driver"); 
Connection con = DriverManager.getConnection(url,"leon", "leon"); 

String promoID = request.getParameter("promoID");	
String img = request.getParameter("img");
String name = request.getParameter("name");
String price = request.getParameter("price");
String date = request.getParameter("date");
String location = request.getParameter("location");

Statement statement = con.createStatement();
String updateQuery = "UPDATE MyPromotions SET img='"+img+"', name='"+name+"', price="+price+", date='"+date+"', location='"+location+"' WHERE promoID="+promoID+" ";

out.println("The following SQL was written:");
out.println(updateQuery);

statement.executeUpdate(updateQuery);
statement.close(); 
con.close(); 


String redirectURL = "admin_page.jsp";
response.sendRedirect(redirectURL);
%>

</body>

</html>
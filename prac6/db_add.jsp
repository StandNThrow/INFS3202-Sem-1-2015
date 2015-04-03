<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>db_add</title>
</head>


<body>
<%
String url = "jdbc:mysql://localhost:3306/leon"; 
Class.forName("com.mysql.jdbc.Driver"); 
Connection con = DriverManager.getConnection(url,"leon", "leon"); 

String promoID = request.getParameter("promoID");
String image = request.getParameter("image");
String name = request.getParameter("name");
String price = request.getParameter("price");
String promotional_period = request.getParameter("promoPeriod");
String location = request.getParameter("location");
String promoURL = request.getParameter("promoURL");

Statement statement = con.createStatement();
String addQuery = "INSERT INTO MyPromotions VALUES ("+promoID+", '"+image+"', '"+name+"', "+price+", '"+promotional_period+"', '"+location+"', '"+promoURL+"')";



statement.executeUpdate(addQuery);
out.println("The following SQL was written:");
out.println(addQuery);
statement.close(); 
con.close(); 

String redirectURL = "admin_page.jsp";
response.sendRedirect(redirectURL);
%>


</body>


</html>
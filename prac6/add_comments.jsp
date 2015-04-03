<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>
<%@ page import="java.net.*" %>


<%
String url = "jdbc:mysql://localhost:3306/leon"; 
Class.forName("com.mysql.jdbc.Driver"); 
Connection con = DriverManager.getConnection(url,"leon", "leon"); 

//out.print(request.getParameter("q"));

URLDecoder decoder = new URLDecoder();
String[] strJSON = decoder.decode(request.getParameter("q")).replace("\\","").replace("\"","").replace("{","").replace("comments:promoID:","").replace("comment:","").replace("}","").split(",");




if (!strJSON[1].equals("")){
	Statement statement = con.createStatement();
	String addQuery = "INSERT INTO MyComments (PromoID, comments) VALUES ("+strJSON[0]+", '"+strJSON[1]+"')";

	statement.executeUpdate(addQuery);
	statement.close(); 
	con.close(); 

	out.write("Comment added");

	}



%>





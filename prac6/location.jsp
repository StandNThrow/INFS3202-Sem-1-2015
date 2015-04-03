<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>


<%
String url = "jdbc:mysql://localhost:3306/leon"; 
Class.forName("com.mysql.jdbc.Driver"); 
Connection con = DriverManager.getConnection(url,"leon", "leon"); 
String location=null;

String id = request.getParameter("q");
String selectQuery ="SELECT * FROM MyPromotions WHERE ";


if (!id.equals("")){

	selectQuery = selectQuery + "promoID = "+id+"";

	Statement statement = con.createStatement();
	ResultSet resultSet = statement.executeQuery(selectQuery);

	if (!resultSet.isBeforeFirst()) {
			out.println("Sorry, your search has returned no results. Please try again with different keywords");
		} else {
			while (resultSet.next()) {
				location = resultSet.getString("location");
			}
			out.println(location);
		}
		
		resultSet.close(); 
		statement.close(); 
		con.close(); 
	}
%>





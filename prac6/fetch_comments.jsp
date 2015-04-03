<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>


<%
String url = "jdbc:mysql://localhost:3306/leon"; 
Class.forName("com.mysql.jdbc.Driver"); 
Connection con = DriverManager.getConnection(url,"leon", "leon"); 

String selectQuery = request.getParameter("q");


if (!selectQuery.equals("")){

	Statement statement = con.createStatement();
	ResultSet resultSet = statement.executeQuery(selectQuery);

	if (!resultSet.isBeforeFirst()) {
			out.println("Sorry, no comments available yet");
		} else {
			out.println("<div>");
			
			while (resultSet.next()) {
				String comments = resultSet.getString("comments");
				out.println(comments+"</br>");
			}

			out.println("</div>");
		}
		
		resultSet.close(); 
		statement.close(); 
		con.close(); 
	}
%>





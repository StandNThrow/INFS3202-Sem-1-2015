<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>


<%
String url = "jdbc:mysql://localhost:3306/leon"; 
Class.forName("com.mysql.jdbc.Driver"); 
Connection con = DriverManager.getConnection(url,"leon", "leon"); 

String keyword = request.getParameter("q");
String selectQuery ="SELECT * FROM MyPromotions WHERE ";


if (!keyword.equals("")){
	selectQuery = selectQuery + "name LIKE '%"+keyword+"%'";

	Statement statement = con.createStatement();
	ResultSet resultSet = statement.executeQuery(selectQuery);

	if (!resultSet.isBeforeFirst()) {
			out.println("empty");
		} else {
			while (resultSet.next()) {
				String location = "#" + resultSet.getString("location");
				out.print(location);
			}
			
		}
		
		resultSet.close(); 
		statement.close(); 
		con.close(); 
	}
%>

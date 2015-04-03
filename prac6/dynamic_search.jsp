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
			out.println("Sorry, your search has returned no results. Please try again with different keywords");
		} else {
			out.println("<div>");
			
			while (resultSet.next()) {
				String img = resultSet.getString("img");
				String name = resultSet.getString("name");
				String promoURL = resultSet.getString("promoURL");

				out.println("<fieldset class=\"search_results\"><legend>" + name + "</legend><a href=\"" + promoURL + "\"><img src=\"" + img + "\" alt=\"promo\"></a></fieldset>");
			}

			out.println("</div>");
		}
		
		resultSet.close(); 
		statement.close(); 
		con.close(); 
	}
%>





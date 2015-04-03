<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>Admin Page</title>
</head>

<body>
<%
	String user="";
	if (session.getAttribute("username")==null || session.getAttribute("password")==null) {
		response.sendRedirect("admin_login.jsp");
	} else {
		user = session.getAttribute("username").toString();
	}

	String url = "jdbc:mysql://localhost:3306/leon"; 
	Class.forName("com.mysql.jdbc.Driver"); 
	Connection con = DriverManager.getConnection(url,"leon", "leon"); 
%>

	<h1>Admin Page</h1>
	<h2>Logged In: <%=user%></h2>
	<a href="admin_logout.jsp"><h3>Logout</h3></a>


		<table style="width:1000px">

		<tr>
			<td>
				PromoID
			</td>

			<td>
				Image Link
			</td>

			<td>
				Name
			</td>

			<td>
				Price
			</td>

			<td>
				Date
			</td>

			<td>
				Location
			</td>

			<td>
				Promo URL
			</td>

		</tr>


		<%
		Statement statement = con.createStatement();
		String selectQuery = "SELECT * FROM MyPromotions";
		ResultSet resultSet = statement.executeQuery(selectQuery);
		while (resultSet.next()) {
			int promoID = resultSet.getInt("promoID");
			String img = resultSet.getString("img");
			String name = resultSet.getString("name");
			int price = resultSet.getInt("price");
			String date = resultSet.getString("date");
			String location = resultSet.getString("location");
			String promoURL = resultSet.getString("promoURL");
		%>
			<tr>
				<td>
					<%=promoID%>
				</td>

				<td>
					<%=img%>
				</td>

				<td>
					<%=name%>
				</td>

				<td>
					$<%=price%>
				</td>

				<td>
					<%=date%>
				</td>

				<td>
					<%=location%>
				</td>

				<td>
					<%=promoURL%>
				</td>

				<td>
					<a href="edit_page.jsp?promoID=<%=promoID%>">Edit</a>
				</td>

				<td>
					<a href="delete_confirmation.jsp?promoID=<%=promoID%>">Delete</a>
				</td>
			</tr>
		<%}%>
		</table>

		<%
			resultSet.close(); 
			statement.close(); 
			con.close(); 
		%>






<a href="add_deal.jsp"><h3>Add promo</h3></a>
				<td>
					<a href="search_page.jsp">Search for Deals Now!</a>
				</td>

</body>
</html>
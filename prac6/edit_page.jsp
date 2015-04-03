<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>Edit Page</title>
</head>


<body>

	<%
	String url = "jdbc:mysql://localhost:3306/leon"; 
	Class.forName("com.mysql.jdbc.Driver"); 
	Connection con = DriverManager.getConnection(url,"leon", "leon"); 

	String promoID = request.getParameter("promoID");

    Statement statement = con.createStatement();
	String selectQuery = "SELECT * FROM MyPromotions WHERE promoID ="+promoID+"";
	ResultSet resultSet = statement.executeQuery(selectQuery);
	
	resultSet.next();
	
	String img = resultSet.getString("img");
	String name = resultSet.getString("name");
	int price = resultSet.getInt("price");
	String date = resultSet.getString("date");
	String location = resultSet.getString("location");


	%>

	<form action="db_edit.jsp" method="POST">
		promoID: <input type="text" name="promoID" readonly value="<%=promoID%>" style="border:none;"><br>		
		Image: <input type="text" name="img" value="<%=img%>"><br>
		Name:<input type="text" name="name" value="<%=name%>" pattern=".{3,}" required title="Must be 3 or more characters"><br>
		Price: $<input type="number" name="price" value="<%=price%>" required><br>
		Promo Period: <input type="text" name="date" value="<%=date%>" required><br>
		Location: <input type="text" name="location" value="<%=location%>" required><br>

		<input type="submit" name="submit" value="Submit Changes">
	</form>

	<%
	resultSet.close(); 
	statement.close(); 
	con.close(); 
	%>


</body>



</html>
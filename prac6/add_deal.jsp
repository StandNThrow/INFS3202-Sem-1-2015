<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>Add Deal Page</title>
</head>

<body>

	<h1>Add New Deal</h1>

	<form action="db_add.jsp" method="POST">
		promoID: <input type="text" name="promoID" required><br>
		Image: <input type="text" name="image" required><br>
		Name:<input type="text" name="name" required><br>
		Price: $<input type="number" name="price" required><br>
		Promo Period: <input type="text" name="promoPeriod" required><br>
		Location: <input type="text" name="location" required><br>
		Promo URL: <input type="text" name="promoURL" required><br>

		<input type="submit" name="submit" value="Submit Changes">
	</form>

</body>
</html>
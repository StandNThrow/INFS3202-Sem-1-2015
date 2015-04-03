<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>Promo 6</title>
</head>

<body>
<%
    String url = "jdbc:mysql://localhost:3306/leon"; 
    Class.forName("com.mysql.jdbc.Driver"); 
    Connection con = DriverManager.getConnection(url,"leon", "leon"); 

    Statement statement = con.createStatement();
    String selectQuery = "SELECT * FROM MyPromotions WHERE promoID = 6";
    ResultSet resultSet = statement.executeQuery(selectQuery);

    while (resultSet.next()) {
        String img = resultSet.getString("img");
        String name = resultSet.getString("name");
        int price = resultSet.getInt("price");
        String date = resultSet.getString("date");
        String location = resultSet.getString("location");


    %>
        <h1><%=name%></h1>
        <img src="<%=img%>" alt="promo"></a>
        <h2>Price: $<%=price%></h2>
        <h2>Promotional Period: <%=date%></h2>
        <h2>Location: <%=location%></h2>
    </body>

<%
    }
    statement.close(); 
    con.close(); 
%>
</html>
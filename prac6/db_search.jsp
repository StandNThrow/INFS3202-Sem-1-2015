<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>

<html> 

<head>
<title>Search Results</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
	<%
	String url = "jdbc:mysql://localhost:3306/leon"; 
	Class.forName("com.mysql.jdbc.Driver"); 
	Connection con = DriverManager.getConnection(url,"leon", "leon"); 
	%>

	<h1>Search Results</h1>

		<table style="width:900px">

		<%
		String keyword = request.getParameter("name");
		String search_price = request.getParameter("price");
		String search_location = request.getParameter("location");

		int and_counter=0;
		
		String selectQuery ="SELECT * FROM MyPromotions WHERE ";

		if (!keyword.equals("")){
			if (and_counter==0) {
				selectQuery = selectQuery + "name LIKE '%"+keyword+"%'";
				and_counter++;
			} else {
				selectQuery = selectQuery + " AND " + "name LIKE '%"+keyword+"%'";
				and_counter++;
			}
		}


		if (!search_price.equals("")) {
			if (and_counter==0) {
				if (search_price.substring(0,1).equals("<") || search_price.substring(0,1).equals(">"))  {
				selectQuery = selectQuery + "price "+search_price+"";
				and_counter++;
				} else {
					selectQuery = selectQuery + "price = "+search_price+"";
					and_counter++;
				}
			} else if (and_counter>0) {
				if (search_price.substring(0,1).equals("<") || search_price.substring(0,1).equals(">"))  {
				selectQuery = selectQuery + " AND " + "price "+search_price+"";
				and_counter++;
				} else {
					selectQuery = selectQuery + " AND " + "price = "+search_price+"";
					and_counter++;
				}
			}
		}

		if (!search_location.equals("")) {
			if (and_counter==0) {
				selectQuery = selectQuery + "location LIKE '%"+search_location+"%'";
				and_counter++;
			} else {
				selectQuery = selectQuery + " AND " + "location LIKE '%"+search_location+"%'";
				and_counter++;
			}
		}



		if (selectQuery=="SELECT * FROM MyPromotions WHERE ") {
			out.println("Sorry, you did not fill in any queries. Please try again");
		} else {
			Statement statement = con.createStatement();
			ResultSet resultSet = statement.executeQuery(selectQuery);

			if (!resultSet.isBeforeFirst()) {
					out.println("Sorry, your search has returned no results. Please try again with different keywords");
				} else {

					while (resultSet.next()) {
						String img = resultSet.getString("img");
						String name = resultSet.getString("name");
						int price = resultSet.getInt("price");
						String date = resultSet.getString("date");
						String location = resultSet.getString("location");
						String promoURL = resultSet.getString("promoURL");
			%>
			 		<div>
						<fieldset class="search_results">
							<legend><%=name%></legend>
							<a href="<%=promoURL%>">
								<img src="<%=img%>" alt="promo">
							</a>
						</fieldset>
					</div>
			<%}
		}%>

			</table>

			<%
				resultSet.close(); 
				statement.close(); 
				con.close(); 
			}
			%>




</body>



</html>
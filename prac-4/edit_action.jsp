<%@ page contentType="text/html; charset=utf-8" language="java" import="java.lang.*,java.io.*,java.util.*" %>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Edit</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="css/style.css" type="text/css">
      <link rel="shortcut icon" href="images/favicon.png">
  </head>
  <body>
  	<%
  	String sessionUsername = (String) session.getAttribute("username");
  	if (sessionUsername == null)
  		{
  	response.sendRedirect("login.jsp");
  }
  else 
  	{

}
%>
<%
String Name = request.getParameter("Name");
String Address = request.getParameter("Address");
String PhoneNo = request.getParameter("PhoneNo");
String Images = request.getParameter("Images");
String Description = request.getParameter("Description");
String fileName = request.getParameter("File");
String File = application.getRealPath("prac-3/data/" + fileName);

response.sendRedirect("admin.jsp");
try
{
	FileWriter fileWriter = new FileWriter(File, false);
	fileWriter.write(Name + "\n");
	fileWriter.write(Address + "\n");
	fileWriter.write(PhoneNo + "\n");
	fileWriter.write(Images + "\n");
	fileWriter.write(Description + "\n");
	fileWriter.close();
} catch (Exception e)
{
	out.println(e);
}
%>
</body>
</html>
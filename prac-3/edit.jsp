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
String id = request.getParameter("id");
if (id == null) {
response.sendRedirect("admin.jsp");
} 

String fileName = "data" + id + ".txt";
BufferedReader bufferedReader = null;
FileReader fileReader;

String inputPath = application.getRealPath("prac-3/data") + File.separatorChar;

try {

fileReader = new FileReader (new File(inputPath + fileName));
bufferedReader = new BufferedReader (fileReader);
String line = bufferedReader.readLine();
List<String> lines = new ArrayList<String>();
while (line != null)
{
	lines.add(line);
	line = bufferedReader.readLine();
}

String[] linesArray = lines.toArray(new String[]{});
// Form Contoller for displaying elements from text file. 
out.println("<div class=\"modal-body\">");
out.println("<form action=\"edit_action.jsp\" name=\"formEdit\" id=\"formEdit\" class=\"formEdit\" method=\"post\">");
out.println("<h2>Edit</h2>");
out.println("<div class=\"form-group\"><label for=\"file\" class=\"sr-only\">Filename</label><input type=\"hidden\" id=\"file\" name=\"file\" class=\"form-control\" value=\"" + fileName + "\"></div>");
out.println("<div class=\"form-group\"><label for=\"name\">Name</label><input type=\"text\" id=\"name\" name=\"name\" class=\"form-control\" placeholder=\"Name\" value=\"" + linesArray[0] + "\" readonly></div>");
out.println("<div class=\"form-group\"><label for=\"address\">Address</label><input type=\"text\" id=\"address\" name=\"address\" class=\"form-control\" placeholder=\"Address\" value=\"" + linesArray[1] + "\" ></div>");
out.println("<div class=\"form-group\"><label for=\"phoneno\">Phone No.</label><input type=\"text\" id=\"phoneno\" name=\"phoneno\" class=\"form-control\" placeholder=\"Phone No.\" value=\"" + linesArray[2] + "\" ></div>");
out.println("<div class=\"form-group\"><label for=\"images\">Images</label><input type=\"text\" id=\"images\" name=\"images\" class=\"form-control\" placeholder=\"Images URL\" value=\"" + linesArray[3] + "\" ></div>");
out.println("<div class=\"form-group\"><label for=\"description\">Description</label><textarea id=\"description\" name=\"description\" class=\"form-control\" placeholder=\"Description\" rows=\"5\" >" + linesArray[4] + "</textarea></div>");
out.println("<button id=\"save\" name=\"save\" class=\"btn btn-lg btn-primary\" type=\"submit\">Save</button>");
out.println("</form>");
out.println("</div>");
}
catch (Exception e)
{
	out.println(e);
}
%>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="js/main.js"></script>
<script src="js/lightbox.js"></script>
</body>
</html>
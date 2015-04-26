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
<!-- Fixed navbar -->
<!-- Hide navbar
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand">Asianic Food Culture</a> </div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.jsp">Home</a></li>
					<li><a href="admin.jsp">Admin Panel</a></li>
					<li>
						<%
						if (sessionUsername == null)
							{
						%>
						<% } else { %>
						<li><a href="logout.jsp">Logout</a></li>
						<li>
							<p class="navbar-text navbar-right">Welcome back, <a class="navbar-link"><%=sessionUsername %></a></p>
						</li>
						<% } %>
					</ul>
				</div>
			</div>
		</nav>
	--> 
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
out.println("<!-- <div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title\">Edit</h4></div> --><div class=\"modal-body\"><form action=\"edit_action.jsp\" name=\"formEdit\" id=\"formEdit\" class=\"formEdit\" method=\"post\"><h2>Edit</h2><label for=\"File\" class=\"sr-only\">Filename</label><input type=\"hidden\" name=\"File\" class=\"form-control\" value=\"" + fileName + "\"><label for=\"Name\">Name</label><input type=\"text\" name=\"Name\" class=\"form-control\" placeholder=\"Name\" value=\"" + linesArray[0] + "\" required><label for=\"Address\">Address</label><input type=\"text\" name=\"Address\" class=\"form-control\" placeholder=\"Address\" value=\"" + linesArray[1] + "\" required><label for=\"PhoneNo\">Phone No.</label><input type=\"text\" name=\"PhoneNo\" class=\"form-control\" placeholder=\"Phone No.\" value=\"" + linesArray[2] + "\" required><label for=\"Images\">Images</label><input type=\"text\" name=\"Images\" class=\"form-control\" placeholder=\"Images URL\" value=\"" + linesArray[3] + "\" required><label for=\"Description\">Description</label><textarea name=\"Description\" class=\"form-control\" placeholder=\"Description\" rows=\"5\" required>" + linesArray[4] + "</textarea><br><button name=\"Submit\" class=\"btn btn-lg btn-primary\" type=\"submit\">Save</button></form></div><!-- <div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-lg btn-primary\" data-dismiss=\"modal\">Close</button><button type=\"submit\" class=\"btn btn-primary\">Save</button></div> -->");
}
catch (Exception e)
{
	out.println(e);
}
%>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<script src="js/lightbox.js"></script>
</body>
</html>
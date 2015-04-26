<%@ page contentType="text/html; charset=utf-8" language="java" import="java.lang.*,java.io.*,java.util.*" %>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>Admin Panel</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="css/style.css">
      <link rel="shortcut icon" href="images/favicon.png">
    </head>

    <body>
      <%
      String sessionUsername = (String) session.getAttribute("username");
      if (sessionUsername == null) {
      response.sendRedirect("login.jsp");
    }
    %>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Asianic Food Culture</a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.jsp">Home</a></li>
            <li class="active"><a>Admin Panel</a></li>
            <%
            if (sessionUsername == null) {
          } else { 
          %>
          <li><a href="logout.jsp">Logout</a></li>
          <li>
            <p class="navbar-text">Welcome back, <a class="navbar-link"><%=sessionUsername %></a></p>
          </li>
          <% } %>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </nav>
  <div class="container">
    <div class="panel panel-primary"> 
      <!-- Default panel contents -->
      <div class="panel-heading">
        <h1>Asianic Food Culture</h1>
      </div>
      <!-- Table -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name of Restaurant</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <%  
          String inputPath = application.getRealPath("prac-3/data") + File.separatorChar;  

          String fileName = "metadata.txt";  
          BufferedReader bufferedReader = null;  
          FileReader fileReader;

          try {  
          fileReader = new FileReader (new File(inputPath + fileName));  
          bufferedReader = new BufferedReader (fileReader);
          String line = bufferedReader.readLine();  
          List<String> lines = new ArrayList<String>();
          while (line != null) {  
          lines.add(line);
          line = bufferedReader.readLine();
        }  
        String[] linesArray = lines.toArray(new String[]{});

        for (int i = 0; i < linesArray.length; i++)
        {
        out.println("<tr><td>" + linesArray[i] + "</td><td><a class=\"btn btn-primary\" data-toggle=\"modal\" data-remote=\"edit.jsp?id=" + (i+1) + "\" data-target=\"#myModal\">Edit</a></td></tr><!-- Modal --><div class=\"modal fade\" id=\"myModal\"><div class=\"modal-dialog\"><div class=\"modal-content\"></div></div></div>");
      }
      bufferedReader.close();  
    } 
    catch (Exception e) {
    out.println(e);
  }
  %>
</tbody>
</table>
</div>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
<!-- Latest compiled and minified JavaScript --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<script src="js/lightbox.js"></script>
<script>
// Close modal dialog, refresh page
$('#myModal').on('hidden.bs.modal', function () {
  location.reload();
});
</script>
</body>
</html>
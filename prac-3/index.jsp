<%@page contentType="text/html" pageEncoding="UTF-8" errorPage="error.jsp"%>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<title>Home</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand">Asianic Food Culture</a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.jsp">Home</a></li>
        <li>
          <%
            String sessionUsername = (String) session.getAttribute("username");
			if (sessionUsername == null)
			{
				%>
        <li><a href="login.jsp">Login</a></li>
        <%  } else { %>
        <li><a href="admin.jsp">Admin</a></li>
        <li><a href="logout.jsp">Logout</a></li>
        <li>
          <p class="navbar-text navbar-right">Welcome back, <a class="navbar-link"><%=sessionUsername %></a></p>
        </li>
        <%			} %>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>
<div class="container" role="main">
  <div class="getGeolocation">Google Geolocation Placeholder. Enable your Location/GPS for this to work.</div>
  <div class="col-lg-7" style="height:400px;">
    <div id="map-canvas"></div>
  </div>
  <div class="col-lg-5">
    <div class="scrollableTableContainer">
      <table class="tableLegend">
        <tr>
          <td id="legend"></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
<!-- Latest compiled and minified JavaScript --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<script src="js/lightbox.js"></script> 
<script src="js/googleMapAPI.js"></script>
</body>

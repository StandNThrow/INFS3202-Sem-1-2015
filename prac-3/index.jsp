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
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/lightbox.css" type="text/css">
<link rel="shortcut icon" href="images/favicon.png">
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
        <li><a href="admin.jsp">Admin Panel</a></li>
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
<div class="getGeolocation">Google Geolocation Placeholder. Enable your Location/GPS for this to work.</div>
<div class="container" role="main">
  <div class="col-lg-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="badge">1</span> Taro's Ramen &amp; Cafe</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4"><a href="images/taro-ramen-akatonkotsu.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/taro-ramen-akatonkotsu.jpg" /></a></div>
          <div class="col-lg-8">
            <p>Address: 363 Adelaide Street, Brisbane QLD 4000<br />
              Phone: (07) 3832 6358</p>
            <div class="more-panel">
              <div class="moreInfo-panel">
                <p>The produce that requires freshness is sought out locally and dry goods etc are gathered from personally trusted suppliers in Japan. Please enjoy the &quot;real flavor&quot; Taro has created by using the best ingredients and his best recipes.</p>
              </div>
              <a class="btn btn-primary moreInfo">More Info...</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="badge">2</span>Thai Nakonlanna</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4"><a href="images/thai-nakonlanna-basil-stir-fry.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/thai-nakonlanna-basil-stir-fry.jpg" /></a></div>
          <div class="col-lg-8">
            <p>Address: 6/225 Hawken Drive, St Lucia QLD 4067<br />
              Phone: (07) 3719 5556</p>
            <div class="more-panel">
              <div class="moreInfo-panel">
                <p>Catered mostly to University of Queensland (UQ) students, this Thai restaurant, located in Hawken Village (on Hawken Drive), is a nice little restaurant that offers decent Thai food. They offer a lunch special, with an entree for just a little bit more.</p>
              </div>
              <a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info...</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="badge">3</span>Madtong San II</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4"><a href="images/madtongsan-bibimbap.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/madtongsan-bibimbap.jpg" /></a></div>
          <div class="col-lg-8">
            <p>Address: 1/85 Elizabeth Street, Brisbane QLD 4000<br />
              Phone:(07) 3003 1881</p>
            <div class="more-panel">
              <div class="moreInfo-panel">
                <p>Offering one of the best Korean Cuisine, Madtong San is located in Elizabeth Street at downtown city of Brisbane which offers a variety of authentic Korean food. If you are a fan of Korean food and misses them while studying in Australia, head on down!</p>
              </div>
              <a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info...</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="badge">4</span>FantAsia (Queen St)</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4"><a href="images/fantasia-beijing-noodles.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/fantasia-beijing-noodles.jpg" /></a></div>
          <div class="col-lg-8">
            <p>Address: 255 Queen Street, MacArthur Central, Brisbane QLD 4000<br />
              Phone:(07) 3221 8881</p>
            <div class="more-panel">
              <div class="moreInfo-panel">
                <p>FantAsia sets the benchmark for modern Asian cuisine in Australia, delivering fantastic, fast Asian food. FantAsia’s menu is built on using the freshest seasonal produce and employing traditional cooking methods, ensuring authentic Asian flavours are apparent in every bite.</p>
              </div>
              <a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info...</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-7" style="height:400px;">
    <div id="map-canvas"></div>
  </div>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
<!-- Latest compiled and minified JavaScript --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<script src="js/lightbox.js"></script> 
<script src="js/googleMapAPI.js"></script> 
<script src="js/main.js"></script>
</body>

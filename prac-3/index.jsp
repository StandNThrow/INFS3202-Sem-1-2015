<%@page contentType="text/html" pageEncoding="UTF-8" import="java.lang.*,java.io.*,java.util.*" errorPage="error.jsp"%>
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
        <% } %>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</nav>
<%
String inputPath = application.getRealPath("prac-3/data") + File.separatorChar;
%>
<div class="getGeolocation">Google Geolocation Placeholder. Enable your Location/GPS for this to work.</div>
<div class="container" role="main">
  <div class="col-lg-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="badge">A</span> Taro's Ramen &amp; Cafe</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4"><a href="images/taro-ramen-akatonkotsu.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/taro-ramen-akatonkotsu.jpg" /></a></div>
          <div class="col-lg-8">
            <p>
            <%

            String fileName1 = "data1.txt";
            BufferedReader bufferedReader1 = null;
            FileReader fileReader1;

            fileReader1 = new FileReader (new File(inputPath + fileName1));
            bufferedReader1 = new BufferedReader (fileReader1);

            String line1 = bufferedReader1.readLine();
            List<String> lines1 = new ArrayList<String>();
            while (line1 != null)
              {
            lines1.add(line1);
            line1 = bufferedReader1.readLine();
          }

                                      String[] linesArray1 = lines1.toArray(new String[]{});
                                      
                                      bufferedReader1.close();  
   
        %>
            <% 
            out.println("Address: " + linesArray1[1]);
            out.println("<br>");
            out.println("Phone: " + linesArray1[2]);
            %>
          </p>
            <div class="more-panel">
              <div class="moreInfo-panel">
                <blockquote>
                  <%
                  out.println(linesArray1[4]);
                  %>
                </blockquote>
              </div>
              <a class="btn btn-primary moreInfo">More Info</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="badge">B</span>Thai Nakonlanna</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4"><a href="images/thai-nakonlanna-basil-stir-fry.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/thai-nakonlanna-basil-stir-fry.jpg" /></a></div>
          <div class="col-lg-8">
            <p>Address: 6/225 Hawken Drive, St Lucia QLD 4067<br />
              Phone: (07) 3719 5556</p>
            <div class="more-panel">
              <div class="moreInfo-panel">
                <blockquote>
                  <%  
                            String fileName2 = "data2.txt";  
                            BufferedReader bufferedReader2 = null;  
                            FileReader fileReader2;
                                          
                            try {  
                                fileReader2 = new FileReader (new File(inputPath + fileName2));  
                                bufferedReader2 = new BufferedReader (fileReader2);
                                String line2 = bufferedReader2.readLine();  
                                List<String> lines2 = new ArrayList<String>();
                                  while (line2 != null) {  
                                    lines2.add(line2);
                                    line2 = bufferedReader2.readLine();
                                    }

                                    String[] linesArray2 = lines2.toArray(new String[]{});
                                    out.println(linesArray2[4]);
                                    bufferedReader2.close();  
                               } 
                 catch (Exception e) {
                   out.println(e);
              }
			  %>
                </blockquote>
              </div>
              <a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="badge">C</span>Madtong San II</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4"><a href="images/madtongsan-bibimbap.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/madtongsan-bibimbap.jpg" /></a></div>
          <div class="col-lg-8">
            <p>Address: 1/85 Elizabeth Street, Brisbane QLD 4000<br />
              Phone:(07) 3003 1881</p>
            <div class="more-panel">
              <div class="moreInfo-panel">
                <blockquote>
                  <%  
                            String fileName3 = "data3.txt";  
                            BufferedReader bufferedReader3 = null;  
                            FileReader fileReader3;
                                          
                            try {  
                                fileReader3 = new FileReader (new File(inputPath + fileName3));  
                                bufferedReader3 = new BufferedReader (fileReader3);
                                String line3 = bufferedReader3.readLine();  
                                List<String> lines3 = new ArrayList<String>();
                                  while (line3 != null) {  
                                    lines3.add(line3);
                                    line3 = bufferedReader3.readLine();
                                    }

                                    String[] linesArray3 = lines3.toArray(new String[]{});
                                    out.println(linesArray3[4]);
                                    bufferedReader3.close();  
                               } 
                 catch (Exception e) {
                   out.println(e);
              }
			  %>
                </blockquote>
              </div>
              <a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="badge">D</span>FantAsia (Queen St)</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-4"><a href="images/fantasia-beijing-noodles.jpg" data-lightbox="restaurant"><img class="imgLightbox" src="images/fantasia-beijing-noodles.jpg" /></a></div>
          <div class="col-lg-8">
            <p>Address: 255 Queen Street, MacArthur Central, Brisbane QLD 4000<br />
              Phone:(07) 3221 8881</p>
            <div class="more-panel">
              <div class="moreInfo-panel">
                <blockquote>
                  <%  
                            String fileName4 = "data4.txt";  
                            BufferedReader bufferedReader4 = null;  
                            FileReader fileReader4;
                                          
                            try {  
                                fileReader4 = new FileReader (new File(inputPath + fileName4));  
                                bufferedReader4 = new BufferedReader (fileReader4);
                                String line4 = bufferedReader4.readLine();  
                                List<String> lines4 = new ArrayList<String>();
                                  while (line4 != null) {  
                                    lines4.add(line4);
                                    line4 = bufferedReader4.readLine();
                                    }

                                    String[] linesArray4 = lines4.toArray(new String[]{});
                                    out.println(linesArray4[4]);
                                    bufferedReader4.close();  
                               } 
                 catch (Exception e) {
                   out.println(e);
              }
			  %>
                </blockquote>
              </div>
              <a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info</a> </div>
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

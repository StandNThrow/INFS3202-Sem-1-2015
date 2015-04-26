<%@ page contentType="text/html" pageEncoding="UTF-8" import="java.lang.*,java.io.*,java.util.*" %>
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
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/lightbox.css">
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
									if (sessionUsername == null) {
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
								<%
								String fileName1 = "data1.txt";
								BufferedReader bufferedReader1 = null;
								FileReader fileReader1;

								fileReader1 = new FileReader (new File(inputPath + fileName1));
								bufferedReader1 = new BufferedReader (fileReader1);

								String line1 = bufferedReader1.readLine();
								List<String> lines1 = new ArrayList<String>();

								while (line1 != null) {
								lines1.add(line1);
								line1 = bufferedReader1.readLine();
							}

							String[] linesArray1 = lines1.toArray(new String[]{});
							String[] imagesArray1 = linesArray1[3].split("#");

							bufferedReader1.close();
							%>
							<div class="panel-heading"> <span class="badge">A</span> <b><%=linesArray1[0] %></b> </div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-4">
										<%
										for (int i = 0; i < imagesArray1.length; i++) {
										out.println("<a href=\"" + imagesArray1[i] + "\" data-lightbox=\"" + linesArray1[0] + "\"><img class=\"imgLightbox\" src=\"" + imagesArray1[i] + "\" alt=\"\" /></a>");
									}
									%>
								</div>
								<div class="col-lg-8">
									<p>
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
										<a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info</a> 
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<%
						String fileName2 = "data2.txt";  
						BufferedReader bufferedReader2 = null;  
						FileReader fileReader2;

						fileReader2 = new FileReader (new File(inputPath + fileName2));  
						bufferedReader2 = new BufferedReader (fileReader2);

						String line2 = bufferedReader2.readLine();  
						List<String> lines2 = new ArrayList<String>();

						while (line2 != null) {  
						lines2.add(line2);
						line2 = bufferedReader2.readLine();
					}

					String[] linesArray2 = lines2.toArray(new String[]{});
					String[] imagesArray2 = linesArray2[3].split("#");

					bufferedReader2.close();  
					%>
					<div class="panel-heading"> <span class="badge">B</span> <b><%=linesArray2[0] %></b> </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-4">
								<%
								for (int i = 0; i < imagesArray2.length; i++) {
								out.println("<a href=\"" + imagesArray2[i] + "\" data-lightbox=\"" + linesArray2[0] + "\"><img class=\"imgLightbox\" src=\"" + imagesArray2[i] + "\" alt=\"\" /></a>");
							}
							%>
						</div>
						<div class="col-lg-8">
							<p>
								<% 
								out.println("Address: " + linesArray2[1]);
								out.println("<br>");
								out.println("Phone: " + linesArray2[2]);
								%>
							</p>
							<div class="more-panel">
								<div class="moreInfo-panel">
									<blockquote>
										<%
										out.println(linesArray2[4]);
										%>
									</blockquote>
								</div>
								<a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info</a> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<%  
				String fileName3 = "data3.txt";  
				BufferedReader bufferedReader3 = null;  
				FileReader fileReader3;

				fileReader3 = new FileReader (new File(inputPath + fileName3));  
				bufferedReader3 = new BufferedReader (fileReader3);

				String line3 = bufferedReader3.readLine();  
				List<String> lines3 = new ArrayList<String>();

				while (line3 != null) {  
				lines3.add(line3);
				line3 = bufferedReader3.readLine();
			}

			String[] linesArray3 = lines3.toArray(new String[]{});
			String[] imagesArray3 = linesArray3[3].split("#");

			bufferedReader3.close();
			%>
			<div class="panel-heading"> <span class="badge">C</span> <b><%=linesArray3[0] %></b> </div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-4">
						<%
						for (int i = 0; i < imagesArray3.length; i++) {
						out.println("<a href=\"" + imagesArray3[i] + "\" data-lightbox=\"" + linesArray3[0] + "\"><img class=\"imgLightbox\" src=\"" + imagesArray3[i] + "\" alt=\"\" /></a>");
					}
					%>
				</div>
				<div class="col-lg-8">
					<p>
						<% 
						out.println("Address: " + linesArray3[1]);
						out.println("<br>");
						out.println("Phone: " + linesArray3[2]);
						%>
					</p>
					<div class="more-panel">
						<div class="moreInfo-panel">
							<blockquote>
								<%
								out.println(linesArray3[4]);
								%>
							</blockquote>
						</div>
						<a href="javascript:void(0);" class="btn btn-primary moreInfo">More Info</a> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<%  
		String fileName4 = "data4.txt";  
		BufferedReader bufferedReader4 = null;  
		FileReader fileReader4;

		fileReader4 = new FileReader (new File(inputPath + fileName4));  
		bufferedReader4 = new BufferedReader (fileReader4);
		String line4 = bufferedReader4.readLine();  
		List<String> lines4 = new ArrayList<String>();

		while (line4 != null) {  
		lines4.add(line4);
		line4 = bufferedReader4.readLine();
	}

	String[] linesArray4 = lines4.toArray(new String[]{});
	String[] imagesArray4 = linesArray4[3].split("#");

	bufferedReader4.close();
	%>
	<div class="panel-heading"> <span class="badge">D</span> <b><%=linesArray4[0] %></b> </div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-4">
				<%
				for (int i = 0; i < imagesArray4.length; i++) {
				out.println("<a href=\"" + imagesArray4[i] + "\" data-lightbox=\"" + linesArray4[0] + "\"><img class=\"imgLightbox\" src=\"" + imagesArray4[i] + "\" alt=\"\" /></a>");
			}
			%>
		</div>
		<div class="col-lg-8">
			<p>
				<% 
				out.println("Address: " + linesArray4[1]);
				out.println("<br>");
				out.println("Phone: " + linesArray4[2]);
				%>
			</p>
			<div class="more-panel">
				<div class="moreInfo-panel">
					<blockquote>
						<%
						out.println(linesArray4[4]);
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
</html>
<%@page import="java.util.*" %> 
<%@page import="java.io.*"%>
<%@ page import="java.sql.*" %>
<%@ page import="org.json.*" %>



<html> 

<head>
<title>Promo 1</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/json2.js"></script>   
<script type="text/javascript" src="js/prototype.js"></script>   
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6cufLFhHezckUrRhYOv_IV_EZ-g7cPeg&sensor=SET_TO_TRUE_OR_FALSE"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


<script type="text/javascript">
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

   function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var Brisbane = new google.maps.LatLng(-27.470851, 153.023336);
    var myOptions = {
      zoom:14,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: Brisbane
    }
    map = new google.maps.Map(document.getElementById("map_canvas_cor"), myOptions);
    directionsDisplay.setMap(map);
  }
  
  function calcRoute(coor) {
    var start = coor;
    var end = '-27.485436, 152.990177';
    var request = 
{        origin:start, 
        destination:end,
        travelMode: google.maps.DirectionsTravelMode.WALKING
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });
  }


function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }



function showPosition(position)
  {
  var lat = position.coords.latitude;
  var lon = position.coords.longitude;

  var coor = lat + ", " + lon;
  calcRoute(coor);
  }

</script>


</head>

<body onload="initialize()">

<%
    String url = "jdbc:mysql://localhost:3306/leon"; 
    Class.forName("com.mysql.jdbc.Driver"); 
    Connection con = DriverManager.getConnection(url,"leon", "leon"); 

    Statement statement = con.createStatement();
    String selectQuery = "SELECT * FROM MyPromotions WHERE promoID = 1";
    String commentsQuery = "SELECT comments FROM MyComments WHERE promoID = 1";
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

    <div class="comments_wrapper">

        <div class="display_comments_div">
            <button type="button" onclick="showComments()">Display Comments</button>

            <div id="comments_box" class="comments_box"></div>
        </div>    

        <div id="add_comment_div" class="add_comment_div">
            <form>
                Comment<input type="text" id="comment" name="response_comment"><br>
                <button type="button" onclick="addComments2()">Add Comment</button>
            </form>
            <div id="response_div"></div>
        </div>

    </div> 

    <div>
        <button onclick="getLocation()">Get Directions!</button>
    </div>


    <div id="map_canvas_cor" style="width:400px; height:400px"></div>


    <script type="text/javascript">


        function showComments(str) {
            var str="<%=commentsQuery%>";
            var xmlhttp;    
            if (str=="")
              {
              document.getElementById("resultsText").innerHTML="";
              return;
              }

            if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
            }
            else{
            // code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("comments_box").innerHTML=xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET","fetch_comments.jsp?q="+str,true);
            xmlhttp.send();
        }


        function addComments() {
            var com= document.getElementById("comment").value;
            var comjson = '{"comments":{"promoID":"1", "comment":"'+com+'"}}';
            var obj = eval("("+comjson+")");
          //  alert(obj);
             new Ajax.Request("add_comments.jsp",
                    {
                        method:"post",
                        parameters:"strJSON=" + obj,
                        onComplete: Respond
                    }
                );
            }

        function Respond(REQ) {
             document.getElementById("response_div").innerHTML=REQ.responseText;
           // window.location('add_comments.jsp?q="'+obj+'"');
        }


        function addComments2() {
            var com= document.getElementById("comment").value;
            document.getElementById("response_div").innerHTML="";
            var objJSON = '{"comments":{"promoID":"1", "comment":"'+com+'"}}';
            var strJSON = encodeURIComponent(JSON.stringify(objJSON));
            console.log(strJSON);
            new Ajax.Request("add_comments.jsp",
                    {
                        method:"get",
                        parameters:"q=" + strJSON,
                        onComplete: Respond
                    }
                );
            }

        function Respond(REQ) {
             document.getElementById("response_div").innerHTML=REQ.responseText;
        } 

    </script>
</body>

<%
    }
    statement.close(); 
    con.close(); 
%>
</html>
<!doctype html>
<html>
<head>
<title>Asianic Food Culture</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link href="css/lightbox.css" rel="stylesheet" />
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/googleMapAPI.js"></script>
<script src="js/main.js"></script>
</head>
<body onload="ifIndex();">
<div id="container">
  <?php include('header.php');
if ($_GET['handler'])
{
       echo '<div class="welcomeMsg">' . base64_decode(urldecode($_GET['handler'])) . '</div>';
}
?>
  <div class="getGeolocation">Google Geolocation Placeholder</div>
  <div class="clear"></div>
  <div class="column-left">
    <h2>Location</h2>
    <div id="map-canvas"></div>
  </div>
  <div class="column-right">
    <h2>Restaurants</h2>
    <div class="scrollableTableContainer">
      <table class="tableLegend">
        <tr>
          <td id="legend"></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="clear"></div>
  <?php include('footer.php'); ?>
</div>
<script type="text/javascript">
    var loginTimeout = <?php echo $_SESSION['Timeout']; ?>;
    var loggedIn = <?php echo $_SESSION['isLoggedIn']; ?>;
    if(loggedIn) {
        $(function() {
            initCountdown(loginTimeout);
        });
    }
</script>
<script>
function ifIndex() {
	document.getElementById("toIndex").removeAttribute("href");
}
</script>
</body>
</html>
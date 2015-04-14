<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/main.js"></script>
<script src="js/googleMapAPI.js"></script>
</head>

<body onLoad="disableBtn();">
<?php include('header.php'); include('login_action.php'); ?>
<form name="formLogin" id="formLogin" class="formLogin" method="post">
  <?php if(isset($msg)){?>
  <tr>
    <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
  </tr>
  <?php } ?>
  <ul>
    <li><span style="color:blue;">Not a member? Join Now!</span></li>
    <li>
      <input type="text" name="Username" placeholder="Email/Username" required>
    </li>
    <li>
      <input type="password" name="Password" placeholder="Password" required>
    </li>
    <li> <!--<a href="#" style="text-decoration:none;color:red;">Forget my Password</a>--> <span style="color:red;">Forget my Password</span></li>
    <li>
      <p>Stay Logged in for:
        <select name="Timeout">
          <option value="10" selected="selected">10 Sec</option>
          <option value="30">30 Sec</option>
          <option value="86400">1 Day</option>
        </select>
      </p>
    </li>
    <li>
      <button name="Submit" id="btnLogin" class="btnLogin" type="submit">Login</button>
      <!--<button name="Clear" id="btnClear" class="btnClear" type="reset">Clear</button>--> 
    </li>
  </ul>
</form>
<?php include('footer.php'); ?>
<script>
function disableBtn()
{
	document.getElementById("navLoginBtn").disabled=true;
}
</script> 
<!--<script type="text/javascript">
    var loginTimeout = "";
    var loggedIn = false;
    if(loggedIn) {
        $(function() {
            initCountdown(loginTimeout);
        });
    }
</script>-->
</body>
</html>

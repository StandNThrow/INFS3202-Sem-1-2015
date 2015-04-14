<div id="header"> <a href="index.php" id="toIndex">Asianic Food Culture</a>
  <?php session_start(); /* Starts the session */
if(isset($_SESSION['Username'])){
	echo "<button id=\"navLogoutBtn\" class=\"navBtn\" type=\"button\" onClick=\"javascript:location.href='logout.php';\">Logout</button>";
}
	else{
		echo "<button id=\"navLoginBtn\" class=\"navBtn\" type=\"button\" onClick=\"javascript:location.href='login.php';\">Login</button>";
	}
  ?>
</div>

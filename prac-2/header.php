<div id="header"> <a href="index.php" id="toIndex">Asianic Food Culture</a>
  <?php session_start(); /* Starts the session */
if(isset($_SESSION['Username'])){
	echo '<a href="logout.php"><button id="navLogoutBtn" class="navBtn" type="button">Logout</button></a>';
}
	else{
		echo '<a href="login.php"><button id="navLoginBtn" class="navBtn" type="button">Login</button></a>';
	}
  ?>
  </ul>
</div>

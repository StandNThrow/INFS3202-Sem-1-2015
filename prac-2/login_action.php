<?php /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		$logins = array('INFS' => '3202','infs' => '3202');
		
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		$Timeout = isset($_POST['Timeout']) ? $_POST['Timeout'] : '';
		
		/* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['Username']=$Username;
			$_SESSION['Timeout']=$Timeout;
			$_SESSION['isLoggedIn']="true";
			header('location:index.php?handler=' . urlencode(base64_encode('You have logged in successfully. Your session will timeout in: ' . $Timeout . 's<br>Welcome back, ' . $_SESSION["Username"])));
			
			date_default_timezone_set('Australia/Brisbane');
			$log  = date("Y-m-d H:i") . " " . $Username . " Login" .PHP_EOL;
			
			file_put_contents('./log.txt', $log, FILE_APPEND);
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
		}
	}
?>
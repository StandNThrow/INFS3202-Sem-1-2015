<?php 
/* Set timezone to Brisbane */
date_default_timezone_set('Australia/Brisbane');
/* Check Login form submitted */
if(isset($_POST['Submit']))
{
	/* Define username and associated password array */
	$logins = array('INFS' => '3202', 'infs' => '3202');
	
	/* Check and assign submitted Username and Password */
	$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
	$Timeout = isset($_POST['Timeout']) ? $_POST['Timeout'] : '';
	
	/* Check Username and Password existence in defined array */		
	if (isset($logins[$Username]) && $logins[$Username] == $Password)
	{
		/* Success: Set session variables and redirect to Homepage  */
		$_SESSION['Username']	=	$Username;
		$_SESSION['Start']		=	time();
		$_SESSION['Timeout']	=	$Timeout;
		$_SESSION['isLoggedIn']	=	"true";
		
		header('location:index.php?handler=' . urlencode(base64_encode('You have logged in successfully. Your session will timeout in: ' . $Timeout . 's<br>Welcome back, ' . $_SESSION["Username"])));
		
		$log  = date("Y-m-d H:i") . " " . $Username . " Login" . PHP_EOL;
		
		file_put_contents('../logs/log.txt', $log, FILE_APPEND);
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
			$log  = date("Y-m-d H:i") . " " . $Username . " Failed to login" . PHP_EOL;
			file_put_contents('../logs/log.txt', $log, FILE_APPEND);
		}
	}
?>
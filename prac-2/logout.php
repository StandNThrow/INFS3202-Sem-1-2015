<?php 
session_start(); /* Starts the session */
session_destroy(); /* Destroy started session */
/*header("location:index.php");  /* Redirect to index page */
header('location:index.php?handler=' . urlencode(base64_encode("You have been successfully logged out!")));
?>
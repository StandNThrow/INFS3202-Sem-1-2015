<?php
    session_start();
    if(!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $countdown_time = $_POST['countdown_time'];

        $correct_user1 = "infs";
        $correct_user2 = "INFS";
        $correct_pass = "3202";
        $user_error=null;
        $password_error=null;

        if(empty($username) || $username != $correct_user1 && $username != $correct_user2){
            $user_error="Username Error";
        } 

        if(empty($password) || $password != $correct_pass){
            $password_error="Password Error";
        }


        if ($user_error!=null || $password_error!=null){
            header("Location: login_page.php?error1=$user_error&error2=$password_error");
        }
        else {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['countdown_time'] = $countdown_time;
            date_default_timezone_set('Australia/Brisbane');
            $date = date('d/m/y');
            $time = date('G:i:s');

            $content = "\r\n" . "User: " . $_SESSION['username']." logged-in  on ". $date . " at " . $time ;
            $fileopen = fopen($_SERVER['Document_ROOT'] . "/tmp/test.txt","a");
            fwrite($fileopen,$content);
            fclose($fileopen);
            header("Location: home.php");
        }
    }
?>
<?php


    setcookie('custnamecookie', "", time() - (86400 * 40), "/");
    setcookie('custidcookie', "", time() - (86400 * 40), "/");
    setcookie('custtypecookie', "", time() - (86400 * 40), "/");
    setcookie('custtoken', "", time() - (86400 * 40), "/");

   

    header("location:login.php");


?>

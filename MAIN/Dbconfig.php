
<?php


    $host="localhost";
    $port=3306;
    $socket="";
    $user="root";
    $password="Techstas@123";
    $dbname="matrimony_jose";

    date_default_timezone_set('Asia/Kolkata');


    $con = mysqli_connect($host, $user, $password, $dbname, $port, $socket);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    $ApiBaseUrl = 'http://127.0.0.1:8000';

    $WhatsappApiKey = '0c478c3427114df183a24a072469b10c';
    
?>
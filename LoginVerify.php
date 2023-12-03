<?php

include './MAIN/Dbconfig.php';


if (isset($_POST['UserName'])) {


    $UserName = urlencode($_POST['UserName']);
    $Password = urlencode($_POST['UserPassword']);


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => ''.$ApiBaseUrl.'/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'userName=' . $UserName . '&password=' . $Password . '',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    //echo $response;

    $loginResults = json_decode($response);

    $Status = $loginResults->status;

    if ($Status == true) {
        $Message = $loginResults->message;
        $AccessToken = $loginResults->access_token;
        $TokenType = $loginResults->token_type;
        $Role = $loginResults->Role;
        $EmpId = $loginResults->EmpId;
        $EmpName = $loginResults->EmpName;
        $Token = $TokenType.' '.$AccessToken;

        setcookie('custnamecookie', $EmpName, time() + (86400 * 2), "/");
        setcookie('custidcookie', $EmpId, time() + (86400 * 2), "/");
        setcookie('custtypecookie', $Role, time() + (86400 * 2), "/");
        setcookie('custtoken', $Token, time() + (86400 * 2), "/");
    }
    else{
        $Message =  $loginResults->message;
        $Role = '';
    }





    echo json_encode(array('status' => $Status, 'message' => $Message, 'Role' => $Role));
}

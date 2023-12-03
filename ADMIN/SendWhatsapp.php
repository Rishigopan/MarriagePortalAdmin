<?php

include '../MAIN/Dbconfig.php';
$UserID = 1;
$DateNow = date('Y-m-d h:i:s'); 


// Send Profile Data
if (isset($_POST['SendImageData'])) {

    $SendImageData = $_POST['SendImageData'];

    $SendImageDataArray1 = explode(";", $SendImageData);
    $SendImageDataArray2 = explode(",", $SendImageDataArray1[1]);
    $ImageData = base64_decode($SendImageDataArray2[1]);
    $DataType = $_POST['DataTypeSend'];

    switch ($DataType) {
        case "FD":
            $Data = 'custdata';
            break;
        case "PD":
            $Data = 'paiddata';
            break;
        case "MD":
            $Data = 'marriagedata';
            break;
        case "WD":
            $Data = 'weddingdata';
            break;
    }

    $SendingArray = implode(",", $_POST['SendingId']);

    $SendingNumberList = '';

    $ImageName = "SenderImage" . rand(100000, 999999) . '.jpg';

    $ImageDestination = '../SENDIMAGES/' . $ImageName;

    if (file_put_contents($ImageDestination, $ImageData)) {

        $SendingImage =  "https://" . $_SERVER['HTTP_HOST'] . "/SENDIMAGES/$ImageName";

        $FindWhatsappNumbers = mysqli_query($con, "SELECT whatsappNumber FROM $Data WHERE custId IN ($SendingArray)");
        if (mysqli_num_rows($FindWhatsappNumbers) > 0) {
            foreach ($FindWhatsappNumbers as $FindWhatsappNumbersResult) {
                if (trim($FindWhatsappNumbersResult['whatsappNumber']) != '') {
                    $SendingNumberList .= "," . $FindWhatsappNumbersResult['whatsappNumber'];
                } else {
                }
            }
        }

        $SendingNumberList = ltrim($SendingNumberList, ',');

        $SendUrl = 'https://whatsappapi.pingme.co.in/wapp/api/send?apikey=' . $WhatsappApiKey . '&mobile=' . $SendingNumberList . '&msg=YourMatches' . '&img1=' . $SendingImage . '';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $SendUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_close($curl);
        $data = curl_exec($curl);
        $SendResult = json_decode($data);


        if ($SendResult->status == 'success') {
            $UpdateTables = mysqli_query($con, "UPDATE $Data SET profileSend = 'YES', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE custId IN ($SendingArray)");
            if ($UpdateTables) {
                echo json_encode(array('SendProfile' => 1));
            } else {
                echo json_encode(array('SendProfile' => 2));
            }
            //echo json_encode(array('SendProfile' => 3));
        }

        //print_r($SendResult);

    } else {
        echo json_encode(array('SendProfile' => 2));
    }
}


// Receive Profile Data
if (isset($_POST['ReceivingId'])) {


    $ReceiverId = $_POST['ReceivingId'];
    $ReceiveImageArray = $_POST['ReceiveImageData'];
    $DataType = $_POST['DataTypeReceive'];
    $ImagesCount = count($ReceiveImageArray);
    $SendCounter = 0;
    switch ($DataType) {
        case "FD":
            $Data = 'custdata';
            break;
    }

    $FindWhatsappNumber = mysqli_query($con, "SELECT whatsappNumber FROM $Data WHERE custId = $ReceiverId");
    if (mysqli_num_rows($FindWhatsappNumber) > 0) {
        foreach ($FindWhatsappNumber as $FindWhatsappNumberResult) {
            $ReceiverWhatsapp = $FindWhatsappNumberResult['whatsappNumber'];
        }
    }

    foreach ($ReceiveImageArray as $ReceiveImageArrayResults) {

        $SendImageDataArray1 = explode(";", $ReceiveImageArrayResults);
        $SendImageDataArray2 = explode(",", $SendImageDataArray1[1]);
        $ImageData = base64_decode($SendImageDataArray2[1]);
        $ImageName = "ReceiverImage" . rand(100000, 999999) . '.jpg';
        $ImageDestination = '../SENDIMAGES/' . $ImageName;

        if (file_put_contents($ImageDestination, $ImageData)) {

            $SendingImage =  "https://" . $_SERVER['HTTP_HOST'] . "/SENDIMAGES/$ImageName";

            $SendUrl = 'https://whatsappapi.pingme.co.in/wapp/api/send?apikey=' . $WhatsappApiKey . '&mobile=' . $SendingNumberList . '&msg=YourMatches' . '&img1=' . $SendingImage . '';

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $SendUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            $data = curl_exec($curl);
            curl_close($curl);

            $ReceiveResults = json_decode($data);

            if ($ReceiveResults->status == 'success') {
                // $UpdateTables = mysqli_query($con, "UPDATE $Data SET profileReceive = 'YES' WHERE custId = ($SendingArray)");
                // if($UpdateTables){

                // }else{

                // }
                $SendCounter++;
            }
        } else {
        }
    }

    if ($SendCounter == $ImagesCount) {
        echo json_encode(array('ReceiveProfile' => 1));
    } else {
        echo json_encode(array('ReceiveProfile' => 2));
    }
}



// Link Send Operation
if (isset($_POST['LinktoSend'])) {

    $SendingLink = $_POST['LinktoSend'];
    //$SendingLink = "hello";
    $LinkSendArray = $_POST['LinkSendingArray'];
    $LinkSendNumberSting = implode(",", $LinkSendArray);
    $LinkSendCount = count($LinkSendArray);
    $LinkSendDataType = $_POST['LinkSendDataType'];
    $LinkSendIdArray = $_POST['LinkSendIdArray'];
    $LinkSendIdString = implode(",", $LinkSendIdArray);
    //$linkSendIncrementor = 0;

    switch ($LinkSendDataType) {
        case "BD":
            $TableName = 'bulkdata';
            break;
        case "LD":
            $TableName = 'leaddata';
            break;
    }


    if ($LinkSendCount > 0) {

        $LinkSendUrl = 'https://whatsappapi.pingme.co.in/wapp/api/send?apikey=' . $WhatsappApiKey . '&mobile=' . $LinkSendNumberSting . '&msg=' . $SendingLink . '';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $LinkSendUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_close($curl);
        $data = curl_exec($curl);
        $LinkSendResult = json_decode($data);

        //print_r($LinkSendResult);


        if ($LinkSendResult->status == 'success') {
            //$linkSendIncrementor ++;
            $LinkSendQuery = "UPDATE $TableName SET bulkStatus = '3', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE bulkId IN ($LinkSendIdString)";
            $UpdateTables = mysqli_query($con, $LinkSendQuery);
            if ($UpdateTables) {
                echo json_encode(array('LinkSend' => 1));
            } else {
                echo json_encode(array('LinkSend' => 2));
            }
        } else {
            //$linkSendIncrementor ++;
            echo json_encode(array('LinkSend' => 2));
        }
    } else {

        echo json_encode(array('LinkSend' => 0));
    }
}

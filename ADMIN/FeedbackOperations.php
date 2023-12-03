<?php


include '../MAIN/Dbconfig.php';

$UserID = 1;
$DateNow = date('Y-m-d h:i:s'); 

// Free data feedbacks
if (isset($_POST['FeedbackCustomerId'])) {

    mysqli_autocommit($con, FALSE);

    
    $CustomerId = $_POST['FeedbackCustomerId'];
    $Feedback = $_POST['FreeFeedBack'];
    $FeedbackRemarks = $_POST['FeedbackRemark'];
    $FeedbackDate = $_POST['FeedbackDate'];
    $FeedbackPartner = $_POST['PartnerPrefer'];
    $FeedbackType = $_POST['FeedbackType'];
    //$FeedbackTime = $_POST['FeedbackCustomerId'];

    switch ($FeedbackType) {
        case 'FD':
          $FeedbackTable = 'custdata';
          break;
        case 'PD':
          $FeedbackTable = 'paiddata';
          break;
        case 'MD':
          $FeedbackTable = 'marriagedata';
          break;
        case 'WD':
          $FeedbackTable = 'weddingdata';
          break;
      }

    $UpdateStatus =  mysqli_query($con, "UPDATE $FeedbackTable SET feedback = '$Feedback', feedbackRemark = '$FeedbackRemarks', feedbackDate = '$FeedbackDate' , lookingFor = '$FeedbackPartner', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE custId = '$CustomerId'");

    if ($UpdateStatus) {
        mysqli_commit($con);
        echo json_encode(array('FeedbackStatus' => 1));
    } else {
        mysqli_rollback($con);
        echo json_encode(array('FeedbackStatus' => 2));
    }
}



// // Free data feedback
// if (isset($_POST['FreeFeedbackCustomerId'])) {

//     mysqli_autocommit($con, FALSE);

//     $CustomerId = $_POST['FreeFeedbackCustomerId'];
//     $Feedback = $_POST['FreeFeedBack'];
//     $FeedbackRemarks = $_POST['FeedbackRemark'];
//     $FeedbackDate = $_POST['FeedbackDate'];
//     $FeedbackPartner = $_POST['PartnerPrefer'];
//     //$FeedbackTime = $_POST['FeedbackCustomerId'];

//     $UpdateStatus =  mysqli_query($con, "UPDATE custdata SET feedback = '$Feedback', feedbackRemark = '$FeedbackRemarks', feedbackDate = '$FeedbackDate' , lookingFor = '$FeedbackPartner', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE custId = '$CustomerId'");

//     if ($UpdateStatus) {
//         mysqli_commit($con);
//         echo json_encode(array('FeedbackStatus' => 1));
//     } else {
//         mysqli_rollback($con);
//         echo json_encode(array('FeedbackStatus' => 2));
//     }
// }


// // Paid data feedback
// if (isset($_POST['PaidFeedbackCustomerId'])) {

//     mysqli_autocommit($con, FALSE);

//     $PaidCustomerId = $_POST['PaidFeedbackCustomerId'];
//     $PaidFeedback = $_POST['PaidFeedback'];
//     $PaidFeedbackRemarks = $_POST['PaidFeedbackRemark'];
//     $PaidFeedbackDate = $_POST['PaidFeedbackDate'];
//     $PaidFeedbackPartner = $_POST['PaidPartnerPrefer'];
//     //$FeedbackTime = $_POST['FeedbackCustomerId'];

//     $UpdatePaidStatus =  mysqli_query($con, "UPDATE paiddata SET feedback = '$PaidFeedback', feedbackRemark = '$PaidFeedbackRemarks', feedbackDate = '$PaidFeedbackDate' , lookingFor = '$PaidFeedbackPartner', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE custId = '$PaidCustomerId'");

//     if ($UpdatePaidStatus) {
//         mysqli_commit($con);
//         echo json_encode(array('PaidFeedbackStatus' => 1));
//     } else {
//         mysqli_rollback($con);
//         echo json_encode(array('PaidFeedbackStatus' => 2));
//     }
// }


// // Marriage data feedback
// if (isset($_POST['MarriageFeedbackCustomerId'])) {

//     mysqli_autocommit($con, FALSE);

//     $MarriageCustomerId = $_POST['MarriageFeedbackCustomerId'];
//     $MarriageFeedback = $_POST['MarriageFeedback'];
//     $MarriageFeedbackRemarks = $_POST['MarriageFeedbackRemark'];
//     $MarriageFeedbackDate = $_POST['MarriageFeedbackDate'];
//     $MarriageFeedbackPartner = $_POST['MarriagePartnerPrefer'];
//     //$FeedbackTime = $_POST['FeedbackCustomerId'];

//     $UpdateMarriageStatus =  mysqli_query($con, "UPDATE marriagedata SET feedback = '$MarriageFeedback', feedbackRemark = '$MarriageFeedbackRemarks', feedbackDate = '$MarriageFeedbackDate' , lookingFor = '$MarriageFeedbackPartner', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE custId = '$MarriageCustomerId'");

//     if ($UpdateMarriageStatus) {
//         mysqli_commit($con);
//         echo json_encode(array('MarriageFeedbackStatus' => 1));
//     } else {
//         mysqli_rollback($con);
//         echo json_encode(array('MarriageFeedbackStatus' => 2));
//     }
// }


// // Wedding data feedback
// if (isset($_POST['WeddingFeedbackCustomerId'])) {

//     mysqli_autocommit($con, FALSE);

//     $WeddingCustomerId = $_POST['WeddingFeedbackCustomerId'];
//     $WeddingFeedback = $_POST['WeddingFeedback'];
//     $WeddingFeedbackRemarks = $_POST['WeddingFeedbackRemark'];
//     $WeddingFeedbackDate = $_POST['WeddingFeedbackDate'];
//     $WeddingFeedbackPartner = $_POST['WeddingPartnerPrefer'];
//     //$FeedbackTime = $_POST['FeedbackCustomerId'];

//     $UpdateWeddingStatus =  mysqli_query($con, "UPDATE weddingdata SET feedback = '$WeddingFeedback', feedbackRemark = '$WeddingFeedbackRemarks', feedbackDate = '$WeddingFeedbackDate' , lookingFor = '$WeddingFeedbackPartner', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE custId = '$WeddingCustomerId'");

//     if ($UpdateWeddingStatus) {
//         mysqli_commit($con);
//         echo json_encode(array('WeddingFeedbackStatus' => 1));
//     } else {
//         mysqli_rollback($con);
//         echo json_encode(array('WeddingFeedbackStatus' => 2));
//     }
// }



//Bulk Data feedback
if (!empty($_POST['BulkDataFeedbackId'])) {

    //print_r($_POST);

    mysqli_autocommit($con, FALSE);

    $BulkFeedbackId = $_POST['BulkDataFeedbackId'];
    $BulkFeedback = $_POST['BulkFeedBack'];
    $BulkFeedbackName = $_POST['BulkDataFeedbackName'];
    $BulkFeedbackDay = $_POST['BulkFeedbackDay'];
    $BulkFeedbackMonth = $_POST['BulkFeedbackMonth'];
    $BulkFeedbackYear = $_POST['BulkFeedbackYear'];
    $BulkFeedbackHour = $_POST['BulkFeedbackHour'];
    $BulkFeedbackFormat = $_POST['BulkFeedbackFormat'];
    $BulkFeedbackRemark = $_POST['BulkDataRemark'];
    $BulkFeedbackReferName = $_POST['BulkDataReferName'];
    $BulkFeedbackReferNumber = $_POST['BulkDataReferNumber'];
    $BulkFeedbackDate = $BulkFeedbackDay . '-' . $BulkFeedbackMonth . '-' . $BulkFeedbackYear . ' / ' . $BulkFeedbackHour . ' ' . $BulkFeedbackFormat;

    $UpdateBulkFeedback = mysqli_query($con, "UPDATE bulkdata SET bulkName = '$BulkFeedbackName', referName = '$BulkFeedbackReferName', referPhone = '$BulkFeedbackReferNumber', bulkStatus = '$BulkFeedback', bulkRemark = '$BulkFeedbackRemark', bulkFeedbackDate = '$BulkFeedbackDate', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE bulkId = '$BulkFeedbackId'");

    if ($UpdateBulkFeedback) {
        mysqli_commit($con);
        echo json_encode(array('BulkFeedbackStatus' => 1));
    }
}



//LeadData Feedback
if (!empty($_POST['LeadDataFeedbackId']) && !empty($_POST['LeadFeedBack'])) {

    //print_r($_POST);

    mysqli_autocommit($con, FALSE);

    $LeadFeedbackId = $_POST['LeadDataFeedbackId'];
    $LeadFeedback = $_POST['LeadFeedBack'];
    $LeadFeedbackName = $_POST['LeadDataFeedbackName'];
    $LeadFeedbackDay = $_POST['LeadFeedbackDay'];
    $LeadFeedbackMonth = $_POST['LeadFeedbackMonth'];
    $LeadFeedbackYear = $_POST['LeadFeedbackYear'];
    $LeadFeedbackHour = $_POST['LeadFeedbackHour'];
    $LeadFeedbackFormat = $_POST['LeadFeedbackFormat'];
    $LeadFeedbackRemark = $_POST['LeadDataRemark'];
    $LeadFeedbackReferName = $_POST['LeadDataReferName'];
    $LeadFeedbackReferNumber = $_POST['LeadDataReferNumber'];
    $LeadFeedbackDate = $LeadFeedbackDay . '-' . $LeadFeedbackMonth . '-' . $LeadFeedbackYear . ' / ' . $LeadFeedbackHour . ' ' . $LeadFeedbackFormat;

    $UpdateLeadFeedback = mysqli_query($con, "UPDATE leaddata SET bulkName = '$LeadFeedbackName', referName = '$LeadFeedbackReferName', referPhone = '$LeadFeedbackReferNumber', bulkStatus = '$LeadFeedback', bulkRemark = '$LeadFeedbackRemark', bulkFeedbackDate = '$LeadFeedbackDate', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE bulkId = '$LeadFeedbackId'");

    if ($UpdateLeadFeedback) {
        mysqli_commit($con);
        echo json_encode(array('LeadFeedbackStatus' => 1));
    }
}


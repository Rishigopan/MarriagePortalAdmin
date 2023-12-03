<?php

if (isset($_COOKIE['custidcookie']) && isset($_COOKIE['custtypecookie'])) {

    if (!empty($_COOKIE['custtoken'])) {
        $Token = $_COOKIE['custtoken'];
    } else {
        header('location:../login.php');
    }
} else {
    header('location:../login.php');
}


$DateToday = date('Y-m-d');
$UserID = $_COOKIE['custidcookie'];
$StatusForDelete = 8;

$DateNow = date('Y-m-d H:i:s'); 

include '../MAIN/Dbconfig.php';

    function VerifyData($data)
    {
        $data = urlencode($data);
        return $data;
    }


    //Assign Staff
    if (isset($_POST['StaffAssignId'])) {
        $AssignStaffId =  $_POST['StaffAssignId'];
        $SelectedCustomers = (isset($_POST['SelectedCustomers']) ? $_POST['SelectedCustomers'] : array()) ; //this is an array
        if($AssignStaffId != '' && count($SelectedCustomers) > 0){
            $DataType = $_POST['DataType']; //DataType 
            switch ($DataType) {
                case 'FD':
                    $TableName = 'custdata';
                    $PrimaryKey = 'custId';
                    break;
                case 'BD':
                    $TableName = 'bulkdata';
                    $PrimaryKey = 'bulkId';
                    break;
                case 'PD':
                    $TableName = 'paiddata';
                    $PrimaryKey = 'paidId';
                    break;
            }
            //print_r($SelectedCustomers);
            foreach ($SelectedCustomers as $SelectedCustomerResults) {
                $AssignCustomerId = $SelectedCustomerResults;
                $AssignAgents = mysqli_query($con, "UPDATE $TableName SET assignedTo = '$AssignStaffId', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE $PrimaryKey = '$AssignCustomerId'");
            }
            if ($AssignAgents) {
                echo json_encode(array('Success' => '1'));
            } else {
                echo json_encode(array('Success' => '2'));
            }
        }
        elseif($AssignStaffId == '' && count($SelectedCustomers) > 0){
            echo json_encode(array('Success' => '3'));
        }elseif($AssignStaffId != '' && count($SelectedCustomers) == 0){
            echo json_encode(array('Success' => '0'));
        }elseif($AssignStaffId == '' && count($SelectedCustomers) == 0){
            echo json_encode(array('Success' => '4'));
        }else{
            echo json_encode(array('Success' => '0'));
        }
        
    }


    
    // if (isset($_POST['StaffUnAssignId'])) {
    //     $UnAssignStaffId =  $_POST['StaffUnAssignId'];
    //     $UnAssignSelectedCustomers = $_POST['UnAssignCustomers']; //this is an array
    //     $DataType = $_POST['DataType']; //DataType 
    //     switch ($DataType) {
    //         case 'FD':
    //             $TableName = 'custdata';
    //             $PrimaryKey = 'custId';
    //             break;
    //         case 'BD':
    //             $TableName = 'bulkdata';
    //             $PrimaryKey = 'bulkId';
    //             break;
    //         case 'PD':
    //             $TableName = 'paiddata';
    //             $PrimaryKey = 'paidId';
    //             break;
    //     }
    //     //print_r($UnAssignSelectedCustomers);
    //     foreach ($UnAssignSelectedCustomers as $UnAssignSelectedCustomerResults) {
    //         $UnAssignCustomerId = $UnAssignSelectedCustomerResults;
    //         $UnAssignAgents = mysqli_query($con, "UPDATE $TableName SET assignedTo = 0 WHERE $PrimaryKey = '$UnAssignCustomerId' AND assignedTo = '$UnAssignStaffId'");
    //     }
    //     if ($UnAssignAgents) {
    //         echo json_encode(array('UnAssign' => '1'));
    //     } else {
    //         echo json_encode(array('UnAssign' => '2'));
    //     }
    // }

    //UnAssign Staff
    if (isset($_POST['StaffUnAssignId'])) {
        $UnAssignStaffId =  $_POST['StaffUnAssignId'];
        $UnAssignSelectedCustomers = (isset($_POST['UnAssignCustomers']) ? $_POST['UnAssignCustomers'] : array()) ; //this is an array
        if($UnAssignStaffId != '' && count($UnAssignSelectedCustomers) > 0){
            $DataType = $_POST['DataType']; //DataType 
            switch ($DataType) {
                case 'FD':
                    $TableName = 'custdata';
                    $PrimaryKey = 'custId';
                    break;
                case 'BD':
                    $TableName = 'bulkdata';
                    $PrimaryKey = 'bulkId';
                    break;
                case 'PD':
                    $TableName = 'paiddata';
                    $PrimaryKey = 'paidId';
                    break;
            }
            //print_r($SelectedCustomers);
            foreach ($UnAssignSelectedCustomers as $UnAssignSelectedCustomerResults) {
                $UnAssignCustomerId = $UnAssignSelectedCustomerResults;
                $UnAssignAgents = mysqli_query($con, "UPDATE $TableName SET assignedTo = 0 , updatedDate = '$DateNow', updatedBy = '$UserID' WHERE $PrimaryKey = '$UnAssignCustomerId' AND assignedTo = '$UnAssignStaffId'");
            }
            if ($UnAssignAgents) {
                echo json_encode(array('UnAssign' => '1'));
            } else {
                echo json_encode(array('UnAssign' => '2'));
            }
        }
        elseif($UnAssignStaffId == '' && count($UnAssignSelectedCustomers) > 0){
            echo json_encode(array('UnAssign' => '3'));
        }elseif($UnAssignStaffId != '' && count($UnAssignSelectedCustomers) == 0){
            echo json_encode(array('UnAssign' => '0'));
        }elseif($UnAssignStaffId == '' && count($UnAssignSelectedCustomers) == 0){
            echo json_encode(array('UnAssign' => '4'));
        }else{
            echo json_encode(array('UnAssign' => '0'));
        }
    }


////////////////////////////Branch Master//////////////////////////////////// 

    //Add Branch
    if (isset($_POST['BranchName'])) {


        $BranchName = $_POST['BranchName'];
        $BranchPrefix = $_POST['BranchPrefix'];
        $BranchEmail = $_POST['BranchEmail'];
        $BranchPhone = $_POST['BranchPhone'];
        $BranchState = $_POST['BranchState'];
        $BranchDistrict = $_POST['BranchDistrict'];
        $BranchCity = $_POST['BranchCity'];
        $BranchAddress = $_POST['BranchAddress'];
        $BranchPan = $_POST['BranchPan'];
        $ImagesDir = '../STAFFIMAGES/IDPROOF/';
        $BranchImagesArray = array();

        $Increment = 0;
        foreach ($_FILES['BranchImage']['tmp_name'] as $key => $tmp_name) {

            $MultipleRandNumber = rand(10000, 99999);
            $MultiFileName = $_FILES['BranchImage']['name'][$key];
            $MultiExtension = pathinfo($MultiFileName, PATHINFO_EXTENSION);
            $NewMultiFileName = $MultiFileName . '_' . $Increment++ . '_' . $MultipleRandNumber . '.' . $MultiExtension;
            $MultiBranchTemp = $_FILES['BranchImage']['tmp_name'][$key];

            if (move_uploaded_file($MultiBranchTemp, $ImagesDir . $NewMultiFileName)) {
               array_push($BranchImagesArray,$NewMultiFileName);
            } else {
                //echo "multi upload Failed";
            }
        }

        $BranchImages = implode(",",$BranchImagesArray);

        $BranchString = 'branchName=' . $BranchName . '&branchPrefix=' . $BranchPrefix . '&email=' . $BranchEmail .'&phoneNumber=' . $BranchPhone . '&state=' . $BranchState . '&branchPan=' . $BranchPan . '&createdBy=' . $UserID . '&createdDate=' . $DateToday . '&district=' . $BranchDistrict . '&city=' . $BranchCity . '&address=' . $BranchAddress.'&branchImages='.$BranchImages.'';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => ''.$ApiBaseUrl.'/api/branch/add',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $BranchString,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $_COOKIE['custtoken'] . ''
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;


    }


    //Edit Branch
    if (isset($_POST['EditBranchData'])) {
        $EditBranchData = $_POST['EditBranchData'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => ''.$ApiBaseUrl.'/api/branch/viewid/' . $EditBranchData . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $Token . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    //Update Branch
    if (isset($_POST['UpdatebranchId'])) {

        $UpdateBranchId = VerifyData($_POST['UpdatebranchId']);
        $UpdateBranchName = VerifyData($_POST['UpdatebranchName']);
        $UpdateBranchPrefix = VerifyData($_POST['UpdatebranchPrefix']);
        $UpdateBranchEmail = VerifyData($_POST['Updateemail']);
        $UpdateBranchPhone = VerifyData($_POST['Updatephone']);
        $UpdateBranchState = VerifyData($_POST['UpdateBranchState']);
        $UpdateBranchDistrict = VerifyData($_POST['UpdateBranchDistrict']);
        $UpdateBranchCity = VerifyData($_POST['UpdateBranchCity']);
        $UpdateBranchAddress = VerifyData($_POST['Updateaddress']);
        $UpdateBranchPan = VerifyData($_POST['UpdateBranchPan']);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => ''.$ApiBaseUrl.'/api/branch/update/' . $UpdateBranchId . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'branchName=' . $UpdateBranchName . '&branchPrefix=' . $UpdateBranchPrefix . '&email=' . $UpdateBranchEmail . '&phoneNumber=' . $UpdateBranchPhone . '&state=' . $UpdateBranchState . '&district=' . $UpdateBranchDistrict . '&branchPan=' . $UpdateBranchPan . '&updatedBy=' . $UserID . '&updatedDate=' . $DateToday . '&city=' . $UpdateBranchCity . '&address=' . $UpdateBranchAddress . '',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $_COOKIE['custtoken'] . '',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    //Delete Branch
    if (isset($_POST['DeleteBranch'])) {
        $DeleteBranch = $_POST['DeleteBranch'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => ''.$ApiBaseUrl.'/api/branch/delete/' . $DeleteBranch . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $_COOKIE['custtoken'] . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    
    //Delete Branch Images
    if(isset($_POST['DeleteImageId'])){
        $ImageId = $_POST['DeleteImageId'];
        $FolderName = '../STAFFIMAGES/IDPROOF/';

        $FindImageName = mysqli_query($con, "SELECT imageName,imageActive FROM masterimages WHERE imageId = '$ImageId'");
        foreach($FindImageName as $FindImageNameResult){
            $ImageName = $FolderName.$FindImageNameResult['imageName'];
            $CheckIfMain = $FindImageNameResult['imageActive'];
        }
        
        $DeleteImage = mysqli_query($con, "DELETE FROM masterimages WHERE imageId = '$ImageId'");
        if($DeleteImage){
            if(file_exists($ImageName)){
                unlink($ImageName);
            }
            echo json_encode(array('DeleteImage' => 1));
        }
        else{
            echo json_encode(array('DeleteImage' => 2));
        }
        


        

        ////Prevent deleting main image
        // if( $CheckIfMain == 'YES'){
        //     echo json_encode(array('DeleteImage' => 0));
        // }else{
        //     $DeleteImage = mysqli_query($con, "DELETE FROM masterimages WHERE imageId = '$ImageId'");
        //     if($DeleteImage){
        //         if(file_exists($ImageName)){
        //             unlink($ImageName);
        //         }
        //         echo json_encode(array('DeleteImage' => 1));
        //     }
        //     else{
        //         echo json_encode(array('DeleteImage' => 2));
        //     }
        // }
        
    }



    //Make Branch Images Primary
    if(isset($_POST['PrimaryImageId'])){

        $PrimaryImageId = $_POST['PrimaryImageId'];
        $PrimaryMasterId = $_POST['PrimaryMasterId'];
        if(isset($_POST['MakeMainType'])){

            $MakeMainType = $_POST['MakeMainType'];
            $DataType = $_POST['DataType'];
            switch ($DataType) {
                case ('FD'):
                    $TableName = 'custdata';
                    break;
                case ('PD'):
                    $TableName = 'paiddata';
                    break;
                case ('MD'):
                    $TableName = 'marriagedata';
                    break;
                case ('WD'):
                    $TableName = 'weddingdata';
                    break;
            }

            $PrimaryImage = mysqli_query($con, "UPDATE $TableName SET mainImage = '$PrimaryImageId' WHERE custId = '$PrimaryMasterId'");
            if($PrimaryImage){
                echo json_encode(array('PrimaryImage' => 1));
            }
            else{
                echo json_encode(array('PrimaryImage' => 2));
            } 
           

        }else{
            $MakeAllAsNO = mysqli_query($con, "UPDATE masterimages SET imageActive = 'NO' WHERE masterId = '$PrimaryMasterId'");
            if($MakeAllAsNO){
                $PrimaryImage = mysqli_query($con, "UPDATE masterimages SET imageActive = 'YES' WHERE imageId = '$PrimaryImageId'");
                if($PrimaryImage){
                    echo json_encode(array('PrimaryImage' => 1));
                }
                else{
                    echo json_encode(array('PrimaryImage' => 2));
                } 
            }else{
                echo json_encode(array('PrimaryImage' => 2));
            }
        }

    }



    //Image Upload
    if (!empty($_FILES["AdditionalImage"]["name"])) {
        
        $Folder = "../STAFFIMAGES/IDPROOF/";
        $FormName = $_POST['ImageFormName'];
        $MasterId = $_POST['UploadMasterId'];
        $ImageCount = count($_FILES['AdditionalImage']['tmp_name']);
        $Increment = 0;
        foreach ($_FILES['AdditionalImage']['tmp_name'] as $key => $tmp_name) {
            $MultipleRandNumber = rand(10000, 99999);
            $MultiFileName = $_FILES['AdditionalImage']['name'][$key];
            $MultiExtension = pathinfo($MultiFileName, PATHINFO_EXTENSION);
            $NewMultiFileName = $MultiFileName . '_' . $Increment . '_' . $MultipleRandNumber . '.' . $MultiExtension;
            $MultiBranchTemp = $_FILES['AdditionalImage']['tmp_name'][$key];
            if (move_uploaded_file($MultiBranchTemp, $Folder . $NewMultiFileName)) {
                $FindMaxMaster = mysqli_query($con, "SELECT MAX(imageId) AS MAX FROM masterimages");
                foreach($FindMaxMaster as $FindMaxMasterResult){
                    $ImageMax = $FindMaxMasterResult['MAX'] + 1 ;
                }
                $InsertIntoDb = mysqli_query($con, "INSERT INTO masterimages (`imageId`,`masterId`,`masterForm`,`imageName`) 
                VALUES('$ImageMax','$MasterId','$FormName','$NewMultiFileName')");
                if($InsertIntoDb){
                    $Increment++;
                    //echo json_encode(array('ImageUpload' => true));
                }
            } else {
                //echo "multi upload Failed";
            }
        }

        if($ImageCount == $Increment){
        $FormName = $_POST['ImageFormName'];
            $CheckIfAnyPrimary = mysqli_query($con, "SELECT imageActive FROM masterimages WHERE masterId = '$MasterId' AND masterForm = '$FormName' AND imageActive = 'YES'");
            if(mysqli_num_rows($CheckIfAnyPrimary) > 0){
                echo json_encode(array('Status' => true,'Code' => 1));
            }else{
                $MakeAnyPrimary = mysqli_query($con, "UPDATE masterimages SET imageActive = 'YES' WHERE imageId = '$ImageMax'");
                if($MakeAnyPrimary){
                    echo json_encode(array('Status' => true,'Code' => 1));
                }else{
                    echo json_encode(array('Status' => true, 'Code' => 2));
                }
            }
            //echo json_encode(array('Status' => true,'Code' => 1));
        }else{
            echo json_encode(array('Status' => true, 'Code' => 2));
        }
      
    }


////////////////////////////Branch Master//////////////////////////////////// 




////////////////////////////Agency Master//////////////////////////////////// 

    if (isset($_POST['AgencyName'])) {

        $AgencyName = $_POST['AgencyName'];
        $AgencyPrefix = $_POST['AgencyPrefix'];
        $BranchId = $_POST['AgencyBranch'];
        $AgencyEmail = $_POST['AgencyEmail'];
        $MobileNumber = $_POST['MobileNumber'];
        $AgencyState = $_POST['AgencyState'];
        $AgencyCity = $_POST['AgencyCity'];
        $AgencyDistrict = $_POST['AgencyDistrict'];
        $AgencyAddress = $_POST['AgencyAddress'];
        $AgencyPan = $_POST['AgencyPan'];

        $AgencyString = 'agencyName=' . $AgencyName . '&agencyPrefix=' . $AgencyPrefix . '&branchId=' . $BranchId . '&agencyEmail=' . $AgencyEmail . '&agencyPhone=' . $MobileNumber . '&agencyState=' . $AgencyState . '&agencyCity=' . $AgencyCity . '&agencyDistrict=' . $AgencyDistrict . '&agencyAddress=' . $AgencyAddress . '&createdBy=' . $UserID . '&createdDate=' . $DateToday . ''
            . '&agencyPan=' . $AgencyPan;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ApiBaseUrl.'/api/agency/add',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $AgencyString,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $Token . ''
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    if (isset($_POST['DeleteAgency'])) {
        $DeleteAgency = $_POST['DeleteAgency'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $ApiBaseUrl.'/api/agency/delete/' . $DeleteAgency,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $Token . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    if (isset($_POST['EditAgencyData'])) {
        $EditAgencyData = $_POST['EditAgencyData'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $ApiBaseUrl.'/api/agency/viewid/' . $EditAgencyData . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $Token . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    if (isset($_POST['UpdateAgencyId'])) {

        $UpdateAgencyId = VerifyData($_POST['UpdateAgencyId']);
        $UpdateAgencyName = VerifyData($_POST['UpdateAgencyName']);
        $UpdateAgencyBranch = VerifyData($_POST['UpdateAgencyBranch']);
        $UpdateAgencyPrefix = VerifyData($_POST['UpdateAgencyPrefix']);
        $UpdateAgencyEmail = VerifyData($_POST['UpdateAgencyEmail']);
        $UpdateAgencyPhone = VerifyData($_POST['UpdateAgencyMobile']);
        $UpdateAgencyState = VerifyData($_POST['UpdateAgencyState']);
        $UpdateAgencyCity = VerifyData($_POST['UpdateAgencyCity']);
        $UpdateAgencyDistrict = VerifyData($_POST['UpdateAgencyDistrict']);
        $UpdateAgencyAddress = VerifyData($_POST['UpdateAgencyAddress']);
        $UpdateAgencyPan = VerifyData($_POST['UpdateAgencyPan']);


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $ApiBaseUrl.'/api/agency/update/'.$UpdateAgencyId.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'agencyName='.$UpdateAgencyName.'&branchId='.$UpdateAgencyBranch.'&updatedBy='.$UserID.'&updatedDate='.$DateToday.'&agencyPrefix='.$UpdateAgencyPrefix.'&agencyEmail='.$UpdateAgencyEmail.'&agencyPhone='.$UpdateAgencyPhone.'&agencyState='.$UpdateAgencyState.'&agencyDistrict='.$UpdateAgencyDistrict.'&agencyCity='.$UpdateAgencyCity.'&agencyAddress='.$UpdateAgencyAddress.'&agencyPan='.$UpdateAgencyPan.'',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $Token . '',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }



////////////////////////////Agency Master//////////////////////////////////// 




////////////////////////////Staff Master//////////////////////////////////// 

    //Staff Add
    if (isset($_POST['StaffName'])) {

        $StaffName = $_POST['StaffName'];
        $StaffBranch = $_POST['StaffBranch'];
        $StaffAgency = ($_POST['StaffAgency'] != '') ? $_POST['StaffAgency'] : "0";
        $StaffRole = $_POST['StaffDesignation'];
        $StaffPhone = ($_POST['StaffPhone'] != '') ? $_POST['StaffPhone'] : "0";
        $StaffAddress = ($_POST['StaffAddress'] != '') ? $_POST['StaffAddress'] : "";
        $StaffAdhar = ($_POST['StaffAadhar'] != '') ? $_POST['StaffAadhar'] : "";
        $StaffHead = ($_POST['StaffHead'] != '') ? $_POST['StaffHead'] : "0";
        $StaffGender = $_POST['StaffGender'];
        $StaffBloodGroup = $_POST['StaffBloodGroup'];
        $StaffReligion = $_POST['StaffReligion'];
        $StaffJoiningDate = $_POST['StaffJoiningDate'];
        $StaffDOB = $_POST['StaffDob'];
        $StaffQualification = $_POST['StaffQualification'];
        $StaffGpay = $_POST['StaffGpayNo'];
        $StaffAccountNumber = $_POST['StaffAccountNumber'];
        $StaffAccountName = $_POST['StaffAccountHolderName'];
        $StaffBankBranch = $_POST['StaffBankBranch'];
        $StaffIFSC = $_POST['StaffIfscCode'];
        $StaffBankName = $_POST['StaffBankName'];
        $StaffUserName = $_POST['StaffUserName'];
        $StaffPassword = $_POST['StaffPassword'];
        $StaffEmail = $_POST['StaffEmail'];
        $StaffSalary = $_POST['StaffSalary'];

    
        // if(!empty($_FILES['StaffImage']['name'])){

            
        //     $StaffImage = $_FILES['StaffImage']['name'];
        //     $StafftTempimage = $_FILES['StaffImage']['tmp_name'];
        //     //$StaffFinalImage = $itemCode.".".$extension;
        //     $StaffFolder = '../STAFFIMAGES/PROFILE/'.$StaffImage;

        //     if(move_uploaded_file($StafftTempimage, $StaffFolder)){
                
        //     }
        //     else{
              
        //     }
        // }
        // else{
        //     $StaffImage = '';
        // }


        
        $StaffString = 'staffName=' . $StaffName . '&staffBranch=' . $StaffBranch . '&staffAgency=' . $StaffAgency . '&staffSalary='.$StaffSalary.'&staffRole=' . $StaffRole . '&staffAddress=' . $StaffAddress . '&staffPhone=' . $StaffPhone . '&staffAdhar=' . $StaffAdhar . '&staffHead=' . $StaffHead . '&staffUserName=' . $StaffUserName . '&staffPassword=' . $StaffPassword . '&staffGender=' . $StaffGender . '&staffBloodGroup=' . $StaffBloodGroup . '&staffReligion=' . $StaffReligion . '&staffJoiningDate=' . $StaffJoiningDate . '&staffDOB=' . $StaffDOB . '&staffQualification=' . $StaffQualification . '&staffGPay=' . $StaffGpay . '&bankAccountNo=' . $StaffAccountNumber . '&accountHolderNAme=' . $StaffAccountName . '&bankBranch=' . $StaffBankBranch . '&bankIFSC=' . $StaffIFSC . '&bankName=' . $StaffBankName . '&staffEmail=' . $StaffEmail . '&staffImage=rr&createdBy=' . $UserID . '&createdDate=' . $DateToday . '';
    
        $Staffcurl = curl_init();

        curl_setopt_array($Staffcurl, array(
            CURLOPT_URL => ''.$ApiBaseUrl.'/api/staff/add',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $StaffString,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $Token . ''
            ),
        )
        );

        $StaffAddesponse = curl_exec($Staffcurl);
        curl_close($Staffcurl);
        echo $StaffAddesponse;
        
        
    }



    //Staff Delete
    if (isset($_POST['DeleteStaff'])) {
        $DeleteStaffData = $_POST['DeleteStaff'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => ''.$ApiBaseUrl.'/api/staff/delete/' . $DeleteStaffData . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $Token . ''
            ),
        ));

        $StaffDeleteresponse = curl_exec($curl);
        curl_close($curl);
        echo $StaffDeleteresponse;

    }


    //Edit Staff
    if (isset($_POST['EditStaff'])) {
        $EditStaffData = $_POST['EditStaff'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => ''.$ApiBaseUrl.'/api/staff/viewid/' . $EditStaffData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $Token . ''
            ),
        )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }



    //Staff Update
    if (isset($_POST['UpdateStaffId'])) {




        $UpdateStaffId = $_POST['UpdateStaffId'];
        $UpdateStaffName = $_POST['UpdateStaffName'];
        $UpdateStaffBranch = ($_POST['UpdateStaffBranch'] != '') ? $_POST['UpdateStaffBranch'] : "0";
        $UpdateStaffAgency = ($_POST['UpdateStaffAgency'] != '') ? $_POST['UpdateStaffAgency'] : "0";
        $UpdateStaffRole = $_POST['UpdateStaffDesignation'];
        $UpdateStaffPhone = ($_POST['UpdateStaffPhone'] != '') ? $_POST['UpdateStaffPhone'] : "0";
        $UpdateStaffAddress = ($_POST['UpdateStaffAddress'] != '') ? $_POST['UpdateStaffAddress'] : "";
        $UpdateStaffAdhar = ($_POST['UpdateStaffAadhar'] != '') ? $_POST['UpdateStaffAadhar'] : "";
        $UpdateStaffHead = ($_POST['UpdateStaffHeadName'] != '') ? $_POST['UpdateStaffHeadName'] : "0";
        $UpdateStaffGender = $_POST['UpdateStaffGender'];
        $UpdateStaffBloodGroup = $_POST['UpdateStaffBloodGroup'];
        $UpdateStaffReligion = $_POST['UpdateStaffReligion'];
        $UpdateStaffJoiningDate = $_POST['UpdateStaffJoiningDate'];
        $UpdateStaffDOB = $_POST['UpdateStaffDob'];
        $UpdateStaffQualification = $_POST['UpdateQualification'];
        $UpdateStaffGpay = $_POST['UpdateGpayNo'];
        $UpdateStaffAccountNumber = $_POST['UpdateStaffAccountNumber'];
        $UpdateStaffAccountName = $_POST['UpdateAccountHolderName'];
        $UpdateStaffBankBranch = $_POST['UpdateBankBranch'];
        $UpdateStaffIFSC = $_POST['UpdateIfscCode'];
        $UpdateStaffBankName = $_POST['UpdateBankName'];
        $UpdateStaffUserName = $_POST['UpdateStaffUserName'];
        $UpdateStaffPassword = $_POST['UpdateStaffPassword'];
        $UpdateStaffEmail = $_POST['UpdateStaffemail'];
        $UpdateStaffSalary = $_POST['UpdateStaffSalary'];


        // if(!empty($_FILES['UpdateStaffImage']['name'])){

        //     $UpdateStaffImage = $_FILES['UpdateStaffImage']['name'];
        //     $UpdateStaffTempimage = $_FILES['UpdateStaffImage']['tmp_name'];
        //     $UpdateStaffFolder = '../STAFFIMAGES/PROFILE/'.$UpdateStaffImage;
        //     if(move_uploaded_file($UpdateStaffTempimage, $UpdateStaffFolder)){
                
        //     }
        //     else{
              
        //     }
        // }
        // else{
        //     $UpdateStaffImage = '';
        // }
    

        $Staffcurl = curl_init();

        
        curl_setopt_array($Staffcurl, array(
        CURLOPT_URL => ''.$ApiBaseUrl.'/api/staff/update/'.$UpdateStaffId.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'staffName='.$UpdateStaffName.'&staffBranch='.$UpdateStaffBranch.'&staffAgency='.$UpdateStaffAgency.'&staffSalary='.$UpdateStaffSalary.'&staffPhone='.$UpdateStaffPhone.'&staffAddress='.$UpdateStaffAddress.'&staffRole='.$UpdateStaffRole.'&staffUserName='.$UpdateStaffUserName.'&staffPassword='.$UpdateStaffPassword.'&staffEmail='.$UpdateStaffEmail.'&staffAdhar='.$UpdateStaffAdhar.'&staffHead='.$UpdateStaffHead.'&staffGender='.$UpdateStaffGender.'&staffBloodGroup='.$UpdateStaffBloodGroup.'&staffImage=rr&staffReligion='.$UpdateStaffReligion.'&staffJoiningDate='.$UpdateStaffJoiningDate.'&staffDOB='.$UpdateStaffDOB.'&staffQualification='.$UpdateStaffQualification.'&staffGPay='.$UpdateStaffGpay.'&bankAccountNo='.$UpdateStaffAccountNumber.'&bankName='.$UpdateStaffBankName.'&accountHolderNAme='.$UpdateStaffAccountName.'&bankBranch='.$UpdateStaffBankBranch.'&bankIFSC='.$UpdateStaffIFSC.'&createdBy='.$UserID.'&createdDate='.$DateToday.'',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: ' . $Token . '',
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));



        $StaffAddesponse = curl_exec($Staffcurl);
        curl_close($Staffcurl);
        echo $StaffAddesponse;
       
    }


////////////////////////////Staff Master//////////////////////////////////// 




////////////////////////////Feedback Master//////////////////////////////////// 

    //Add Feedback
    if (isset($_POST['feedbackname'])) {
        $FeedbackName = $_POST['feedbackname'];
        $FeedbackData = $_POST['feedbackdata'];
        $FeedbackColor = $_POST['feedbackcolor'];
        $date = date('Y-m-d H:i:s');
        $FeedbackString = 'feedback=' . $FeedbackName . '&feedbackData=' . $FeedbackData . '&feedbackType= null&feedbackColor=' . $FeedbackColor .'&feedbackLink= null' . '&createdBy= 0' . '&createdDate=' . $date;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://malayalimatrimony.showmydemo.in/api/feedback/add',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $FeedbackString,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $_COOKIE['custtoken'] . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    //Edit Feedback
    if (isset($_POST['EditFeedbackData'])) {
        $EditFeedbackData = $_POST['EditFeedbackData'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://malayalimatrimony.showmydemo.in/api/feedback/viewid/' . $EditFeedbackData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $_COOKIE['custtoken'] . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    //Update Feedback
    if (isset($_POST['updatefeedbackname'])) {

        $UpdateFeedbackId = VerifyData($_POST['UpdateFeedbackId']);
        $UpdateFeedbackName = VerifyData($_POST['updatefeedbackname']);
        $UpdateFeedbackData = VerifyData($_POST['updatefeedbackdata']);

        //$UpdateAgencyString = 'agencyName=' . $UpdateAgencyName . '&branchId=' . $UpdateBranchId;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://malayalimatrimony.showmydemo.in/api/feedback/update/' . $UpdateFeedbackId . '?feedback=' . $UpdateFeedbackName . '&feedbackData=' . $UpdateFeedbackData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: ' . $_COOKIE['custtoken'] . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    //Delete Feedback
    if (isset($_POST['DeleteFeedbackData'])) {
        $DeleteFeedbackData = $_POST['DeleteFeedbackData'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://malayalimatrimony.showmydemo.in/api/feedback/delete/' . $DeleteFeedbackData . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $_COOKIE['custtoken'] . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


////////////////////////////Feedback Master//////////////////////////////////// 



//////////////////////////// Delete Member ///////////////////////////////////


    // Function to clear rows having no duplicate values
    function DeleteEmptyDuplicates($con, $DuplicateType){

        if($DuplicateType == 'BulkDuplicate'){
            $FindAllEmptyRowsQuery = "SELECT bulkId FROM bulkduplicate WHERE trim(bulkDuplicate) = '' AND trim(companyDuplicate) = '' AND trim(referenceDuplicate) = ''";
            $FindAllEmptyRows = mysqli_query($con, $FindAllEmptyRowsQuery);
            $EmptyRowsCount = mysqli_num_rows($FindAllEmptyRows);
            if($EmptyRowsCount > 0){
                $DeleteIncrementor = 0;
                foreach($FindAllEmptyRows as $FindAllEmptyRowsResults){
                    $DuplicateRowId = $FindAllEmptyRowsResults['bulkId'];
                    $DeleteEmptyRows = mysqli_query($con,"DELETE FROM bulkduplicate WHERE bulkId = '$DuplicateRowId'");
                    if($DeleteEmptyRows){
                        $DeleteIncrementor++;
                    }
                }
                if($EmptyRowsCount == $DeleteIncrementor){
                    return true;
                    //echo json_encode(array('Status' => true));
                }else{
                    //echo json_encode(array('Status' => false));
                    return true;
                }
            }else{
                //echo json_encode(array('Status' => false));
                return true;
            }
        }else{
            $FindAllEmptyRowsQuery = "SELECT custId FROM freeregduplicate WHERE trim(whatsappDuplicate) = '' AND trim(registerDuplicate) = '' AND trim(residenceDuplicate) = '' AND trim(ProifileDuplicate) = '' AND trim(companyDuplicate) = ''";
            $FindAllEmptyRows = mysqli_query($con, $FindAllEmptyRowsQuery);
            $EmptyRowsCount = mysqli_num_rows($FindAllEmptyRows);
            if($EmptyRowsCount > 0){
                $DeleteIncrementor = 0;
                foreach($FindAllEmptyRows as $FindAllEmptyRowsResults){
                    $DuplicateRowId = $FindAllEmptyRowsResults['custId'];
                    $DeleteEmptyRows = mysqli_query($con,"DELETE FROM freeregduplicate WHERE custId = '$DuplicateRowId'");
                    if($DeleteEmptyRows){
                        $DeleteIncrementor++;
                    }
                }
                if($EmptyRowsCount == $DeleteIncrementor){
                    //echo json_encode(array('Status' => true));
                    return true;
                }else{
                    //echo json_encode(array('Status' => false));
                    return false;
                }
            }else{
                //echo json_encode(array('Status' => false));
                return true;
            }
        }
    }



    // Delete Selected Customers
    if(isset($_POST['DeleteMemberId']) && isset($_POST['DeleteMemberData'])){
        $DeleteMemberArray = $_POST['DeleteMemberId'];
        $DeleteMemberData = $_POST['DeleteMemberData'];

        switch ($DeleteMemberData) {
            case ('FD'):
                $MainTableName = 'custdata';
                $IdColumn = 'custId';
                break;
            case ('PD'):
                $MainTableName = 'paiddata';
                $IdColumn = 'custId';
                break;
            case ('MD'):
                $MainTableName = 'marriagedata';
                $IdColumn = 'custId';
                break;
            case ('WD'):
                $MainTableName = 'weddingdata';
                $IdColumn = 'custId';
                break;
            case ('BD'):
                $MainTableName = 'bulkdata';
                $IdColumn = 'bulkId';
                break;
            case ('LD'):
                $MainTableName = 'leaddata';
                $IdColumn = 'bulkId';
                break;
        }


        $DeleteCounter = 0;
        $DeleteMemberArrayCount = count($DeleteMemberArray);
        if($DeleteMemberArrayCount > 0){

            foreach ($DeleteMemberArray as $DeleteMemberId) {

                if($DeleteMemberData == 'BD' || $DeleteMemberData == 'LD'){
                    $SearchId = $DeleteMemberData." - ".str_pad($DeleteMemberId, 5, '0', STR_PAD_LEFT) ;
                }else{
                    $FindProfileId = mysqli_query($con, "SELECT profileId FROM $MainTableName WHERE custId = '$DeleteMemberId'");
                    foreach ($FindProfileId as $FindProfileIdResult) {
                        $ProfileId = $FindProfileIdResult['profileId'];
                    }
                    $SearchId = $DeleteMemberData." - ".$ProfileId;
                }
    
                for($i=0; $i <= 7; $i++){
    
                    if($i == 0){
                        $TableName = 'bulkduplicate';
                        $TableId = 'bulkId';
                        $ColumnName = 'bulkduplicate';
                        $FindQuery = "SELECT $TableId,$ColumnName FROM $TableName WHERE LOCATE('$SearchId',$ColumnName)";
                    }elseif($i == 1){
                        $TableName = 'bulkduplicate';
                        $TableId = 'bulkId';
                        $ColumnName = 'companyDuplicate';
                        $FindQuery = "SELECT $TableId,$ColumnName FROM $TableName WHERE LOCATE('$SearchId',$ColumnName)";
                    }elseif($i == 2){
                        $TableName = 'bulkduplicate';
                        $TableId = 'bulkId';
                        $ColumnName = 'referenceDuplicate';
                        $FindQuery = "SELECT $TableId,$ColumnName FROM $TableName WHERE LOCATE('$SearchId',$ColumnName)";
                    }elseif($i == 3){
                        $TableName = 'freeregduplicate';
                        $TableId = 'custId';
                        $ColumnName = 'whatsappDuplicate';
                        $FindQuery = "SELECT $TableId,$ColumnName FROM $TableName WHERE LOCATE('$SearchId',$ColumnName)";
                    }elseif($i == 4){
                        $TableName = 'freeregduplicate';
                        $TableId = 'custId';
                        $ColumnName = 'registerDuplicate';
                        $FindQuery = "SELECT $TableId,$ColumnName FROM $TableName WHERE LOCATE('$SearchId',$ColumnName)";
                    }elseif($i == 5){
                        $TableName = 'freeregduplicate';
                        $TableId = 'custId';
                        $ColumnName = 'residenceDuplicate';
                        $FindQuery = "SELECT $TableId,$ColumnName FROM $TableName WHERE LOCATE('$SearchId',$ColumnName)";
                    }elseif($i == 6){
                        $TableName = 'freeregduplicate';
                        $TableId = 'custId';
                        $ColumnName = 'ProifileDuplicate';
                        $FindQuery = "SELECT $TableId,$ColumnName FROM $TableName WHERE LOCATE('$SearchId',$ColumnName)";
                    }elseif($i == 7){
                        $TableName = 'freeregduplicate';
                        $TableId = 'custId';
                        $ColumnName = 'companyDuplicate';
                        $FindQuery = "SELECT $TableId,$ColumnName FROM $TableName WHERE LOCATE('$SearchId',$ColumnName)";
                    }
    
                    //echo $FindQuery;
    
                    $FindIfExists = mysqli_query($con, $FindQuery);
                    if(mysqli_num_rows($FindIfExists ) > 0){
                        foreach ($FindIfExists as $FindIfExistsResults) {
                            $DuplicateRowId = $FindIfExistsResults[$TableId];
                            //echo $DuplicateRowId ;
                            $DuplicateArray = explode(" / ",$FindIfExistsResults[$ColumnName]);
                            //var_dump($DuplicateArray);
                            foreach($DuplicateArray as $key => $DuplicateArrayResults){
                                //echo $DuplicateArrayResults;
                                if (strpos($DuplicateArrayResults, $SearchId) !== false) {
                                    // echo $key;
                                    unset($DuplicateArray[$key]);
                                }else{
                                    //echo "false";
                                }
                            }
                            //var_dump($DuplicateArray);
                            $UpdatedDuplicateString = implode(" / ", $DuplicateArray);
                            //echo $UpdatedDuplicateString;
                            $UpdateColumn = mysqli_query($con, "UPDATE $TableName SET $ColumnName = '$UpdatedDuplicateString', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE $TableId = '$DuplicateRowId'");
                            if($UpdateColumn){
                                //echo "Success";
                            }
                        }
                    }else{
                    
                    }
                }


                $FindApprovalStatus =  mysqli_query($con, "SELECT approvalStatus FROM $MainTableName WHERE $IdColumn = '$DeleteMemberId'");
                if(mysqli_num_rows($FindApprovalStatus) > 0){
                    foreach($FindApprovalStatus as $FindApprovalStatusResult){
                        $ApprovalStatus = $FindApprovalStatusResult['approvalStatus'];
                    }

                    if($ApprovalStatus == $StatusForDelete){
                        $DeleteMember =  mysqli_query($con, "DELETE FROM $MainTableName WHERE $IdColumn = '$DeleteMemberId'");
                        if($DeleteMember){
                            $DeleteCounter++;
                            // echo json_encode(array('Status' => true,'Code' => 1));
                        }else{
                            // echo json_encode(array('Status' => true,'Code' => 2));
                        }
                    }else{

                        $DeleteMember =  mysqli_query($con, "UPDATE $MainTableName SET approvalStatus = 8, updatedDate = '$DateNow', updatedBy = '$UserID' WHERE $IdColumn = '$DeleteMemberId'");
                        if($DeleteMember){
                            $DeleteCounter++;
                            // echo json_encode(array('Status' => true,'Code' => 1));
                        }else{
                            // echo json_encode(array('Status' => true,'Code' => 2));
                        }
                    }
                }

            }

            //DeleteEmptyDuplicates($con,'BulkDuplicate');

            if($DeleteCounter == $DeleteMemberArrayCount){
                echo json_encode(array('Status' => true, 'Code' => 0));
            }else{
                echo json_encode(array('Status' => false,'Code' => 2));
            }
        }
        else{
            echo json_encode(array('Status' => false,'Code' => 0));
        }

        // $DeleteMember =  mysqli_query($con, "UPDATE $MainTableName SET approvalStatus = 8 WHERE $IdColumn = '$DeleteMemberId'");
        // if($DeleteMember){
        //     echo json_encode(array('Status' => true,'Code' => 1));
        // }else{
        //     echo json_encode(array('Status' => true,'Code' => 2));
        // }


        //echo json_encode(array('Status' => true,'Code' => 1));
        
    }

//////////////////////////// Delete Member ///////////////////////////////////




/////////////////////////////  Customer Registration  /////////////////////////

    // Upload images via edit form in customer registration
    if(isset($_POST['CustomerProfileId']) && isset($_POST['RegistrationUploadImageFolder'])){

        $CustomerProfileId = $_POST['CustomerProfileId'];
        $ImageUploadFolder = $_POST['RegistrationUploadImageFolder'];
        $Folder = "../CUSTOMERIMAGES/".$ImageUploadFolder."/";

        $UploadImageCount =  count($_FILES['AddCustomerImage']['name']);
        $Increment = 0;

        foreach ($_FILES['AddCustomerImage']['tmp_name'] as $key => $tmp_name) {
            $CustomerImageName = $_FILES['AddCustomerImage']['name'][$key];
            // $CustomerImageExtension = pathinfo($CustomerImageName, PATHINFO_EXTENSION);
            // $NewMultiFileName = $MultiFileName . '_' . $Increment . '_' . $MultipleRandNumber . '.' . $MultiExtension;
            $CustomerImageTemp = $_FILES['AddCustomerImage']['tmp_name'][$key];
            if (move_uploaded_file($CustomerImageTemp, $Folder . $CustomerImageName)) {
                $Increment++;
                    //echo json_encode(array('ImageUpload' => true));
            } else {
                //echo "multi upload Failed";
            }
        }

        if($UploadImageCount == $Increment){
            echo json_encode(array('ImageUpload' => true));
        }else{
            echo json_encode(array('ImageUpload' => false));
        }

    }



    if(isset($_POST['ProfileName']) && !empty($_POST['ProfileName'])){

        $ProfileCounter = 0;
        if(isset($_FILES['AddProfileImages'])){
            $ProfileImagesCount = count($_FILES["AddProfileImages"]["name"]);
    
            for($Profile=0;$Profile<count($_FILES["AddProfileImages"]["name"]);$Profile++){
                $UploadProfileFile = $_FILES["AddProfileImages"]["tmp_name"][$Profile];
                $ProfileFolder="../CUSTOMERIMAGES/PROFILE/";
                if(move_uploaded_file($_FILES["AddProfileImages"]["tmp_name"][$Profile], "$ProfileFolder".$_FILES["AddProfileImages"]["name"][$Profile])){
                    $ProfileCounter ++;
                }
                else{
                    $ProfileCounter ++;
                }
            }
        }else{
            $ProfileImagesCount = 0;
        }
    
    
        $HomeCounter = 0;
        if(isset($_FILES['AddHomeImages'])){
            $HomeImagesCount = count($_FILES["AddHomeImages"]["name"]);
    
            for($Home=0;$Home<count($_FILES["AddHomeImages"]["name"]);$Home++){
                $UploadHomeFile = $_FILES["AddHomeImages"]["tmp_name"][$Home];
                $HomeFolder="../CUSTOMERIMAGES/HOME/";
                if(move_uploaded_file($_FILES["AddHomeImages"]["tmp_name"][$Home], "$HomeFolder".$_FILES["AddHomeImages"]["name"][$Home])){
                    $HomeCounter ++;
                }
                else{
                    $HomeCounter ++;
                }
            }
        }else{
            $HomeImagesCount = 0;
        }
    
    
        $HoroscopeCounter = 0;
        if(isset($_FILES['AddHoroscopeImages'])){
            $HoroscopeImagesCount = count($_FILES["AddHoroscopeImages"]["name"]);
    
            for($Horoscope=0;$Horoscope<count($_FILES["AddHoroscopeImages"]["name"]);$Horoscope++){
                $UploadHoroscopeFile = $_FILES["AddHoroscopeImages"]["tmp_name"][$Horoscope];
                $HoroscopeFolder="../CUSTOMERIMAGES/HOROSCOPE/";
                if(move_uploaded_file($_FILES["AddHoroscopeImages"]["tmp_name"][$Horoscope], "$HoroscopeFolder".$_FILES["AddHoroscopeImages"]["name"][$Horoscope])){
                    $HoroscopeCounter ++;
                }
                else{
                    $HoroscopeCounter ++;
                }
            }
        }else{
            $HoroscopeImagesCount = 0;
        }
    
    
        $IdProofCounter = 0;
        if(isset($_FILES['AddIdProofImages'])){
            $IdProofImagesCount = count($_FILES["AddIdProofImages"]["name"]);
    
            for($IdProof=0;$IdProof<count($_FILES["AddIdProofImages"]["name"]);$IdProof++){
                $UploadIdProofFile = $_FILES["AddIdProofImages"]["tmp_name"][$IdProof];
                $IdProofFolder="../CUSTOMERIMAGES/IDPROOF/";
                if(move_uploaded_file($_FILES["AddIdProofImages"]["tmp_name"][$IdProof], "$IdProofFolder".$_FILES["AddIdProofImages"]["name"][$IdProof])){
                    $IdProofCounter ++;
                }
                else{
                    $IdProofCounter ++;
                }
            }
        }else{
            $IdProofImagesCount = 0;
        }
    
    
        // echo $ProfileImagesCount;
        // echo '/';
        // echo $ProfileCounter;
        // echo '-';
        // echo $IdProofImagesCount;
        // echo '/';
        // echo $IdProofCounter;
        // echo '-';
        // echo $HoroscopeImagesCount;
        // echo '/';
        // echo $HoroscopeCounter;
        // echo '-';
        // echo $HomeImagesCount;
        // echo '/';
        // echo $HomeCounter;
    
    
        if(($ProfileCounter == $ProfileImagesCount) && ($IdProofCounter == $IdProofImagesCount) && ($HoroscopeCounter == $HoroscopeImagesCount) && ($HomeImagesCount == $HomeCounter)){
            echo json_encode(array('Status' => true));
        }else{
            echo json_encode(array('Status' => false));
        }

    }


///////////////////////////// Customer Registration  /////////////////////////
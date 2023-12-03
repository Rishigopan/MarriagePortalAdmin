<?php



require '../MAIN/Dbconfig.php';

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard\Duplicates;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

$dateToday = date('Y-m-d');


function FilterValue($value)
{
    //require '../MAIN/Dbconfig.php';
    $value = trim($value);
    $value = strval($value);
    //$value = mysqli_real_escape_string($con,$value);
    $value = addslashes($value);
    return $value;
}




//bulk import
if (isset($_POST["bulkImportFile"])) {
    $check = $_FILES["BulkFile"]["tmp_name"];
    $fileName = $_FILES['BulkFile']['name'];
    $BulkDataType = $_POST['BulkDataType'];

    $targetPath = 'uploads/' . $_FILES['BulkFile']['name'];
    move_uploaded_file($_FILES['BulkFile']['tmp_name'], $targetPath);


    $findMaxImportId = mysqli_query($con, "SELECT MAX(bulkImportId) FROM bulkimporthistory");
    foreach ($findMaxImportId as $findMaxImportIdResult) {
        $ImportId = $findMaxImportIdResult['MAX(bulkImportId)'] + 1;
    }

    $insertData = mysqli_query($con, "INSERT INTO bulkimporthistory (bulkImportId,bulkImportFileName) 
    VALUES('$ImportId','$fileName')");

    if ($insertData) {


        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);

        $data = $spreadsheet->getActiveSheet()->toArray();

        $worksheet = $spreadsheet->getActiveSheet();
        $worksheetArray = $worksheet->toArray();
        array_shift($worksheetArray);


        $newvalue = 1;
        foreach ($worksheetArray as $key => $value) {

            if ($value[4] == '') {
                break;
            }


            $newvalue++;

            $CompanyId = FilterValue($value[1]);
            $DataType = FilterValue($value[2]);
            $Verified = FilterValue($value[3]);
            $BulkMobile = (FilterValue($value[4]) <> '') ? FilterValue($value[4]) : 0;
            $BulkName = FilterValue($value[5]);
            $Remark = FilterValue($value[6]);
            $ReferenceName = FilterValue($value[7]);
            $ReferenceNumber = (FilterValue($value[8]) <> '') ? FilterValue($value[78]) : 0;



            if ($BulkDataType == 'BD') {

                $BulkCompanyIdArray = array();
                $BulkPhoneArray = array();

                $CheckIfNumberExists = mysqli_query($con, "SELECT bulkPhone FROM bulkdata WHERE bulkPhone = $BulkMobile AND bulkPhone <> 0");
                $CheckCompanyIDExists = mysqli_query($con, "SELECT companyId FROM bulkdata WHERE companyId = $CompanyId AND companyId <> 0");
                if (mysqli_num_rows($CheckIfNumberExists) > 0) {
                    foreach ($CheckIfNumberExists as $CheckIfNumberExistsResult) {
                        array_push($BulkPhoneArray, $CheckIfNumberExistsResult['bulkPhone']);
                    }
                }
                if (mysqli_num_rows($CheckCompanyIDExists) > 0) {
                    foreach ($CheckCompanyIDExists as $CheckCompanyIDExistsResult) {
                        array_push($BulkCompanyIdArray, $CheckCompanyIDExistsResult['companyId']);
                    }
                }

                if (count($BulkCompanyIdArray) > 0 || count($BulkPhoneArray) > 0) {

                    $BulkPhoneString = implode(",", $BulkPhoneArray);
                    $BulkCompanyIdString = implode(",", $BulkCompanyIdArray);

                    $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateNumber`,'bulkDuplicateCompanyId') VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$dateToday','$Remark','$BulkPhoneString','$BulkCompanyIdString')";
                } else {

                    $findmaxBulkid = mysqli_query($con, "SELECT MAX(bulkId) FROM bulkdata");
                    foreach ($findmaxBulkid as $findmaxBulkidResult) {
                        $BulkMaxId = $findmaxBulkidResult['MAX(bulkId)'] + 1;
                    }

                    $query = " INSERT INTO `bulkdata` (`bulkId`,`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`) VALUES ('$BulkMaxId','$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$dateToday','$Remark') ";
                }
            } elseif ($BulkDataType == 'LD') {

                // $findmaxBulkid = mysqli_query($con, "SELECT MAX(bulkId) FROM leaddata");
                // foreach ($findmaxBulkid as $findmaxBulkidResult) {
                //     $BulkMaxId = $findmaxBulkidResult['MAX(bulkId)'] + 1;
                // }

                // $query = " INSERT INTO `leaddata` (`bulkId`,`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`) VALUES ('$BulkMaxId','$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$dateToday','$Remark') ";


                $CheckIfNumberExists = mysqli_query($con, "SELECT * FROM leaddata WHERE bulkPhone = $BulkMobile AND bulkPhone <> 0");
                if (mysqli_num_rows($CheckIfNumberExists) > 0) {
                    $findmaxBulkDuplicateid = mysqli_query($con, "SELECT MAX(bulkId) FROM bulkduplicate");
                    foreach ($findmaxBulkDuplicateid as $findmaxBulkDuplicateidResult) {
                        $BulkDuplicateMaxId = $findmaxBulkDuplicateidResult['MAX(bulkId)'] + 1;
                    }

                    $query = " INSERT INTO `bulkduplicate` (`bulkId`,`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateNumber`) VALUES ('$BulkMaxId','$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$dateToday','$Remark','$BulkMobile') ";
                } else {
                    $findmaxBulkid = mysqli_query($con, "SELECT MAX(bulkId) FROM leaddata");
                    foreach ($findmaxBulkid as $findmaxBulkidResult) {
                        $BulkMaxId = $findmaxBulkidResult['MAX(bulkId)'] + 1;
                    }

                    $query = " INSERT INTO `leaddata` (`bulkId`,`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`) VALUES ('$BulkMaxId','$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$dateToday','$Remark') ";
                }
            } else {
            }

            echo $query;

            $SqlinsertQuery = mysqli_query($con, $query);


            if ($SqlinsertQuery) {
                //echo "success";
            } else {
                //echo "failed";
            }
        }

        if ($SqlinsertQuery) {
            echo json_encode(array('cust' => 1));
        } else {
            echo json_encode(array('cust' => 0));
        }
    } else {
        echo json_encode(array('cust' => 0));
    }
}





// free import
if (isset($_POST["importFile"])) {



    $check = $_FILES["fileToUpload"]["tmp_name"];
    $fileName = $_FILES['fileToUpload']['name'];
    $FreeDataType = $_POST['FreeDataType'];

    $targetPath = 'uploads/' . $_FILES['fileToUpload']['name'];
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetPath);


    $findMaxImportId = mysqli_query($con, "SELECT MAX(importId) FROM importhistory");
    foreach ($findMaxImportId as $findMaxImportIdResult) {
        $ImportId = $findMaxImportIdResult['MAX(importId)'] + 1;
    }

    $insertData = mysqli_query($con, "INSERT INTO importhistory (importId,importFileName) 
    VALUES('$ImportId','$fileName')");

    if ($insertData) {

        $Col1 = 'CB'; //$_POST[''];
        $Col2 = 'CC'; //$_POST[''];
        $Col3 = 'CD'; //$_POST[''];
        $Col4 = 'CE'; //$_POST[''];
        $Col5 = 'CF'; //$_POST[''];
        $Col6 = 'CG'; //$_POST[''];



        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);



        $data = $spreadsheet->getActiveSheet()->toArray();

        $worksheet = $spreadsheet->getActiveSheet();
        $worksheetArray = $worksheet->toArray();
        array_shift($worksheetArray);




        $newvalue = 1;
        foreach ($worksheetArray as $key => $value) {

            if ($value[0] == '') {
                break;
            }




            $newvalue++;


            $ProfileID =                        isset($value[0]) ? ((FilterValue($value[0]) <> '') ? FilterValue($value[0]) : '') : "";
            $Type =                             isset($value[1]) ? ((FilterValue($value[1]) <> '') ? FilterValue($value[1]) : '') : "";
            $CompanyID =                        isset($value[3]) ? ((FilterValue($value[3]) <> '') ? FilterValue($value[3]) : '') : ""; //(FilterValue($value[3]) <> '') ? FilterValue($value[3]) : '';
            $PictureID =                        isset($value[4]) ? ((FilterValue($value[4]) <> '') ? FilterValue($value[4]) : '') : ""; //(FilterValue($value[4]) <> '') ? FilterValue($value[4]) : '';
            $Verified =                         isset($value[5]) ? ((FilterValue($value[5]) <> '') ? FilterValue($value[5]) : '') : ""; //(FilterValue($value[5]) <> '') ? FilterValue($value[5]) : '';
            $Gender =                           isset($value[6]) ? ((FilterValue($value[6]) <> '') ? FilterValue($value[6]) : '') : ""; //(FilterValue($value[6]) <> '') ? FilterValue($value[6]) : '';
            $FullName =                         isset($value[7]) ? ((FilterValue($value[7]) <> '') ? FilterValue($value[7]) : '') : ""; //(FilterValue($value[7]) <> '') ? FilterValue($value[7]) : '';
            $DOB =                              isset($value[8]) ? ((FilterValue($value[8]) <> '') ? FilterValue($value[8]) : '') : "01-Jan-1800"; //(FilterValue($value[8]) <> '') ? FilterValue($value[8]) : '';
            $Height =                           isset($value[9]) ? ((FilterValue($value[9]) <> '') ? FilterValue($value[9]) : '') : "0 ft 0 in - 0 cm"; //(FilterValue($value[9]) <> '') ? FilterValue($value[9]) : '';
            $Weight =                           isset($value[10]) ? ((FilterValue($value[10]) <> '') ? FilterValue($value[10]) : '') : ""; //(FilterValue($value[10]) <> '') ? FilterValue($value[10]) : '';
            $Complexion =                       isset($value[11]) ? ((FilterValue($value[11]) <> '') ? FilterValue($value[11]) : '') : ""; //(FilterValue($value[11]) <> '') ? FilterValue($value[11]) : '';
            $BodyType =                         isset($value[12]) ? ((FilterValue($value[12]) <> '') ? FilterValue($value[12]) : '') : ""; //(FilterValue($value[12]) <> '') ? FilterValue($value[12]) : '';
            $MaritalStatus =                    isset($value[13]) ? ((FilterValue($value[13]) <> '') ? FilterValue($value[13]) : '') : ""; //(FilterValue($value[13]) <> '') ? FilterValue($value[13]) : '';
            $PhysicalStatus =                   isset($value[14]) ? ((FilterValue($value[14]) <> '') ? FilterValue($value[14]) : '') : ""; //(FilterValue($value[14]) <> '') ? FilterValue($value[14]) : '';
            $NativePlace =                      isset($value[15]) ? ((FilterValue($value[15]) <> '') ? FilterValue($value[15]) : '') : ""; //(FilterValue($value[15]) <> '') ? FilterValue($value[15]) : '';
            $MasterReligion =                   isset($value[16]) ? ((FilterValue($value[16]) <> '') ? FilterValue($value[16]) : '') : ""; //FilterValue($value[16]);
            $MasterCaste =                      isset($value[17]) ? ((FilterValue($value[17]) <> '') ? FilterValue($value[17]) : '') : ""; //FilterValue($value[17]);
            $MasterStar =                       isset($value[18]) ? ((FilterValue($value[18]) <> '') ? FilterValue($value[18]) : '') : ""; //FilterValue($value[18]);
            $ChovvaDosham =                     isset($value[19]) ? ((FilterValue($value[19]) <> '') ? FilterValue($value[19]) : '') : ""; //(FilterValue($value[19]) <> '') ? FilterValue($value[19]) : '';
            $TypeJathakam =                     isset($value[20]) ? ((FilterValue($value[20]) <> '') ? FilterValue($value[20]) : '') : ""; //(FilterValue($value[20]) <> '') ? FilterValue($value[20]) : '';
            $MasterEducationCategory =          isset($value[21]) ? ((FilterValue($value[21]) <> '') ? FilterValue($value[21]) : '') : ""; //FilterValue($value[21]);
            $MasterEducationType =              isset($value[22]) ? ((FilterValue($value[22]) <> '') ? FilterValue($value[22]) : '') : ""; //FilterValue($value[22]);
            $EducationDetails  =                isset($value[23]) ? ((FilterValue($value[23]) <> '') ? FilterValue($value[23]) : '') : ""; //(FilterValue($value[38]) <> '') ? FilterValue($value[38]) : '';
            $MasterJobCategory =                isset($value[24]) ? ((FilterValue($value[24]) <> '') ? FilterValue($value[24]) : '') : ""; //FilterValue($value[23]);
            $MasterJobType =                    isset($value[25]) ? ((FilterValue($value[25]) <> '') ? FilterValue($value[25]) : '') : ""; //FilterValue($value[24]);
            $MasterJobLocationCountry =         isset($value[26]) ? ((FilterValue($value[26]) <> '') ? FilterValue($value[26]) : '') : ""; //FilterValue($value[25]);
            $MasterJobLocationState =           isset($value[27]) ? ((FilterValue($value[27]) <> '') ? FilterValue($value[27]) : '') : ""; //FilterValue($value[26]);
            $MasterJobLocationDistrict =        isset($value[28]) ? ((FilterValue($value[28]) <> '') ? FilterValue($value[28]) : '') : ""; //FilterValue($value[27]);
            $MasterJobLocationCity =            isset($value[29]) ? ((FilterValue($value[29]) <> '') ? FilterValue($value[29]) : '') : ""; //FilterValue($value[28]);
            $MonthlyIncome =                    isset($value[30]) ? ((FilterValue($value[30]) <> '') ? FilterValue($value[30]) : '') : 0; //(FilterValue($value[29]) <> '') ? FilterValue($value[29]) : 0;
            $FinancialStatus =                  isset($value[31]) ? ((FilterValue($value[31]) <> '') ? FilterValue($value[31]) : '') : ""; //(FilterValue($value[30]) <> '') ? FilterValue($value[30]) : '';
            $RegisteredNumber =                 isset($value[32]) ? ((FilterValue($value[32]) <> '') ? FilterValue($value[32]) : '') : ""; //(FilterValue($value[31]) <> '') ? FilterValue($value[31]) : '';
            $WhatsappNumber =                   isset($value[33]) ? ((FilterValue($value[33]) <> '') ? FilterValue($value[33]) : '') : ""; //(FilterValue($value[32]) <> '') ? FilterValue($value[32]) : '';
            $ResidencePhoneNumber =             isset($value[34]) ? ((FilterValue($value[34]) <> '') ? FilterValue($value[34]) : '') : ""; //(FilterValue($value[33]) <> '') ? FilterValue($value[33]) : '';
            $ContactPersonName    =             isset($value[35]) ? ((FilterValue($value[35]) <> '') ? FilterValue($value[35]) : '') : ""; //(FilterValue($value[34]) <> '') ? FilterValue($value[34]) : '';
            $NoOfChildren =                     isset($value[36]) ? ((FilterValue($value[36]) <> '') ? FilterValue($value[36]) : '') : 0; //(FilterValue($value[35]) <> '') ? FilterValue($value[35]) : 0;
            $MasterSubcaste =                   isset($value[37]) ? ((FilterValue($value[37]) <> '') ? FilterValue($value[37]) : '') : 0; //(FilterValue($value[36]) <> '') ? FilterValue($value[36]) : 0;
            $CasteNoBar     =                   isset($value[38]) ? ((FilterValue($value[38]) <> '') ? FilterValue($value[38]) : '') : 0; //(FilterValue($value[37]) <> '') ? FilterValue($value[37]) : 0;

            $JobDetails     =                   isset($value[40]) ? ((FilterValue($value[40]) <> '') ? FilterValue($value[40]) : '') : ""; //(FilterValue($value[39]) <> '') ? FilterValue($value[39]) : '';
            $MotherTongue =                     isset($value[41]) ? ((FilterValue($value[41]) <> '') ? FilterValue($value[41]) : '') : ""; //(FilterValue($value[40]) <> '') ? FilterValue($value[40]) : '';
            $ProfileCreatedby =                 isset($value[42]) ? ((FilterValue($value[42]) <> '') ? FilterValue($value[42]) : '') : ""; //(FilterValue($value[41]) <> '') ? FilterValue($value[41]) : '';
            $BloodGroup =                       isset($value[43]) ? ((FilterValue($value[43]) <> '') ? FilterValue($value[43]) : '') : ""; //(FilterValue($value[42]) <> '') ? FilterValue($value[42]) : '';
            $ParishEdavakaSNDPNSSMahal =        isset($value[44]) ? ((FilterValue($value[44]) <> '') ? FilterValue($value[44]) : '') : ""; //(FilterValue($value[43]) <> '') ? FilterValue($value[43]) : '';
            $When =                             isset($value[45]) ? ((FilterValue($value[45]) <> '') ? FilterValue($value[45]) : '') : ""; //(FilterValue($value[44]) <> '') ? FilterValue($value[44]) : '';
            $CommunicationAddress =             isset($value[46]) ? ((FilterValue($value[46]) <> '') ? FilterValue($value[46]) : '') : ""; //(FilterValue($value[45]) <> '') ? FilterValue($value[45]) : '';
            $Addres =                           isset($value[47]) ? ((FilterValue($value[47]) <> '') ? FilterValue($value[47]) : '') : ""; //(FilterValue($value[46]) <> '') ? FilterValue($value[46]) : '';
            $PermanentAddress =                 isset($value[48]) ? ((FilterValue($value[48]) <> '') ? FilterValue($value[48]) : '') : ""; //(FilterValue($value[47]) <> '') ? FilterValue($value[47]) : '';
            $MasterCountry =                    isset($value[49]) ? ((FilterValue($value[49]) <> '') ? FilterValue($value[49]) : '') : ""; //FilterValue($value[48]);
            $MasterState    =                   isset($value[50]) ? ((FilterValue($value[50]) <> '') ? FilterValue($value[50]) : '') : ""; //FilterValue($value[49]);
            $MasterDistrict =                   isset($value[51]) ? ((FilterValue($value[51]) <> '') ? FilterValue($value[51]) : '') : ""; //FilterValue($value[50]);
            $MasterCity =                       isset($value[52]) ? ((FilterValue($value[52]) <> '') ? FilterValue($value[52]) : '') : ""; //FilterValue($value[51]);
            $ResidentialStatus  =               isset($value[53]) ? ((FilterValue($value[53]) <> '') ? FilterValue($value[53]) : '') : ""; //(FilterValue($value[52]) <> '') ? FilterValue($value[52]) : '';
            $PreferredContactNumber  =          isset($value[54]) ? ((FilterValue($value[54]) <> '') ? FilterValue($value[54]) : '') : 0; //(FilterValue($value[53]) <> '') ? FilterValue($value[53]) : 0 ;
            $PreferredTime  =                   isset($value[55]) ? ((FilterValue($value[55]) <> '') ? FilterValue($value[55]) : '') : ""; //(FilterValue($value[54]) <> '') ? FilterValue($value[54]) : '';
            $Relationshipwithcandidate  =       isset($value[56]) ? ((FilterValue($value[56]) <> '') ? FilterValue($value[56]) : '') : ""; //(FilterValue($value[55]) <> '') ? FilterValue($value[55]) : '';
            $FatherName  =                      isset($value[57]) ? ((FilterValue($value[57]) <> '') ? FilterValue($value[57]) : '') : ""; //(FilterValue($value[56]) <> '') ? FilterValue($value[56]) : '';
            $MasterFatherEducation =            isset($value[58]) ? ((FilterValue($value[58]) <> '') ? FilterValue($value[58]) : '') : ""; //FilterValue($value[57]);
            $MasterFatherJob  =                 isset($value[59]) ? ((FilterValue($value[59]) <> '') ? FilterValue($value[59]) : '') : ""; //FilterValue($value[58]);
            $FatherJobDetail =                  isset($value[60]) ? ((FilterValue($value[60]) <> '') ? FilterValue($value[60]) : '') : ""; //(FilterValue($value[59]) <> '') ? FilterValue($value[59]) : '';
            $MotherName   =                     isset($value[61]) ? ((FilterValue($value[61]) <> '') ? FilterValue($value[61]) : '') : ""; //(FilterValue($value[60]) <> '') ? FilterValue($value[60]) : '';
            $MasterMotherEducation =            isset($value[62]) ? ((FilterValue($value[62]) <> '') ? FilterValue($value[62]) : '') : ""; // FilterValue($value[61]);
            $MasterMotherJob =                  isset($value[63]) ? ((FilterValue($value[63]) <> '') ? FilterValue($value[63]) : '') : ""; // FilterValue($value[62]);
            $MotherJobDetail =                  isset($value[64]) ? ((FilterValue($value[64]) <> '') ? FilterValue($value[64]) : '') : ""; //(FilterValue($value[63]) <> '') ? FilterValue($value[63]) : '';
            $MarriedBrothers =                  isset($value[65]) ? ((FilterValue($value[65]) <> '') ? FilterValue($value[65]) : '') : 0; //(FilterValue($value[64]) <> '') ? FilterValue($value[64]) : 0 ;
            $MarriedSisters     =               isset($value[66]) ? ((FilterValue($value[66]) <> '') ? FilterValue($value[66]) : '') : 0; //(FilterValue($value[65]) <> '') ? FilterValue($value[65]) : 0 ;
            $UnmarriedBrothers =                isset($value[67]) ? ((FilterValue($value[67]) <> '') ? FilterValue($value[67]) : '') : 0; //(FilterValue($value[66]) <> '') ? FilterValue($value[66]) : 0 ;
            $UnmarriedSisters =                 isset($value[68]) ? ((FilterValue($value[68]) <> '') ? FilterValue($value[68]) : '') : 0; //(FilterValue($value[67]) <> '') ? FilterValue($value[67]) : 0 ;
            $JobSibling     =                   isset($value[69]) ? ((FilterValue($value[69]) <> '') ? FilterValue($value[69]) : '') : ""; //(FilterValue($value[68]) <> '') ? FilterValue($value[68]) : '';
            $Guardian =                         isset($value[70]) ? ((FilterValue($value[70]) <> '') ? FilterValue($value[70]) : '') : ""; //(FilterValue($value[69]) <> '') ? FilterValue($value[69]) : '';
            $FamilyOrigin =                     isset($value[71]) ? ((FilterValue($value[71]) <> '') ? FilterValue($value[71]) : '') : ""; //(FilterValue($value[70]) <> '') ? FilterValue($value[70]) : '';
            $FamilyValues =                     isset($value[72]) ? ((FilterValue($value[72]) <> '') ? FilterValue($value[72]) : '') : ""; //(FilterValue($value[71]) <> '') ? FilterValue($value[71]) : '';
            $FamilyType  =                      isset($value[73]) ? ((FilterValue($value[73]) <> '') ? FilterValue($value[73]) : '') : ""; //(FilterValue($value[72]) <> '') ? FilterValue($value[72]) : '';
            $HomeType     =                     isset($value[74]) ? ((FilterValue($value[74]) <> '') ? FilterValue($value[74]) : '') : ""; //(FilterValue($value[73]) <> '') ? FilterValue($value[73]) : '';
            $CandidateShare =                   isset($value[75]) ? ((FilterValue($value[75]) <> '') ? FilterValue($value[75]) : '') : ""; //(FilterValue($value[74]) <> '') ? FilterValue($value[74]) : '';
            $EatingHabits     =                 isset($value[76]) ? ((FilterValue($value[76]) <> '') ? FilterValue($value[76]) : '') : ""; //(FilterValue($value[75]) <> '') ? FilterValue($value[75]) : '';
            $DrinkingHabits =                   isset($value[77]) ? ((FilterValue($value[77]) <> '') ? FilterValue($value[77]) : '') : ""; //(FilterValue($value[76]) <> '') ? FilterValue($value[76]) : '';
            $SmokingHabits =                    isset($value[78]) ? ((FilterValue($value[78]) <> '') ? FilterValue($value[78]) : '') : ""; //(FilterValue($value[77]) <> '') ? FilterValue($value[77]) : '';
            $LanguagesKnown     =               isset($value[79]) ? ((FilterValue($value[79]) <> '') ? FilterValue($value[79]) : '') : ""; //(FilterValue($value[78]) <> '') ? FilterValue($value[78]) : '';
            $Hobbies =                          isset($value[80]) ? ((FilterValue($value[80]) <> '') ? FilterValue($value[80]) : '') : ""; //(FilterValue($value[79]) <> '') ? FilterValue($value[79]) : '';
            $Interests     =                    isset($value[81]) ? ((FilterValue($value[81]) <> '') ? FilterValue($value[81]) : '') : ""; //(FilterValue($value[80]) <> '') ? FilterValue($value[80]) : '';
            $Blog     =                         isset($value[82]) ? ((FilterValue($value[82]) <> '') ? FilterValue($value[82]) : '') : ""; //(FilterValue($value[81]) <> '') ? FilterValue($value[81]) : '';
            $LinkNetwork =                      isset($value[83]) ? ((FilterValue($value[83]) <> '') ? FilterValue($value[83]) : '') : ""; //(FilterValue($value[82]) <> '') ? FilterValue($value[82]) : '';
            $HoroscopeDetails =                 isset($value[84]) ? ((FilterValue($value[84]) <> '') ? FilterValue($value[84]) : '') : ""; //(FilterValue($value[83]) <> '') ? FilterValue($value[83]) : '';
            $BirthHour =                        isset($value[85]) ? ((FilterValue($value[85]) <> '') ? FilterValue($value[85]) : '') : ""; //(FilterValue($value[84]) <> '') ? FilterValue($value[84]) : '';
            $BirthMinute =                      isset($value[86]) ? ((FilterValue($value[86]) <> '') ? FilterValue($value[86]) : '') : ""; //(FilterValue($value[85]) <> '') ? FilterValue($value[85]) : '';
            $PlaceOfBirth =                     isset($value[87]) ? ((FilterValue($value[87]) <> '') ? FilterValue($value[87]) : '') : ""; //(FilterValue($value[86]) <> '') ? FilterValue($value[86]) : '';
            $DateOfBirthMalayalam =             isset($value[88]) ? ((FilterValue($value[88]) <> '') ? FilterValue($value[88]) : '') : ""; //(FilterValue($value[87]) <> '') ? FilterValue($value[87]) : '';
            $JanmaSistaDasa     =               isset($value[89]) ? ((FilterValue($value[89]) <> '') ? FilterValue($value[89]) : '') : ""; //(FilterValue($value[88]) <> '') ? FilterValue($value[88]) : '';
            $JanmaSistaDasaEnd     =            isset($value[90]) ? ((FilterValue($value[90]) <> '') ? FilterValue($value[90]) : '') : ""; //(FilterValue($value[89]) <> '') ? FilterValue($value[89]) : '';
            $HoroscopeFile    =                 isset($value[91]) ? ((FilterValue($value[91]) <> '') ? FilterValue($value[91]) : '') : ""; //(FilterValue($value[90]) <> '') ? FilterValue($value[90]) : '';
            $PartnerPreference =                isset($value[92]) ? ((FilterValue($value[92]) <> '') ? FilterValue($value[92]) : '') : ""; //(FilterValue($value[91]) <> '') ? FilterValue($value[91]) : '';
            $PartnerAgeFrom     =               isset($value[93]) ? ((FilterValue($value[93]) <> '') ? FilterValue($value[93]) : '') : ""; //(FilterValue($value[92]) <> '') ? FilterValue($value[92]) : '';
            $PartnerAgeTo  =                    isset($value[94]) ? ((FilterValue($value[94]) <> '') ? FilterValue($value[94]) : '') : ""; //(FilterValue($value[93]) <> '') ? FilterValue($value[93]) : '';
            $PartnerHeightFrom     =            isset($value[95]) ? ((FilterValue($value[95]) <> '') ? FilterValue($value[95]) : '') : ""; //(FilterValue($value[94]) <> '') ? FilterValue($value[94]) : '';
            $PartnerHeightTo =                  isset($value[96]) ? ((FilterValue($value[96]) <> '') ? FilterValue($value[96]) : '') : ""; //(FilterValue($value[95]) <> '') ? FilterValue($value[95]) : '';
            $PartnerComplexion     =            isset($value[97]) ? ((FilterValue($value[97]) <> '') ? FilterValue($value[97]) : '') : ""; //(FilterValue($value[96]) <> '') ? FilterValue($value[96]) : '';
            $PartnerBodyType =                  isset($value[98]) ? ((FilterValue($value[98]) <> '') ? FilterValue($value[98]) : '') : ""; //(FilterValue($value[97]) <> '') ? FilterValue($value[97]) : '';
            $PartnerMaritalStatus =             isset($value[99]) ? ((FilterValue($value[99]) <> '') ? FilterValue($value[99]) : '') : ""; //(FilterValue($value[98]) <> '') ? FilterValue($value[98]) : '';
            $MasterPartnerReligion =            isset($value[100]) ? ((FilterValue($value[100]) <> '') ? FilterValue($value[100]) : '') : ""; //FilterValue($value[99]);
            $MasterPartnerCaste    =            isset($value[101]) ? ((FilterValue($value[101]) <> '') ? FilterValue($value[101]) : '') : ""; //FilterValue($value[100]);
            $PartnerCasteNoBar =                isset($value[102]) ? ((FilterValue($value[102]) <> '') ? FilterValue($value[102]) : '') : ""; //(FilterValue($value[101]) <> '') ? FilterValue($value[101]) : '';
            $PartnerTypeOfJathakam    =         isset($value[103]) ? ((FilterValue($value[103]) <> '') ? FilterValue($value[103]) : '') : ""; //(FilterValue($value[102]) <> '') ? FilterValue($value[102]) : '';
            $MatchingStars =                    isset($value[104]) ? ((FilterValue($value[104]) <> '') ? FilterValue($value[104]) : '') : ""; //(FilterValue($value[103]) <> '') ? FilterValue($value[103]) : '';
            $MasterPartnerEducationCategory =   isset($value[105]) ? ((FilterValue($value[105]) <> '') ? FilterValue($value[105]) : '') : ""; //FilterValue($value[104]);
            $MasterPartnerEducationType =       isset($value[106]) ? ((FilterValue($value[106]) <> '') ? FilterValue($value[106]) : '') : ""; //FilterValue($value[105]);
            $MasterPartnerJobCategory =         isset($value[107]) ? ((FilterValue($value[107]) <> '') ? FilterValue($value[107]) : '') : ""; //FilterValue($value[106]);
            $MasterPartnerJobType =             isset($value[108]) ? ((FilterValue($value[108]) <> '') ? FilterValue($value[108]) : '') : ""; //FilterValue($value[107]);
            $MasterPartnerCountry =             isset($value[109]) ? ((FilterValue($value[109]) <> '') ? FilterValue($value[109]) : '') : ""; //FilterValue($value[108]);
            $MasterPartnerState =               isset($value[110]) ? ((FilterValue($value[110]) <> '') ? FilterValue($value[110]) : '') : ""; //FilterValue($value[109]);
            $MasterPartnerDistrict =            isset($value[111]) ? ((FilterValue($value[111]) <> '') ? FilterValue($value[111]) : '') : ""; //FilterValue($value[110]);
            $MasterPartnerCity =                isset($value[112]) ? ((FilterValue($value[112]) <> '') ? FilterValue($value[112]) : '') : ""; //FilterValue($value[111]);
            $ABOUT =                            isset($value[113]) ? ((FilterValue($value[113]) <> '') ? FilterValue($value[113]) : '') : ""; //(FilterValue($value[112]) <> '') ? FilterValue($value[112]) : '';
            $Iamlooking =                       isset($value[114]) ? ((FilterValue($value[114]) <> '') ? FilterValue($value[114]) : '') : ""; //(FilterValue($value[113]) <> '') ? FilterValue($value[113]) : '';
            $Email =                            isset($value[115]) ? ((FilterValue($value[115]) <> '') ? FilterValue($value[115]) : '') : ""; //(FilterValue($value[114]) <> '') ? FilterValue($value[114]) : '';
            $own = '';
            $createdDate = date('Y-m-d');
            $photo1 = $ProfileID . '.jpg';
            $photo2 = $ProfileID . 'A' . '.jpg';
            $photo3 = $ProfileID . 'B' . '.jpg';
            $photo4 = $ProfileID . 'C' . '.jpg';
            $photo5 = $ProfileID . 'D' . '.jpg';
            $photo6 = $ProfileID . 'E' . '.jpg';
            $photo7 = $ProfileID . 'F' . '.jpg';
            $photo8 = $ProfileID . 'G' . '.jpg';
            $photo9 = $ProfileID . 'H' . '.jpg';
            $photo10 = $FullName . 'I' . '.jpg';

            $Horoscope1 = $ProfileID . '.jpg';
            $Horoscope2 = $ProfileID . 'A' . '.jpg';
            $Horoscope3 = $ProfileID . 'B' . '.jpg';
            $Horoscope4 = $ProfileID . 'C' . '.jpg';
            $Horoscope5 = $ProfileID . 'D' . '.jpg';

            $IDProof1 = $ProfileID . '.jpg';
            $IDProof2 = $ProfileID . 'A' . '.jpg';
            $IDProof3 = $ProfileID . 'B' . '.jpg';
            $IDProof4 = $ProfileID . 'C' . '.jpg';
            $IDProof5 = $ProfileID . 'D' . '.jpg';

            $Home1 = $ProfileID . '.jpg';
            $Home2 = $ProfileID . 'A' . '.jpg';
            $Home3 = $ProfileID . 'B' . '.jpg';
            $Home4 = $ProfileID . 'C' . '.jpg';
            $Home5 = $ProfileID . 'D' . '.jpg';

            //isset() ? ((FilterValue() <> '') ? FilterValue() : '') : "";

            //religion
            $findReligion = mysqli_fetch_assoc(mysqli_query($con, "SELECT rId FROM religion WHERE religionName = '$MasterReligion'"));
            $Religion =  is_array($findReligion) ? $findReligion['rId'] : 0;

            //caste
            $findCaste = mysqli_fetch_assoc(mysqli_query($con, "SELECT casId FROM caste WHERE casteName = '$MasterCaste'"));
            $Caste =  is_array($findCaste) ? $findCaste['casId'] : 0;

            //subcaste
            $findSubcaste = mysqli_fetch_assoc(mysqli_query($con, "SELECT scId FROM subcaste WHERE subcasteName = '$MasterSubcaste'"));
            $Subcaste =  is_array($findSubcaste) ? $findSubcaste['scId'] : 0;

            //EducationCategory
            $findEducationCategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT edcatId FROM educationcategory WHERE educationCategory = '$MasterEducationCategory'"));
            $EducationCategory =  is_array($findEducationCategory) ? $findEducationCategory['edcatId'] : 0;

            //EducationType
            $findEducationType = mysqli_fetch_assoc(mysqli_query($con, "SELECT edTyId FROM educationtype WHERE educationType = '$MasterEducationType'"));
            $EducationType =  is_array($findEducationType) ? $findEducationType['edTyId'] : 0;

            //JobCategory
            $findJobCategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbcatId FROM jobcategory WHERE jobCategory = '$MasterJobCategory'"));
            $JobCategory =  is_array($findJobCategory) ? $findJobCategory['jbcatId'] : 0;

            //JobType
            $findJobType = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbTyId FROM jobtype WHERE jobType = '$MasterJobType'"));
            $JobType =  is_array($findJobType) ? $findJobType['jbTyId'] : 0;

            //JobLocationCountry
            $findJobLocationCountry = mysqli_fetch_assoc(mysqli_query($con, "SELECT cId FROM country WHERE countryName = '$MasterJobLocationCountry'"));
            $JobLocationCountry =  is_array($findJobLocationCountry) ? $findJobLocationCountry['cId'] : 0;

            //JobLocationState
            $findJobLocationState = mysqli_fetch_assoc(mysqli_query($con, "SELECT sId FROM state WHERE stateName = '$MasterJobLocationState'"));
            $JobLocationState =  is_array($findJobLocationState) ? $findJobLocationState['sId'] : 0;

            //JobLocationDistrict
            $findJobLocationDistrict = mysqli_fetch_assoc(mysqli_query($con, "SELECT dId FROM district WHERE districtName = '$MasterJobLocationDistrict'"));
            $JobLocationDistrict =  is_array($findJobLocationDistrict) ? $findJobLocationDistrict['dId'] : 0;

            //JobLocationCity
            $findJobLocationCity = mysqli_fetch_assoc(mysqli_query($con, "SELECT citId FROM city WHERE cityName = '$MasterJobLocationCity'"));
            $JobLocationCity =  is_array($findJobLocationCity) ? $findJobLocationCity['citId'] : 0;

            //Country
            $findCountry = mysqli_fetch_assoc(mysqli_query($con, "SELECT cId FROM country WHERE countryName = '$MasterCountry'"));
            $Country =  is_array($findCountry) ? $findCountry['cId'] : 0;

            //State
            $findState = mysqli_fetch_assoc(mysqli_query($con, "SELECT sId FROM state WHERE stateName = '$MasterState'"));
            $State =  is_array($findState) ? $findState['sId'] : 0;

            //District
            $findDistrict = mysqli_fetch_assoc(mysqli_query($con, "SELECT dId FROM district WHERE districtName = '$MasterDistrict'"));
            $District =  is_array($findDistrict) ? $findDistrict['dId'] : 0;

            //City
            $findCity = mysqli_fetch_assoc(mysqli_query($con, "SELECT citId FROM city WHERE cityName = '$MasterCity'"));
            $City =  is_array($findCity) ? $findCity['citId'] : 0;

            //FatherEducation
            $findFatherEducation = mysqli_fetch_assoc(mysqli_query($con, "SELECT edcatId FROM educationcategory WHERE educationCategory = '$MasterFatherEducation'"));
            $FatherEducation =  is_array($findFatherEducation) ? $findFatherEducation['edcatId'] : 0;

            //FatherJob
            $findFatherJob = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbcatId FROM jobcategory WHERE jobCategory = '$MasterFatherJob'"));
            $FatherJob =  is_array($findFatherJob) ? $findFatherJob['jbcatId'] : 0;

            //MotherEducation
            $findMotherEducation = mysqli_fetch_assoc(mysqli_query($con, "SELECT edcatId FROM educationcategory WHERE educationCategory = '$MasterMotherEducation'"));
            $MotherEducation =  is_array($findMotherEducation) ? $findMotherEducation['edcatId'] : 0;

            //MotherJob
            $findMotherJob = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbcatId FROM jobcategory WHERE jobCategory = '$MasterMotherJob'"));
            $MotherJob =  is_array($findMotherJob) ? $findMotherJob['jbcatId'] : 0;


            //partnerreligion
            $findPartnerReligion = mysqli_fetch_assoc(mysqli_query($con, "SELECT rId FROM religion WHERE religionName = '$MasterPartnerReligion'"));
            $PartnerReligion =  is_array($findPartnerReligion) ? $findPartnerReligion['rId'] : 0;

            //Partnercaste
            $findPartnerCaste = mysqli_fetch_assoc(mysqli_query($con, "SELECT casId FROM caste WHERE casteName = '$MasterPartnerCaste'"));
            $PartnerCaste =  is_array($findPartnerCaste) ? $findPartnerCaste['casId'] : 0;

            //PartnerEducationCategory
            $findPartnerEducationCategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT edcatId FROM educationcategory WHERE educationCategory = '$MasterPartnerEducationCategory'"));
            $PartnerEducationCategory =  is_array($findPartnerEducationCategory) ? $findPartnerEducationCategory['edcatId'] : 0;

            //PartnerEducationType
            $findPartnerEducationType = mysqli_fetch_assoc(mysqli_query($con, "SELECT edTyId FROM educationtype WHERE educationType = '$MasterPartnerEducationType'"));
            $PartnerEducationType =  is_array($findPartnerEducationType) ? $findPartnerEducationType['edTyId'] : 0;

            //PartnerJobCategory
            $findPartnerJobCategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbcatId FROM jobcategory WHERE jobCategory = '$MasterPartnerJobCategory'"));
            $PartnerJobCategory =  is_array($findPartnerJobCategory) ? $findPartnerJobCategory['jbcatId'] : 0;

            //PartnerJobType
            $findPartnerJobType = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbTyId FROM jobtype WHERE jobType = '$MasterPartnerJobType'"));
            $PartnerJobType =  is_array($findPartnerJobType) ? $findPartnerJobType['jbTyId'] : 0;


            //PartnerCountry
            $findPartnerCountry = mysqli_fetch_assoc(mysqli_query($con, "SELECT cId FROM country WHERE countryName = '$MasterPartnerCountry'"));
            $PartnerCountry =  is_array($findPartnerCountry) ? $findPartnerCountry['cId'] : 0;

            //PartnerState
            $findPartnerState = mysqli_fetch_assoc(mysqli_query($con, "SELECT sId FROM state WHERE stateName = '$MasterPartnerState'"));
            $PartnerState =  is_array($findPartnerState) ? $findPartnerState['sId'] : 0;

            //PartnerDistrict
            $findPartnerDistrict = mysqli_fetch_assoc(mysqli_query($con, "SELECT dId FROM district WHERE districtName = '$MasterPartnerDistrict'"));
            $PartnerDistrict =  is_array($findPartnerDistrict) ? $findPartnerDistrict['dId'] : 0;

            //PartnerCity
            $findPartnerCity = mysqli_fetch_assoc(mysqli_query($con, "SELECT citId FROM city WHERE cityName = '$MasterPartnerCity'"));
            $PartnerCity =  is_array($findPartnerCity) ? $findPartnerCity['citId'] : 0;

            //STAR
            $findStar = mysqli_fetch_assoc(mysqli_query($con, "SELECT starId FROM star WHERE starName = '$MasterStar'"));
            $Star =  is_array($findStar) ? $findStar['starId'] : 0;


            $duplicateIds = array();
            $duplicateNumberTypes = array();
            $ProfileIdArray = array();
            $CompanyIdArray = array();

            if ($FreeDataType == 'FD') {


                if ($RegisteredNumber != 0 && $RegisteredNumber != '') {

                    $checkRegisteredExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM custdata WHERE registeredNumber = '$RegisteredNumber' OR whatsappNumber = '$RegisteredNumber' OR residencePhoneNumber = '$RegisteredNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $RegisteredNumberRows = mysqli_num_rows($checkRegisteredExists);

                    if ($RegisteredNumberRows > 0) {
                        foreach ($checkRegisteredExists as $checkRegisteredResult) {
                            $profileId = $checkRegisteredResult['profileId'];
                            $registeredNumber = $checkRegisteredResult['registeredNumber'];
                            $whatsappNumber = $checkRegisteredResult['whatsappNumber'];
                            $residencePhoneNumber = $checkRegisteredResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $RegisteredNumberRows = 0;
                }
                if ($WhatsappNumber != 0 && $WhatsappNumber != '') {

                    $checkWhatsappExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM custdata WHERE registeredNumber = '$WhatsappNumber' OR whatsappNumber = '$WhatsappNumber' OR residencePhoneNumber = '$WhatsappNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $WhatsappNumberRows = mysqli_num_rows($checkWhatsappExists);
                    if ($WhatsappNumberRows > 0) {
                        foreach ($checkWhatsappExists as $checkWhatsappResult) {
                            $profileId = $checkWhatsappResult['profileId'];
                            $registeredNumber = $checkWhatsappResult['registeredNumber'];
                            $whatsappNumber = $checkWhatsappResult['whatsappNumber'];
                            $residencePhoneNumber = $checkWhatsappResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $WhatsappNumberRows = 0;
                }
                if ($ResidencePhoneNumber != 0 && $ResidencePhoneNumber != '') {

                    $checkResidenceExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM custdata WHERE registeredNumber = '$ResidencePhoneNumber' OR whatsappNumber = '$ResidencePhoneNumber' OR residencePhoneNumber = '$ResidencePhoneNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $ResidenceNumberRows = mysqli_num_rows($checkResidenceExists);
                    if ($ResidenceNumberRows > 0) {
                        foreach ($checkResidenceExists as $checkResidenceResult) {
                            $profileId = $checkResidenceResult['profileId'];
                            $registeredNumber = $checkResidenceResult['registeredNumber'];
                            $whatsappNumber = $checkResidenceResult['whatsappNumber'];
                            $residencePhoneNumber = $checkResidenceResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $ResidenceNumberRows = 0;
                }


                //echo $RegisteredNumberRows;
                //echo $WhatsappNumberRows;
                //echo $ResidenceNumberRows;
                //print_r($duplicateIds);
                //print_r($duplicateNumberTypes);

                // $FindIdExists = mysqli_query($con, "SELECT profileId FROM custdata WHERE profileId = '$ProfileID'");
                // if (mysqli_num_rows($FindIdExists) > 0) {
                //     $IDexists = 'Exists';
                // } else {

                //     $IDexists = '';
                // }


                // if ($CompanyID != 0 && $CompanyID != '') {
                //     $FindCompanyIdExists = mysqli_query($con, "SELECT companyId FROM paiddata WHERE companyId = '$CompanyID'");
                //     if (mysqli_num_rows($FindCompanyIdExists) > 0) {
                //         $CompanyIDexists = 'Exists';
                //     } else {

                //         $CompanyIDexists = '';
                //     }
                // } else {
                //     $CompanyIDexists = '';
                // }

                $FindIdExists = mysqli_query($con, "SELECT profileId FROM custdata WHERE profileId = '$ProfileID'");
                $IDExists  =  mysqli_num_rows($FindIdExists);
                if ($IDExists > 0) {
                    foreach ($FindIdExists as $FindIdExistsResult) {
                        array_push($ProfileIdArray, $FindIdExistsResult['profileId']);
                    }
                } else {
                    $IDexists = 0;
                }


                $FindCompanyIdExists = mysqli_query($con, "SELECT companyId FROM custdata WHERE companyId = '$CompanyID'");
                $CompanyIDexists  =  mysqli_num_rows($FindCompanyIdExists);
                if ($CompanyIDexists > 0) {
                    foreach ($FindCompanyIdExists as $FindCompanyIdExistsResult) {
                        array_push($CompanyIdArray, $FindCompanyIdExistsResult['companyId']);
                    }
                } else {
                    $CompanyIDexists = 0;
                }



                if ($RegisteredNumberRows > 0 || $WhatsappNumberRows > 0 || $ResidenceNumberRows > 0 || $IDexists > 0 || $CompanyIDexists > 0) {

                    //echo "exists";

                    $findmaxDuplicateid = mysqli_query($con, "SELECT MAX(custId) FROM freeregduplicate");
                    foreach ($findmaxDuplicateid as $findmaxDuplicateidResult) {
                        $DuplicateMaxId = $findmaxDuplicateidResult['MAX(custId)'] + 1;
                    }

                    $duplicateIdString = implode(",", $duplicateIds);
                    $duplicateNumberTypeString = implode(",", $duplicateNumberTypes);
                    $CompanyIdArrayString = implode(",", $CompanyIdArray);
                    $ProfileIdArrayString = implode(",", $ProfileIdArray);


                    $query = "INSERT INTO `freeregduplicate`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`,`duplicateCompany`,`duplicateProfileId`) VALUES('$DuplicateMaxId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$duplicateIdString','$duplicateNumberTypeString','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified','$CompanyIdArrayString','$ProfileIdArrayString')";
                } else {


                    //echo "fresh";

                    $findmaxcustid = mysqli_query($con, "SELECT MAX(custId) FROM custdata");
                    foreach ($findmaxcustid as $findmaxcustidResult) {
                        $custMaxId = $findmaxcustidResult['MAX(custId)'] + 1;
                    }


                    $query = "INSERT INTO `custdata`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`dataType`,`companyId`,`pictureId`,`verified`,`createdDate`) VALUES('$custMaxId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$Type','$CompanyID','$PictureID','$Verified','$createdDate')";
                }
            } elseif ($FreeDataType == 'PD') {

                if ($RegisteredNumber != 0 && $RegisteredNumber != '') {

                    $checkRegisteredExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM paiddata WHERE registeredNumber = '$RegisteredNumber' OR whatsappNumber = '$RegisteredNumber' OR residencePhoneNumber = '$RegisteredNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $RegisteredNumberRows = mysqli_num_rows($checkRegisteredExists);

                    if ($RegisteredNumberRows > 0) {
                        foreach ($checkRegisteredExists as $checkRegisteredResult) {
                            $profileId = $checkRegisteredResult['profileId'];
                            $registeredNumber = $checkRegisteredResult['registeredNumber'];
                            $whatsappNumber = $checkRegisteredResult['whatsappNumber'];
                            $residencePhoneNumber = $checkRegisteredResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $RegisteredNumberRows = 0;
                }
                if ($WhatsappNumber != 0 && $WhatsappNumber != '') {

                    $checkWhatsappExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM paiddata WHERE registeredNumber = '$WhatsappNumber' OR whatsappNumber = '$WhatsappNumber' OR residencePhoneNumber = '$WhatsappNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $WhatsappNumberRows = mysqli_num_rows($checkWhatsappExists);
                    if ($WhatsappNumberRows > 0) {
                        foreach ($checkWhatsappExists as $checkWhatsappResult) {
                            $profileId = $checkWhatsappResult['profileId'];
                            $registeredNumber = $checkWhatsappResult['registeredNumber'];
                            $whatsappNumber = $checkWhatsappResult['whatsappNumber'];
                            $residencePhoneNumber = $checkWhatsappResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $WhatsappNumberRows = 0;
                }
                if ($ResidencePhoneNumber != 0 && $ResidencePhoneNumber != '') {

                    $checkResidenceExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM paiddata WHERE registeredNumber = '$ResidencePhoneNumber' OR whatsappNumber = '$ResidencePhoneNumber' OR residencePhoneNumber = '$ResidencePhoneNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $ResidenceNumberRows = mysqli_num_rows($checkResidenceExists);
                    if ($ResidenceNumberRows > 0) {
                        foreach ($checkResidenceExists as $checkResidenceResult) {
                            $profileId = $checkResidenceResult['profileId'];
                            $registeredNumber = $checkResidenceResult['registeredNumber'];
                            $whatsappNumber = $checkResidenceResult['whatsappNumber'];
                            $residencePhoneNumber = $checkResidenceResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $ResidenceNumberRows = 0;
                }


                //echo $RegisteredNumberRows;
                //echo $WhatsappNumberRows;
                //echo $ResidenceNumberRows;
                //print_r($duplicateIds);
                //print_r($duplicateNumberTypes);


                $FindIdExists = mysqli_query($con, "SELECT profileId FROM paiddata WHERE profileId = '$ProfileID'");
                if (mysqli_num_rows($FindIdExists) > 0) {
                    $IDexists = 'Exists';
                } else {

                    $IDexists = '';
                }

                if ($CompanyID != 0 && $CompanyID != '') {
                    $FindCompanyIdExists = mysqli_query($con, "SELECT companyId FROM paiddata WHERE companyId = '$CompanyID'");
                    if (mysqli_num_rows($FindCompanyIdExists) > 0) {
                        $CompanyIDexists = 'Exists';
                    } else {

                        $CompanyIDexists = '';
                    }
                } else {
                    $CompanyIDexists = '';
                }


                if ($RegisteredNumberRows > 0 || $WhatsappNumberRows > 0 || $ResidenceNumberRows > 0 || $IDexists == 'Exists' || $CompanyIDexists == 'Exists') {

                    //echo "exists";

                    $findmaxDuplicateid = mysqli_query($con, "SELECT MAX(custId) FROM freeregduplicate");
                    foreach ($findmaxDuplicateid as $findmaxDuplicateidResult) {
                        $DuplicateMaxId = $findmaxDuplicateidResult['MAX(custId)'] + 1;
                    }

                    $duplicateIdString = implode(",", $duplicateIds);
                    $duplicateNumberTypeString = implode(",", $duplicateNumberTypes);


                    $query = "INSERT INTO `freeregduplicate`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`) VALUES('$DuplicateMaxId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$duplicateIdString','$duplicateNumberTypeString','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified')";
                } else {


                    //echo "fresh";

                    $findmaxcustid = mysqli_query($con, "SELECT MAX(custId) FROM paiddata");
                    foreach ($findmaxcustid as $findmaxcustidResult) {
                        $custMaxId = $findmaxcustidResult['MAX(custId)'] + 1;
                    }


                    $query = "INSERT INTO `paiddata`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`dataType`,`companyId`,`pictureId`,`verified`,`createdDate`) VALUES('$custMaxId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$Type','$CompanyID','$PictureID','$Verified','$createdDate')";
                }
            } elseif ($FreeDataType == 'MD') {


                if ($RegisteredNumber != 0 && $RegisteredNumber != '') {

                    $checkRegisteredExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM marriagedata WHERE registeredNumber = '$RegisteredNumber' OR whatsappNumber = '$RegisteredNumber' OR residencePhoneNumber = '$RegisteredNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $RegisteredNumberRows = mysqli_num_rows($checkRegisteredExists);

                    if ($RegisteredNumberRows > 0) {
                        foreach ($checkRegisteredExists as $checkRegisteredResult) {
                            $profileId = $checkRegisteredResult['profileId'];
                            $registeredNumber = $checkRegisteredResult['registeredNumber'];
                            $whatsappNumber = $checkRegisteredResult['whatsappNumber'];
                            $residencePhoneNumber = $checkRegisteredResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $RegisteredNumberRows = 0;
                }
                if ($WhatsappNumber != 0 && $WhatsappNumber != '') {

                    $checkWhatsappExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM marriagedata WHERE registeredNumber = '$WhatsappNumber' OR whatsappNumber = '$WhatsappNumber' OR residencePhoneNumber = '$WhatsappNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $WhatsappNumberRows = mysqli_num_rows($checkWhatsappExists);
                    if ($WhatsappNumberRows > 0) {
                        foreach ($checkWhatsappExists as $checkWhatsappResult) {
                            $profileId = $checkWhatsappResult['profileId'];
                            $registeredNumber = $checkWhatsappResult['registeredNumber'];
                            $whatsappNumber = $checkWhatsappResult['whatsappNumber'];
                            $residencePhoneNumber = $checkWhatsappResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $WhatsappNumberRows = 0;
                }
                if ($ResidencePhoneNumber != 0 && $ResidencePhoneNumber != '') {

                    $checkResidenceExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM marriagedata WHERE registeredNumber = '$ResidencePhoneNumber' OR whatsappNumber = '$ResidencePhoneNumber' OR residencePhoneNumber = '$ResidencePhoneNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $ResidenceNumberRows = mysqli_num_rows($checkResidenceExists);
                    if ($ResidenceNumberRows > 0) {
                        foreach ($checkResidenceExists as $checkResidenceResult) {
                            $profileId = $checkResidenceResult['profileId'];
                            $registeredNumber = $checkResidenceResult['registeredNumber'];
                            $whatsappNumber = $checkResidenceResult['whatsappNumber'];
                            $residencePhoneNumber = $checkResidenceResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $ResidenceNumberRows = 0;
                }


                //echo $RegisteredNumberRows;
                //echo $WhatsappNumberRows;
                //echo $ResidenceNumberRows;
                //print_r($duplicateIds);
                //print_r($duplicateNumberTypes);


                $FindIdExists = mysqli_query($con, "SELECT profileId FROM marriagedata WHERE profileId = '$ProfileID'");
                if (mysqli_num_rows($FindIdExists) > 0) {
                    $IDexists = 'Exists';
                } else {

                    $IDexists = '';
                }

                $FindCompanyIdExists = mysqli_query($con, "SELECT companyId FROM marriagedata WHERE companyId = '$CompanyID'");
                if (mysqli_num_rows($FindCompanyIdExists) > 0) {
                    $CompanyIDexists = 'Exists';
                } else {

                    $CompanyIDexists = '';
                }


                if ($RegisteredNumberRows > 0 || $WhatsappNumberRows > 0 || $ResidenceNumberRows > 0 || $IDexists == 'Exists' || $CompanyIDexists == 'Exists') {

                    //echo "exists";

                    $findmaxDuplicateid = mysqli_query($con, "SELECT MAX(custId) FROM freeregduplicate");
                    foreach ($findmaxDuplicateid as $findmaxDuplicateidResult) {
                        $DuplicateMaxId = $findmaxDuplicateidResult['MAX(custId)'] + 1;
                    }

                    $duplicateIdString = implode(",", $duplicateIds);
                    $duplicateNumberTypeString = implode(",", $duplicateNumberTypes);


                    $query = "INSERT INTO `freeregduplicate`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`) VALUES('$DuplicateMaxId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$duplicateIdString','$duplicateNumberTypeString','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified')";
                } else {


                    //echo "fresh";

                    $findmaxcustid = mysqli_query($con, "SELECT MAX(custId) FROM marriagedata");
                    foreach ($findmaxcustid as $findmaxcustidResult) {
                        $custMaxId = $findmaxcustidResult['MAX(custId)'] + 1;
                    }


                    $query = "INSERT INTO `marriagedata`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`dataType`,`companyId`,`pictureId`,`verified`,`createdDate`) VALUES('$custMaxId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$Type','$CompanyID','$PictureID','$Verified','$createdDate')";
                }
            } elseif ($FreeDataType == 'WD') {


                if ($RegisteredNumber != 0 && $RegisteredNumber != '') {

                    $checkRegisteredExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM weddingdata WHERE registeredNumber = '$RegisteredNumber' OR whatsappNumber = '$RegisteredNumber' OR residencePhoneNumber = '$RegisteredNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $RegisteredNumberRows = mysqli_num_rows($checkRegisteredExists);

                    if ($RegisteredNumberRows > 0) {
                        foreach ($checkRegisteredExists as $checkRegisteredResult) {
                            $profileId = $checkRegisteredResult['profileId'];
                            $registeredNumber = $checkRegisteredResult['registeredNumber'];
                            $whatsappNumber = $checkRegisteredResult['whatsappNumber'];
                            $residencePhoneNumber = $checkRegisteredResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $RegisteredNumberRows = 0;
                }
                if ($WhatsappNumber != 0 && $WhatsappNumber != '') {

                    $checkWhatsappExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM weddingdata WHERE registeredNumber = '$WhatsappNumber' OR whatsappNumber = '$WhatsappNumber' OR residencePhoneNumber = '$WhatsappNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $WhatsappNumberRows = mysqli_num_rows($checkWhatsappExists);
                    if ($WhatsappNumberRows > 0) {
                        foreach ($checkWhatsappExists as $checkWhatsappResult) {
                            $profileId = $checkWhatsappResult['profileId'];
                            $registeredNumber = $checkWhatsappResult['registeredNumber'];
                            $whatsappNumber = $checkWhatsappResult['whatsappNumber'];
                            $residencePhoneNumber = $checkWhatsappResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $WhatsappNumberRows = 0;
                }
                if ($ResidencePhoneNumber != 0 && $ResidencePhoneNumber != '') {

                    $checkResidenceExists = mysqli_query($con, "SELECT profileId,registeredNumber,whatsappNumber,residencePhoneNumber FROM weddingdata WHERE registeredNumber = '$ResidencePhoneNumber' OR whatsappNumber = '$ResidencePhoneNumber' OR residencePhoneNumber = '$ResidencePhoneNumber'  AND registeredNumber <> '' AND whatsappNumber <> ''  AND residencePhoneNumber <> '' ");

                    $ResidenceNumberRows = mysqli_num_rows($checkResidenceExists);
                    if ($ResidenceNumberRows > 0) {
                        foreach ($checkResidenceExists as $checkResidenceResult) {
                            $profileId = $checkResidenceResult['profileId'];
                            $registeredNumber = $checkResidenceResult['registeredNumber'];
                            $whatsappNumber = $checkResidenceResult['whatsappNumber'];
                            $residencePhoneNumber = $checkResidenceResult['residencePhoneNumber'];
                        }

                        if ($registeredNumber != 0 || $registeredNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $registeredNumber);
                        } elseif ($whatsappNumber != 0 || $whatsappNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $whatsappNumber);
                        } elseif ($residencePhoneNumber != 0 || $residencePhoneNumber != '') {
                            array_push($duplicateIds, $profileId);
                            array_push($duplicateNumberTypes, $residencePhoneNumber);
                        }
                    } else {
                    }
                } else {
                    $ResidenceNumberRows = 0;
                }


                //echo $RegisteredNumberRows;
                //echo $WhatsappNumberRows;
                //echo $ResidenceNumberRows;
                //print_r($duplicateIds);
                //print_r($duplicateNumberTypes);


                $FindIdExists = mysqli_query($con, "SELECT profileId FROM weddingdata WHERE profileId = '$ProfileID'");
                if (mysqli_num_rows($FindIdExists) > 0) {
                    $IDexists = 'Exists';
                } else {

                    $IDexists = '';
                }

                $FindCompanyIdExists = mysqli_query($con, "SELECT companyId FROM weddingdata WHERE companyId = '$CompanyID'");
                if (mysqli_num_rows($FindCompanyIdExists) > 0) {
                    $CompanyIDexists = 'Exists';
                } else {

                    $CompanyIDexists = '';
                }


                if ($RegisteredNumberRows > 0 || $WhatsappNumberRows > 0 || $ResidenceNumberRows > 0 || $IDexists == 'Exists' || $CompanyIDexists == 'Exists') {

                    //echo "exists";

                    $findmaxDuplicateid = mysqli_query($con, "SELECT MAX(custId) FROM freeregduplicate");
                    foreach ($findmaxDuplicateid as $findmaxDuplicateidResult) {
                        $DuplicateMaxId = $findmaxDuplicateidResult['MAX(custId)'] + 1;
                    }

                    $duplicateIdString = implode(",", $duplicateIds);
                    $duplicateNumberTypeString = implode(",", $duplicateNumberTypes);


                    $query = "INSERT INTO `freeregduplicate`
                    (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`) VALUES('$DuplicateMaxId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$duplicateIdString','$duplicateNumberTypeString','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified')";
                } else {


                    //echo "fresh";

                    $findmaxcustid = mysqli_query($con, "SELECT MAX(custId) FROM weddingdata");
                    foreach ($findmaxcustid as $findmaxcustidResult) {
                        $custMaxId = $findmaxcustidResult['MAX(custId)'] + 1;
                    }


                    $query = "INSERT INTO `weddingdata`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`dataType`,`companyId`,`pictureId`,`verified`,`createdDate`) VALUES('$custMaxId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$Type','$CompanyID','$PictureID','$Verified','$createdDate')";
                }
            }



            //echo $query;


            $SqlinsertQuery = mysqli_query($con, $query);

            if ($SqlinsertQuery) {
                //$ImportCounter++;
                //echo json_encode(array('cust' => 1));
            } else {
                //echo json_encode(array('cust' => 0));
            }
        }

        echo json_encode(array('cust' => 1));
    } else {
        echo json_encode(array('cust' => 0));
    }
}





?>







<?php












?>
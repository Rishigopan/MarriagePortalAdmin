<?php



require '../MAIN/Dbconfig.php';

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard\Duplicates;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

//$DateNow = date('Y-m-d');
$UserID = $_COOKIE['custidcookie'];
$UpdateOldDate = "1970-01-01 00:00:00";


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
    $BulkBranch = $_POST['BulkBranch'];
    $BulkAgency = $_POST['BulkAgency'];

    
    if ($BulkDataType == 'BD') {
        $TableName = 'bulkdata';
    } elseif ($BulkDataType == 'LD') {
        $TableName = 'leaddata';
    }

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
        $InsertCounter = 0;
        foreach ($worksheetArray as $key => $value) {

            if ($value[4] == '') {
                break;
            }

            $DateNow = date('Y-m-d h:i:s'); 

            $FindNormalMaxId  = mysqli_query($con, "SELECT MAX(bulkId) FROM $TableName");
            foreach ($FindNormalMaxId as $FindNormalMaxIdResult) {
                $NormalMaxId = $FindNormalMaxIdResult['MAX(bulkId)'];
            }

            $FindDuplicateMaxId  = mysqli_query($con, "SELECT MAX(bulkId) FROM bulkduplicate");
            foreach ($FindDuplicateMaxId as $FindDuplicateMaxIdResult) {
                $DuplicateMaxId = $FindDuplicateMaxIdResult['MAX(bulkId)'];
            }


            if ($DuplicateMaxId > $NormalMaxId) {
                $MaxId = $DuplicateMaxId;
            } else {
                $MaxId = $NormalMaxId;
            }

            $MaxId = $MaxId + 1;


            $newvalue++;

            $CompanyId = (FilterValue($value[1]) <> '') ? FilterValue($value[1]) : 0;
            $MasterDataType = FilterValue($value[2]);
            $Verified = FilterValue($value[3]);
            $BulkMobile = (FilterValue($value[4]) <> '') ? FilterValue($value[4]) : 0;
            $BulkName = FilterValue($value[5]);
            $Remark = FilterValue($value[6]);
            $ReferenceName = FilterValue($value[8]);
            $ReferenceNumber = (FilterValue($value[7]) <> '') ? FilterValue($value[7]) : 0;


            //Data Type
            $findDataType = mysqli_fetch_assoc(mysqli_query($con, "SELECT id FROM types WHERE typeName = '$MasterDataType'"));
            $DataType =  is_array($findDataType) ? $findDataType['id'] : 0;




            // $BulkNumberInBulkArray = array();
            // $BulkNumberInLeadArray = array();
            // $BulkNumberInFreeWhatsappArray = array();
            // $BulkNumberInFreeRegisterArray = array();
            // $BulkNumberInFreeResidenceArray = array();
            // $BulkNumberInPaidWhatsappArray = array();
            // $BulkNumberInPaidRegisterArray = array();
            // $BulkNumberInPaidResidenceArray = array();
            // $BulkNumberInMarriageWhatsappArray = array();
            // $BulkNumberInMarriageRegisterArray = array();
            // $BulkNumberInMarriageResidenceArray = array();

            // $FindBulkNumberInBulk = mysqli_query($con, "SELECT bulkName FROM bulkdata WHERE bulkPhone = '$BulkMobile'");
            // if (mysqli_num_rows($FindBulkNumberInBulk) == 0) {
            //     //echo "no duplicate in bulk";

            //     $FindBulkNumberInLead = mysqli_query($con, "SELECT bulkName FROM leaddata WHERE bulkPhone = '$BulkMobile'");
            //     if (mysqli_num_rows($FindBulkNumberInLead) == 0) {
            //         //echo "no duplicate in lead";

            //         $FindBulkNumberInFreeWhatsapp = mysqli_query($con, "SELECT profileId FROM custdata WHERE whatsappNumber = '$BulkMobile'");
            //         if (mysqli_num_rows($FindBulkNumberInFreeWhatsapp) == 0) {
            //             //echo "no duplicate in free whatsapp ";

            //             $FindBulkNumberInFreeRegister = mysqli_query($con, "SELECT profileId FROM custdata WHERE registeredNumber = '$BulkMobile'");
            //             if (mysqli_num_rows($FindBulkNumberInFreeRegister) == 0) {
            //                 //echo "no duplicate in free registered ";

            //                 $FindBulkNumberInFreeResidence = mysqli_query($con, "SELECT profileId FROM custdata WHERE residencePhoneNumber = '$BulkMobile'");
            //                 if (mysqli_num_rows($FindBulkNumberInFreeResidence) == 0) {
            //                     //echo "no duplicate in free Residence ".$BulkMobile;

            //                     $FindBulkNumberInPaidWhatsapp = mysqli_query($con, "SELECT profileId FROM paiddata WHERE whatsappNumber = '$BulkMobile'");
            //                     if (mysqli_num_rows($FindBulkNumberInPaidWhatsapp) == 0) {
            //                         //echo "no duplicate in paid whatsapp ".$BulkMobile;

            //                         $FindBulkNumberInPaidRegister = mysqli_query($con, "SELECT profileId FROM paiddata WHERE registeredNumber = '$BulkMobile'");
            //                         if (mysqli_num_rows($FindBulkNumberInPaidRegister) == 0) {
            //                             //echo "no duplicate in paid register ".$BulkMobile;

            //                             $FindBulkNumberInPaidResidence = mysqli_query($con, "SELECT profileId FROM paiddata WHERE residencePhoneNumber = '$BulkMobile'");
            //                             if (mysqli_num_rows($FindBulkNumberInPaidResidence) == 0) {
            //                                 //echo "no duplicate in paid residence ".$BulkMobile;

            //                                 $FindBulkNumberInMarriageWhatsapp = mysqli_query($con, "SELECT profileId FROM marriagedata WHERE whatsappNumber = '$BulkMobile'");
            //                                 if (mysqli_num_rows($FindBulkNumberInMarriageWhatsapp) == 0) {
            //                                     //echo "no duplicate in marriage whatsapp ".$BulkMobile;

            //                                     $FindBulkNumberInMarriageRegister = mysqli_query($con, "SELECT profileId FROM marriagedata WHERE registeredNumber = '$BulkMobile'");
            //                                     if (mysqli_num_rows($FindBulkNumberInMarriageRegister) == 0) {
            //                                         //echo "no duplicate in marriage Register ".$BulkMobile;

            //                                         $FindBulkNumberInMarriageResidence = mysqli_query($con, "SELECT profileId FROM marriagedata WHERE residencePhoneNumber = '$BulkMobile'");
            //                                         if (mysqli_num_rows($FindBulkNumberInMarriageResidence) == 0) {
            //                                             echo "no duplicate in marriage Residence " . $BulkMobile;
            //                                         } else {
            //                                             foreach ($FindBulkNumberInMarriageResidence as $FindBulkNumberInMarriageResidenceResult) {
            //                                                 array_push($BulkNumberInMarriageResidenceArray, $FindBulkNumberInMarriageResidenceResult['profileId']);
            //                                             }

            //                                             $BulkNumberInMarriageResidence = implode(",", $BulkNumberInMarriageResidenceArray);
            //                                             $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','MarriageResidence','$BulkNumberInMarriageResidence','MD')";
            //                                             if (mysqli_query($con, $query)) {
            //                                                 $InsertCounter++;
            //                                             } else {
            //                                             }
            //                                         }
            //                                     } else {
            //                                         foreach ($FindBulkNumberInMarriageRegister as $FindBulkNumberInMarriageRegisterResult) {
            //                                             array_push($BulkNumberInMarriageRegisterArray, $FindBulkNumberInMarriageRegisterResult['profileId']);
            //                                         }

            //                                         $BulkNumberInMarriageRegister = implode(",", $BulkNumberInMarriageRegisterArray);
            //                                         $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','MarriageRegister','$BulkNumberInMarriageRegister','MD')";
            //                                         if (mysqli_query($con, $query)) {
            //                                             $InsertCounter++;
            //                                         } else {
            //                                         }
            //                                     }
            //                                 } else {
            //                                     foreach ($FindBulkNumberInMarriageWhatsapp as $FindBulkNumberInMarriageWhatsappResult) {
            //                                         array_push($BulkNumberInMarriageWhatsappArray, $FindBulkNumberInMarriageWhatsappResult['profileId']);
            //                                     }

            //                                     $BulkNumberInMarriageWhatsapp = implode(",", $BulkNumberInMarriageWhatsappArray);
            //                                     $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','MarriageWhatsapp','$BulkNumberInMarriageWhatsapp','MD')";
            //                                     if (mysqli_query($con, $query)) {
            //                                         $InsertCounter++;
            //                                     } else {
            //                                     }
            //                                 }
            //                             } else {
            //                                 foreach ($FindBulkNumberInPaidResidence as $FindBulkNumberInPaidResidenceResult) {
            //                                     array_push($BulkNumberInPaidResidenceArray, $FindBulkNumberInPaidResidenceResult['profileId']);
            //                                 }

            //                                 $BulkNumberInPaidResidence = implode(",", $BulkNumberInPaidResidenceArray);
            //                                 $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','PaidResidence','$BulkNumberInPaidResidence','PD')";
            //                                 if (mysqli_query($con, $query)) {
            //                                     $InsertCounter++;
            //                                 } else {
            //                                 }
            //                             }
            //                         } else {
            //                             foreach ($FindBulkNumberInPaidRegister as $FindBulkNumberInPaidRegisterResult) {
            //                                 array_push($BulkNumberInPaidRegisterArray, $FindBulkNumberInPaidRegisterResult['profileId']);
            //                             }

            //                             $BulkNumberInPaidRegister = implode(",", $BulkNumberInPaidRegisterArray);
            //                             $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','PaidRegister','$BulkNumberInPaidRegister','PD')";
            //                             if (mysqli_query($con, $query)) {
            //                                 $InsertCounter++;
            //                             } else {
            //                             }
            //                         }
            //                     } else {
            //                         foreach ($FindBulkNumberInPaidWhatsapp as $FindBulkNumberInPaidWhatsappResult) {
            //                             array_push($BulkNumberInPaidWhatsappArray, $FindBulkNumberInPaidWhatsappResult['profileId']);
            //                         }

            //                         $BulkNumberInPaidWhatsapp = implode(",", $BulkNumberInPaidWhatsappArray);
            //                         $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','PaidWhatsapp','$BulkNumberInPaidWhatsapp','PD')";
            //                         if (mysqli_query($con, $query)) {
            //                             $InsertCounter++;
            //                         } else {
            //                         }
            //                     }
            //                 } else {
            //                     foreach ($FindBulkNumberInFreeResidence as $FindBulkNumberInFreeResidenceResult) {
            //                         array_push($BulkNumberInFreeResidenceArray, $FindBulkNumberInFreeResidenceResult['profileId']);
            //                     }

            //                     $BulkNumberInFreeResidence = implode(",", $BulkNumberInFreeResidenceArray);
            //                     $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','FreeResidence','$BulkNumberInFreeResidence','FD')";
            //                     if (mysqli_query($con, $query)) {
            //                         $InsertCounter++;
            //                     } else {
            //                     }
            //                 }
            //             } else {
            //                 //echo "duplicate found ";

            //                 foreach ($FindBulkNumberInFreeRegister as $FindBulkNumberInFreeRegisterResult) {
            //                     array_push($BulkNumberInFreeRegisterArray, $FindBulkNumberInFreeRegisterResult['profileId']);
            //                 }

            //                 $BulkNumberInFreeRegister = implode(",", $BulkNumberInFreeRegisterArray);
            //                 $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','FreeRegister','$BulkNumberInFreeRegister','FD')";
            //                 if (mysqli_query($con, $query)) {
            //                     $InsertCounter++;
            //                 } else {
            //                 }
            //             }
            //         } else {
            //             //echo "duplicate found ";

            //             foreach ($FindBulkNumberInFreeWhatsapp as $FindBulkNumberInFreeWhatsappResult) {
            //                 array_push($BulkNumberInFreeWhatsappArray, $FindBulkNumberInFreeWhatsappResult['profileId']);
            //             }

            //             $BulkNumberInFreeWhatsapp = implode(",", $BulkNumberInFreeWhatsappArray);
            //             $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','FreeWhatsapp','$BulkNumberInFreeWhatsapp','FD')";
            //             if (mysqli_query($con, $query)) {
            //                 $InsertCounter++;
            //             } else {
            //             }
            //         }
            //     } else {
            //         //Duplicate found in lead number
            //         foreach ($FindBulkNumberInLead as $FindBulkNumberInLeadResult) {
            //             array_push($BulkNumberInLeadArray, $FindBulkNumberInLeadResult['bulkName']);
            //         }
            //         $BulkNumberInLead = implode(",", $BulkNumberInLeadArray);
            //         $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','LeadPhone','$BulkNumberInLead','LD')";
            //         if (mysqli_query($con, $query)) {
            //             $InsertCounter++;
            //         } else {
            //         }
            //     }
            // } else {
            //     //Duplicate found in bulk number
            //     foreach ($FindBulkNumberInBulk as $FindBulkNumberInBulkResult) {
            //         array_push($BulkNumberInBulkArray, $FindBulkNumberInBulkResult['bulkName']);
            //     }
            //     $BulkNumberInBulk = implode(",", $BulkNumberInBulkArray);
            //     $query = " INSERT INTO `bulkduplicate` (`companyId`,`bulkType`,`verified`,`bulkPhone`,`bulkName`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkRemark`,`bulkDuplicateCheck`,`bulkDuplicateValue`,`bulkDuplicateValueType`,`bulkDuplicateFoundIn`,`bulkDuplicateFoundDataType`) VALUES ('$CompanyId','$DataType','$Verified','$BulkMobile','$BulkName','$ReferenceName','$ReferenceNumber','1','$DateNow','$Remark','BulkPhone','$BulkMobile','BulkPhone','$BulkNumberInBulk','BD')";
            //     if (mysqli_query($con, $query)) {
            //         $InsertCounter++;
            //     } else {
            //     }
            // }


            $MainArray = array();
            $BulkPhoneArray = array();
            $ReferencePhoneArray = array();
            $CompanyIdArray = array();


            $DuplicateExists = false;
            for ($I = 0; $I <= 2; $I++) {


                $WhatsappCheckArray = array();
                $RegisterCheckArray = array();
                $ResidenceCheckArray = array();
                $BulkCheckArray = array();
                $ReferenceCheckArray = array();
                $CompanyIdCheckArray = array();


                $Query = "SELECT bulkId,bulkPhone,referPhone,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,profileId,fullName,DATATYPE FROM (SELECT bulkId, bulkPhone ,referPhone,'' AS whatsappNumber, '' AS registeredNumber, '' AS residencePhoneNumber,companyId,'' AS profileId, bulkName AS fullName ,  'BD' AS DATATYPE FROM bulkdata UNION ALL SELECT bulkId, bulkPhone ,referPhone,'' AS whatsappNumber, '' AS registeredNumber, '' AS residencePhoneNumber,companyId,'' AS profileId, bulkName AS fullName , 'LD' AS DATATYPE FROM leaddata UNION ALL SELECT '' AS bulkId, '' AS bulkPhone ,'' AS referPhone, whatsappNumber,registeredNumber,residencePhoneNumber,companyId,profileId,fullName, 'FD' AS DATATYPE FROM custdata UNION ALL SELECT '' AS bulkId, '' AS bulkPhone ,'' AS referPhone,  whatsappNumber,registeredNumber,residencePhoneNumber,companyId,profileId,fullName, 'PD' AS DATATYPE FROM paiddata UNION ALL SELECT '' AS bulkId, '' AS bulkPhone ,'' AS referPhone,  whatsappNumber,registeredNumber,residencePhoneNumber,companyId,profileId,fullName, 'MD' AS DATATYPE FROM marriagedata UNION ALL SELECT '' AS bulkId, '' AS bulkPhone ,'' AS referPhone,  whatsappNumber,registeredNumber,residencePhoneNumber,companyId,profileId,fullName, 'WD' AS DATATYPE FROM weddingdata)CombinedData";

                $CheckZero  = true;

                //echo $I;

                if ($I == 0) {
                    //echo "0";
                    if ($BulkMobile != 0) {
                        $Query .= " WHERE whatsappNumber = $BulkMobile OR registeredNumber = $BulkMobile OR residencePhoneNumber = $BulkMobile OR bulkPhone = $BulkMobile OR referPhone = $BulkMobile";
                        $CheckValue = 'BulkPhone';
                        $CheckNumber = $BulkMobile;
                        $FindDuplicatesQuery = mysqli_query($con, $Query);
                        if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
                            goto BulkExecuteQuery;
                        } else {
                            $CheckZero  = false;
                        }
                    } else {
                        $CheckZero  = false;
                    }
                } elseif ($I == 1) {
                    //echo "1";
                    if ($CompanyId != 0) {
                        $Query .= " WHERE companyId = $CompanyId";
                        $CheckValue = 'CompanyId';
                        $CheckNumber = $CompanyId;
                        $FindDuplicatesQuery = mysqli_query($con, $Query);
                        if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
                            goto BulkExecuteQuery;
                        } else {
                            $CheckZero  = false;
                        }
                    } else {
                        $CheckZero  = false;
                    }
                } elseif ($I == 2) {
                    //echo "2";
                    if ($ReferenceNumber != 0) {
                        $Query .= " WHERE whatsappNumber = $ReferenceNumber OR registeredNumber = $ReferenceNumber OR residencePhoneNumber = $ReferenceNumber OR bulkPhone = $ReferenceNumber OR referPhone = $ReferenceNumber";
                        $CheckValue = 'ReferenceNumber';
                        $CheckNumber = $ReferenceNumber;
                        $FindDuplicatesQuery = mysqli_query($con, $Query);
                        if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
                            goto BulkExecuteQuery;
                        } else {
                            $CheckZero  = false;
                        }
                    } else {
                        $CheckZero  = false;
                    }
                }


                //echo $Query;



                BulkExecuteQuery:

                if ($CheckZero  == true) {

                    $DuplicateExists = true;
                    foreach ($FindDuplicatesQuery as $FindDuplicatesQueryResult) {
                        //$DuplicateTypeArray = array();

                        if ($CheckNumber == $FindDuplicatesQueryResult['whatsappNumber']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT) : $FindDuplicatesQueryResult['profileId'];
                            array_push($WhatsappCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Wha');
                            //$DuplicateType = 'W';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['registeredNumber']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($RegisterCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Reg');
                            //$DuplicateType = 'RG';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['residencePhoneNumber']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($ResidenceCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Res');
                            //$DuplicateType = 'RS';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['bulkPhone']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($BulkCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Mob');
                            //$DuplicateType = 'B';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['companyId']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($CompanyIdCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - CID');
                            //$DuplicateType = 'C';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['referPhone']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($ReferenceCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Ref');
                            //$DuplicateType = 'C';
                        }


                        // if ($CheckNumber == $FindDuplicatesQueryResult['whatsappNumber']) {
                        //     array_push($WhatsappCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'W';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['registeredNumber']) {
                        //     array_push($RegisterCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'RG';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['residencePhoneNumber']) {
                        //     array_push($ResidenceCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'RS';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['bulkPhone']) {
                        //     array_push($BulkCheckArray, $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'B';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['companyId']) {
                        //     array_push($CompanyIdCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'C';
                        // }elseif ($CheckNumber == $FindDuplicatesQueryResult['referPhone']) {
                        //     array_push($ReferenceCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'C';
                        // }
                    }



                    $WhatsappDuplicateCheck = implode(" / ", $WhatsappCheckArray);
                    $RegisterDuplicateCheck = implode(" / ", $RegisterCheckArray);
                    $ResidenceDuplicateCheck = implode(" / ", $ResidenceCheckArray);
                    $BulkDuplicateCheck = implode(" / ", $BulkCheckArray);
                    $CompanyIdDuplicateCheck = implode(" / ", $CompanyIdCheckArray);
                    $ReferenceDuplicateCheck = implode(" / ", $ReferenceCheckArray);

                    $ForStringArray = array($WhatsappDuplicateCheck, $RegisterDuplicateCheck, $ResidenceDuplicateCheck, $BulkDuplicateCheck, $CompanyIdDuplicateCheck, $ReferenceDuplicateCheck);

                    $CheckResults = '';

                    foreach ($ForStringArray as $ForStringArrayResults) {

                        if ($ForStringArrayResults != '') {
                            if ($CheckResults == '') {
                                $CheckResults .= $ForStringArrayResults;
                            } else {
                                $CheckResults .= ' / ' . $ForStringArrayResults;
                            }
                            //$CheckResults .= ' / '.$ForStringArrayResults;
                        } else {
                            //echo "No";
                        }
                    }



                    // $CheckResults = $WhatsappDuplicateCheck.' / '.$RegisterDuplicateCheck.' / '.$ResidenceDuplicateCheck.' / '.$BulkDuplicateCheck.' / '.$CompanyIdDuplicateCheck.' / '.$ReferenceDuplicateCheck;


                    // if (count($WhatsappCheckArray) > 0 || count($RegisterCheckArray) > 0 || count($ResidenceCheckArray) > 0 || count($BulkCheckArray) > 0 || count($CompanyIdCheckArray) > 0) {

                    //     $WhatsappDuplicateCheck = implode(",", $WhatsappCheckArray);
                    //     $RegisterDuplicateCheck = implode(",", $RegisterCheckArray);
                    //     $ResidenceDuplicateCheck = implode(",", $ResidenceCheckArray);
                    //     $BulkDuplicateCheck = implode(",", $BulkCheckArray);
                    //     $CompanyIdDuplicateCheck = implode(",", $CompanyIdCheckArray);

                    //     $query = "INSERT INTO `bulkduplicate`(`bulkName`,`branchId`,`agencyId`,`bulkPhone`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkStatus`,`assignedTo`,`companyId`,`bulkType`,`verified`,`duplicateCheckType`,`bulkDuplicateValue`,`whatsappDuplicate`,`registerDuplicate`,`residenceDuplicate`,`bulkDuplicate`,`companyDuplicate`,`importedData`) VALUES ('$BulkName','$BulkBranch','$BulkAgency','$BulkMobile','$ReferenceName','$ReferenceNumber','1','$DateNow','0','0','$CompanyId','$DataType','NO','$CheckValue','$CheckNumber','$WhatsappDuplicateCheck','$RegisterDuplicateCheck','$ResidenceDuplicateCheck','$BulkDuplicateCheck','$CompanyIdDuplicateCheck','$BulkDataType')";

                    //     // echo $query;

                    //     if (mysqli_query($con, $query)) {
                    //         $InsertCounter++;
                    //         break;
                    //     } else {
                    //     }
                    // }

                } else {
                    $CheckResults = ' ';
                }


                if ($I == 0) {
                    $BulkMergeArray = array('BulkPhone' => $CheckResults);
                } elseif ($I == 1) {
                    $CompanyMergeArray = array('CompanyId' => $CheckResults);
                } elseif ($I == 2) {
                    $ReferenceMergeArray = array('ReferenceNumber' => $CheckResults);
                    // array_push($ReferencePhoneArray,$ReferenceNumber,$CheckResults);
                }





                //array_push($MainArray,$CheckValue,$CheckNumber,$CheckResults);



            } //for loop ends here..



            $FinalDuplicateArray = array_merge($BulkMergeArray, $CompanyMergeArray, $ReferenceMergeArray);


            //print_r($FinalDuplicateArray);


            if ($DuplicateExists == true) {

                $BulkPhoneDuplicates =  $FinalDuplicateArray['BulkPhone'];
                $CompanyIdDuplicates =  $FinalDuplicateArray['CompanyId'];
                $ReferenceNumberDuplicates =  $FinalDuplicateArray['ReferenceNumber'];




                //    $TestVar = json_encode($FinalDuplicateArray);

                //    $decoded = json_decode($TestVar);

                //    echo $decoded -> BulkPhone;



                $query = "INSERT INTO `bulkduplicate`(`bulkId`,`bulkName`,`branchId`,`agencyId`,`bulkPhone`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkStatus`,`assignedTo`,`companyId`,`bulkType`,`verified`,`bulkRemark`,`duplicateCheckType`,`bulkDuplicateValue`,`whatsappDuplicate`,`registerDuplicate`,`residenceDuplicate`,`bulkDuplicate`,`companyDuplicate`,`referenceDuplicate`,`importedData`,`updatedBy`,`updatedDate`) VALUES ('$MaxId','$BulkName','$BulkBranch','$BulkAgency','$BulkMobile','$ReferenceName','$ReferenceNumber','1','$DateNow','0','0','$CompanyId','$DataType','$Verified','$Remark','','','','','','$BulkPhoneDuplicates','$CompanyIdDuplicates','$ReferenceNumberDuplicates','$BulkDataType','1','$UpdateOldDate')";


                if (mysqli_query($con, $query)) {
                    $InsertCounter++;
                } else {
                }
            } else {
                //echo "No Duplicate";
            }



            //print_r($MainArray);


            // print_r($BulkPhoneArray);
            // print_r($CompanyIdArray);
            // print_r($ReferencePhoneArray);




            // print_r($WhatsappCheckArray);
            // print_r($RegisterCheckArray);
            // print_r($ResidenceCheckArray);
            // print_r($ReferenceCheckArray);
            // print_r($BulkCheckArray);
            // print_r($CompanyIdCheckArray);




            //echo $DuplicateExists;
            //Check if duplicate exists or not
            if ($DuplicateExists == false) {



                $InsertQuery = "INSERT INTO `bulkdata`(`bulkId`,`branchId`,`agencyId`,`bulkName`,`bulkPhone`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkStatus`,`assignedTo`,`companyId`,`bulkType`,`verified`,`bulkRemark`,`bulkFeedbackDate`,`approvalStatus`,`updatedBy`,`updatedDate`) VALUES ('$MaxId','$BulkBranch','$BulkAgency','$BulkName','$BulkMobile','$ReferenceName','$ReferenceNumber','1','$DateNow','0','0','$CompanyId','$DataType','$Verified','$Remark','','0','1','$UpdateOldDate')";

                //echo $InsertQuery;


                $Inserted = mysqli_query($con, $InsertQuery);
                if ($Inserted) {
                    //echo "Inserrted";
                }
            }
        }
        echo json_encode(array('cust' => 1));
    } else {
        echo json_encode(array('cust' => 0));
    }
}





// free import
if (isset($_POST["importFile"])) {

    $check = $_FILES["fileToUpload"]["tmp_name"];
    $fileName = $_FILES['fileToUpload']['name'];
    $FreeDataType = $_POST['FreeDataType'];
    $FreeBranch = $_POST['FreeBranch'];
    $FreeAgency = $_POST['FreeAgency'];

    if ($FreeDataType == 'FD') {
        $TableName = 'custdata';
    } elseif ($FreeDataType == 'PD') {
        $TableName = 'paiddata';
    } elseif ($FreeDataType == 'MD') {
        $TableName = 'marriagedata';
    } elseif ($FreeDataType == 'WD') {
        $TableName = 'weddingdata';
    }

    
    $targetPath = 'uploads/' . $_FILES['fileToUpload']['name'];
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetPath);


    $findMaxImportId = mysqli_query($con, "SELECT MAX(importId) FROM importhistory");
    foreach ($findMaxImportId as $findMaxImportIdResult) {
        $ImportId = $findMaxImportIdResult['MAX(importId)'] + 1;
    }

    $insertData = mysqli_query($con, "INSERT INTO importhistory (importId,importFileName) 
    VALUES('$ImportId','$fileName')");

    if ($insertData) {

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheetArray = $worksheet->toArray();
        array_shift($worksheetArray);

        $newvalue = 1;

        $InsertCounter = 0;
        foreach ($worksheetArray as $key => $value) {

            if ($value[0] == '') {
                break;
            }


            $FindNormalMaxId  = mysqli_query($con, "SELECT MAX(custId) FROM $TableName");
            foreach ($FindNormalMaxId as $FindNormalMaxIdResult) {
                $NormalMaxId = $FindNormalMaxIdResult['MAX(custId)'];
            }

            $FindDuplicateMaxId  = mysqli_query($con, "SELECT MAX(custId) FROM freeregduplicate");
            foreach ($FindDuplicateMaxId as $FindDuplicateMaxIdResult) {
                $DuplicateMaxId = $FindDuplicateMaxIdResult['MAX(custId)'];
            }


            if ($DuplicateMaxId > $NormalMaxId) {
                $MaxId = $DuplicateMaxId;
            } else {
                $MaxId = $NormalMaxId;
            }

            $MaxId = $MaxId + 1;


            $newvalue++;


            $ProfileID =                        isset($value[0]) ? ((FilterValue($value[0]) <> '') ? FilterValue($value[0]) : '') : "";
            $MasterDataType =                   isset($value[1]) ? ((FilterValue($value[1]) <> '') ? FilterValue($value[1]) : '') : "";
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
            $RegisteredNumber =                 isset($value[32]) ? ((FilterValue($value[32]) <> '') ? FilterValue($value[32]) : '') : 0; //(FilterValue($value[31]) <> '') ? FilterValue($value[31]) : '';
            $WhatsappNumber =                   isset($value[33]) ? ((FilterValue($value[33]) <> '') ? FilterValue($value[33]) : '') : 0; //(FilterValue($value[32]) <> '') ? FilterValue($value[32]) : '';
            $ResidencePhoneNumber =             isset($value[34]) ? ((FilterValue($value[34]) <> '') ? FilterValue($value[34]) : '') : 0; //(FilterValue($value[33]) <> '') ? FilterValue($value[33]) : '';
            $ContactPersonName    =             isset($value[35]) ? ((FilterValue($value[35]) <> '') ? FilterValue($value[35]) : '') : ""; //(FilterValue($value[34]) <> '') ? FilterValue($value[34]) : '';
            $NoOfChildren =                     isset($value[36]) ? ((FilterValue($value[36]) <> '') ? FilterValue($value[36]) : '') : 0; //(FilterValue($value[35]) <> '') ? FilterValue($value[35]) : 0;
            $MasterSubcaste =                   isset($value[37]) ? ((FilterValue($value[37]) <> '') ? FilterValue($value[37]) : '') : 0; //(FilterValue($value[36]) <> '') ? FilterValue($value[36]) : 0;
            $CasteNoBar     =                   isset($value[38]) ? ((FilterValue($value[38]) <> '') ? FilterValue($value[38]) : '') : 0; //(FilterValue($value[37]) <> '') ? FilterValue($value[37]) : 0;

            $JobDetails     =                   isset($value[40]) ? ((FilterValue($value[40]) <> '') ? FilterValue($value[40]) : '') : ""; //(FilterValue($value[39]) <> '') ? FilterValue($value[39]) : '';
            $MasterMotherTongue =                     isset($value[41]) ? ((FilterValue($value[41]) <> '') ? FilterValue($value[41]) : '') : ""; //(FilterValue($value[40]) <> '') ? FilterValue($value[40]) : '';
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
            $createdDate = date('Y-m-d h:i:s');
            $photo1 = $PictureID . '.jpg';
            $photo2 = $PictureID . 'A' . '.jpg';
            $photo3 = $PictureID . 'B' . '.jpg';
            $photo4 = $PictureID . 'C' . '.jpg';
            $photo5 = $PictureID . 'D' . '.jpg';
            $photo6 = $PictureID . 'E' . '.jpg';
            $photo7 = $PictureID . 'F' . '.jpg';
            $photo8 = $PictureID . 'G' . '.jpg';
            $photo9 = $PictureID . 'H' . '.jpg';
            $photo10 = $PictureID . 'I' . '.jpg';

            $Horoscope1 = $PictureID . '.jpg';
            $Horoscope2 = $PictureID . 'A' . '.jpg';
            $Horoscope3 = $PictureID . 'B' . '.jpg';
            $Horoscope4 = $PictureID . 'C' . '.jpg';
            $Horoscope5 = $PictureID . 'D' . '.jpg';

            $IDProof1 = $PictureID . '.jpg';
            $IDProof2 = $PictureID . 'A' . '.jpg';
            $IDProof3 = $PictureID . 'B' . '.jpg';
            $IDProof4 = $PictureID . 'C' . '.jpg';
            $IDProof5 = $PictureID . 'D' . '.jpg';

            $Home1 = $PictureID . '.jpg';
            $Home2 = $PictureID . 'A' . '.jpg';
            $Home3 = $PictureID . 'B' . '.jpg';
            $Home4 = $PictureID . 'C' . '.jpg';
            $Home5 = $PictureID . 'D' . '.jpg';

            //isset() ? ((FilterValue() <> '') ? FilterValue() : '') : "";


            //Data Type
            $findDataType = mysqli_fetch_assoc(mysqli_query($con, "SELECT id FROM types WHERE typeName = '$MasterDataType'"));
            $Type =  is_array($findDataType) ? $findDataType['id'] : 0;

            //MotherTongue
            $findMotherTongue = mysqli_fetch_assoc(mysqli_query($con, "SELECT mtId FROM mothertongue WHERE motherTongueName = '$MasterMotherTongue'"));
            $MotherTongue =  is_array($findMotherTongue) ? $findMotherTongue['mtId'] : 0;

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


            $MainArray = array();
            $ProfileArray = array();
            $WhatsappArray = array();
            $RegisterArray = array();
            $ResidenceArray = array();
            $CompanyIdArray = array();



            //echo $WhatsappNumber;
            //echo '||||';

            $DuplicateExists = false;
            for ($I = 0; $I <= 4; $I++) {



                $WhatsappCheckArray = array();
                $RegisterCheckArray = array();
                $ResidenceCheckArray = array();
                $BulkCheckArray = array();
                $ReferenceCheckArray = array();
                $CompanyIdCheckArray = array();
                $ProfileIdCheckArray = array();

                $Query = "SELECT bulkId,profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,bulkPhone,referPhone,DATATYPE FROM (SELECT '' AS bulkId,profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,'' AS bulkPhone,'' AS referPhone, 'FD' AS DATATYPE FROM custdata UNION ALL SELECT '' AS bulkId,profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,'' AS bulkPhone,'' AS referPhone, 'PD' AS DATATYPE FROM paiddata UNION ALL SELECT '' AS bulkId,profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,'' AS bulkPhone,'' AS referPhone, 'MD' AS DATATYPE FROM marriagedata UNION ALL SELECT '' AS bulkId,profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,'' AS bulkPhone,'' AS referPhone, 'WD' AS DATATYPE FROM weddingdata UNION ALL SELECT bulkId,'' AS profileId,bulkName AS fullName,'' AS whatsappNumber,'' AS registeredNumber,'' AS residencePhoneNumber,companyId,bulkPhone,referPhone,'BD' AS DATATYPE FROM bulkdata UNION ALL SELECT bulkId,'' AS profileId,bulkName AS fullName,'' AS whatsappNumber,'' AS registeredNumber,'' AS residencePhoneNumber,companyId,bulkPhone,referPhone,'LD' AS DATATYPE FROM leaddata)CombinedTable";

                $CheckZero  = true;

                //echo $I;

                if ($I == 0) {
                    //echo "0";
                    if ($WhatsappNumber != 0) {
                        $Query .= " WHERE whatsappNumber = $WhatsappNumber OR registeredNumber = $WhatsappNumber OR residencePhoneNumber = $WhatsappNumber OR bulkPhone = $WhatsappNumber OR referPhone = $WhatsappNumber";
                        $CheckValue = 'WhatsappNumber';
                        $CheckNumber = $WhatsappNumber;
                        $FindDuplicatesQuery = mysqli_query($con, $Query);
                        if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
                            goto ExecuteQuery;
                        } else {
                            $CheckZero  = false;
                        }
                    } else {
                        $CheckZero  = false;
                    }
                } elseif ($I == 1) {
                    //echo "1";
                    if ($RegisteredNumber != 0) {
                        $Query .= " WHERE whatsappNumber = $RegisteredNumber OR registeredNumber = $RegisteredNumber OR residencePhoneNumber = $RegisteredNumber OR bulkPhone = $RegisteredNumber OR referPhone = $RegisteredNumber";
                        $CheckValue = 'RegisteredNumber';
                        $CheckNumber = $RegisteredNumber;
                        $FindDuplicatesQuery = mysqli_query($con, $Query);
                        if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
                            goto ExecuteQuery;
                        } else {
                            $CheckZero  = false;
                        }
                    } else {
                        $CheckZero  = false;
                    }
                } elseif ($I == 2) {
                    //echo "2";
                    if ($ResidencePhoneNumber != 0) {
                        $Query .= " WHERE whatsappNumber = $ResidencePhoneNumber OR registeredNumber = $ResidencePhoneNumber OR residencePhoneNumber = $ResidencePhoneNumber OR bulkPhone = $ResidencePhoneNumber OR referPhone = $ResidencePhoneNumber";
                        $CheckValue = 'ResidenceNumber';
                        $CheckNumber = $ResidencePhoneNumber;
                        $FindDuplicatesQuery = mysqli_query($con, $Query);
                        if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
                            goto ExecuteQuery;
                        } else {
                            $CheckZero  = false;
                        }
                    } else {
                        $CheckZero  = false;
                    }
                } elseif ($I == 3) {
                    //echo "3";
                    if ($CompanyID != '') {
                        $Query .= " WHERE companyId = '$CompanyID'";
                        $CheckValue = 'CompanyId';
                        $CheckNumber = $CompanyID;
                        $FindDuplicatesQuery = mysqli_query($con, $Query);
                        if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
                            goto ExecuteQuery;
                        } else {
                            $CheckZero  = false;
                        }
                    } else {
                        $CheckZero  = false;
                    }
                } elseif ($I == 4) {
                    //echo "4";
                    if ($ProfileID != '') {
                        $Query .= " WHERE profileId = '$ProfileID'";
                        $CheckValue = 'ProfileID';
                        $CheckNumber = $ProfileID;
                        $FindDuplicatesQuery = mysqli_query($con, $Query);
                        if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
                            goto ExecuteQuery;
                        } else {
                            $CheckZero  = false;
                        }
                    } else {
                        $CheckZero  = false;
                    }
                }


                //echo $Query;

                ExecuteQuery:

                if ($CheckZero  == true) {

                    $DuplicateExists = true;
                    foreach ($FindDuplicatesQuery as $FindDuplicatesQueryResult) {
                        //$DuplicateTypeArray = array();
                        // echo "Start";
                        // echo "w - ".$FindDuplicatesQueryResult['whatsappNumber'];
                        // echo "reg - ".$FindDuplicatesQueryResult['registeredNumber'];
                        // echo "res - ".$FindDuplicatesQueryResult['residencePhoneNumber'];
                        // echo "bulk - ".$FindDuplicatesQueryResult['bulkPhone'];
                        // echo "comp - ".$FindDuplicatesQueryResult['companyId'];
                        // echo "End";

                        // if ($FindDuplicatesQueryResult['whatsappNumber'] != '') {
                        //     array_push($DuplicateTypeArray, 'W');
                        //     ////$DuplicateType = 'WHATNO';
                        // } elseif ($FindDuplicatesQueryResult['registeredNumber'] != '') {
                        //     array_push($DuplicateTypeArray, 'RG');
                        //     //$DuplicateType = 'REGNO';
                        // } elseif($FindDuplicatesQueryResult['residencePhoneNumber'] != '') {
                        //     array_push($DuplicateTypeArray, 'RS');
                        //     //$DuplicateType = 'RESNO';
                        // }elseif($FindDuplicatesQueryResult['bulkPhone'] != ''){
                        //     array_push($DuplicateTypeArray, 'B');
                        //     //$DuplicateType = 'BULKNO';
                        // }elseif($FindDuplicatesQueryResult['companyId'] != ''){
                        //     array_push($DuplicateTypeArray, 'C');
                        //     //$DuplicateType = 'CMPID';
                        // }

                        // if ($CheckNumber == $FindDuplicatesQueryResult['whatsappNumber']) {
                        //     $DuplicateType = 'W';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['registeredNumber']) {
                        //     $DuplicateType = 'RG';
                        // }elseif ($CheckNumber == $FindDuplicatesQueryResult['residencePhoneNumber']) {
                        //     $DuplicateType = 'RS';
                        // }elseif($CheckNumber == $FindDuplicatesQueryResult['bulkPhone']){
                        //     $DuplicateType = 'B';
                        // }elseif($CheckNumber == $FindDuplicatesQueryResult['companyId']){
                        //     $DuplicateType = 'C';
                        // }


                        // if ($CheckNumber == $FindDuplicatesQueryResult['whatsappNumber']) {
                        //     array_push($WhatsappCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'W';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['registeredNumber']) {
                        //     array_push($RegisterCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'RG';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['residencePhoneNumber']) {
                        //     array_push($ResidenceCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'RS';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['bulkPhone']) {
                        //     array_push($BulkCheckArray, $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'B';
                        // } elseif ($CheckNumber == $FindDuplicatesQueryResult['companyId']) {
                        //     array_push($CompanyIdCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                        //     //$DuplicateType = 'C';
                        // }


                        if ($CheckNumber == $FindDuplicatesQueryResult['whatsappNumber']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($WhatsappCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Wha');
                            //$DuplicateType = 'W';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['registeredNumber']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($RegisterCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Reg');
                            //$DuplicateType = 'RG';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['residencePhoneNumber']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($ResidenceCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Res');
                            //$DuplicateType = 'RS';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['bulkPhone']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($BulkCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Mob');
                            //$DuplicateType = 'B';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['companyId']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($CompanyIdCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - CID');
                            //$DuplicateType = 'C';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['referPhone']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($ReferenceCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - Ref');
                            //$DuplicateType = 'C';
                        } elseif ($CheckNumber == $FindDuplicatesQueryResult['profileId']) {
                            $DuplicateId =  ($FindDuplicatesQueryResult['profileId'] == '') ? str_pad($FindDuplicatesQueryResult['bulkId'], 5, '0', STR_PAD_LEFT)  : $FindDuplicatesQueryResult['profileId'];
                            array_push($ReferenceCheckArray, $FindDuplicatesQueryResult['DATATYPE'] . ' - ' . $DuplicateId . ' - PID');
                            //$DuplicateType = 'C';
                        }


                        //$DuplicateType = implode(',', $DuplicateTypeArray);
                        //array_push($CheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $DuplicateType . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
                    }


                    $WhatsappDuplicateCheck = implode(" / ", $WhatsappCheckArray);
                    $RegisterDuplicateCheck = implode(" / ", $RegisterCheckArray);
                    $ResidenceDuplicateCheck = implode(" / ", $ResidenceCheckArray);
                    $BulkDuplicateCheck = implode(" / ", $BulkCheckArray);
                    $CompanyIdDuplicateCheck = implode(" / ", $CompanyIdCheckArray);
                    $ProfileIdDuplicateCheck = implode(" / ", $ProfileIdCheckArray);
                    $ReferenceDuplicateCheck = implode(" / ", $ReferenceCheckArray);

                    $ForStringArray = array($WhatsappDuplicateCheck, $RegisterDuplicateCheck, $ResidenceDuplicateCheck, $BulkDuplicateCheck, $CompanyIdDuplicateCheck, $ReferenceDuplicateCheck, $ProfileIdDuplicateCheck);

                    $CheckResults = '';

                    foreach ($ForStringArray as $ForStringArrayResults) {

                        if ($ForStringArrayResults != '') {
                            if ($CheckResults == '') {
                                $CheckResults .= $ForStringArrayResults;
                            } else {
                                $CheckResults .= ' / ' . $ForStringArrayResults;
                            }
                            //$CheckResults .= ' / '.$ForStringArrayResults;
                        } else {
                            //echo "No";
                        }
                    }
                } else {
                    $CheckResults = ' ';
                }

                if ($I == 0) {
                    $WhatsappMergeArray = array('WhatsappNumber' => $CheckResults);
                } elseif ($I == 1) {
                    $RegisteredMergeArray = array('RegisteredNumber' => $CheckResults);
                } elseif ($I == 2) {
                    $ResidenceMergeArray = array('ResidenceNumber' => $CheckResults);
                } elseif ($I == 3) {
                    $CompanyIdMergeArray = array('CompanyID' => $CheckResults);
                } elseif ($I == 4) {
                    $ProfileIdMergeArray = array('ProfileID' => $CheckResults);
                }



                // if (count($WhatsappCheckArray) > 0 || count($RegisterCheckArray) > 0 || count($ResidenceCheckArray) > 0 || count($BulkCheckArray) > 0 || count($CompanyIdCheckArray) > 0) {



                //     $WhatsappDuplicateCheck = implode(",", $WhatsappCheckArray);
                //     $RegisterDuplicateCheck = implode(",", $RegisterCheckArray);
                //     $ResidenceDuplicateCheck = implode(",", $ResidenceCheckArray);
                //     $BulkDuplicateCheck = implode(",", $BulkCheckArray);
                //     $CompanyIdDuplicateCheck = implode(",", $CompanyIdCheckArray);




                //     //$DuplicateCheck = implode(",", $CheckArray);

                //     $query = "INSERT INTO `freeregduplicate`(`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`,`duplicateCheckType`,`whatsappDuplicate`,`registerDuplicate`,`residenceDuplicate`,`bulkDuplicate`,`companyDuplicate`) VALUES('$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','dID','dNu','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified','$CheckValue','$WhatsappDuplicateCheck','$RegisterDuplicateCheck','$ResidenceDuplicateCheck','$BulkDuplicateCheck','$CompanyIdDuplicateCheck')";

                //     // echo $query;

                //     if (mysqli_query($con, $query)) {
                //         $InsertCounter++;
                //         break;
                //     } else {
                //     }
                // }
            } // for loop ends here


            $FinalDuplicateArray = array_merge($WhatsappMergeArray, $RegisteredMergeArray, $ResidenceMergeArray, $CompanyIdMergeArray, $ProfileIdMergeArray);


            if ($DuplicateExists == true) {

                $WhatsappDuplicates =  $FinalDuplicateArray['WhatsappNumber'];
                $RegisteredDuplicates =  $FinalDuplicateArray['RegisteredNumber'];
                $ResidenceDuplicates =  $FinalDuplicateArray['ResidenceNumber'];
                $CompanyIdDuplicates =  $FinalDuplicateArray['CompanyID'];
                $ProfileIdDuplicates =  $FinalDuplicateArray['ProfileID'];


                $query = "INSERT INTO `freeregduplicate`(`custId`,`profileId`,`branchId`,`agencyId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`,`whatsappDuplicate`,`registerDuplicate`,`residenceDuplicate`,`ProifileDuplicate`,`companyDuplicate`,`updatedBy`,`updatedDate`,`importedData`) VALUES('$MaxId','$ProfileID','$FreeBranch','$FreeAgency','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','dID','dNu','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$Type','$CompanyID','$PictureID','$Verified','$WhatsappDuplicates','$RegisteredDuplicates','$ResidenceDuplicates','$ProfileIdDuplicates','$CompanyIdDuplicates','1','$UpdateOldDate','$FreeDataType')";

                //echo $query;

                if (mysqli_query($con, $query)) {
                    $InsertCounter++;
                } else {
                }
            }



            //echo $DuplicateExists;
            if ($DuplicateExists == false) {



                $InsertQuery = "INSERT INTO $TableName
                    (`custId`,`profileId`,`branchId`,`agencyId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`dataType`,`companyId`,`pictureId`,`verified`,`createdDate`,`mainImage`,`approvalStatus`,`updatedBy`,`updatedDate`) VALUES('$MaxId','$ProfileID','$FreeBranch','$FreeAgency','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$Type','$CompanyID','$PictureID','$Verified','$createdDate','$photo1','0','1','$UpdateOldDate')";

                $InsertQuery;


                $Inserted = mysqli_query($con, $InsertQuery);
                if ($Inserted) {
                    //echo "Inserrted";
                }
            }




            // } else {
            //     foreach ($FindProfileExists as $FindProfileExistsResult) {
            //         array_push($ProfileCheckArray, $FindProfileExistsResult['profileId'] . ' - ' . $FindProfileExistsResult['fullName'] . ' - ' . $FindProfileExistsResult['DATATYPE']);
            //     }

            //     $ProfileCheck = implode(",", $ProfileCheckArray);

            //     $query = "INSERT INTO `freeregduplicate`(`profileId`,`branchId`,`agencyId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`,`duplicateCheckType`,`ProifileDuplicate`) VALUES('$ProfileID','$FreeBranch','$FreeAgency','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','dID','dNu','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified','ProfileID','$ProfileCheck')";

            //     //echo $query;

            //     if (mysqli_query($con, $query)) {
            //         $InsertCounter++;
            //     } else {
            //     }
            // }
        }

        echo json_encode(array('cust' => 1));
    } else {
        echo json_encode(array('cust' => 0));
    }
}







// // free import Old
// if (isset($_POST["importFile"])) {

//     $check = $_FILES["fileToUpload"]["tmp_name"];
//     $fileName = $_FILES['fileToUpload']['name'];
//     $FreeDataType = $_POST['FreeDataType'];
//     $FreeBranch = $_POST['FreeBranch'];
//     $FreeAgency = $_POST['FreeAgency'];

//     $targetPath = 'uploads/' . $_FILES['fileToUpload']['name'];
//     move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetPath);


//     $findMaxImportId = mysqli_query($con, "SELECT MAX(importId) FROM importhistory");
//     foreach ($findMaxImportId as $findMaxImportIdResult) {
//         $ImportId = $findMaxImportIdResult['MAX(importId)'] + 1;
//     }

//     $insertData = mysqli_query($con, "INSERT INTO importhistory (importId,importFileName) 
//     VALUES('$ImportId','$fileName')");

//     if ($insertData) {

//         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
//         $data = $spreadsheet->getActiveSheet()->toArray();
//         $worksheet = $spreadsheet->getActiveSheet();
//         $worksheetArray = $worksheet->toArray();
//         array_shift($worksheetArray);

//         $newvalue = 1;

//         $InsertCounter = 0;
//         foreach ($worksheetArray as $key => $value) {

//             if ($value[0] == '') {
//                 break;
//             }




//             $newvalue++;


//             $ProfileID =                        isset($value[0]) ? ((FilterValue($value[0]) <> '') ? FilterValue($value[0]) : '') : "";
//             $Type =                             isset($value[1]) ? ((FilterValue($value[1]) <> '') ? FilterValue($value[1]) : '') : "";
//             $CompanyID =                        isset($value[3]) ? ((FilterValue($value[3]) <> '') ? FilterValue($value[3]) : '') : ""; //(FilterValue($value[3]) <> '') ? FilterValue($value[3]) : '';
//             $PictureID =                        isset($value[4]) ? ((FilterValue($value[4]) <> '') ? FilterValue($value[4]) : '') : ""; //(FilterValue($value[4]) <> '') ? FilterValue($value[4]) : '';
//             $Verified =                         isset($value[5]) ? ((FilterValue($value[5]) <> '') ? FilterValue($value[5]) : '') : ""; //(FilterValue($value[5]) <> '') ? FilterValue($value[5]) : '';
//             $Gender =                           isset($value[6]) ? ((FilterValue($value[6]) <> '') ? FilterValue($value[6]) : '') : ""; //(FilterValue($value[6]) <> '') ? FilterValue($value[6]) : '';
//             $FullName =                         isset($value[7]) ? ((FilterValue($value[7]) <> '') ? FilterValue($value[7]) : '') : ""; //(FilterValue($value[7]) <> '') ? FilterValue($value[7]) : '';
//             $DOB =                              isset($value[8]) ? ((FilterValue($value[8]) <> '') ? FilterValue($value[8]) : '') : "01-Jan-1800"; //(FilterValue($value[8]) <> '') ? FilterValue($value[8]) : '';
//             $Height =                           isset($value[9]) ? ((FilterValue($value[9]) <> '') ? FilterValue($value[9]) : '') : "0 ft 0 in - 0 cm"; //(FilterValue($value[9]) <> '') ? FilterValue($value[9]) : '';
//             $Weight =                           isset($value[10]) ? ((FilterValue($value[10]) <> '') ? FilterValue($value[10]) : '') : ""; //(FilterValue($value[10]) <> '') ? FilterValue($value[10]) : '';
//             $Complexion =                       isset($value[11]) ? ((FilterValue($value[11]) <> '') ? FilterValue($value[11]) : '') : ""; //(FilterValue($value[11]) <> '') ? FilterValue($value[11]) : '';
//             $BodyType =                         isset($value[12]) ? ((FilterValue($value[12]) <> '') ? FilterValue($value[12]) : '') : ""; //(FilterValue($value[12]) <> '') ? FilterValue($value[12]) : '';
//             $MaritalStatus =                    isset($value[13]) ? ((FilterValue($value[13]) <> '') ? FilterValue($value[13]) : '') : ""; //(FilterValue($value[13]) <> '') ? FilterValue($value[13]) : '';
//             $PhysicalStatus =                   isset($value[14]) ? ((FilterValue($value[14]) <> '') ? FilterValue($value[14]) : '') : ""; //(FilterValue($value[14]) <> '') ? FilterValue($value[14]) : '';
//             $NativePlace =                      isset($value[15]) ? ((FilterValue($value[15]) <> '') ? FilterValue($value[15]) : '') : ""; //(FilterValue($value[15]) <> '') ? FilterValue($value[15]) : '';
//             $MasterReligion =                   isset($value[16]) ? ((FilterValue($value[16]) <> '') ? FilterValue($value[16]) : '') : ""; //FilterValue($value[16]);
//             $MasterCaste =                      isset($value[17]) ? ((FilterValue($value[17]) <> '') ? FilterValue($value[17]) : '') : ""; //FilterValue($value[17]);
//             $MasterStar =                       isset($value[18]) ? ((FilterValue($value[18]) <> '') ? FilterValue($value[18]) : '') : ""; //FilterValue($value[18]);
//             $ChovvaDosham =                     isset($value[19]) ? ((FilterValue($value[19]) <> '') ? FilterValue($value[19]) : '') : ""; //(FilterValue($value[19]) <> '') ? FilterValue($value[19]) : '';
//             $TypeJathakam =                     isset($value[20]) ? ((FilterValue($value[20]) <> '') ? FilterValue($value[20]) : '') : ""; //(FilterValue($value[20]) <> '') ? FilterValue($value[20]) : '';
//             $MasterEducationCategory =          isset($value[21]) ? ((FilterValue($value[21]) <> '') ? FilterValue($value[21]) : '') : ""; //FilterValue($value[21]);
//             $MasterEducationType =              isset($value[22]) ? ((FilterValue($value[22]) <> '') ? FilterValue($value[22]) : '') : ""; //FilterValue($value[22]);
//             $EducationDetails  =                isset($value[23]) ? ((FilterValue($value[23]) <> '') ? FilterValue($value[23]) : '') : ""; //(FilterValue($value[38]) <> '') ? FilterValue($value[38]) : '';
//             $MasterJobCategory =                isset($value[24]) ? ((FilterValue($value[24]) <> '') ? FilterValue($value[24]) : '') : ""; //FilterValue($value[23]);
//             $MasterJobType =                    isset($value[25]) ? ((FilterValue($value[25]) <> '') ? FilterValue($value[25]) : '') : ""; //FilterValue($value[24]);
//             $MasterJobLocationCountry =         isset($value[26]) ? ((FilterValue($value[26]) <> '') ? FilterValue($value[26]) : '') : ""; //FilterValue($value[25]);
//             $MasterJobLocationState =           isset($value[27]) ? ((FilterValue($value[27]) <> '') ? FilterValue($value[27]) : '') : ""; //FilterValue($value[26]);
//             $MasterJobLocationDistrict =        isset($value[28]) ? ((FilterValue($value[28]) <> '') ? FilterValue($value[28]) : '') : ""; //FilterValue($value[27]);
//             $MasterJobLocationCity =            isset($value[29]) ? ((FilterValue($value[29]) <> '') ? FilterValue($value[29]) : '') : ""; //FilterValue($value[28]);
//             $MonthlyIncome =                    isset($value[30]) ? ((FilterValue($value[30]) <> '') ? FilterValue($value[30]) : '') : 0; //(FilterValue($value[29]) <> '') ? FilterValue($value[29]) : 0;
//             $FinancialStatus =                  isset($value[31]) ? ((FilterValue($value[31]) <> '') ? FilterValue($value[31]) : '') : ""; //(FilterValue($value[30]) <> '') ? FilterValue($value[30]) : '';
//             $RegisteredNumber =                 isset($value[32]) ? ((FilterValue($value[32]) <> '') ? FilterValue($value[32]) : '') : 0; //(FilterValue($value[31]) <> '') ? FilterValue($value[31]) : '';
//             $WhatsappNumber =                   isset($value[33]) ? ((FilterValue($value[33]) <> '') ? FilterValue($value[33]) : '') : 0; //(FilterValue($value[32]) <> '') ? FilterValue($value[32]) : '';
//             $ResidencePhoneNumber =             isset($value[34]) ? ((FilterValue($value[34]) <> '') ? FilterValue($value[34]) : '') : 0; //(FilterValue($value[33]) <> '') ? FilterValue($value[33]) : '';
//             $ContactPersonName    =             isset($value[35]) ? ((FilterValue($value[35]) <> '') ? FilterValue($value[35]) : '') : ""; //(FilterValue($value[34]) <> '') ? FilterValue($value[34]) : '';
//             $NoOfChildren =                     isset($value[36]) ? ((FilterValue($value[36]) <> '') ? FilterValue($value[36]) : '') : 0; //(FilterValue($value[35]) <> '') ? FilterValue($value[35]) : 0;
//             $MasterSubcaste =                   isset($value[37]) ? ((FilterValue($value[37]) <> '') ? FilterValue($value[37]) : '') : 0; //(FilterValue($value[36]) <> '') ? FilterValue($value[36]) : 0;
//             $CasteNoBar     =                   isset($value[38]) ? ((FilterValue($value[38]) <> '') ? FilterValue($value[38]) : '') : 0; //(FilterValue($value[37]) <> '') ? FilterValue($value[37]) : 0;

//             $JobDetails     =                   isset($value[40]) ? ((FilterValue($value[40]) <> '') ? FilterValue($value[40]) : '') : ""; //(FilterValue($value[39]) <> '') ? FilterValue($value[39]) : '';
//             $MotherTongue =                     isset($value[41]) ? ((FilterValue($value[41]) <> '') ? FilterValue($value[41]) : '') : ""; //(FilterValue($value[40]) <> '') ? FilterValue($value[40]) : '';
//             $ProfileCreatedby =                 isset($value[42]) ? ((FilterValue($value[42]) <> '') ? FilterValue($value[42]) : '') : ""; //(FilterValue($value[41]) <> '') ? FilterValue($value[41]) : '';
//             $BloodGroup =                       isset($value[43]) ? ((FilterValue($value[43]) <> '') ? FilterValue($value[43]) : '') : ""; //(FilterValue($value[42]) <> '') ? FilterValue($value[42]) : '';
//             $ParishEdavakaSNDPNSSMahal =        isset($value[44]) ? ((FilterValue($value[44]) <> '') ? FilterValue($value[44]) : '') : ""; //(FilterValue($value[43]) <> '') ? FilterValue($value[43]) : '';
//             $When =                             isset($value[45]) ? ((FilterValue($value[45]) <> '') ? FilterValue($value[45]) : '') : ""; //(FilterValue($value[44]) <> '') ? FilterValue($value[44]) : '';
//             $CommunicationAddress =             isset($value[46]) ? ((FilterValue($value[46]) <> '') ? FilterValue($value[46]) : '') : ""; //(FilterValue($value[45]) <> '') ? FilterValue($value[45]) : '';
//             $Addres =                           isset($value[47]) ? ((FilterValue($value[47]) <> '') ? FilterValue($value[47]) : '') : ""; //(FilterValue($value[46]) <> '') ? FilterValue($value[46]) : '';
//             $PermanentAddress =                 isset($value[48]) ? ((FilterValue($value[48]) <> '') ? FilterValue($value[48]) : '') : ""; //(FilterValue($value[47]) <> '') ? FilterValue($value[47]) : '';
//             $MasterCountry =                    isset($value[49]) ? ((FilterValue($value[49]) <> '') ? FilterValue($value[49]) : '') : ""; //FilterValue($value[48]);
//             $MasterState    =                   isset($value[50]) ? ((FilterValue($value[50]) <> '') ? FilterValue($value[50]) : '') : ""; //FilterValue($value[49]);
//             $MasterDistrict =                   isset($value[51]) ? ((FilterValue($value[51]) <> '') ? FilterValue($value[51]) : '') : ""; //FilterValue($value[50]);
//             $MasterCity =                       isset($value[52]) ? ((FilterValue($value[52]) <> '') ? FilterValue($value[52]) : '') : ""; //FilterValue($value[51]);
//             $ResidentialStatus  =               isset($value[53]) ? ((FilterValue($value[53]) <> '') ? FilterValue($value[53]) : '') : ""; //(FilterValue($value[52]) <> '') ? FilterValue($value[52]) : '';
//             $PreferredContactNumber  =          isset($value[54]) ? ((FilterValue($value[54]) <> '') ? FilterValue($value[54]) : '') : 0; //(FilterValue($value[53]) <> '') ? FilterValue($value[53]) : 0 ;
//             $PreferredTime  =                   isset($value[55]) ? ((FilterValue($value[55]) <> '') ? FilterValue($value[55]) : '') : ""; //(FilterValue($value[54]) <> '') ? FilterValue($value[54]) : '';
//             $Relationshipwithcandidate  =       isset($value[56]) ? ((FilterValue($value[56]) <> '') ? FilterValue($value[56]) : '') : ""; //(FilterValue($value[55]) <> '') ? FilterValue($value[55]) : '';
//             $FatherName  =                      isset($value[57]) ? ((FilterValue($value[57]) <> '') ? FilterValue($value[57]) : '') : ""; //(FilterValue($value[56]) <> '') ? FilterValue($value[56]) : '';
//             $MasterFatherEducation =            isset($value[58]) ? ((FilterValue($value[58]) <> '') ? FilterValue($value[58]) : '') : ""; //FilterValue($value[57]);
//             $MasterFatherJob  =                 isset($value[59]) ? ((FilterValue($value[59]) <> '') ? FilterValue($value[59]) : '') : ""; //FilterValue($value[58]);
//             $FatherJobDetail =                  isset($value[60]) ? ((FilterValue($value[60]) <> '') ? FilterValue($value[60]) : '') : ""; //(FilterValue($value[59]) <> '') ? FilterValue($value[59]) : '';
//             $MotherName   =                     isset($value[61]) ? ((FilterValue($value[61]) <> '') ? FilterValue($value[61]) : '') : ""; //(FilterValue($value[60]) <> '') ? FilterValue($value[60]) : '';
//             $MasterMotherEducation =            isset($value[62]) ? ((FilterValue($value[62]) <> '') ? FilterValue($value[62]) : '') : ""; // FilterValue($value[61]);
//             $MasterMotherJob =                  isset($value[63]) ? ((FilterValue($value[63]) <> '') ? FilterValue($value[63]) : '') : ""; // FilterValue($value[62]);
//             $MotherJobDetail =                  isset($value[64]) ? ((FilterValue($value[64]) <> '') ? FilterValue($value[64]) : '') : ""; //(FilterValue($value[63]) <> '') ? FilterValue($value[63]) : '';
//             $MarriedBrothers =                  isset($value[65]) ? ((FilterValue($value[65]) <> '') ? FilterValue($value[65]) : '') : 0; //(FilterValue($value[64]) <> '') ? FilterValue($value[64]) : 0 ;
//             $MarriedSisters     =               isset($value[66]) ? ((FilterValue($value[66]) <> '') ? FilterValue($value[66]) : '') : 0; //(FilterValue($value[65]) <> '') ? FilterValue($value[65]) : 0 ;
//             $UnmarriedBrothers =                isset($value[67]) ? ((FilterValue($value[67]) <> '') ? FilterValue($value[67]) : '') : 0; //(FilterValue($value[66]) <> '') ? FilterValue($value[66]) : 0 ;
//             $UnmarriedSisters =                 isset($value[68]) ? ((FilterValue($value[68]) <> '') ? FilterValue($value[68]) : '') : 0; //(FilterValue($value[67]) <> '') ? FilterValue($value[67]) : 0 ;
//             $JobSibling     =                   isset($value[69]) ? ((FilterValue($value[69]) <> '') ? FilterValue($value[69]) : '') : ""; //(FilterValue($value[68]) <> '') ? FilterValue($value[68]) : '';
//             $Guardian =                         isset($value[70]) ? ((FilterValue($value[70]) <> '') ? FilterValue($value[70]) : '') : ""; //(FilterValue($value[69]) <> '') ? FilterValue($value[69]) : '';
//             $FamilyOrigin =                     isset($value[71]) ? ((FilterValue($value[71]) <> '') ? FilterValue($value[71]) : '') : ""; //(FilterValue($value[70]) <> '') ? FilterValue($value[70]) : '';
//             $FamilyValues =                     isset($value[72]) ? ((FilterValue($value[72]) <> '') ? FilterValue($value[72]) : '') : ""; //(FilterValue($value[71]) <> '') ? FilterValue($value[71]) : '';
//             $FamilyType  =                      isset($value[73]) ? ((FilterValue($value[73]) <> '') ? FilterValue($value[73]) : '') : ""; //(FilterValue($value[72]) <> '') ? FilterValue($value[72]) : '';
//             $HomeType     =                     isset($value[74]) ? ((FilterValue($value[74]) <> '') ? FilterValue($value[74]) : '') : ""; //(FilterValue($value[73]) <> '') ? FilterValue($value[73]) : '';
//             $CandidateShare =                   isset($value[75]) ? ((FilterValue($value[75]) <> '') ? FilterValue($value[75]) : '') : ""; //(FilterValue($value[74]) <> '') ? FilterValue($value[74]) : '';
//             $EatingHabits     =                 isset($value[76]) ? ((FilterValue($value[76]) <> '') ? FilterValue($value[76]) : '') : ""; //(FilterValue($value[75]) <> '') ? FilterValue($value[75]) : '';
//             $DrinkingHabits =                   isset($value[77]) ? ((FilterValue($value[77]) <> '') ? FilterValue($value[77]) : '') : ""; //(FilterValue($value[76]) <> '') ? FilterValue($value[76]) : '';
//             $SmokingHabits =                    isset($value[78]) ? ((FilterValue($value[78]) <> '') ? FilterValue($value[78]) : '') : ""; //(FilterValue($value[77]) <> '') ? FilterValue($value[77]) : '';
//             $LanguagesKnown     =               isset($value[79]) ? ((FilterValue($value[79]) <> '') ? FilterValue($value[79]) : '') : ""; //(FilterValue($value[78]) <> '') ? FilterValue($value[78]) : '';
//             $Hobbies =                          isset($value[80]) ? ((FilterValue($value[80]) <> '') ? FilterValue($value[80]) : '') : ""; //(FilterValue($value[79]) <> '') ? FilterValue($value[79]) : '';
//             $Interests     =                    isset($value[81]) ? ((FilterValue($value[81]) <> '') ? FilterValue($value[81]) : '') : ""; //(FilterValue($value[80]) <> '') ? FilterValue($value[80]) : '';
//             $Blog     =                         isset($value[82]) ? ((FilterValue($value[82]) <> '') ? FilterValue($value[82]) : '') : ""; //(FilterValue($value[81]) <> '') ? FilterValue($value[81]) : '';
//             $LinkNetwork =                      isset($value[83]) ? ((FilterValue($value[83]) <> '') ? FilterValue($value[83]) : '') : ""; //(FilterValue($value[82]) <> '') ? FilterValue($value[82]) : '';
//             $HoroscopeDetails =                 isset($value[84]) ? ((FilterValue($value[84]) <> '') ? FilterValue($value[84]) : '') : ""; //(FilterValue($value[83]) <> '') ? FilterValue($value[83]) : '';
//             $BirthHour =                        isset($value[85]) ? ((FilterValue($value[85]) <> '') ? FilterValue($value[85]) : '') : ""; //(FilterValue($value[84]) <> '') ? FilterValue($value[84]) : '';
//             $BirthMinute =                      isset($value[86]) ? ((FilterValue($value[86]) <> '') ? FilterValue($value[86]) : '') : ""; //(FilterValue($value[85]) <> '') ? FilterValue($value[85]) : '';
//             $PlaceOfBirth =                     isset($value[87]) ? ((FilterValue($value[87]) <> '') ? FilterValue($value[87]) : '') : ""; //(FilterValue($value[86]) <> '') ? FilterValue($value[86]) : '';
//             $DateOfBirthMalayalam =             isset($value[88]) ? ((FilterValue($value[88]) <> '') ? FilterValue($value[88]) : '') : ""; //(FilterValue($value[87]) <> '') ? FilterValue($value[87]) : '';
//             $JanmaSistaDasa     =               isset($value[89]) ? ((FilterValue($value[89]) <> '') ? FilterValue($value[89]) : '') : ""; //(FilterValue($value[88]) <> '') ? FilterValue($value[88]) : '';
//             $JanmaSistaDasaEnd     =            isset($value[90]) ? ((FilterValue($value[90]) <> '') ? FilterValue($value[90]) : '') : ""; //(FilterValue($value[89]) <> '') ? FilterValue($value[89]) : '';
//             $HoroscopeFile    =                 isset($value[91]) ? ((FilterValue($value[91]) <> '') ? FilterValue($value[91]) : '') : ""; //(FilterValue($value[90]) <> '') ? FilterValue($value[90]) : '';
//             $PartnerPreference =                isset($value[92]) ? ((FilterValue($value[92]) <> '') ? FilterValue($value[92]) : '') : ""; //(FilterValue($value[91]) <> '') ? FilterValue($value[91]) : '';
//             $PartnerAgeFrom     =               isset($value[93]) ? ((FilterValue($value[93]) <> '') ? FilterValue($value[93]) : '') : ""; //(FilterValue($value[92]) <> '') ? FilterValue($value[92]) : '';
//             $PartnerAgeTo  =                    isset($value[94]) ? ((FilterValue($value[94]) <> '') ? FilterValue($value[94]) : '') : ""; //(FilterValue($value[93]) <> '') ? FilterValue($value[93]) : '';
//             $PartnerHeightFrom     =            isset($value[95]) ? ((FilterValue($value[95]) <> '') ? FilterValue($value[95]) : '') : ""; //(FilterValue($value[94]) <> '') ? FilterValue($value[94]) : '';
//             $PartnerHeightTo =                  isset($value[96]) ? ((FilterValue($value[96]) <> '') ? FilterValue($value[96]) : '') : ""; //(FilterValue($value[95]) <> '') ? FilterValue($value[95]) : '';
//             $PartnerComplexion     =            isset($value[97]) ? ((FilterValue($value[97]) <> '') ? FilterValue($value[97]) : '') : ""; //(FilterValue($value[96]) <> '') ? FilterValue($value[96]) : '';
//             $PartnerBodyType =                  isset($value[98]) ? ((FilterValue($value[98]) <> '') ? FilterValue($value[98]) : '') : ""; //(FilterValue($value[97]) <> '') ? FilterValue($value[97]) : '';
//             $PartnerMaritalStatus =             isset($value[99]) ? ((FilterValue($value[99]) <> '') ? FilterValue($value[99]) : '') : ""; //(FilterValue($value[98]) <> '') ? FilterValue($value[98]) : '';
//             $MasterPartnerReligion =            isset($value[100]) ? ((FilterValue($value[100]) <> '') ? FilterValue($value[100]) : '') : ""; //FilterValue($value[99]);
//             $MasterPartnerCaste    =            isset($value[101]) ? ((FilterValue($value[101]) <> '') ? FilterValue($value[101]) : '') : ""; //FilterValue($value[100]);
//             $PartnerCasteNoBar =                isset($value[102]) ? ((FilterValue($value[102]) <> '') ? FilterValue($value[102]) : '') : ""; //(FilterValue($value[101]) <> '') ? FilterValue($value[101]) : '';
//             $PartnerTypeOfJathakam    =         isset($value[103]) ? ((FilterValue($value[103]) <> '') ? FilterValue($value[103]) : '') : ""; //(FilterValue($value[102]) <> '') ? FilterValue($value[102]) : '';
//             $MatchingStars =                    isset($value[104]) ? ((FilterValue($value[104]) <> '') ? FilterValue($value[104]) : '') : ""; //(FilterValue($value[103]) <> '') ? FilterValue($value[103]) : '';
//             $MasterPartnerEducationCategory =   isset($value[105]) ? ((FilterValue($value[105]) <> '') ? FilterValue($value[105]) : '') : ""; //FilterValue($value[104]);
//             $MasterPartnerEducationType =       isset($value[106]) ? ((FilterValue($value[106]) <> '') ? FilterValue($value[106]) : '') : ""; //FilterValue($value[105]);
//             $MasterPartnerJobCategory =         isset($value[107]) ? ((FilterValue($value[107]) <> '') ? FilterValue($value[107]) : '') : ""; //FilterValue($value[106]);
//             $MasterPartnerJobType =             isset($value[108]) ? ((FilterValue($value[108]) <> '') ? FilterValue($value[108]) : '') : ""; //FilterValue($value[107]);
//             $MasterPartnerCountry =             isset($value[109]) ? ((FilterValue($value[109]) <> '') ? FilterValue($value[109]) : '') : ""; //FilterValue($value[108]);
//             $MasterPartnerState =               isset($value[110]) ? ((FilterValue($value[110]) <> '') ? FilterValue($value[110]) : '') : ""; //FilterValue($value[109]);
//             $MasterPartnerDistrict =            isset($value[111]) ? ((FilterValue($value[111]) <> '') ? FilterValue($value[111]) : '') : ""; //FilterValue($value[110]);
//             $MasterPartnerCity =                isset($value[112]) ? ((FilterValue($value[112]) <> '') ? FilterValue($value[112]) : '') : ""; //FilterValue($value[111]);
//             $ABOUT =                            isset($value[113]) ? ((FilterValue($value[113]) <> '') ? FilterValue($value[113]) : '') : ""; //(FilterValue($value[112]) <> '') ? FilterValue($value[112]) : '';
//             $Iamlooking =                       isset($value[114]) ? ((FilterValue($value[114]) <> '') ? FilterValue($value[114]) : '') : ""; //(FilterValue($value[113]) <> '') ? FilterValue($value[113]) : '';
//             $Email =                            isset($value[115]) ? ((FilterValue($value[115]) <> '') ? FilterValue($value[115]) : '') : ""; //(FilterValue($value[114]) <> '') ? FilterValue($value[114]) : '';
//             $own = '';
//             $createdDate = date('Y-m-d');
//             $photo1 = $ProfileID . '.jpg';
//             $photo2 = $ProfileID . 'A' . '.jpg';
//             $photo3 = $ProfileID . 'B' . '.jpg';
//             $photo4 = $ProfileID . 'C' . '.jpg';
//             $photo5 = $ProfileID . 'D' . '.jpg';
//             $photo6 = $ProfileID . 'E' . '.jpg';
//             $photo7 = $ProfileID . 'F' . '.jpg';
//             $photo8 = $ProfileID . 'G' . '.jpg';
//             $photo9 = $ProfileID . 'H' . '.jpg';
//             $photo10 = $FullName . 'I' . '.jpg';

//             $Horoscope1 = $ProfileID . '.jpg';
//             $Horoscope2 = $ProfileID . 'A' . '.jpg';
//             $Horoscope3 = $ProfileID . 'B' . '.jpg';
//             $Horoscope4 = $ProfileID . 'C' . '.jpg';
//             $Horoscope5 = $ProfileID . 'D' . '.jpg';

//             $IDProof1 = $ProfileID . '.jpg';
//             $IDProof2 = $ProfileID . 'A' . '.jpg';
//             $IDProof3 = $ProfileID . 'B' . '.jpg';
//             $IDProof4 = $ProfileID . 'C' . '.jpg';
//             $IDProof5 = $ProfileID . 'D' . '.jpg';

//             $Home1 = $ProfileID . '.jpg';
//             $Home2 = $ProfileID . 'A' . '.jpg';
//             $Home3 = $ProfileID . 'B' . '.jpg';
//             $Home4 = $ProfileID . 'C' . '.jpg';
//             $Home5 = $ProfileID . 'D' . '.jpg';

//             //isset() ? ((FilterValue() <> '') ? FilterValue() : '') : "";

//             //religion
//             $findReligion = mysqli_fetch_assoc(mysqli_query($con, "SELECT rId FROM religion WHERE religionName = '$MasterReligion'"));
//             $Religion =  is_array($findReligion) ? $findReligion['rId'] : 0;

//             //caste
//             $findCaste = mysqli_fetch_assoc(mysqli_query($con, "SELECT casId FROM caste WHERE casteName = '$MasterCaste'"));
//             $Caste =  is_array($findCaste) ? $findCaste['casId'] : 0;

//             //subcaste
//             $findSubcaste = mysqli_fetch_assoc(mysqli_query($con, "SELECT scId FROM subcaste WHERE subcasteName = '$MasterSubcaste'"));
//             $Subcaste =  is_array($findSubcaste) ? $findSubcaste['scId'] : 0;

//             //EducationCategory
//             $findEducationCategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT edcatId FROM educationcategory WHERE educationCategory = '$MasterEducationCategory'"));
//             $EducationCategory =  is_array($findEducationCategory) ? $findEducationCategory['edcatId'] : 0;

//             //EducationType
//             $findEducationType = mysqli_fetch_assoc(mysqli_query($con, "SELECT edTyId FROM educationtype WHERE educationType = '$MasterEducationType'"));
//             $EducationType =  is_array($findEducationType) ? $findEducationType['edTyId'] : 0;

//             //JobCategory
//             $findJobCategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbcatId FROM jobcategory WHERE jobCategory = '$MasterJobCategory'"));
//             $JobCategory =  is_array($findJobCategory) ? $findJobCategory['jbcatId'] : 0;

//             //JobType
//             $findJobType = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbTyId FROM jobtype WHERE jobType = '$MasterJobType'"));
//             $JobType =  is_array($findJobType) ? $findJobType['jbTyId'] : 0;

//             //JobLocationCountry
//             $findJobLocationCountry = mysqli_fetch_assoc(mysqli_query($con, "SELECT cId FROM country WHERE countryName = '$MasterJobLocationCountry'"));
//             $JobLocationCountry =  is_array($findJobLocationCountry) ? $findJobLocationCountry['cId'] : 0;

//             //JobLocationState
//             $findJobLocationState = mysqli_fetch_assoc(mysqli_query($con, "SELECT sId FROM state WHERE stateName = '$MasterJobLocationState'"));
//             $JobLocationState =  is_array($findJobLocationState) ? $findJobLocationState['sId'] : 0;

//             //JobLocationDistrict
//             $findJobLocationDistrict = mysqli_fetch_assoc(mysqli_query($con, "SELECT dId FROM district WHERE districtName = '$MasterJobLocationDistrict'"));
//             $JobLocationDistrict =  is_array($findJobLocationDistrict) ? $findJobLocationDistrict['dId'] : 0;

//             //JobLocationCity
//             $findJobLocationCity = mysqli_fetch_assoc(mysqli_query($con, "SELECT citId FROM city WHERE cityName = '$MasterJobLocationCity'"));
//             $JobLocationCity =  is_array($findJobLocationCity) ? $findJobLocationCity['citId'] : 0;

//             //Country
//             $findCountry = mysqli_fetch_assoc(mysqli_query($con, "SELECT cId FROM country WHERE countryName = '$MasterCountry'"));
//             $Country =  is_array($findCountry) ? $findCountry['cId'] : 0;

//             //State
//             $findState = mysqli_fetch_assoc(mysqli_query($con, "SELECT sId FROM state WHERE stateName = '$MasterState'"));
//             $State =  is_array($findState) ? $findState['sId'] : 0;

//             //District
//             $findDistrict = mysqli_fetch_assoc(mysqli_query($con, "SELECT dId FROM district WHERE districtName = '$MasterDistrict'"));
//             $District =  is_array($findDistrict) ? $findDistrict['dId'] : 0;

//             //City
//             $findCity = mysqli_fetch_assoc(mysqli_query($con, "SELECT citId FROM city WHERE cityName = '$MasterCity'"));
//             $City =  is_array($findCity) ? $findCity['citId'] : 0;

//             //FatherEducation
//             $findFatherEducation = mysqli_fetch_assoc(mysqli_query($con, "SELECT edcatId FROM educationcategory WHERE educationCategory = '$MasterFatherEducation'"));
//             $FatherEducation =  is_array($findFatherEducation) ? $findFatherEducation['edcatId'] : 0;

//             //FatherJob
//             $findFatherJob = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbcatId FROM jobcategory WHERE jobCategory = '$MasterFatherJob'"));
//             $FatherJob =  is_array($findFatherJob) ? $findFatherJob['jbcatId'] : 0;

//             //MotherEducation
//             $findMotherEducation = mysqli_fetch_assoc(mysqli_query($con, "SELECT edcatId FROM educationcategory WHERE educationCategory = '$MasterMotherEducation'"));
//             $MotherEducation =  is_array($findMotherEducation) ? $findMotherEducation['edcatId'] : 0;

//             //MotherJob
//             $findMotherJob = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbcatId FROM jobcategory WHERE jobCategory = '$MasterMotherJob'"));
//             $MotherJob =  is_array($findMotherJob) ? $findMotherJob['jbcatId'] : 0;


//             //partnerreligion
//             $findPartnerReligion = mysqli_fetch_assoc(mysqli_query($con, "SELECT rId FROM religion WHERE religionName = '$MasterPartnerReligion'"));
//             $PartnerReligion =  is_array($findPartnerReligion) ? $findPartnerReligion['rId'] : 0;

//             //Partnercaste
//             $findPartnerCaste = mysqli_fetch_assoc(mysqli_query($con, "SELECT casId FROM caste WHERE casteName = '$MasterPartnerCaste'"));
//             $PartnerCaste =  is_array($findPartnerCaste) ? $findPartnerCaste['casId'] : 0;

//             //PartnerEducationCategory
//             $findPartnerEducationCategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT edcatId FROM educationcategory WHERE educationCategory = '$MasterPartnerEducationCategory'"));
//             $PartnerEducationCategory =  is_array($findPartnerEducationCategory) ? $findPartnerEducationCategory['edcatId'] : 0;

//             //PartnerEducationType
//             $findPartnerEducationType = mysqli_fetch_assoc(mysqli_query($con, "SELECT edTyId FROM educationtype WHERE educationType = '$MasterPartnerEducationType'"));
//             $PartnerEducationType =  is_array($findPartnerEducationType) ? $findPartnerEducationType['edTyId'] : 0;

//             //PartnerJobCategory
//             $findPartnerJobCategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbcatId FROM jobcategory WHERE jobCategory = '$MasterPartnerJobCategory'"));
//             $PartnerJobCategory =  is_array($findPartnerJobCategory) ? $findPartnerJobCategory['jbcatId'] : 0;

//             //PartnerJobType
//             $findPartnerJobType = mysqli_fetch_assoc(mysqli_query($con, "SELECT jbTyId FROM jobtype WHERE jobType = '$MasterPartnerJobType'"));
//             $PartnerJobType =  is_array($findPartnerJobType) ? $findPartnerJobType['jbTyId'] : 0;


//             //PartnerCountry
//             $findPartnerCountry = mysqli_fetch_assoc(mysqli_query($con, "SELECT cId FROM country WHERE countryName = '$MasterPartnerCountry'"));
//             $PartnerCountry =  is_array($findPartnerCountry) ? $findPartnerCountry['cId'] : 0;

//             //PartnerState
//             $findPartnerState = mysqli_fetch_assoc(mysqli_query($con, "SELECT sId FROM state WHERE stateName = '$MasterPartnerState'"));
//             $PartnerState =  is_array($findPartnerState) ? $findPartnerState['sId'] : 0;

//             //PartnerDistrict
//             $findPartnerDistrict = mysqli_fetch_assoc(mysqli_query($con, "SELECT dId FROM district WHERE districtName = '$MasterPartnerDistrict'"));
//             $PartnerDistrict =  is_array($findPartnerDistrict) ? $findPartnerDistrict['dId'] : 0;

//             //PartnerCity
//             $findPartnerCity = mysqli_fetch_assoc(mysqli_query($con, "SELECT citId FROM city WHERE cityName = '$MasterPartnerCity'"));
//             $PartnerCity =  is_array($findPartnerCity) ? $findPartnerCity['citId'] : 0;

//             //STAR
//             $findStar = mysqli_fetch_assoc(mysqli_query($con, "SELECT starId FROM star WHERE starName = '$MasterStar'"));
//             $Star =  is_array($findStar) ? $findStar['starId'] : 0;


//             $ProfileCheckArray = array();
//             $WhatsappCheckArray = array();
//             $RegisterCheckArray = array();
//             $ResidenceCheckArray = array();
//             $BulkCheckArray = array();
//             $CompanyIdCheckArray = array();
//             $CheckArray = array();

//             $FindProfileExists = mysqli_query($con, "SELECT profileId,fullName,DATATYPE FROM (SELECT profileId,fullName,'FreeData' AS DATATYPE FROM custdata UNION ALL SELECT profileId,fullName,'PaidData' AS DATATYPE FROM paiddata UNION ALL SELECT profileId,fullName,'MarriageData' AS DATATYPE FROM marriagedata UNION ALL SELECT profileId,fullName,'WeddingData' AS DATATYPE FROM weddingdata)CombinedTable WHERE profileId = '$ProfileID'");
//             if (mysqli_num_rows($FindProfileExists) == 0) {

//                 //echo $WhatsappNumber;
//                 //echo '||||';

//                 $DuplicateExists = false;
//                 for ($I = 0; $I <= 3; $I++) {

//                     $Query = "SELECT profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,bulkPhone,DATATYPE FROM (SELECT profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,'' AS bulkPhone, 'FreeData' AS DATATYPE FROM custdata UNION ALL SELECT profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,'' AS bulkPhone, 'PaidData' AS DATATYPE FROM paiddata UNION ALL SELECT profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,'' AS bulkPhone, 'MarriageData' AS DATATYPE FROM marriagedata UNION ALL SELECT profileId,fullName,whatsappNumber,registeredNumber,residencePhoneNumber,companyId,'' AS bulkPhone, 'WeddingData' AS DATATYPE FROM weddingdata UNION ALL SELECT '' AS profileId,bulkName AS fullName,'' AS whatsappNumber,'' AS registeredNumber,'' AS residencePhoneNumber,companyId,bulkPhone,'BulkData' AS DATATYPE FROM bulkdata UNION ALL SELECT '' AS profileId,bulkName AS fullName,'' AS whatsappNumber,'' AS registeredNumber,'' AS residencePhoneNumber,companyId,bulkPhone,'LeadData' AS DATATYPE FROM leaddata)CombinedTable";

//                     $CheckZero  = true;

//                     //echo $I;

//                     if ($I == 0) {
//                         //echo "0";
//                         if ($WhatsappNumber != 0) {
//                             $Query .= " WHERE whatsappNumber = $WhatsappNumber OR registeredNumber = $WhatsappNumber OR residencePhoneNumber = $WhatsappNumber OR bulkPhone = $WhatsappNumber";
//                             $CheckValue = 'WhatsappNumber';
//                             $CheckNumber = $WhatsappNumber;
//                             $FindDuplicatesQuery = mysqli_query($con, $Query);
//                             if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
//                                 goto ExecuteQuery;
//                             } else {
//                                 $CheckZero  = false;
//                             }
//                         } else {
//                             $CheckZero  = false;
//                         }
//                     } elseif ($I == 1) {
//                         //echo "1";
//                         if ($RegisteredNumber != 0) {
//                             $Query .= " WHERE whatsappNumber = $RegisteredNumber OR registeredNumber = $RegisteredNumber OR residencePhoneNumber = $RegisteredNumber OR bulkPhone = $RegisteredNumber";
//                             $CheckValue = 'RegisteredNumber';
//                             $CheckNumber = $RegisteredNumber;
//                             $FindDuplicatesQuery = mysqli_query($con, $Query);
//                             if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
//                                 goto ExecuteQuery;
//                             } else {
//                                 $CheckZero  = false;
//                             }
//                         } else {
//                             $CheckZero  = false;
//                         }
//                     } elseif ($I == 2) {
//                         //echo "2";
//                         if ($ResidencePhoneNumber != 0) {
//                             $Query .= " WHERE whatsappNumber = $ResidencePhoneNumber OR registeredNumber = $ResidencePhoneNumber OR residencePhoneNumber = $ResidencePhoneNumber OR bulkPhone = $ResidencePhoneNumber";
//                             $CheckValue = 'ResidenceNumber';
//                             $CheckNumber = $ResidencePhoneNumber;
//                             $FindDuplicatesQuery = mysqli_query($con, $Query);
//                             if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
//                                 goto ExecuteQuery;
//                             } else {
//                                 $CheckZero  = false;
//                             }
//                         } else {
//                             $CheckZero  = false;
//                         }
//                     } elseif ($I == 3) {
//                         //echo "3";
//                         if ($CompanyID != '') {
//                             $Query .= " WHERE companyId = '$CompanyID'";
//                             $CheckValue = 'CompanyId';
//                             $CheckNumber = $CompanyID;
//                             $FindDuplicatesQuery = mysqli_query($con, $Query);
//                             if (mysqli_num_rows($FindDuplicatesQuery) > 0) {
//                                 goto ExecuteQuery;
//                             } else {
//                                 $CheckZero  = false;
//                             }
//                         } else {
//                             $CheckZero  = false;
//                         }
//                     }


//                     //echo $Query;

//                     ExecuteQuery:

//                     if ($CheckZero  == true) {

//                         $DuplicateExists = true;
//                         foreach ($FindDuplicatesQuery as $FindDuplicatesQueryResult) {
//                             $DuplicateTypeArray = array();
//                             // echo "Start";
//                             // echo "w - ".$FindDuplicatesQueryResult['whatsappNumber'];
//                             // echo "reg - ".$FindDuplicatesQueryResult['registeredNumber'];
//                             // echo "res - ".$FindDuplicatesQueryResult['residencePhoneNumber'];
//                             // echo "bulk - ".$FindDuplicatesQueryResult['bulkPhone'];
//                             // echo "comp - ".$FindDuplicatesQueryResult['companyId'];
//                             // echo "End";

//                             // if ($FindDuplicatesQueryResult['whatsappNumber'] != '') {
//                             //     array_push($DuplicateTypeArray, 'W');
//                             //     ////$DuplicateType = 'WHATNO';
//                             // } elseif ($FindDuplicatesQueryResult['registeredNumber'] != '') {
//                             //     array_push($DuplicateTypeArray, 'RG');
//                             //     //$DuplicateType = 'REGNO';
//                             // } elseif($FindDuplicatesQueryResult['residencePhoneNumber'] != '') {
//                             //     array_push($DuplicateTypeArray, 'RS');
//                             //     //$DuplicateType = 'RESNO';
//                             // }elseif($FindDuplicatesQueryResult['bulkPhone'] != ''){
//                             //     array_push($DuplicateTypeArray, 'B');
//                             //     //$DuplicateType = 'BULKNO';
//                             // }elseif($FindDuplicatesQueryResult['companyId'] != ''){
//                             //     array_push($DuplicateTypeArray, 'C');
//                             //     //$DuplicateType = 'CMPID';
//                             // }

//                             // if ($CheckNumber == $FindDuplicatesQueryResult['whatsappNumber']) {
//                             //     $DuplicateType = 'W';
//                             // } elseif ($CheckNumber == $FindDuplicatesQueryResult['registeredNumber']) {
//                             //     $DuplicateType = 'RG';
//                             // }elseif ($CheckNumber == $FindDuplicatesQueryResult['residencePhoneNumber']) {
//                             //     $DuplicateType = 'RS';
//                             // }elseif($CheckNumber == $FindDuplicatesQueryResult['bulkPhone']){
//                             //     $DuplicateType = 'B';
//                             // }elseif($CheckNumber == $FindDuplicatesQueryResult['companyId']){
//                             //     $DuplicateType = 'C';
//                             // }


//                             if ($CheckNumber == $FindDuplicatesQueryResult['whatsappNumber']) {
//                                 array_push($WhatsappCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
//                                 //$DuplicateType = 'W';
//                             } elseif ($CheckNumber == $FindDuplicatesQueryResult['registeredNumber']) {
//                                 array_push($RegisterCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
//                                 //$DuplicateType = 'RG';
//                             } elseif ($CheckNumber == $FindDuplicatesQueryResult['residencePhoneNumber']) {
//                                 array_push($ResidenceCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
//                                 //$DuplicateType = 'RS';
//                             } elseif ($CheckNumber == $FindDuplicatesQueryResult['bulkPhone']) {
//                                 array_push($BulkCheckArray, $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
//                                 //$DuplicateType = 'B';
//                             } elseif ($CheckNumber == $FindDuplicatesQueryResult['companyId']) {
//                                 array_push($CompanyIdCheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
//                                 //$DuplicateType = 'C';
//                             }


//                             //$DuplicateType = implode(',', $DuplicateTypeArray);
//                             //array_push($CheckArray, $FindDuplicatesQueryResult['profileId'] . ' - ' . $DuplicateType . ' - ' . $FindDuplicatesQueryResult['fullName'] . ' - ' . $FindDuplicatesQueryResult['DATATYPE']);
//                         }

//                         if (count($WhatsappCheckArray) > 0 || count($RegisterCheckArray) > 0 || count($ResidenceCheckArray) > 0 || count($BulkCheckArray) > 0 || count($CompanyIdCheckArray) > 0) {



//                             $WhatsappDuplicateCheck = implode(",", $WhatsappCheckArray);
//                             $RegisterDuplicateCheck = implode(",", $RegisterCheckArray);
//                             $ResidenceDuplicateCheck = implode(",", $ResidenceCheckArray);
//                             $BulkDuplicateCheck = implode(",", $BulkCheckArray);
//                             $CompanyIdDuplicateCheck = implode(",", $CompanyIdCheckArray);




//                             //$DuplicateCheck = implode(",", $CheckArray);

//                             $query = "INSERT INTO `freeregduplicate`(`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`,`duplicateCheckType`,`whatsappDuplicate`,`registerDuplicate`,`residenceDuplicate`,`bulkDuplicate`,`companyDuplicate`) VALUES('$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','dID','dNu','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified','$CheckValue','$WhatsappDuplicateCheck','$RegisterDuplicateCheck','$ResidenceDuplicateCheck','$BulkDuplicateCheck','$CompanyIdDuplicateCheck')";

//                             // echo $query;

//                             if (mysqli_query($con, $query)) {
//                                 $InsertCounter++;
//                                 break;
//                             } else {
//                             }
//                         }

//                         // print_r($WhatsappCheckArray);
//                         // print_r($RegisterCheckArray);
//                         // print_r($ResidenceCheckArray);
//                         // print_r($BulkCheckArray);
//                         // print_r($CompanyIdCheckArray);

//                         // echo $CheckValue;

//                     } else {
//                     }
//                 }


//                 //echo $DuplicateExists;
//                 if ($DuplicateExists == false) {


//                     if ($FreeDataType == 'FD') {
//                         $TableName = 'custdata';
//                     } elseif ($FreeDataType == 'PD') {
//                         $TableName = 'paiddata';
//                     } elseif ($FreeDataType == 'MD') {
//                         $TableName = 'marriagedata';
//                     } elseif ($FreeDataType == 'WD') {
//                         $TableName = 'weddingdata';
//                     }

//                     $FindMaxId  = mysqli_query($con, "SELECT MAX(custId) FROM $TableName ");
//                     foreach ($FindMaxId as $FindMaxIdResult) {
//                         $custMaxId = $FindMaxIdResult['MAX(custId)'] + 1;
//                     }


//                     $InsertQuery = "INSERT INTO $TableName
//                     (`custId`,`profileId`,`branchId`,`agencyId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`dataType`,`companyId`,`pictureId`,`verified`,`createdDate`,`mainImage`,`approvalStatus`) VALUES('$custMaxId','$ProfileID','$FreeBranch','$FreeAgency','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$Type','$CompanyID','$PictureID','$Verified','$createdDate','$photo1','0')";

//                     $InsertQuery;


//                     $Inserted = mysqli_query($con, $InsertQuery);
//                     if ($Inserted) {
//                         //echo "Inserrted";
//                     }
//                 }


//                 //print_r($WhatsappCheckArray);

//                 // if (count($WhatsappCheckArray) > 0) {
//                 //     $WhatsappCheck = implode(",", $WhatsappCheckArray);

//                 //     $query = "INSERT INTO `freeregduplicate`(`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`,`duplicateCheckType`,`duplicateFoundIn`) VALUES('$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','dID','dNu','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified','WhatsappNumber','$WhatsappCheck')";

//                 //     //echo $query;

//                 //     if (mysqli_query($con, $query)) {
//                 //         $InsertCounter++;
//                 //     } else {
//                 //     }
//                 // }

//             } else {
//                 foreach ($FindProfileExists as $FindProfileExistsResult) {
//                     array_push($ProfileCheckArray, $FindProfileExistsResult['profileId'] . ' - ' . $FindProfileExistsResult['fullName'] . ' - ' . $FindProfileExistsResult['DATATYPE']);
//                 }

//                 $ProfileCheck = implode(",", $ProfileCheckArray);

//                 $query = "INSERT INTO `freeregduplicate`(`profileId`,`branchId`,`agencyId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`duplicateId`,`duplicateNumberType`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`,`companyId`,`pcitureId`,`verified`,`duplicateCheckType`,`ProifileDuplicate`) VALUES('$ProfileID','$FreeBranch','$FreeAgency','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','dID','dNu','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$own','$createdDate','$FreeDataType','$CompanyID','$PictureID','$Verified','ProfileID','$ProfileCheck')";

//                 //echo $query;

//                 if (mysqli_query($con, $query)) {
//                     $InsertCounter++;
//                 } else {
//                 }
//             }
//         }

//         echo json_encode(array('cust' => 1));
//     } else {
//         echo json_encode(array('cust' => 0));
//     }
// }

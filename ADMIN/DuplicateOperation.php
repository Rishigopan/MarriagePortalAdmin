<?php


include('../MAIN/Dbconfig.php');

$dateToday = date('Y-m-d H:i:s');

function FilterValue($value)
{
    //require '../MAIN/Dbconfig.php';
    $value = trim($value);
    $value = strval($value);
    //$value = mysqli_real_escape_string($con,$value);
    $value = addslashes($value);
    return $value;
}


///////////////////////////////////////////  BULK DUPLICATES  ////////////////////////////////

    //Delete Bulk Duplicate
    if (isset($_POST['DeleteBulkId']) && !empty($_POST['DeleteBulkId'])) {

        $DeleteBulkId = $_POST['DeleteBulkId'];

        $DeleteBulkDuplicate = mysqli_query($con, "DELETE FROM bulkduplicate WHERE bulkId = '$DeleteBulkId'");
        if ($DeleteBulkDuplicate) {
            echo json_encode(array('DeleteBulkDuplicate' => 1));
        } else {
            echo json_encode(array('DeleteBulkDuplicate' => 2));
        }
    }


    //Bulk convert Duplicates
    if (isset($_POST['BulkConvertId']) && !empty($_POST['BulkConvertId'])) {

        $ConvertBulkId = $_POST['BulkConvertId'];
        $BulkConvertType = $_POST['BulkConvertType'];
        if ($BulkConvertType == 'BD') {
            $MaxTable = 'bulkdata';
        } else {
            $MaxTable = 'leaddata';
        }


        $FindMaxBulkId = mysqli_query($con, "SELECT MAX(bulkId) FROM $MaxTable");
        foreach ($FindMaxBulkId as $FindMaxBulkIdResult) {
            $MaxBulkId = $FindMaxBulkIdResult['MAX(bulkId)'] + 1;
        }

        $FetchValues = mysqli_query($con, "SELECT * FROM bulkduplicate WHERE bulkId = '$ConvertBulkId'");
        foreach ($FetchValues as $FetchValueResult) {

            $BulkName = $FetchValueResult['bulkName'];
            $BulkPhone = $FetchValueResult['bulkPhone'];
            $ReferName = $FetchValueResult['referName'];
            $ReferPhone = $FetchValueResult['referPhone'];
            $CompanyId = $FetchValueResult['companyId'];
            $BulkType = $FetchValueResult['bulkType'];
            $Verified = $FetchValueResult['verified'];
            $BulkRemark = $FetchValueResult['bulkRemark'];
        }

        if ($FetchValues) {
            mysqli_autocommit($con, FALSE);

            $InsertIntoBulkData = mysqli_query($con, "INSERT INTO  $MaxTable (`bulkId`,`bulkName`,`bulkPhone`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkStatus`,`assignedTo`,`companyId`,`bulkType`,`verified`,`bulkRemark`,`bulkFeedbackDate`) VALUES ('$MaxBulkId','$BulkName','$BulkPhone','$ReferName','$ReferPhone','1','$dateToday','0','0','$CompanyId','$BulkType','$Verified','$BulkRemark','')");

            if ($InsertIntoBulkData) {
                $updateDuplicateStatus = mysqli_query($con, "UPDATE bulkduplicate SET convertStatus = 'YES' WHERE bulkId = '$ConvertBulkId'");
                if ($updateDuplicateStatus) {
                    mysqli_commit($con);
                    echo json_encode(array('BulkConvertDuplicate' => 1));
                } else {
                    mysqli_rollback($con);
                    echo json_encode(array('BulkConvertDuplicate' => 2));
                }
            } else {
                mysqli_rollback($con);
                echo json_encode(array('BulkConvertDuplicate' => 3));
            }
        } else {
            echo json_encode(array('BulkConvertDuplicate' => 4));
        }
    }


    //Delete All Bulk Duplicate
    if (isset($_POST['BulkDeleteAllID']) && !empty($_POST['BulkDeleteAllID'])) {
        $BulkDeleteAllIDArray = array();
        if (!empty($_POST['BulkDeleteAllID'])) {
            $BulkDeleteAllIDArray = explode(",", $_POST['BulkDeleteAllID']);
            $DeleteAllCount = count($BulkDeleteAllIDArray);
            $DeleteIncrementor = 0;
            foreach ($BulkDeleteAllIDArray as $BulkDeleteAllIDArrayResults) {
                $DeleteAllDuplicate = mysqli_query($con, "DELETE FROM bulkduplicate WHERE bulkId = '$BulkDeleteAllIDArrayResults'");
                if ($DeleteAllDuplicate) {
                    $DeleteIncrementor++;
                } else {
                }
            }
            if ($DeleteAllCount == $DeleteIncrementor) {
                echo json_encode(array('BulkDeleteAllDuplicate' => 1));
            } else {
                echo json_encode(array('BulkDeleteAllDuplicate' => 2));
            }
        } else {
            echo json_encode(array('BulkDeleteAllDuplicate' => 0)); //all values are empty
        }
    }


    //Bulk convert all duplicates
    if (isset($_POST['BulkConvertAllID']) && !empty($_POST['BulkConvertAllID'])) {
        $BulkConvertAllIDArray = array();
        if (!empty($_POST['BulkConvertAllID'])) {
            $BulkConvertAllIDArray = explode(",", $_POST['BulkConvertAllID']);
            $ConvertAllCount = count($BulkConvertAllIDArray);
            $ConvertIncrementor = 0;
            foreach ($BulkConvertAllIDArray as $BulkConvertAllIDArrayResults) {
                $FetchValues = mysqli_query($con, "SELECT * FROM bulkduplicate WHERE bulkId = '$BulkConvertAllIDArrayResults'");
                if (mysqli_num_rows($FetchValues)) {
                    foreach ($FetchValues as $FetchValueResult) {
                        $BulkName = $FetchValueResult['bulkName'];
                        $BulkPhone = $FetchValueResult['bulkPhone'];
                        $ReferName = $FetchValueResult['referName'];
                        $ReferPhone = $FetchValueResult['referPhone'];
                        $CompanyId = $FetchValueResult['companyId'];
                        $BulkType = $FetchValueResult['bulkType'];
                        $Verified = $FetchValueResult['verified'];
                        $BulkRemark = $FetchValueResult['bulkRemark'];
                        $ImportedDataType =  $FetchValueResult['importedData'];
                    }

                    if ($ImportedDataType == 'BD') {
                        $ConvertTable = 'bulkdata';
                    } else {
                        $ConvertTable = 'leaddata';
                    }

                    mysqli_autocommit($con, FALSE);

                    $FindMaxBulkId = mysqli_query($con, "SELECT MAX(bulkId) FROM $ConvertTable");
                    foreach ($FindMaxBulkId as $FindMaxBulkIdResult) {
                        $MaxBulkId = $FindMaxBulkIdResult['MAX(bulkId)'] + 1;
                    }

                    $InsertQuery = "INSERT INTO $ConvertTable (`bulkId`,`bulkName`,`bulkPhone`,`referName`,`referPhone`,`createdBy`,`createdDate`,`bulkStatus`,`assignedTo`,`companyId`,`bulkType`,`verified`,`bulkRemark`,`bulkFeedbackDate`) VALUES ('$MaxBulkId','$BulkName','$BulkPhone','$ReferName','$ReferPhone','1','$dateToday','0','0','$CompanyId','$BulkType','$Verified','$BulkRemark','')";

                    //echo $InsertQuery;

                    $InsertIntoFreeReg = mysqli_query($con, $InsertQuery);

                    if ($InsertIntoFreeReg) {
                        $updateDuplicateStatus = mysqli_query($con, "UPDATE bulkduplicate SET convertStatus = 'YES' WHERE bulkId = '$BulkConvertAllIDArrayResults'");
                        if ($updateDuplicateStatus) {
                            mysqli_commit($con);
                            $ConvertIncrementor++;
                        } else {
                            mysqli_rollback($con);
                        }
                    } else {
                        mysqli_rollback($con);
                    }
                } else {
                    echo json_encode(array('BulkConvertAllDuplicate' => 0)); //all values are empty
                }
            }
            if ($ConvertAllCount == $ConvertIncrementor) {
                echo json_encode(array('BulkConvertAllDuplicate' => 1));
            } else {
                echo json_encode(array('BulkConvertAllDuplicate' => 2));
            }
        } else {
            echo json_encode(array('BulkConvertAllDuplicate' => 0)); //all values are empty
        }

    }

///////////////////////////////////////////  BULK DUPLICATES  ////////////////////////////////



///////////////////////////////////////////  FREE DUPLICATES  ////////////////////////////////


    //Delete Free Duplicate
    if (isset($_POST['DeleteId']) && !empty($_POST['DeleteId'])) {

        $DeleteId = $_POST['DeleteId'];

        $DeleteDuplicate = mysqli_query($con, "DELETE FROM freeregduplicate WHERE custId = '$DeleteId'");
        if ($DeleteDuplicate) {
            echo json_encode(array('DeleteDuplicate' => 1));
        } else {
            echo json_encode(array('DeleteDuplicate' => 2));
        }
    }


    //Delete All Free Duplicate
    if (isset($_POST['DeleteAllID']) && !empty($_POST['DeleteAllID'])) {
        $DeleteAllIDArray = array();
        if (!empty($_POST['DeleteAllID'])) {
            $DeleteAllIDArray = explode(",", $_POST['DeleteAllID']);
            $DeleteAllCount = count($DeleteAllIDArray);
            $DeleteIncrementor = 0;
            foreach ($DeleteAllIDArray as $DeleteAllIDArrayResults) {
                $DeleteAllDuplicate = mysqli_query($con, "DELETE FROM freeregduplicate WHERE custId = '$DeleteAllIDArrayResults'");
                if ($DeleteAllDuplicate) {
                    $DeleteIncrementor++;
                } else {
                }
            }
            if ($DeleteAllCount == $DeleteIncrementor) {
                echo json_encode(array('DeleteAllDuplicate' => 1));
            } else {
                echo json_encode(array('DeleteAllDuplicate' => 2));
            }
        } else {
            echo json_encode(array('DeleteAllDuplicate' => 0)); //all values are empty
        }
    }


    //Free convert all duplicates
    if (isset($_POST['ConvertAllID']) && !empty($_POST['ConvertAllID'])) {
        $ConvertAllIDArray = array();
        if (!empty($_POST['ConvertAllID'])) {
            $ConvertAllIDArray = explode(",", $_POST['ConvertAllID']);
            $ConvertAllCount = count($ConvertAllIDArray);
            $ConvertIncrementor = 0;
            foreach ($ConvertAllIDArray as $ConvertAllIDArrayResults) {
                $FetchValues = mysqli_query($con, "SELECT * FROM freeregduplicate WHERE custId = '$ConvertAllIDArrayResults'");
                if (mysqli_num_rows($FetchValues)) {
                    foreach ($FetchValues as $FetchValueResult) {
                        $ProfileID = FilterValue($FetchValueResult['profileId']);
                        $Gender = FilterValue($FetchValueResult['gender']);
                        $FullName = FilterValue($FetchValueResult['fullName']);
                        $DOB = FilterValue($FetchValueResult['dob']);
                        $Height = FilterValue($FetchValueResult['height']);
                        $Weight = FilterValue($FetchValueResult['weight']);
                        $Complexion = FilterValue($FetchValueResult['complexion']);
                        $BodyType = FilterValue($FetchValueResult['bodyType']);
                        $MaritalStatus = FilterValue($FetchValueResult['maritalStatus']);
                        $PhysicalStatus = FilterValue($FetchValueResult['physicalStatus']);
                        $NativePlace = FilterValue($FetchValueResult['nativePlace']);
                        $Religion = FilterValue($FetchValueResult['religion']);
                        $Caste = FilterValue($FetchValueResult['caste']);
                        $Subcaste = FilterValue($FetchValueResult['subCaste']);
                        $Email = FilterValue($FetchValueResult['email']);
                        $Star = FilterValue($FetchValueResult['star']);
                        $ChovvaDosham = FilterValue($FetchValueResult['chovvaDosham']);
                        $TypeJathakam = FilterValue($FetchValueResult['jathakamType']);
                        $EducationCategory = FilterValue($FetchValueResult['educationCat']);
                        $EducationType = FilterValue($FetchValueResult['educationType']);
                        $JobCategory = FilterValue($FetchValueResult['jobCat']);
                        $JobType = FilterValue($FetchValueResult['jobType']);
                        $JobLocationCountry = FilterValue($FetchValueResult['jobLocCountry']);
                        $JobLocationState = FilterValue($FetchValueResult['jobLocState']);
                        $JobLocationDistrict = FilterValue($FetchValueResult['jobLocDistrict']);
                        $JobLocationCity = FilterValue($FetchValueResult['jobLocCity']);
                        $MonthlyIncome = FilterValue($FetchValueResult['monthlyIncome']);
                        $FinancialStatus = FilterValue($FetchValueResult['financialStatus']);
                        $RegisteredNumber = FilterValue($FetchValueResult['registeredNumber']);
                        $WhatsappNumber = FilterValue($FetchValueResult['whatsappNumber']);
                        $ResidencePhoneNumber = FilterValue($FetchValueResult['residencePhoneNumber']);
                        $ContactPersonName = FilterValue($FetchValueResult['contactPerson']);
                        $NoOfChildren = FilterValue($FetchValueResult['noofChild']);
                        $CasteNoBar = FilterValue($FetchValueResult['casteNoBar']);
                        $EducationDetails = FilterValue($FetchValueResult['eduDetails']);
                        $JobDetails = FilterValue($FetchValueResult['jobDetails']);
                        $MotherTongue = FilterValue($FetchValueResult['motherTongue']);
                        $ProfileCreatedby = FilterValue($FetchValueResult['profileFor']);
                        $BloodGroup = FilterValue($FetchValueResult['bloodGroup']);
                        $ParishEdavakaSNDPNSSMahal = FilterValue($FetchValueResult['ParishEdavakaSNDPNSSMahal']);
                        $When = FilterValue($FetchValueResult['hopingToMarry']);
                        $CommunicationAddress = FilterValue($FetchValueResult['communicationAddress']);
                        $Addres = FilterValue($FetchValueResult['address']);
                        $PermanentAddress = FilterValue($FetchValueResult['permanentAddress']);
                        $Country = FilterValue($FetchValueResult['country']);
                        $State = FilterValue($FetchValueResult['state']);
                        $District = FilterValue($FetchValueResult['district']);
                        $City = FilterValue($FetchValueResult['city']);
                        $ResidentialStatus = FilterValue($FetchValueResult['residentialStatus']);
                        $PreferredTime = FilterValue($FetchValueResult['timeToCall']);
                        $PreferredContactNumber = FilterValue($FetchValueResult['prefferedContactNumber']);
                        $Relationshipwithcandidate = FilterValue($FetchValueResult['relationshipCandidate']);
                        $FatherName = FilterValue($FetchValueResult['fatherName']);
                        $FatherEducation = FilterValue($FetchValueResult['fatherEducation']);
                        $FatherJob = FilterValue($FetchValueResult['fatherJob']);
                        $FatherJobDetail = FilterValue($FetchValueResult['fatherJobDetail']);
                        $MotherName = FilterValue($FetchValueResult['motherName']);
                        $MotherEducation = FilterValue($FetchValueResult['motherEducation']);
                        $MotherJob = FilterValue($FetchValueResult['motherJob']);
                        $MotherJobDetail = FilterValue($FetchValueResult['motherJobDetail']);
                        $MarriedBrothers = FilterValue($FetchValueResult['marriedBro']);
                        $UnmarriedBrothers = FilterValue($FetchValueResult['unmarriedBro']);
                        $MarriedSisters = FilterValue($FetchValueResult['marriedSis']);
                        $UnmarriedSisters = FilterValue($FetchValueResult['unmarriedSis']);
                        $JobSibling = FilterValue($FetchValueResult['siblingJobProfile']);
                        $Guardian = FilterValue($FetchValueResult['guardian']);
                        $FamilyOrigin = FilterValue($FetchValueResult['familyOrigin']);
                        $FamilyType = FilterValue($FetchValueResult['familyType']);
                        $HomeType = FilterValue($FetchValueResult['homeType']);
                        $CandidateShare = FilterValue($FetchValueResult['candidateShare']);
                        $FamilyValues = FilterValue($FetchValueResult['familyValues']);
                        $EatingHabits = FilterValue($FetchValueResult['eatingHabits']);
                        $DrinkingHabits = FilterValue($FetchValueResult['drinkingHabits']);
                        $SmokingHabits = FilterValue($FetchValueResult['smokingHabits']);
                        $LanguagesKnown = FilterValue($FetchValueResult['languagesKnown']);
                        $Hobbies = FilterValue($FetchValueResult['Hobbies']);
                        $Interests = FilterValue($FetchValueResult['interests']);
                        $Blog = FilterValue($FetchValueResult['blog']);
                        $LinkNetwork = FilterValue($FetchValueResult['socialMediaLink']);
                        $HoroscopeDetails = FilterValue($FetchValueResult['horoscopeDetails']);
                        $BirthHour = FilterValue($FetchValueResult['birthHour']);
                        $BirthMinute = FilterValue($FetchValueResult['birthMinute']);
                        $PlaceOfBirth = FilterValue($FetchValueResult['birthPlace']);
                        $DateOfBirthMalayalam = FilterValue($FetchValueResult['malayalamDob']);
                        $JanmaSistaDasa = FilterValue($FetchValueResult['janmaSistaDasa']);
                        $JanmaSistaDasaEnd = FilterValue($FetchValueResult['janmaSistaDasaEnd']);
                        $HoroscopeFile = FilterValue($FetchValueResult['horoscopeFile']);
                        $PartnerAgeFrom = FilterValue($FetchValueResult['partnerAgeFrom']);
                        $PartnerAgeTo = FilterValue($FetchValueResult['partnerAgeTo']);
                        $PartnerHeightFrom = FilterValue($FetchValueResult['partnerHeightFrom']);
                        $PartnerHeightTo = FilterValue($FetchValueResult['partnerHeightTo']);
                        $PartnerComplexion = FilterValue($FetchValueResult['partnerComplexion']);
                        $PartnerBodyType = FilterValue($FetchValueResult['partnerBodyType']);
                        $PartnerMaritalStatus = FilterValue($FetchValueResult['partnerMaritalStatus']);
                        $PartnerReligion = FilterValue($FetchValueResult['partnerReligion']);
                        $PartnerCaste = FilterValue($FetchValueResult['partnerCaste']);
                        $PartnerCasteNoBar = FilterValue($FetchValueResult['partnerCasteNoBar']);
                        $MatchingStars = FilterValue($FetchValueResult['matchingStars']);
                        $PartnerEducationCategory = FilterValue($FetchValueResult['partnerEduCat']);
                        $PartnerEducationType = FilterValue($FetchValueResult['partnerEduType']);
                        $PartnerJobCategory = FilterValue($FetchValueResult['partnerJobCat']);
                        $PartnerJobType = FilterValue($FetchValueResult['partnerJobType']);
                        $PartnerCountry = FilterValue($FetchValueResult['partnerCountry']);
                        $PartnerState = FilterValue($FetchValueResult['partnerState']);
                        $PartnerDistrict = FilterValue($FetchValueResult['partnerDistrict']);
                        $PartnerCity = FilterValue($FetchValueResult['partnerCity']);
                        $Iamlooking = FilterValue($FetchValueResult['lookingFor']);
                        $ABOUT = FilterValue($FetchValueResult['aboutCandidate']);
                        $youOwn = FilterValue($FetchValueResult['youOwn']);
                        $photo1 = FilterValue($FetchValueResult['photo1']);
                        $photo2 = FilterValue($FetchValueResult['photo2']);
                        $photo3 = FilterValue($FetchValueResult['photo3']);
                        $photo4 = FilterValue($FetchValueResult['photo4']);
                        $photo5 = FilterValue($FetchValueResult['photo5']);
                        $photo6 = FilterValue($FetchValueResult['photo6']);
                        $photo7 = FilterValue($FetchValueResult['photo7']);
                        $photo8 = FilterValue($FetchValueResult['photo8']);
                        $photo9 = FilterValue($FetchValueResult['photo9']);
                        $photo10 = FilterValue($FetchValueResult['photo10']);
                        $DataType =  FilterValue($FetchValueResult['dataType']);

                        $Horoscope1 = FilterValue($FetchValueResult['horoscope1']);
                        $Horoscope2 = FilterValue($FetchValueResult['horoscope2']);
                        $Horoscope3 = FilterValue($FetchValueResult['horoscope3']);
                        $Horoscope4 = FilterValue($FetchValueResult['horoscope4']);
                        $Horoscope5 = FilterValue($FetchValueResult['horoscope5']);

                        $IDProof1 = FilterValue($FetchValueResult['idProof1']);
                        $IDProof2 = FilterValue($FetchValueResult['idProof2']);
                        $IDProof3 = FilterValue($FetchValueResult['idProof3']);
                        $IDProof4 = FilterValue($FetchValueResult['idProof4']);
                        $IDProof5 = FilterValue($FetchValueResult['idProof5']);

                        $Home1 = FilterValue($FetchValueResult['home1']);
                        $Home2 = FilterValue($FetchValueResult['home2']);
                        $Home3 = FilterValue($FetchValueResult['home3']);
                        $Home4 = FilterValue($FetchValueResult['home4']);
                        $Home5 = FilterValue($FetchValueResult['home5']);
                        $ImportedDataType =  FilterValue($FetchValueResult['importedData']);
                    }

                    if ($ImportedDataType == 'PD') {
                        $ConvertTable = 'paiddata';
                    } elseif ($ImportedDataType == 'FD') {
                        $ConvertTable = 'custdata';
                    } elseif ($ImportedDataType == 'MD') {
                        $ConvertTable = 'marriagedata';
                    } else {
                        $ConvertTable = 'weddingdata';
                    }

                    mysqli_autocommit($con, FALSE);

                    $FindMaxCustId = mysqli_query($con, "SELECT MAX(custId) FROM $ConvertTable");
                    foreach ($FindMaxCustId as $FindMaxCustIdResult) {
                        $MaxCustId = $FindMaxCustIdResult['MAX(custId)'] + 1;
                    }

                    $InsertQuery = "INSERT INTO $ConvertTable (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`) VALUES('$MaxCustId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$youOwn','$dateToday','$DataType')";

                    //echo $InsertQuery;

                    $InsertIntoFreeReg = mysqli_query($con, $InsertQuery);

                    if ($InsertIntoFreeReg) {
                        $updateDuplicateStatus = mysqli_query($con, "UPDATE freeregduplicate SET convertStatus = 'YES' WHERE custId = '$ConvertAllIDArrayResults'");
                        if ($updateDuplicateStatus) {
                            mysqli_commit($con);
                            $ConvertIncrementor++;
                        } else {
                            mysqli_rollback($con);
                        }
                    } else {
                        mysqli_rollback($con);
                    }
                } else {
                    echo json_encode(array('ConvertAllDuplicate' => 0)); //all values are empty
                }
            }
            if ($ConvertAllCount == $ConvertIncrementor) {
                echo json_encode(array('ConvertAllDuplicate' => 1));
            } else {
                echo json_encode(array('ConvertAllDuplicate' => 2));
            }
        } else {
            echo json_encode(array('ConvertAllDuplicate' => 0)); //all values are empty
        }

    }


    //Free convert duplicate
    if (isset($_POST['FreeConvertId']) && !empty($_POST['FreeConvertId'])) {

        $FreeConvertId = $_POST['FreeConvertId'];
        $FreeConvertType = $_POST['FreeConvertType'];
        if ($FreeConvertType == 'PD') {
            $MaxTable = 'paiddata';
        } elseif ($FreeConvertType == 'FD') {
            $MaxTable = 'custdata';
        } elseif ($FreeConvertType == 'MD') {
            $MaxTable = 'marriagedata';
        } else {
            $MaxTable = 'weddingdata';
        }

        $FindMaxCustId = mysqli_query($con, "SELECT MAX(custId) FROM $MaxTable");
        foreach ($FindMaxCustId as $FindMaxCustIdResult) {
            $MaxCustId = $FindMaxCustIdResult['MAX(custId)'] + 1;
        }

        $FetchValues = mysqli_query($con, "SELECT * FROM freeregduplicate WHERE custId = '$FreeConvertId'");
        foreach ($FetchValues as $FetchValueResult) {

            $ProfileID = FilterValue($FetchValueResult['profileId']);
            $Gender = FilterValue($FetchValueResult['gender']);
            $FullName = FilterValue($FetchValueResult['fullName']);
            $DOB = FilterValue($FetchValueResult['dob']);
            $Height = FilterValue($FetchValueResult['height']);
            $Weight = FilterValue($FetchValueResult['weight']);
            $Complexion = FilterValue($FetchValueResult['complexion']);
            $BodyType = FilterValue($FetchValueResult['bodyType']);
            $MaritalStatus = FilterValue($FetchValueResult['maritalStatus']);
            $PhysicalStatus = FilterValue($FetchValueResult['physicalStatus']);
            $NativePlace = FilterValue($FetchValueResult['nativePlace']);
            $Religion = FilterValue($FetchValueResult['religion']);
            $Caste = FilterValue($FetchValueResult['caste']);
            $Subcaste = FilterValue($FetchValueResult['subCaste']);
            $Email = FilterValue($FetchValueResult['email']);
            $Star = FilterValue($FetchValueResult['star']);
            $ChovvaDosham = FilterValue($FetchValueResult['chovvaDosham']);
            $TypeJathakam = FilterValue($FetchValueResult['jathakamType']);
            $EducationCategory = FilterValue($FetchValueResult['educationCat']);
            $EducationType = FilterValue($FetchValueResult['educationType']);
            $JobCategory = FilterValue($FetchValueResult['jobCat']);
            $JobType = FilterValue($FetchValueResult['jobType']);
            $JobLocationCountry = FilterValue($FetchValueResult['jobLocCountry']);
            $JobLocationState = FilterValue($FetchValueResult['jobLocState']);
            $JobLocationDistrict = FilterValue($FetchValueResult['jobLocDistrict']);
            $JobLocationCity = FilterValue($FetchValueResult['jobLocCity']);
            $MonthlyIncome = FilterValue($FetchValueResult['monthlyIncome']);
            $FinancialStatus = FilterValue($FetchValueResult['financialStatus']);
            $RegisteredNumber = FilterValue($FetchValueResult['registeredNumber']);
            $WhatsappNumber = FilterValue($FetchValueResult['whatsappNumber']);
            $ResidencePhoneNumber = FilterValue($FetchValueResult['residencePhoneNumber']);
            $ContactPersonName = FilterValue($FetchValueResult['contactPerson']);
            $NoOfChildren = FilterValue($FetchValueResult['noofChild']);
            $CasteNoBar = FilterValue($FetchValueResult['casteNoBar']);
            $EducationDetails = FilterValue($FetchValueResult['eduDetails']);
            $JobDetails = FilterValue($FetchValueResult['jobDetails']);
            $MotherTongue = FilterValue($FetchValueResult['motherTongue']);
            $ProfileCreatedby = FilterValue($FetchValueResult['profileFor']);
            $BloodGroup = FilterValue($FetchValueResult['bloodGroup']);
            $ParishEdavakaSNDPNSSMahal = FilterValue($FetchValueResult['ParishEdavakaSNDPNSSMahal']);
            $When = FilterValue($FetchValueResult['hopingToMarry']);
            $CommunicationAddress = FilterValue($FetchValueResult['communicationAddress']);
            $Addres = FilterValue($FetchValueResult['address']);
            $PermanentAddress = FilterValue($FetchValueResult['permanentAddress']);
            $Country = FilterValue($FetchValueResult['country']);
            $State = FilterValue($FetchValueResult['state']);
            $District = FilterValue($FetchValueResult['district']);
            $City = FilterValue($FetchValueResult['city']);
            $ResidentialStatus = FilterValue($FetchValueResult['residentialStatus']);
            $PreferredTime = FilterValue($FetchValueResult['timeToCall']);
            $PreferredContactNumber = FilterValue($FetchValueResult['prefferedContactNumber']);
            $Relationshipwithcandidate = FilterValue($FetchValueResult['relationshipCandidate']);
            $FatherName = FilterValue($FetchValueResult['fatherName']);
            $FatherEducation = FilterValue($FetchValueResult['fatherEducation']);
            $FatherJob = FilterValue($FetchValueResult['fatherJob']);
            $FatherJobDetail = FilterValue($FetchValueResult['fatherJobDetail']);
            $MotherName = FilterValue($FetchValueResult['motherName']);
            $MotherEducation = FilterValue($FetchValueResult['motherEducation']);
            $MotherJob = FilterValue($FetchValueResult['motherJob']);
            $MotherJobDetail = FilterValue($FetchValueResult['motherJobDetail']);
            $MarriedBrothers = FilterValue($FetchValueResult['marriedBro']);
            $UnmarriedBrothers = FilterValue($FetchValueResult['unmarriedBro']);
            $MarriedSisters = FilterValue($FetchValueResult['marriedSis']);
            $UnmarriedSisters = FilterValue($FetchValueResult['unmarriedSis']);
            $JobSibling = FilterValue($FetchValueResult['siblingJobProfile']);
            $Guardian = FilterValue($FetchValueResult['guardian']);
            $FamilyOrigin = FilterValue($FetchValueResult['familyOrigin']);
            $FamilyType = FilterValue($FetchValueResult['familyType']);
            $HomeType = FilterValue($FetchValueResult['homeType']);
            $CandidateShare = FilterValue($FetchValueResult['candidateShare']);
            $FamilyValues = FilterValue($FetchValueResult['familyValues']);
            $EatingHabits = FilterValue($FetchValueResult['eatingHabits']);
            $DrinkingHabits = FilterValue($FetchValueResult['drinkingHabits']);
            $SmokingHabits = FilterValue($FetchValueResult['smokingHabits']);
            $LanguagesKnown = FilterValue($FetchValueResult['languagesKnown']);
            $Hobbies = FilterValue($FetchValueResult['Hobbies']);
            $Interests = FilterValue($FetchValueResult['interests']);
            $Blog = FilterValue($FetchValueResult['blog']);
            $LinkNetwork = FilterValue($FetchValueResult['socialMediaLink']);
            $HoroscopeDetails = FilterValue($FetchValueResult['horoscopeDetails']);
            $BirthHour = FilterValue($FetchValueResult['birthHour']);
            $BirthMinute = FilterValue($FetchValueResult['birthMinute']);
            $PlaceOfBirth = FilterValue($FetchValueResult['birthPlace']);
            $DateOfBirthMalayalam = FilterValue($FetchValueResult['malayalamDob']);
            $JanmaSistaDasa = FilterValue($FetchValueResult['janmaSistaDasa']);
            $JanmaSistaDasaEnd = FilterValue($FetchValueResult['janmaSistaDasaEnd']);
            $HoroscopeFile = FilterValue($FetchValueResult['horoscopeFile']);
            $PartnerAgeFrom = FilterValue($FetchValueResult['partnerAgeFrom']);
            $PartnerAgeTo = FilterValue($FetchValueResult['partnerAgeTo']);
            $PartnerHeightFrom = FilterValue($FetchValueResult['partnerHeightFrom']);
            $PartnerHeightTo = FilterValue($FetchValueResult['partnerHeightTo']);
            $PartnerComplexion = FilterValue($FetchValueResult['partnerComplexion']);
            $PartnerBodyType = FilterValue($FetchValueResult['partnerBodyType']);
            $PartnerMaritalStatus = FilterValue($FetchValueResult['partnerMaritalStatus']);
            $PartnerReligion = FilterValue($FetchValueResult['partnerReligion']);
            $PartnerCaste = FilterValue($FetchValueResult['partnerCaste']);
            $PartnerCasteNoBar = FilterValue($FetchValueResult['partnerCasteNoBar']);
            $MatchingStars = FilterValue($FetchValueResult['matchingStars']);
            $PartnerEducationCategory = FilterValue($FetchValueResult['partnerEduCat']);
            $PartnerEducationType = FilterValue($FetchValueResult['partnerEduType']);
            $PartnerJobCategory = FilterValue($FetchValueResult['partnerJobCat']);
            $PartnerJobType = FilterValue($FetchValueResult['partnerJobType']);
            $PartnerCountry = FilterValue($FetchValueResult['partnerCountry']);
            $PartnerState = FilterValue($FetchValueResult['partnerState']);
            $PartnerDistrict = FilterValue($FetchValueResult['partnerDistrict']);
            $PartnerCity = FilterValue($FetchValueResult['partnerCity']);
            $Iamlooking = FilterValue($FetchValueResult['lookingFor']);
            $ABOUT = FilterValue($FetchValueResult['aboutCandidate']);
            $youOwn = FilterValue($FetchValueResult['youOwn']);
            $photo1 = FilterValue($FetchValueResult['photo1']);
            $photo2 = FilterValue($FetchValueResult['photo2']);
            $photo3 = FilterValue($FetchValueResult['photo3']);
            $photo4 = FilterValue($FetchValueResult['photo4']);
            $photo5 = FilterValue($FetchValueResult['photo5']);
            $photo6 = FilterValue($FetchValueResult['photo6']);
            $photo7 = FilterValue($FetchValueResult['photo7']);
            $photo8 = FilterValue($FetchValueResult['photo8']);
            $photo9 = FilterValue($FetchValueResult['photo9']);
            $photo10 = FilterValue($FetchValueResult['photo10']);
            $DataType =  FilterValue($FetchValueResult['dataType']);


            $Horoscope1 = FilterValue($FetchValueResult['horoscope1']);
            $Horoscope2 = FilterValue($FetchValueResult['horoscope2']);
            $Horoscope3 = FilterValue($FetchValueResult['horoscope3']);
            $Horoscope4 = FilterValue($FetchValueResult['horoscope4']);
            $Horoscope5 = FilterValue($FetchValueResult['horoscope5']);

            $IDProof1 = FilterValue($FetchValueResult['idProof1']);
            $IDProof2 = FilterValue($FetchValueResult['idProof2']);
            $IDProof3 = FilterValue($FetchValueResult['idProof3']);
            $IDProof4 = FilterValue($FetchValueResult['idProof4']);
            $IDProof5 = FilterValue($FetchValueResult['idProof5']);

            $Home1 = FilterValue($FetchValueResult['home1']);
            $Home2 = FilterValue($FetchValueResult['home2']);
            $Home3 = FilterValue($FetchValueResult['home3']);
            $Home4 = FilterValue($FetchValueResult['home4']);
            $Home5 = FilterValue($FetchValueResult['home5']);
        }

        if ($FetchValues) {
            mysqli_autocommit($con, FALSE);


            if ($FreeConvertType == 'FD') {
                $InsertQuery = "INSERT INTO `custdata`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`) VALUES('$MaxCustId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$youOwn','$dateToday','$DataType')";
            } elseif ($FreeConvertType == 'PD') {
                $InsertQuery = "INSERT INTO `paiddata`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`) VALUES('$MaxCustId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$youOwn','$dateToday','$DataType')";
            } elseif ($FreeConvertType == 'MD') {
                $InsertQuery = "INSERT INTO `marriagedata`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`) VALUES('$MaxCustId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$youOwn','$dateToday','$DataType')";
            } elseif ($FreeConvertType == 'WD') {
                $InsertQuery = "INSERT INTO `weddingdata`
                (`custId`,`profileId`,`gender`,`fullName`,`dob`,`height`,`weight`,`complexion`,`bodyType`,`maritalStatus`,`physicalStatus`,`nativePlace`,`religion`,`caste`,`subCaste`,`email`,`star`,`chovvaDosham`,`jathakamType`,`educationCat`,`educationType`,`jobCat`,`jobType`,`jobLocCountry`,`jobLocState`,`jobLocDistrict`,`jobLocCity`,`monthlyIncome`,`financialStatus`,`registeredNumber`,`whatsappNumber`,`residencePhoneNumber`,`contactPerson`,`noofChild`,`casteNoBar`,`eduDetails`,`jobDetails`,`motherTongue`,`profileFor`,`bloodGroup`,`ParishEdavakaSNDPNSSMahal`,`hopingToMarry`,`communicationAddress`,`address`,`permanentAddress`,`country`,`state`,`district`,`city`,`residentialStatus`,`timeToCall`,`prefferedContactNumber`,`relationshipCandidate`,`fatherName`,`fatherEducation`,`fatherJob`,`fatherJobDetail`,`motherName`,`motherEducation`,`motherJob`,`motherJobDetail`,`marriedBro`,`unmarriedBro`,`marriedSis`,`unmarriedSis`,`siblingJobProfile`,`guardian`,`familyOrigin`,`familyType`,`homeType`,`candidateShare`,`familyValues`,`eatingHabits`,`drinkingHabits`,`smokingHabits`,`languagesKnown`,`Hobbies`,`interests`,`blog`,`socialMediaLink`,`horoscopeDetails`,`birthHour`,`birthMinute`,`birthPlace`,`malayalamDob`,`janmaSistaDasa`,`janmaSistaDasaEnd`,`horoscopeFile`,`partnerAgeFrom`,`partnerAgeTo`,`partnerHeightFrom`,`partnerHeightTo`,`partnerComplexion`,`partnerBodyType`,`partnerMaritalStatus`,`partnerReligion`,`partnerCaste`,`partnerCasteNoBar`,`matchingStars`,`partnerEduCat`,`partnerEduType`,`partnerJobCat`,`partnerJobType`,`partnerCountry`,`partnerState`,`partnerDistrict`,`partnerCity`,`lookingFor`,`aboutCandidate`,`photo1`,`photo2`,`photo3`,`photo4`,`photo5`,`photo6`,`photo7`,`photo8`,`photo9`,`photo10`,`horoscope1`,`horoscope2`,`horoscope3`,`horoscope4`,`horoscope5`,`idProof1`,`idProof2`,`idProof3`,`idProof4`,`idProof5`,`home1`,`home2`,`home3`,`home4`,`home5`,`youOwn`,`createdDate`,`dataType`) VALUES('$MaxCustId','$ProfileID','$Gender','$FullName','$DOB','$Height','$Weight','$Complexion','$BodyType','$MaritalStatus','$PhysicalStatus','$NativePlace','$Religion','$Caste','$Subcaste','$Email','$Star','$ChovvaDosham','$TypeJathakam','$EducationCategory','$EducationType','$JobCategory','$JobType','$JobLocationCountry','$JobLocationState','$JobLocationDistrict','$JobLocationCity','$MonthlyIncome','$FinancialStatus','$RegisteredNumber','$WhatsappNumber','$ResidencePhoneNumber','$ContactPersonName','$NoOfChildren','$CasteNoBar','$EducationDetails','$JobDetails','$MotherTongue','$ProfileCreatedby','$BloodGroup','$ParishEdavakaSNDPNSSMahal','$When','$CommunicationAddress','$Addres','$PermanentAddress','$Country','$State','$District','$City','$ResidentialStatus','$PreferredTime','$PreferredContactNumber','$Relationshipwithcandidate','$FatherName','$FatherEducation','$FatherJob','$FatherJobDetail','$MotherName','$MotherEducation','$MotherJob','$MotherJobDetail','$MarriedBrothers','$UnmarriedBrothers','$MarriedSisters','$UnmarriedSisters','$JobSibling','$Guardian','$FamilyOrigin','$FamilyType','$HomeType','$CandidateShare','$FamilyValues','$EatingHabits','$DrinkingHabits','$SmokingHabits','$LanguagesKnown','$Hobbies','$Interests','$Blog','$LinkNetwork','$HoroscopeDetails','$BirthHour','$BirthMinute','$PlaceOfBirth','$DateOfBirthMalayalam','$JanmaSistaDasa','$JanmaSistaDasaEnd','$HoroscopeFile','$PartnerAgeFrom','$PartnerAgeTo','$PartnerHeightFrom','$PartnerHeightTo','$PartnerComplexion','$PartnerBodyType','$PartnerMaritalStatus','$PartnerReligion','$PartnerCaste','$PartnerCasteNoBar','$MatchingStars','$PartnerEducationCategory','$PartnerEducationType','$PartnerJobCategory','$PartnerJobType','$PartnerCountry','$PartnerState','$PartnerDistrict','$PartnerCity','$Iamlooking','$ABOUT','$photo1','$photo2','$photo3','$photo4','$photo5','$photo6','$photo7','$photo8','$photo9','$photo10','$Horoscope1','$Horoscope2','$Horoscope3','$Horoscope4','$Horoscope5','$IDProof1','$IDProof2','$IDProof3','$IDProof4','$IDProof5','$Home1','$Home2','$Home3','$Home4','$Home5','$youOwn','$dateToday','$DataType')";
            }


            //echo $InsertQuery;

            $InsertIntoFreeReg = mysqli_query($con, $InsertQuery);

            if ($InsertIntoFreeReg) {
                $updateDuplicateStatus = mysqli_query($con, "UPDATE freeregduplicate SET convertStatus = 'YES' WHERE custId = '$FreeConvertId'");
                if ($updateDuplicateStatus) {
                    mysqli_commit($con);
                    echo json_encode(array('ConvertDuplicate' => 1));
                } else {
                    mysqli_rollback($con);
                    echo json_encode(array('ConvertDuplicate' => 2));
                }
            } else {
                mysqli_rollback($con);
                echo json_encode(array('ConvertDuplicate' => 3));
            }
        } else {
            echo json_encode(array('ConvertDuplicate' => 4));
        }
    }


///////////////////////////////////////////  FREE DUPLICATES  ////////////////////////////////
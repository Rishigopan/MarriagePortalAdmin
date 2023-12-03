<?php


include '../MAIN/Dbconfig.php';

$Today =  date("Y-m-d");
$UserID = 1;
$DateNow = date('Y-m-d h:i:s');


//View Company id
if (isset($_POST['CustomerId'])) {

  $CustomerId = $_POST['CustomerId'];
  $CompanyDataType = $_POST['CompanyDataType'];

  switch ($CompanyDataType) {
    case 'FD':
      $CompanyDataTable = 'custdata';
      $CompanyTableId = 'custId';
      break;
    case 'BD':
      $CompanyDataTable = 'bulkdata';
      $CompanyTableId = 'bulkId';
      break;
    case 'PD':
      $CompanyDataTable = 'paiddata';
      $CompanyTableId = 'custId';
      break;
    case 'LD':
      $CompanyDataTable = 'leaddata';
      $CompanyTableId = 'bulkId';
      break;
    case 'MD':
      $CompanyDataTable = 'marriagedata';
      $CompanyTableId = 'custId';
      break;
    case 'WD':
      $CompanyDataTable = 'weddingdata';
      $CompanyTableId = 'custId';
      break;
  }

  $FindCompanyId = mysqli_query($con, "SELECT companyId FROM $CompanyDataTable WHERE $CompanyTableId = '$CustomerId'");
  if (mysqli_num_rows($FindCompanyId) > 0) {
    foreach ($FindCompanyId as $FindCompanyIdResults) {
      $CompanyId = $FindCompanyIdResults['companyId'];
      $CompanyId = preg_replace("/[^a-zA-Z0-9]/", "", $CompanyId);
    }

    if ($CompanyId != '') {
      echo json_encode(array('CompanyStatus' => 1, 'CompanyId' => $CompanyId));
    } else {
      echo json_encode(array('CompanyStatus' => 2, 'CompanyId' => $CompanyId));
    }
  } else {
    echo json_encode(array('CompanyStatus' => 2, 'CompanyId' => $CompanyId));
  }
}




//Display all Pages
if (isset($_POST['GetPageType'])) {

  $DataType = $_POST['GetPageType'];

  switch ($DataType) {
    case 'FD':
      $feedbackData = 'Free Data';
      break;
    case 'BD':
      $feedbackData = 'Bulk Data';
      break;
    case 'PD':
      $feedbackData = 'Paid Data';
      break;
    case 'LD':
      $feedbackData = 'Lead Data';
      break;
    case 'MD':
      $feedbackData = 'Marriage Data';
      break;
    case 'WD':
      $feedbackData = 'Wedding Data';
      break;
  }

  $FetchFeedbacks = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackData = '$feedbackData'");
  echo '<option value="0">Page</option>';
  foreach ($FetchFeedbacks as $FetchFeedbacksResult) {
    echo '<option value="' . $FetchFeedbacksResult["fdId"] . '">' . $FetchFeedbacksResult["feedback"] . '</option>';
  }
}



//Display all religion
if (isset($_POST['GetReligion'])) {

  $FinalReligionArray = array();
  $FetchReligion = mysqli_query($con, "SELECT * FROM religion");
  foreach ($FetchReligion as $FetchReligionResult) {
    //echo  '<option value="'. $FetchReligionResult["casId"] .'">'. $FetchReligionResult["ReligionName"] .'</option>';
    //array('label' => $FetchReligionResult["ReligionName"], 'value' => $FetchReligionResult["casId"]);
    array_push($FinalReligionArray, array('label' => $FetchReligionResult["religionName"], 'value' => $FetchReligionResult["rId"]));
  }
  echo json_encode($FinalReligionArray);
}



//Display all education categories
if (isset($_POST['GetEducationCat'])) {

  $FinalEducationCatArray = array();
  $FetchEducationCat = mysqli_query($con, "SELECT * FROM educationcategory");
  foreach ($FetchEducationCat as $FetchEducationCatResult) {
    //echo  '<option value="'. $FetchEducationCatResult["casId"] .'">'. $FetchEducationCatResult["EducationCatName"] .'</option>';
    //array('label' => $FetchEducationCatResult["EducationCatName"], 'value' => $FetchEducationCatResult["casId"]);
    array_push($FinalEducationCatArray, array('label' => $FetchEducationCatResult["educationCategory"], 'value' => $FetchEducationCatResult["edcatId"]));
  }
  echo json_encode($FinalEducationCatArray);
}


//Display all Job categories
if (isset($_POST['GetJobCat'])) {

  $FinalJobCatArray = array();
  $FetchJobCat = mysqli_query($con, "SELECT * FROM jobcategory");
  foreach ($FetchJobCat as $FetchJobCatResult) {
    //echo  '<option value="'. $FetchJobCatResult["casId"] .'">'. $FetchJobCatResult["JobCatName"] .'</option>';
    //array('label' => $FetchJobCatResult["JobCatName"], 'value' => $FetchJobCatResult["casId"]);
    array_push($FinalJobCatArray, array('label' => $FetchJobCatResult["jobCategory"], 'value' => $FetchJobCatResult["jbcatId"]));
  }
  echo json_encode($FinalJobCatArray);
}


//Display all Job Types
if (isset($_POST['GetJobTypes'])) {

  $FinalJobTypeArray = array();
  $FetchJobType = mysqli_query($con, "SELECT * FROM jobtype");
  foreach ($FetchJobType as $FetchJobTypeResult) {
    //echo  '<option value="'. $FetchJobTypeResult["casId"] .'">'. $FetchJobTypeResult["JobTypeName"] .'</option>';
    //array('label' => $FetchJobTypeResult["JobTypeName"], 'value' => $FetchJobTypeResult["casId"]);
    array_push($FinalJobTypeArray, array('label' => $FetchJobTypeResult["jobType"], 'value' => $FetchJobTypeResult["jbTyId"]));
  }
  echo json_encode($FinalJobTypeArray);
}



//Display all  countries
if (isset($_POST['GetCountry'])) {

  $FinalCountryArray = array();
  $FetchCountry = mysqli_query($con, "SELECT * FROM country");
  foreach ($FetchCountry as $FetchCountryResult) {
    //echo  '<option value="'. $FetchCountryResult["casId"] .'">'. $FetchCountryResult["CountryName"] .'</option>';
    //array('label' => $FetchCountryResult["CountryName"], 'value' => $FetchCountryResult["casId"]);
    array_push($FinalCountryArray, array('label' => $FetchCountryResult["countryName"], 'value' => $FetchCountryResult["cId"]));
  }
  echo json_encode($FinalCountryArray);
}



//Display all  star
if (isset($_POST['GetStar'])) {

  $FinalStarArray = array();
  $FetchStar = mysqli_query($con, "SELECT * FROM star");
  foreach ($FetchStar as $FetchStarResult) {
    //echo  '<option value="'. $FetchStarResult["casId"] .'">'. $FetchStarResult["StarName"] .'</option>';
    //array('label' => $FetchStarResult["StarName"], 'value' => $FetchStarResult["casId"]);
    array_push($FinalStarArray, array('label' => $FetchStarResult["starName"], 'value' => $FetchStarResult["starId"]));
  }
  echo json_encode($FinalStarArray);
}

//Display all district
if (isset($_POST['GetDistrict'])) {

  $FinalDistrictArray = array();
  $FetchDistrict = mysqli_query($con, "SELECT * FROM district");
  foreach ($FetchDistrict as $FetchDistrictResult) {
    //echo  '<option value="'. $FetchDistrictResult["casId"] .'">'. $FetchDistrictResult["DistrictName"] .'</option>';
    //array('label' => $FetchDistrictResult["DistrictName"], 'value' => $FetchDistrictResult["casId"]);
    array_push($FinalDistrictArray, array('label' => $FetchDistrictResult["districtName"], 'value' => $FetchDistrictResult["dId"]));
  }
  echo json_encode($FinalDistrictArray);
}


//Display caste by religion
if (isset($_POST['ReligionId'])) {

  $FinalCasteArray = array();
  $religionId = implode(",", $_POST['ReligionId']);
  $FetchCaste = mysqli_query($con, "SELECT * FROM caste WHERE religionId IN($religionId)");
  foreach ($FetchCaste as $FetchCasteResult) {
    //echo  '<option value="'. $FetchCasteResult["casId"] .'">'. $FetchCasteResult["casteName"] .'</option>';
    //array('label' => $FetchCasteResult["casteName"], 'value' => $FetchCasteResult["casId"]);
    array_push($FinalCasteArray, array('label' => $FetchCasteResult["casteName"], 'value' => $FetchCasteResult["casId"]));
  }
  echo json_encode($FinalCasteArray);
}



//Display education type by education category
if (isset($_POST['EdCatId'])) {
  $FinalEdTypeArray = array();
  $EdCatId = implode(",", $_POST['EdCatId']);
  $FetchEdTypeQuery = "SELECT * FROM educationtype WHERE educationCategoryId IN($EdCatId)";
  $FetchEdType = mysqli_query($con, $FetchEdTypeQuery);
  foreach ($FetchEdType as $FetchEdTypeResult) {
    //echo  '<option value="'. $FetchEdTypeResult["casId"] .'">'. $FetchEdTypeResult["EdTypeName"] .'</option>';
    //array('label' => $FetchEdTypeResult["EdTypeName"], 'value' => $FetchEdTypeResult["casId"]);
    array_push($FinalEdTypeArray, array('label' => $FetchEdTypeResult["educationType"], 'value' => $FetchEdTypeResult["edTyId"]));
  }
  echo json_encode($FinalEdTypeArray);
}




//Display job type by job category
// if (isset($_POST['JobCatId'])) {

//   $FinalJobTypeArray = array();
//   $JobCatId = implode(",", $_POST['JobCatId']);
//   $FetchJobType = mysqli_query($con, "SELECT * FROM jobtype WHERE jobCategoryId IN('$JobCatId')");
//   foreach ($FetchJobType as $FetchJobTypeResult) {
//     //echo  '<option value="'. $FetchJobTypeResult["casId"] .'">'. $FetchJobTypeResult["JobTypeName"] .'</option>';
//     //array('label' => $FetchJobTypeResult["JobTypeName"], 'value' => $FetchJobTypeResult["casId"]);
//     array_push($FinalJobTypeArray, array('label' => $FetchJobTypeResult["jobType"], 'value' => $FetchJobTypeResult["jbTyId"]));
//   }
//   echo json_encode($FinalJobTypeArray);
// }



//Display state by country
if (isset($_POST['CountryId'])) {

  $FinalStateArray = array();
  $CountryId = implode(",", $_POST['CountryId']);
  $FetchStateQuery = "SELECT * FROM state WHERE countryId IN($CountryId)";
  $FetchState = mysqli_query($con, $FetchStateQuery);
  foreach ($FetchState as $FetchStateResult) {
    //echo  '<option value="'. $FetchStateResult["casId"] .'">'. $FetchStateResult["StateName"] .'</option>';
    //array('label' => $FetchStateResult["StateName"], 'value' => $FetchStateResult["casId"]);
    array_push($FinalStateArray, array('label' => $FetchStateResult["stateName"], 'value' => $FetchStateResult["sId"]));
  }
  echo json_encode($FinalStateArray);
}



//Display district by state 
if (isset($_POST['StateId'])) {

  $FinalDistrictArray = array();
  $StateId = implode(",", $_POST['StateId']);
  $FetchDistrict = mysqli_query($con, "SELECT * FROM district WHERE stateId IN($StateId)");
  foreach ($FetchDistrict as $FetchDistrictResult) {
    //echo  '<option value="'. $FetchDistrictResult["casId"] .'">'. $FetchDistrictResult["DistrictName"] .'</option>';
    //array('label' => $FetchDistrictResult["DistrictName"], 'value' => $FetchDistrictResult["casId"]);
    array_push($FinalDistrictArray, array('label' => $FetchDistrictResult["districtName"], 'value' => $FetchDistrictResult["dId"]));
  }
  echo json_encode($FinalDistrictArray);
}



////////////////////////////////////////////////////////   Registration  ///////////////////////////////////////////////////////

//Display all  MotherTongue
if (isset($_POST['GetMothertongue'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchMotherTongue = mysqli_query($con, "SELECT mtId,motherTongueName FROM mothertongue");
  foreach ($FetchMotherTongue as $FetchMotherTongueResult) {
    echo  '<option value="' . $FetchMotherTongueResult["mtId"] . '">' . $FetchMotherTongueResult["motherTongueName"] . '</option>';
  }
}

//Display all Package
if (isset($_POST['GetPackage'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchPackage = mysqli_query($con, "SELECT id,packageName FROM package");
  foreach ($FetchPackage as $FetchPackageResult) {
    echo  '<option value="' . $FetchPackageResult["id"] . '">' . $FetchPackageResult["packageName"] . '</option>';
  }
}


//Display all  Religion
if (isset($_POST['GetAllReligion'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllReligion = mysqli_query($con, "SELECT rId,religionName FROM religion");
  foreach ($FetchAllReligion as $FetchAllReligionResult) {
    echo  '<option value="' . $FetchAllReligionResult["rId"] . '">' . $FetchAllReligionResult["religionName"] . '</option>';
  }
}



//Display all  Caste
if (isset($_POST['GetAllCaste'])) {
  $ReligionId = $_POST['GetAllCaste'];
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllCaste = mysqli_query($con, "SELECT casId,casteName FROM caste WHERE religionId = '$ReligionId'");
  foreach ($FetchAllCaste as $FetchAllCasteResult) {
    echo  '<option value="' . $FetchAllCasteResult["casId"] . '">' . $FetchAllCasteResult["casteName"] . '</option>';
  }
}



//Display all Sub Caste
if (isset($_POST['GetAllSubCaste'])) {
  $CasteId = $_POST['GetAllSubCaste'];
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllSubCaste = mysqli_query($con, "SELECT scId,subcasteName FROM subcaste WHERE casteId = '$CasteId'");
  foreach ($FetchAllSubCaste as $FetchAllSubCasteResult) {
    echo  '<option value="' . $FetchAllSubCasteResult["scId"] . '">' . $FetchAllSubCasteResult["subcasteName"] . '</option>';
  }
}



//Display all GetAllStar
if (isset($_POST['GetAllStar'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllStar = mysqli_query($con, "SELECT starId,starName FROM star");
  foreach ($FetchAllStar as $FetchAllStarResult) {
    echo  '<option value="' . $FetchAllStarResult["starId"] . '">' . $FetchAllStarResult["starName"] . '</option>';
  }
}



//Display all Education Category
if (isset($_POST['GetAllEducationCat'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllEduCat = mysqli_query($con, "SELECT edcatId,educationCategory FROM educationcategory");
  foreach ($FetchAllEduCat as $FetchAllEduCatResult) {
    echo  '<option value="' . $FetchAllEduCatResult["edcatId"] . '">' . $FetchAllEduCatResult["educationCategory"] . '</option>';
  }
}



//Display all Education Type
if (isset($_POST['GetAllEduType'])) {
  $EduCatId = $_POST['GetAllEduType'];
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllEduType = mysqli_query($con, "SELECT edTyId,educationType FROM educationtype WHERE educationCategoryId = '$EduCatId'");
  foreach ($FetchAllEduType as $FetchAllEduTypeResult) {
    echo  '<option value="' . $FetchAllEduTypeResult["edTyId"] . '">' . $FetchAllEduTypeResult["educationType"] . '</option>';
  }
}



//Display all Job Category
if (isset($_POST['GetAllJobCat'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllJobCat = mysqli_query($con, "SELECT jbcatId,jobCategory FROM jobcategory");
  foreach ($FetchAllJobCat as $FetchAllJobCatResult) {
    echo  '<option value="' . $FetchAllJobCatResult["jbcatId"] . '">' . $FetchAllJobCatResult["jobCategory"] . '</option>';
  }
}


//Display all Job Type
if (isset($_POST['GetAllJobType'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllJobType = mysqli_query($con, "SELECT jbTyId,jobType FROM jobtype WHERE jobCategoryId = 1");
  foreach ($FetchAllJobType as $FetchAllJobTypeResult) {
    echo  '<option value="' . $FetchAllJobTypeResult["jbTyId"] . '">' . $FetchAllJobTypeResult["jobType"] . '</option>';
  }
}


//Display all Country
if (isset($_POST['GetAllCountry'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllCountry = mysqli_query($con, "SELECT cId,countryName FROM country ");
  foreach ($FetchAllCountry as $FetchAllCountryResult) {
    echo  '<option value="' . $FetchAllCountryResult["cId"] . '">' . $FetchAllCountryResult["countryName"] . '</option>';
  }
}



//Display all State By Country
if (isset($_POST['GetAllState'])) {
  $CountryID = $_POST['GetAllState'];
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllState = mysqli_query($con, "SELECT sId,stateName FROM state WHERE countryId = '$CountryID'");
  foreach ($FetchAllState as $FetchAllStateResult) {
    echo  '<option value="' . $FetchAllStateResult["sId"] . '">' . $FetchAllStateResult["stateName"] . '</option>';
  }
}


//Display all District  By State
if (isset($_POST['GetAllDistrict'])) {
  $StateID = $_POST['GetAllDistrict'];
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllDistrict = mysqli_query($con, "SELECT dId,districtName FROM district WHERE stateId = '$StateID'");
  foreach ($FetchAllDistrict as $FetchAllDistrictResult) {
    echo  '<option value="' . $FetchAllDistrictResult["dId"] . '">' . $FetchAllDistrictResult["districtName"] . '</option>';
  }
}



//Display all City  By District
if (isset($_POST['GetAllCity'])) {
  $DistrictID = $_POST['GetAllCity'];
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllCity = mysqli_query($con, "SELECT citId,cityName FROM city WHERE districtId = '$DistrictID'");
  foreach ($FetchAllCity as $FetchAllCityResult) {
    echo  '<option value="' . $FetchAllCityResult["citId"] . '">' . $FetchAllCityResult["cityName"] . '</option>';
  }
}



//Display all Education Type
if (isset($_POST['GetAllEduTypes'])) {
  echo  '<option hidden value="0">Choose</option>';
  $FetchAllEducationTypes = mysqli_query($con, "SELECT edTyId,educationType FROM educationtype ");
  foreach ($FetchAllEducationTypes as $FetchAllEducationTypesResult) {
    echo  '<option value="' . $FetchAllEducationTypesResult["edTyId"] . '">' . $FetchAllEducationTypesResult["educationType"] . '</option>';
  }
}



//Profile Actions
if (isset($_POST['ProfileAction'])) {

  $ProfileAction = $_POST['ProfileAction'];
  $StatusChangeDataType = $_POST['StatusChangeData'];
  $StatusChangeCounter = 0;

  switch ($StatusChangeDataType) {
    case 'FD':
      $StatusTable = 'custdata';
      break;
    case 'BD':
      $StatusTable = 'bulkdata';
      break;
    case 'PD':
      $StatusTable = 'paiddata';
      break;
    case 'LD':
      $StatusTable = 'leaddata';
      break;
    case 'MD':
      $StatusTable = 'marriagedata';
      break;
    case 'WD':
      $StatusTable = 'weddingdata';
      break;
  }

  if (isset($_POST['ProfileList'])) {
    $ProfileList = $_POST['ProfileList'];
    $ProfileCount =  count($ProfileList);
    if (!empty($ProfileList)) {
      foreach ($ProfileList as $Profiles) {
        $ChangeProfileStatus =  mysqli_query($con, "UPDATE $StatusTable SET approvalStatus = '$ProfileAction', updatedDate = '$DateNow', updatedBy = '$UserID' WHERE custId = '$Profiles'");
        if ($ChangeProfileStatus) {
          $StatusChangeCounter++;
        }
      }

      if ($StatusChangeCounter == $ProfileCount) {
        echo json_encode(array('ProfileAction' => 1)); //Successfully changed profile status
      } else {
        echo json_encode(array('ProfileAction' => 2)); //Failed changing profile status
      }
    } else {
      echo json_encode(array('ProfileAction' => 0)); //Profile List is empty
    }
  } else {
    echo json_encode(array('ProfileAction' => 0)); //Profile List is empty
  }
}



//Display All Images
if (isset($_POST['ViewImagesProfileId']) && !empty($_POST['Imagetype'])) {

  $ProfileId = $_POST['ViewImagesProfileId'];
  $Imagetype = $_POST['Imagetype'];
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

  $FindAllImages = mysqli_query($con, "SELECT CONCAT(photo1,',',photo2,',',photo3,',',photo4,',',photo5,',',photo6,',',photo7,',',photo8,',',photo9) AS PROFILE, CONCAT(horoscope1,',',horoscope2,',',horoscope3,',',horoscope4,',',horoscope5) AS HOROSCOPE, CONCAT(idProof1,',',idProof2,',',idProof3,',',idProof4,',',idProof5) AS IDPROOF , CONCAT(home1,',',home2,',',home3,',',home4,',',home5) AS HOME,mainImage FROM $TableName WHERE custId = '$ProfileId'");

  foreach ($FindAllImages as $FindAllImagesResult) {
    $ProfileImageArray = explode(",", $FindAllImagesResult['PROFILE']);
    $HoroscopeImageArray = explode(",", $FindAllImagesResult['HOROSCOPE']);
    $IdProofImageArray = explode(",", $FindAllImagesResult['IDPROOF']);
    $HomeImageArray = explode(",", $FindAllImagesResult['HOME']);
    $ActiveVar = $FindAllImagesResult['mainImage'];
  }



  switch ($Imagetype) {
    case ('Profile'):
      $Folder = '../CUSTOMERIMAGES/PROFILE/';
      $ImageArray = $ProfileImageArray;
      break;
    case ('Horoscope'):
      $Folder = '../CUSTOMERIMAGES/HOROSCOPE/';
      $ImageArray = $HoroscopeImageArray;
      break;
    case ('IdProof'):
      $Folder = '../CUSTOMERIMAGES/IDPROOF/';
      $ImageArray = $IdProofImageArray;
      break;
    case ('Home'):
      $Folder = '../CUSTOMERIMAGES/HOME/';
      $ImageArray = $HomeImageArray;
      break;
  }




  //print_r($ImageArray);


  foreach ($ImageArray as $ImageArrayResult) {
    $ProfileImageSrc = $Folder . $ImageArrayResult;
    // echo '
    // <div class="MemberImagesDiv card"> 
    //   <img class="img-fluid" src="'.$ProfileImageSrc.'"> 
    // </div>';
    if (file_exists($ProfileImageSrc) == 1) {
      echo '
      <div class="MemberImagesDiv card"> 
        <img class="img-fluid" src="' . $ProfileImageSrc . '"> 
      </div>';
    } else {
    }
  }
}





///////////////////////////////////////////  MatchMaking Operations /////////////////////////////////



if (isset($_POST['SelectedMatchMethod'])) {
  $SelectedMatcher = $_POST['SelectedMatcher'];
  $SelectedMatchMethod = $_POST['SelectedMatchMethod'];

  if ($SelectedMatchMethod == 'MM') {


    $FindMatcherDetails = mysqli_query($con, "SELECT * , substring(height, 14,3) AS Height FROM custdata WHERE custId = '$SelectedMatcher'");


    foreach ($FindMatcherDetails as $FindMatcherDetailsResult) {

      $MatcherGender = $FindMatcherDetailsResult['gender'];
      $FilterGender = ($MatcherGender == 'Male') ? "Female" : "Male";
      $MatcherReligion = $FindMatcherDetailsResult['religion'];
      $FilterReligion = ($MatcherReligion == '4' || $MatcherReligion == '5') ? "SelectAll" : $MatcherReligion;
      $MatcherMaritalStatus  = $FindMatcherDetailsResult['maritalStatus'];
      $FilterMaritalStatus = ($MatcherMaritalStatus == 'Unmarried') ? "'Unmarried'" : "SelectAll";
      $MatcherPhyscialStatus  = $FindMatcherDetailsResult['physicalStatus'];
      $FilterPhyscialStatus = "'" . $MatcherPhyscialStatus . "'";
      $MatcherCaste  = $FindMatcherDetailsResult['caste'];
      $FilterCaste = $MatcherCaste;
      $MatcherComplexion = $FindMatcherDetailsResult['complexion'];
      $FilterComplexion = ($MatcherComplexion == 'Dark' || $MatcherComplexion == 'Medium' || $MatcherComplexion == 'Wheatish')  ?   ["'Dark'", "'Medium'", "'Wheatish'"] : ["'Fair'", "'Very Fair'", "'Wheatish'"];
      $MatcherHeight = $FindMatcherDetailsResult['Height'];
      $MatcherDistrict  = $FindMatcherDetailsResult['district'];


      $FindNearbyDistricts =  mysqli_query($con, "SELECT nearbyDistricts FROM nearby_districts WHERE districtId = '$MatcherDistrict'");
      if (mysqli_num_rows($FindNearbyDistricts) > 0) {
        foreach ($FindNearbyDistricts as $FindNearbyDistrictsResult) {
          $FilterNearbyDistricts = $FindNearbyDistrictsResult['nearbyDistricts'];
        }
      } else {
        $FilterNearbyDistricts = "0,0,0";
      }

      if (trim($MatcherHeight) != '') {
        if ($MatcherGender == 'Male') {
          $FilterHeightFrom = "120";
          $FilterHeightTo = $MatcherHeight;
        } else {
          $FilterHeightFrom = $MatcherHeight;
          $FilterHeightTo = "212";
        }
      } else {
        $FilterHeightFrom = "";
        $FilterHeightTo = "";
      }



      $DobDifference = date_diff(date_create($FindMatcherDetailsResult['dob']), date_create($Today));
      $MatcherAge =  $DobDifference->format('%y');

      if ($MatcherGender == 'Male') {
        $FilterAgeFrom =    $MatcherAge - 6;
        $FilterAgeTo = $MatcherAge - 2;
        if ($FilterAgeFrom < 18) {
          $FilterAgeFrom = 18;
        }
        if ($FilterAgeFrom > 80) {
          $FilterAgeFrom = 80;
        }
      } else {
        $FilterAgeFrom = $MatcherAge + 2;
        $FilterAgeTo = $MatcherAge + 6;
        if ($FilterAgeFrom < 18) {
          $FilterAgeFrom = 18;
        }
        if ($FilterAgeFrom > 80) {
          $FilterAgeFrom = 80;
        }
      }
    }

    echo json_encode(array('FilterGender' => $FilterGender, 'FilterReligion' => $FilterReligion, 'FilterPhyscialStatus' => $FilterPhyscialStatus, 'FilterCaste' => $FilterCaste, 'FilterMaritalStatus' => $FilterMaritalStatus, 'FilterComplexion' => $FilterComplexion, 'FilterHeightTo' => $FilterHeightTo, 'FilterHeightFrom' => $FilterHeightFrom, 'FilterAgeTo' => $FilterAgeTo, 'FilterAgeFrom' => $FilterAgeFrom, 'FilterNearby' => $FilterNearbyDistricts));
  }
}




///////////////////////////////////////////  MatchMaking Operations /////////////////////////////////






if (isset($_POST['FindProfileStatusMemberId']) && isset($_POST['FindProfileStatusDataType'])) {

  $FindProfileStatusMemberId = $_POST['FindProfileStatusMemberId'];
  $FindProfileStatusDataType = $_POST['FindProfileStatusDataType'];


  switch ($FindProfileStatusDataType) {
    case 'BD':
      $ProfileStatusTable = 'bulkdata';
      $ProfileStatusId = 'bulkId';
      $CheckType = 'Bulk';
      break;
    case 'LD':
      $ProfileStatusTable = 'leaddata';
      $ProfileStatusId = 'bulkId';
      $CheckType = 'Bulk';
      break;
    case 'FD':
      $ProfileStatusTable = 'custdata';
      $ProfileStatusId = 'profileId';
      $CheckType = 'Free';
      break;
    case 'PD':
      $ProfileStatusTable = 'paiddata';
      $ProfileStatusId = 'profileId';
      $CheckType = 'Free';
      break;
    case 'MD':
      $ProfileStatusTable = 'marriagedata';
      $ProfileStatusId = 'profileId';
      $CheckType = 'Free';
      break;
    case 'WD':
      $ProfileStatusTable = 'weddingdata';
      $ProfileStatusId = 'profileId';
      $CheckType = 'Free';
      break;
  }


  if ($CheckType == 'Free') {
    $FindProfileStatusQuery = "SELECT approvalStatus AS ApprovalStatus, feedback AS Feedback FROM $ProfileStatusTable WHERE $ProfileStatusId = '$FindProfileStatusMemberId'";
  } else {
    $FindProfileStatusQuery = "SELECT approvalStatus AS ApprovalStatus, bulkStatus AS Feedback FROM $ProfileStatusTable WHERE $ProfileStatusId = '$FindProfileStatusMemberId'";
  }


  $FindProfileStatus = mysqli_query($con, $FindProfileStatusQuery);
  foreach ($FindProfileStatus as $FindProfileStatusResult) {
    $ProfileStatus = $FindProfileStatusResult['ApprovalStatus'];
    $ProfileFeedback = $FindProfileStatusResult['Feedback'];
  }

  echo json_encode(array('ShowProfileStatus' => $ProfileStatus, 'ShowProfileFeedback' => $ProfileFeedback));
}



// To fetch the latest picture id
if (isset($_POST['FindPictureId']) && !empty($_POST['FindPictureId'])) {

  $FindPictureId = $_POST['FindPictureId'];

  switch ($FindPictureId) {
    case 'FD':
      $PictureIdTable = 'custdata';
      break;
    case 'PD':
      $PictureIdTable = 'paiddata';
      break;
    case 'MD':
      $PictureIdTable = 'marriagedata';
      break;
    case 'WD':
      $PictureIdTable = 'weddingdata';
      break;
  }
  
  $FindMaxPictureId  = mysqli_query($con, "SELECT MAX(pictureId) FROM $PictureIdTable");
  if(mysqli_num_rows($FindMaxPictureId) > 0){
    foreach ($FindMaxPictureId as $FindMaxPictureIdResult) {
      $PictureMaxId = $FindMaxPictureIdResult['MAX(pictureId)'];
    }
    if($PictureMaxId == null){
      $PictureMaxId = 0;
    }
  }else{
    $PictureMaxId = 0;
  }
  

  echo json_encode(array('Status' => true,'PictureMaxId' => $PictureMaxId));
}

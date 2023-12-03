<?php

include '../MAIN/Dbconfig.php';

if ($_COOKIE['custtypecookie'] == 1) {
    $Assigned = 0;
} else {
    $Assigned = $_COOKIE['custidcookie'];
}

$Today = date("Y-m-d");



if (isset($_POST['Search'])) {

    $query = '';


    $FilterGender = $_POST['MemberBride'];
    // $FilterReligion = '1';
    $FilterMonthlyIncome = $_POST['MemberIncome'];
    $FilterMemberCanID = $_POST['MemberCanID'];
    $FilterMemberMobile = $_POST['MemberMobile'];




    if (isset($_POST['MemberMarstatus'])) {
        foreach ($_POST['MemberMarstatus'] as $MaritalStatusCheck) {
            if ($MaritalStatusCheck != '') {
                $FilterMaritalStatusLength = count($_POST['MemberMarstatus']);
                $FilterMaritalStatus = ltrim(implode(",", $_POST['MemberMarstatus']), ',');
            } else {
                $FilterMaritalStatus = "''";
                $FilterMaritalStatusLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberPhystatus'])) {
        foreach ($_POST['MemberPhystatus'] as $PhyscialStatusCheck) {
            if ($PhyscialStatusCheck != '') {
                $FilterPhyscialStatusLength = count($_POST['MemberPhystatus']);
                $FilterPhyscialStatus = ltrim(implode(",", $_POST['MemberPhystatus']), ',');
            } else {
                $FilterPhyscialStatus = "''";
                $FilterPhyscialStatusLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberComplexion'])) {
        foreach ($_POST['MemberComplexion'] as $ComplexionCheck) {
            if ($ComplexionCheck != '') {
                $FilterComplexionLength = count($_POST['MemberComplexion']);
                $FilterComplexion = ltrim(implode(",", $_POST['MemberComplexion']), ',');
            } else {
                $FilterComplexion = "''";
                $FilterComplexionLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberBodyType'])) {
        foreach ($_POST['MemberBodyType'] as $BodyTypeCheck) {
            if ($BodyTypeCheck != '') {
                $FilterBodyTypeLength = count($_POST['MemberBodyType']);
                $FilterBodyType = ltrim(implode(",", $_POST['MemberBodyType']), ',');
            } else {
                $FilterBodyType = "''";
                $FilterBodyTypeLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberJathakam'])) {
        foreach ($_POST['MemberJathakam'] as $JathakamCheck) {
            if ($JathakamCheck != '') {
                $FilterJathakamLength = count($_POST['MemberJathakam']);
                $FilterJathakam = ltrim(implode(",", $_POST['MemberJathakam']), ',');
            } else {
                $FilterJathakam = "''";
                $FilterJathakamLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberChild'])) {
        foreach ($_POST['MemberChild'] as $ChildCheck) {
            if ($ChildCheck != '') {
                $FilterChildLength = count($_POST['MemberChild']);
                $FilterChild = ltrim(implode(",", $_POST['MemberChild']), ',');
            } else {
                $FilterChild = "''";
                $FilterChildLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberFinstatus'])) {
        foreach ($_POST['MemberFinstatus'] as $FinstatusCheck) {
            if ($FinstatusCheck != '') {
                $FilterFinstatusLength = count($_POST['MemberFinstatus']);
                $FilterFinstatus = ltrim(implode(",", $_POST['MemberFinstatus']), ',');
            } else {
                $FilterFinstatus = "''";
                $FilterFinstatusLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberOwn'])) {
        foreach ($_POST['MemberOwn'] as $OwnCheck) {
            if ($OwnCheck != '') {
                $FilterOwnLength = count($_POST['MemberOwn']);
                $FilterOwn = ltrim(implode(",", $_POST['MemberOwn']), ',');
            } else {
                $FilterOwn = "''";
                $FilterOwnLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberCaste'])) {
        foreach ($_POST['MemberCaste'] as $CasteCheck) {
            if ($CasteCheck != '') {
                $FilterCasteLength = count($_POST['MemberCaste']);
                $FilterCaste = ltrim(implode(",", $_POST['MemberCaste']), ',');
            } else {
                $FilterCaste = "''";
                $FilterCasteLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberEducationCategory'])) {
        foreach ($_POST['MemberEducationCategory'] as $EducationCategoryCheck) {
            if ($EducationCategoryCheck != '') {
                $FilterEducationCategoryLength = count($_POST['MemberEducationCategory']);
                $FilterEducationCategory = ltrim(implode(",", $_POST['MemberEducationCategory']), ',');
            } else {
                $FilterEducationCategory = "''";
                $FilterEducationCategoryLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberReligion'])) {
        foreach ($_POST['MemberReligion'] as $ReligionCheck) {
            if ($ReligionCheck != '') {
                $FilterReligionLength = count($_POST['MemberReligion']);
                $FilterReligion = ltrim(implode(",", $_POST['MemberReligion']), ',');
            } else {
                $FilterReligion = "''";
                $FilterReligionLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberEduType'])) {
        foreach ($_POST['MemberEduType'] as $EduTypeCheck) {
            if ($EduTypeCheck != '') {
                $FilterEduTypeLength = count($_POST['MemberEduType']);
                $FilterEduType = ltrim(implode(",", $_POST['MemberEduType']), ',');
            } else {
                $FilterEduType = "''";
                $FilterEduTypeLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberJobcategory'])) {
        foreach ($_POST['MemberJobcategory'] as $JobcategoryCheck) {
            if ($JobcategoryCheck != '') {
                $FilterJobcategoryLength = count($_POST['MemberJobcategory']);
                $FilterJobcategory = ltrim(implode(",", $_POST['MemberJobcategory']), ',');
            } else {
                $FilterJobcategory = "''";
                $FilterJobcategoryLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberJobType'])) {
        foreach ($_POST['MemberJobType'] as $JobTypeCheck) {
            if ($JobTypeCheck != '') {
                $FilterJobTypeLength = count($_POST['MemberJobType']);
                $FilterJobType = ltrim(implode(",", $_POST['MemberJobType']), ',');
            } else {
                $FilterJobType = "''";
                $FilterJobTypeLength = 0;
            }
        }
    } else {
    }



    if (isset($_POST['MemberDistrict'])) {
        foreach ($_POST['MemberDistrict'] as $DistrictCheck) {
            if ($DistrictCheck != '') {
                $FilterDistrictLength = count($_POST['MemberDistrict']);
                $FilterDistrict = ltrim(implode(",", $_POST['MemberDistrict']), ',');
            } else {
                $FilterDistrict = "''";
                $FilterDistrictLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberCountry'])) {
        foreach ($_POST['MemberCountry'] as $CountryCheck) {
            if ($CountryCheck != '') {
                $FilterCountryLength = count($_POST['MemberCountry']);
                $FilterCountry = ltrim(implode(",", $_POST['MemberCountry']), ',');
            } else {
                $FilterCountry = "''";
                $FilterCountryLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberState'])) {
        foreach ($_POST['MemberState'] as $StateCheck) {
            if ($StateCheck != '') {
                $FilterStateLength = count($_POST['MemberState']);
                $FilterState = ltrim(implode(",", $_POST['MemberState']), ',');
            } else {
                $FilterState = "''";
                $FilterStateLength = 0;
            }
        }
    } else {
    }


    if (isset($_POST['MemberAgefrom']) && isset($_POST['MemberAgeto'])) {

        if ($_POST['MemberAgefrom'] != '' && $_POST['MemberAgeto'] == '') {
            $AgeFrom = $_POST['MemberAgefrom'];
            $AgeTo = '100';
        } elseif ($_POST['MemberAgefrom'] == '' && $_POST['MemberAgeto'] != '') {
            $AgeFrom = '1';
            $AgeTo = $_POST['MemberAgeto'];
        } elseif ($_POST['MemberAgefrom'] != '' && $_POST['MemberAgeto'] != '') {
            $AgeFrom = $_POST['MemberAgefrom'];
            $AgeTo = $_POST['MemberAgeto'];
        } else {
            $AgeFrom = '1';
            $AgeTo = '100';
        }
    } else {
    }


    if (isset($_POST['MemberHeightfrom']) && isset($_POST['MemberHeightto'])) {

        if ($_POST['MemberHeightfrom'] != '' && $_POST['MemberHeightto'] == '') {
            $HeightFrom = $_POST['MemberHeightfrom'];
            $HeightTo = '300';
        } elseif ($_POST['MemberHeightfrom'] == '' && $_POST['MemberHeightto'] != '') {
            $HeightFrom = '0';
            $HeightTo = $_POST['MemberHeightto'];
        } elseif ($_POST['MemberHeightfrom'] != '' && $_POST['MemberHeightto'] != '') {
            $HeightFrom = $_POST['MemberHeightfrom'];
            $HeightTo = $_POST['MemberHeightto'];
        } else {
            $HeightFrom = '0';
            $HeightTo = '300';
        }
    } else {
    }


    if (isset($_POST['MemberStar'])) {

        if (($_POST['MemberStar'] != '') && ($_POST['MemberBride'] != '')) {

            $MemberStar = $_POST['MemberStar'];
            //$MemberBride =  ($_POST['MemberBride'] == 'Female') ? 'YES' : 'NO';

            if ($_POST['MemberBride'] == 'Female') {
                $MemberBride = 'YES';
                $FilterGender = 'Male';
            } elseif ($_POST['MemberBride'] == 'Male') {
                $MemberBride = 'NO';
                $FilterGender = 'Female';
            } else {
                $MemberBride = 'NO';
                $FilterGender = 'Female';
            }
            //echo $MemberStar;
            //echo $MemberBride;

            $MatchingStars =  array();

            $MemberBride = mysqli_query($con, "SELECT matchingStars FROM starmatch WHERE isBride = '$MemberBride' AND starId = '$MemberStar'");
            foreach ($MemberBride as $MemberBrideResult) {
                array_push($MatchingStars, $MemberBrideResult["matchingStars"]);
            }

            $MatchingStarString = implode(",", $MatchingStars);
            //echo $MatchingStarString;

            $FilterStarLength = 2;
        } else {
            $FilterStarLength = 0;

            $MatchingStarString = "''";
        }
    }


    if (isset($_POST['PageLength'])) {
        $PageLength = $_POST['PageLength'];
    }


    if (isset($_POST['PageNumber'])) {
        $PageNumber = $_POST['PageNumber'];
    } else {
        $PageNumber = 1;
    }

    if (isset($_POST['MemberPage'])) {
        $FeedbackStatus = $_POST['MemberPage'];
    } else {
        $FeedbackStatus = 0;
    }


    if ($_POST['FilterBranch'] == 0) {
        $FilterBranch = $_POST['FilterBranch'];
        $BranchQuery = " AND branchId = " . $FilterBranch . "";
    } else {
        $BranchQuery = " AND branchId = branchId";
    }

    if ($_POST['FilterAgency'] == 0) {
        $FilterAgency = $_POST['FilterAgency'];
        $AgencyQuery = " AND agencyId = " . $FilterAgency . "";
    } else {
        $AgencyQuery = " AND agencyId = agencyId";
    }



    $FilterProfileStatus = $_POST['ProfileStatus'];
    $FilterType = $_POST['MemberType'];
    $FilterPackage = $_POST['MemberPackage'];

    if (isset($_POST['Assigned'])) {
        if (!empty($_POST['MemberSend'])) {
            $Assigned = $_POST['MemberSend'];
        } else {
            $Assigned = 700000;
        }
    } else {
        $Assigned = 0;
    }



    // echo $BranchQuery;
    // echo $AgencyQuery;





    //echo $FeedbackStatus;

    //echo $_POST['FindMemberId'];

    //print_r($_POST);



    // Function to convert ids to name
    function IdToNameConversion($IdString, $TableName, $ColumnId, $ColumnName, $con)
    {
        $NameArray = array();
        //return $IdString;
        if (trim($IdString) != '') {
            $IdArray = explode(",", $IdString);
            foreach ($IdArray as $IdArrayResults) {
                $FindNameQuery =  "SELECT $ColumnName FROM $TableName WHERE $ColumnId = $IdArrayResults";
                $FindName = mysqli_query($con, $FindNameQuery);
                foreach ($FindName as $FindNameResults) {
                    array_push($NameArray, $FindNameResults[$ColumnName]);
                }
            }
            return implode(",", $NameArray);
        } else {
            return "";
        }
    }


    // echo IdToNameConversion("2,3,4","caste","casId","casteName",$con);





    if (isset($_POST['MemberData'])) {



        $DataValue = $_POST['MemberData'];


        //Check data is bulk
        if ($DataValue == 'BD') {
            $query = "SELECT * FROM bulkdata B LEFT JOIN feedback FB ON B.bulkStatus =  FB.fdId LEFT JOIN types DT ON B.bulkType = DT.id WHERE B.assignedTo = $Assigned AND B.approvalStatus = '$FilterProfileStatus' AND B.bulkStatus = $FeedbackStatus " . $BranchQuery . " " . $AgencyQuery . "";
        } elseif ($DataValue == 'LD') {
            $query = "SELECT * FROM leaddata L LEFT JOIN feedback FB ON L.bulkStatus = FB.fdId LEFT JOIN types DT ON L.bulkType = DT.id WHERE L.assignedTo = $Assigned AND L.approvalStatus = '$FilterProfileStatus' AND L.bulkStatus = $FeedbackStatus " . $BranchQuery . " " . $AgencyQuery . "";
        } elseif ($DataValue == 'PD') {
            $query = "SELECT cdata.*,P.packageName,DT.typeAbbreviation,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM paiddata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId LEFT JOIN package P ON cdata.package = P.id LEFT JOIN types DT ON cdata.dataType = DT.id WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) AND assignedTo = $Assigned AND cdata.feedback = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery." AND approvalStatus = '$FilterProfileStatus'";
        } elseif ($DataValue == 'MD') {
             $query = "SELECT cdata.*,P.packageName,DT.typeAbbreviation,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM marriagedata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId LEFT JOIN package P ON cdata.package = P.id LEFT JOIN types DT ON cdata.dataType = DT.id WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) AND assignedTo = $Assigned AND cdata.feedback = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery." AND approvalStatus = '$FilterProfileStatus'";
        } elseif ($DataValue == 'WD') {
            $query = "SELECT cdata.*,P.packageName,DT.typeAbbreviation,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM weddingdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId LEFT JOIN package P ON cdata.package = P.id LEFT JOIN types DT ON cdata.dataType = DT.id WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) AND assignedTo = $Assigned AND cdata.feedback = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery." AND approvalStatus = '$FilterProfileStatus'";
        } else {
           $query = "SELECT cdata.*,P.packageName,DT.typeAbbreviation,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,STAR.starName AS STARNAME,FEED.feedback AS FEEDBACK  FROM custdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN feedback FEED ON cdata.feedback = FEED.fdId LEFT JOIN package P ON cdata.package = P.id LEFT JOIN types DT ON cdata.dataType = DT.id WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.religion = CASE WHEN $FilterReligionLength > 0 THEN (SELECT rreli.rId FROM religion rreli WHERE rreli.rId IN($FilterReligion) AND cdata.religion = rreli.rId) ELSE cdata.religion END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND (cdata.profileId = CASE WHEN '$FilterMemberCanID' <> '' THEN '$FilterMemberCanID'  ELSE cdata.profileId END) AND ( cdata.registeredNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.registeredNumber END ) OR cdata.whatsappNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.whatsappNumber END ) OR cdata.residencePhoneNumber = ( CASE WHEN '$FilterMemberMobile' <> '' THEN '$FilterMemberMobile' ELSE cdata.residencePhoneNumber END )) AND assignedTo = $Assigned AND cdata.feedback = $FeedbackStatus ".$BranchQuery." ".$AgencyQuery." AND approvalStatus = '$FilterProfileStatus'";
        }

        //echo $query;


        //$query .= $QueryAdditionFromDuplicate;


        // Filter by package and type
        if($DataValue == 'BD' || $DataValue == 'LD'){
            if($FilterType != 0){
                $query .= " AND bulkType = $FilterType";
            }
        }else{
            if($FilterType != 0){
                $query .= " AND dataType = $FilterType";
            }
            if($FilterPackage != 0){
                $query .= " AND package = $FilterPackage";
            }
        }



        // Order by latest of added and updated date
        if($DataValue == 'BD'){
            $query .= " ORDER BY GREATEST(COALESCE(B.updatedDate, '0000-00-00'), COALESCE(B.createdDate, '0000-00-00')) DESC";
        }elseif($DataValue == 'LD'){
            $query .= " ORDER BY GREATEST(COALESCE(L.updatedDate, '0000-00-00'), COALESCE(L.createdDate, '0000-00-00')) DESC";
        }else{
            $query .= " ORDER BY GREATEST(COALESCE(cdata.updatedDate, '0000-00-00'), COALESCE(cdata.createdDate, '0000-00-00')) DESC";
        }


        //Get Total Number of Results
        $TotalResult = mysqli_num_rows(mysqli_query($con, $query));

        //Get Number of pages according to page length
        $TotalPages = ceil($TotalResult / $PageLength);

        $Offset = ($PageNumber - 1) * $PageLength;

        $query = $query . ' LIMIT ' . $Offset . ', ' . $PageLength;



        //echo $query;


        $LimitedRows  = mysqli_num_rows(mysqli_query($con, $query));
        $GetAllDataQuery = mysqli_query($con, $query);


        //Show Bulkdata
        if ($DataValue == 'BD' || $DataValue == 'LD') {
            ?>
             <div class="row bulkdatasection">
                <div class="col-xl-12 col-lg-12 col-12">
                    <div class="bulkDataHead mt-3 p-0 text-center">
                        <?php
                        $FindFeedbackName = mysqli_query($con, "SELECT feedback FROM  feedback WHERE fdId = $FeedbackStatus ");
                        if (mysqli_num_rows($FindFeedbackName) > 0) {
                            foreach ($FindFeedbackName as $FindFeedbackNameResult) {
                                $BulkFeedbackName = $FindFeedbackNameResult['feedback'];
                            }
                        } else {
                            $BulkFeedbackName = '';
                        }
                        if ($DataValue == 'BD') {
                            $BulkDataHeading = 'BULKDATA';
                            $ButtonType = 'BULK';
                        } else {
                            $BulkDataHeading = 'LEADDATA';
                            $ButtonType = 'LEAD';
                        }
                        ?>
                        <h5 class="m-0 p-0 text-white"><?= ($BulkFeedbackName != '') ? $BulkFeedbackName : $BulkDataHeading;  ?> &nbsp; - &nbsp; <?= $LimitedRows ?></h5>
                    </div>
                    <div class="table-responsive mt-4 d-none d-md-flex">
                        <table class="table table-bordered bulkDataBorder">
                            <thead class="bg-info">
                                <tr class="text-center">
                                    <td scope="col" class="bulklTableText">  </td>
                                    <td scope="col" class="bulklTableText">Sl No</td>
                                    <td scope="col" class="bulklTableText">Data ID</td>
                                    <td scope="col" class="bulklTableText">Type</td>
                                    <!-- <td scope="col" class="bulklTableText"></td> -->
                                    <td scope="col" class="bulklTableText">Mobile</td>
                                    <td scope="col" class="bulklTableText"></td>
                                    <td scope="col" class="bulklTableText">Name</td>
                                    <td scope="col" class="bulklTableText">Remark</td>
                                    <!-- <td scope="col" class="bulklTableText"></td> -->
                                    <td scope="col" class="bulklTableText">Ref. Mobile</td>
                                    <td scope="col" class="bulklTableText"></td>
                                    <td scope="col" class="bulklTableText">Ref. Name</td>
                                    <!-- <td scope="col" class="bulklTableText bg-white">
                                        <button class="linkBtn" data-clipboard-text="http://localhost/ADMINMATRIMONY/ADMIN/Lapview.php">LINK</button>
                                        <a href="" data-datatype="<?= $DataValue ?>" data-buttontype="<?= $ButtonType ?>" class="SendWhatsappLinkButton"><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a>
                                    </td> -->
                                </tr>
                            </thead>
                            <?php
                            if ($DataValue == 'BD') {
                            ?>
                                <tbody>
                                    <?php
                                    $RowCount = 0;
                                    foreach ($GetAllDataQuery as $GetAllDataResults) {
                                        $RowCount++;
                                    ?>
                                        <tr class="text-center">
                                            <td class="py-2 px-0"><input class="form-check-input bulkDataSelect MainSelector" data-datatype="<?= $DataValue ?>" type="checkbox" id="BULK-<?php echo $GetAllDataResults["bulkId"] ?>" value="<?php echo $GetAllDataResults["bulkId"] ?>"></td>
                                            <td class="py-2 px-0"><?= $RowCount ?></td>
                                            <td class="py-2 px-0"><?= str_pad($GetAllDataResults['bulkId'], 5, '0', STR_PAD_LEFT);  ?></td>
                                            <!-- Add prefix zeros to id and make it 5 digits -->
                                            <td class="py-2 px-0"><?= $GetAllDataResults['typeName'] ?></td>
                                            <!-- <td class="py-2 px-0"><input type="checkbox" class="form-check-input bulkCheckbox BulkPhoneCheckbox" <?= ($RowCount == 1) ? "checked" : "" ?> value="<?= $GetAllDataResults['bulkPhone'] ?>"> </td> -->
                                            <!-- <td class="py-2 px-0"> <?= $GetAllDataResults['bulkPhone'] ?></td> -->
                                            <td class="py-2 px-2"> <?= $GetAllDataResults['bulkPhone'] ?></td>
                                            <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['bulkPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a></td>
                                            <td class="py-2 px-2"> <?= $GetAllDataResults['bulkName'] ?></td>
                                            <td class="py-2 px-2"><?= $GetAllDataResults['bulkRemark'] ?></td>
                                            <!-- <td class="py-2 px-0"> <input type="checkbox" class="form-check-input bulkCheckbox ReferPhoneCheckbox" <?= ($RowCount == 1) ? "checked" : "" ?> value="<?= $GetAllDataResults['referPhone'] ?>"> </td> -->
                                            <td class="py-2 px-2"> <?= $GetAllDataResults['referPhone'] ?></td>
                                            <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['referPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a></td>
                                            <td class="py-2 px-2"><?= $GetAllDataResults['referName'] ?></td>
                                            <!-- <td class="py-2 px-0"> <a href="" data-datatype="<?= $DataValue ?>" data-buttontype="SINGLE" class="SendWhatsappLinkButton"><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></td> -->
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            <?php
                            } else {
                            ?>
                                <tbody>
                                    <?php
                                    $RowCount = 0;
                                    foreach ($GetAllDataQuery as $GetAllDataResults) {
                                        $RowCount++;
                                    ?>
                                        <tr class="text-center">
                                            <td class="py-2 px-0"><input class="form-check-input leadDataSelect MainSelector" data-datatype="<?= $DataValue ?>" type="checkbox" id="LEAD-<?php echo $GetAllDataResults["bulkId"] ?>" value="<?php echo $GetAllDataResults["bulkId"] ?>"></td>
                                            <td class="py-2 px-0"><?= $RowCount ?></td>
                                            <td class="py-2 px-0"><?= str_pad($GetAllDataResults['bulkId'], 5, '0', STR_PAD_LEFT);  ?></td>
                                            <!-- Add prefix zeros to id and make it 5 digits -->
                                            <td class="py-2 px-0"><?= $GetAllDataResults['typeName'] ?></td>
                                            <td class="py-2 px-0"><?= $GetAllDataResults['bulkPhone'] ?></td>
                                            <!-- <td class="py-2 px-0"> <?= $GetAllDataResults['bulkPhone'] ?></td> -->
                                            <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['bulkPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a></td>
                                            <td class="py-2 px-2"> <?= $GetAllDataResults['bulkName'] ?> </td>
                                            <td class="py-2 px-2"><?= $GetAllDataResults['bulkRemark'] ?></td>
                                            <!-- <td class="py-2 px-0"> <input type="checkbox" class="form-check-input bulkCheckbox ReferPhoneCheckbox" <?= ($RowCount == 1) ? "checked" : "" ?> value="<?= $GetAllDataResults['referPhone'] ?>"> </td> -->
                                            <td class="py-2 px-2"> <?= $GetAllDataResults['referPhone'] ?></td>
                                            <td class="py-2 px-0"><a href="tel:+91<?= $GetAllDataResults['referPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a></td>
                                            <td class="py-2 px-2"><?= $GetAllDataResults['referName'] ?></td>
                                            <!-- <td class="py-2 px-0"> <a href="https://wa.me/91<?= $GetAllDataResults['bulkPhone'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></td> -->
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <!-- Table Mobile View -->
                    <div class="table-responsive mt-4 mx-xl-4 d-md-none">
                        <table class="table table-borderless">
                            <thead class="bg-info d-none">
                                <tr class="text-center">
                                    <td scope="col" class="bulklTableText">Sl No</td>
                                    <td scope="col" class="bulklTableText">Mobile</td>
                                    <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
                                    <td scope="col" class="bulklTableText">Name</td>
                                    <td scope="col" class="bulklTableText">Ref. Mobile</td>
                                    <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
                                    <td scope="col" class="bulklTableText">Ref. Name</td>
                                    <td scope="col" class="bulklTableText">Feed Back</td>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php
                                foreach ($GetAllDataQuery as $GetAllDataResults) {

                                ?>
                                    <tr>
                                        <td class="pt-2 fs-5"><?= $GetAllDataResults['bulkId'] ?></td>
                                        <td></td>
                                        <td class="py-2 px-2" colspan="2"><input type="text" class="form-control" style="font-size:10pt" placeholder="Feed Back"></td>
                                        <td></td>
                                        <td class="pt-2 px-2"><button class="bulkFeedBack px-2">FB</button></td>
                                        <!-- <td class="pt-2"><i class="ri-menu-line bulkMenu"></i></td> -->
                                    </tr>

                                    <tr>
                                        <td class="py-2"><input type="checkbox" class="form-check-input bulkCheckbox fs-4"></td>
                                        <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"><i class="ri-phone-fill callIcon fs-5"></i></a></td>
                                        <td class="py-2 fs-5" colspan="2"><?= $GetAllDataResults['bulkPhone'] ?><br><?= $GetAllDataResults['bulkName'] ?></td>
                                        <td class="py-2 fs-5 d-flex"></td>
                                        <td class="py-1 px-2"><button class="linkBtn bulkLinkBtn mt-1">LINK</button></td>
                                    </tr>

                                    <tr class="tableDataBorder">
                                        <td class="py-2"><input type="checkbox" class="form-check-input bulkCheckbox fs-4"></td>
                                        <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"><i class="ri-phone-fill callIcon fs-5"></i></a></td>
                                        <td class="py-2 fs-5" colspan="2"><?= $GetAllDataResults['bulkPhone'] ?><br> <?= $GetAllDataResults['bulkName'] ?></td>
                                        <td class="py-2 fs-5"></td>
                                        <td class="py-1 px-2"><a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg" style="width:37px; height:37px;"></a></td>
                                    </tr>

                                <?php

                                }

                                ?>

                            </tbody>
                        </table>
                    </div>


                </div>
            
            </div>












            <?php
        }



        //Show Free Data
        if ($DataValue == 'FD' || $DataValue == 'PD' || $DataValue == 'MD' || $DataValue == 'WD') {


            if ($DataValue == 'PD') {
                $FeedbackButtonClass = 'PaidFeedbackButton';
            } elseif ($DataValue == 'FD') {
                $FeedbackButtonClass = 'FeedbackButton';
            } elseif ($DataValue == 'MD') {
                $FeedbackButtonClass = 'MarriageFeedbackButton';
            } elseif ($DataValue == 'WD') {
                $FeedbackButtonClass = 'WeddingFeedbackButton';
            }

            foreach ($GetAllDataQuery as $GetAllDataResults) {
            ?>

                <!-- Table view -->
                <div class="lapView table-responsive">

                    <!-- <div class="mt-1">
                                    <img src="../IMAGES/GroomA.jpg" alt="" class="BrideAndGroomImg">
                                </div> -->
                    <table class="table table-bordered bg-white tableSize tableBorder">
                        <tbody>
                            <tr>

                                <td rowspan="5" class="ps-0">
                                    <div class="d-flex ViewCustomerImages" data-profileid="<?= $GetAllDataResults["custId"] ?>" data-datatype="<?= $DataValue ?>">
                                        <?php
                                        if ($GetAllDataResults['gender'] == 'Male') {
                                        ?>

                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["mainImage"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/boy.png" class="BrideAndGroomImg mx-auto" /></object>
                                            <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>

                                        <?php
                                        } else {
                                        ?>

                                            <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["mainImage"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/girl.png" class="BrideAndGroomImg mx-auto" /> </object>
                                            <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>

                                        <?php
                                        }
                                        ?>
                                    </div>


                                </td>
                                <td class="tableHead tableHeadBg1 headSize2 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">
                                    <div class="d-flex justify-content-between"> <a class="ViewCompanyId" data-type="<?= $DataValue ?>" href="" data-custvalue="<?= $GetAllDataResults['custId'] ?>"> <?= $GetAllDataResults['profileId'] ?> </a>
                                        <input class="form-check-input me-2 FreeDataSelect MainSelector" data-datatype="<?= $DataValue ?>" type="checkbox" id="<?= $GetAllDataResults['custId'] ?>" value="<?= $GetAllDataResults['custId'] ?>">
                                    </div>
                                </td>

                                <td class="tableHead tableHeadBg1 profileIdSize <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"> <a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> <?= $GetAllDataResults['fullName'] ?> </a> </td>
                                <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Religion </a> </td>
                                <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Profession </a> </td>
                                <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Family </a> </td>
                                <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Address </a> </td>
                                <td class="tableHead tableHead2 headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Preference </a> </td>
                                <td class="tableHead tableHead2 headBorder headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"><a href="FreeRegisterEdit.php?ProfileEditId=<?= $GetAllDataResults['custId'] ?>&DataType=<?= $DataValue ?>"> Looking </a> </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust d-flex justify-content-between">
                                        <span>
                                            <?= $GetAllDataResults['profileFor'] ?>
                                        </span>
                                        <span class="me-2">
                                            <?= $GetAllDataResults['typeAbbreviation'] ?>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="heightAdjust">
                                        <?php if ($GetAllDataResults['dob'] != '01-Jan-1800') {
                                            //echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                            $diff = date_diff(date_create($GetAllDataResults['dob']), date_create($Today));
                                            echo $diff->format('%y') . 'Yr ' . $diff->format('%m') . 'Mon';
                                        } else {
                                        }  ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['religionName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['educationCategory'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust">Bro - <?= $GetAllDataResults['marriedBro'] ?> &nbsp; &nbsp; &nbsp;<?= $GetAllDataResults['unmarriedBro'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['country'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust">
                                        <?php
                                        if ($GetAllDataResults['partnerAgeFrom'] != 0 || $GetAllDataResults['partnerAgeTo'] != 0) {
                                            echo $GetAllDataResults['partnerAgeFrom']  . ' - ' . $GetAllDataResults['partnerAgeTo'];
                                        } else {
                                        }
                                        ?>
                                        <!-- <?= $GetAllDataResults['partnerAgeFrom'] ?> - <?= $GetAllDataResults['partnerAgeTo'] ?> -->
                                    </div>
                                </td>
                                <td><?php $EducationCat = $GetAllDataResults['partnerEduCat'];  ?>
                                    <div class="heightAdjust"><?= IdToNameConversion($EducationCat, "educationcategory", "edcatId", "educationCategory", $con); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['packageName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['height'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['casteName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['educationType'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust">Sis - <?= $GetAllDataResults['marriedSis'] ?> &nbsp; &nbsp; &nbsp;<?= $GetAllDataResults['unmarriedSis'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['state'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust">
                                        <?php
                                        if ($GetAllDataResults['partnerHeightFrom'] != '  ' || $GetAllDataResults['partnerHeightTo'] != '  ') {
                                            echo substr($GetAllDataResults['partnerHeightFrom'], 12, 15) ?> - <?= substr($GetAllDataResults['partnerHeightTo'], 12, 15);
                                                                                                                } else {
                                                                                                                }
                                                                                                                    ?>
                                        <!-- <?= substr($GetAllDataResults['partnerHeightFrom'], 12, 15) ?> - <?= substr($GetAllDataResults['partnerHeightTo'], 12, 15) ?> -->
                                    </div>
                                </td>
                                <td><?php $EducationType = $GetAllDataResults['partnerEduType'];  ?>
                                    <div class="heightAdjust"><?= IdToNameConversion($EducationType, "educationtype", "edTyId", "educationType", $con); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="heightAdjust"><?= ($GetAllDataResults['feedbackDate'] != '') ? date('d.m.Y/ h A', strtotime($GetAllDataResults['feedbackDate']))  : ""  ?> </div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['weight'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['subcasteName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['jobCategory'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['fatherName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['district'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerPhysicalStatus'] ?></div>
                                </td>
                                <td><?php $JobCategory = $GetAllDataResults['partnerJobCat'];  ?>
                                    <div class="heightAdjust"><?= IdToNameConversion($JobCategory, "jobcategory", "jbcatId", "jobCategory", $con); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td><button class="statusBtn ms-4 px-3 mt-1"><?php echo  $GetAllDataResults['FEEDBACK']
                                                                                ?></button></td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['complexion'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['casteNoBar'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['jobType'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['motherName'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['city'] ?></div>
                                </td>
                                <td>
                                    <div class="heightAdjust"><?= $GetAllDataResults['partnerComplexion'] ?></div>
                                </td>
                                <td><?php $JobType = $GetAllDataResults['partnerJobType'];  ?>
                                    <div class="heightAdjust"><?= IdToNameConversion($JobType, "jobtype", "jbTyId", "jobType", $con); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Mary</td>
                                <td>Joseph</td>
                                <td><?= $GetAllDataResults['bodyType'] ?></td>
                                <td><?= $GetAllDataResults['STARNAME'] ?></td>
                                <td><?= $GetAllDataResults['jobDetails'] ?></td>
                                <td><?= $GetAllDataResults['fatherJob'] ?></td>
                                <td><?= $GetAllDataResults['nativePlace'] ?></td>
                                <td>
                                    <?php
                                    $PartnerCaste = $GetAllDataResults['partnerCaste'];
                                    echo IdToNameConversion($PartnerCaste, "caste", "casId", "casteName", $con);
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    $PartnerJobCountry = $GetAllDataResults['partnerCountry'];
                                    echo IdToNameConversion($PartnerJobCountry, "country", "cId", "countryName", $con);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="mobileNoBg1"><?= $GetAllDataResults['whatsappNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['whatsappNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                </td>
                                <td>
                                    <span class="mobileNoBg2"><?= $GetAllDataResults['residencePhoneNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['residencePhoneNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                </td>
                                <td><?= $GetAllDataResults['maritalStatus'] ?></td>
                                <td><?= $GetAllDataResults['chovvaDosham'] ?></td>
                                <td><?= $GetAllDataResults['jobCity'] ?></td>
                                <td><?= $GetAllDataResults['motherJob'] ?></td>
                                <td><?= $GetAllDataResults['residentialStatus'] ?></td>
                                <td>
                                    <?php
                                    $MatchingStars = $GetAllDataResults['matchingStars'];
                                    echo IdToNameConversion($MatchingStars, "star", "starId", "starName", $con);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $PartnerDistrict = $GetAllDataResults['partnerDistrict'];
                                    echo IdToNameConversion($PartnerDistrict, "district", "dId", "districtName", $con);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><?= $GetAllDataResults['feedbackRemark'] ?></td>
                                <td><?= $GetAllDataResults['physicalStatus'] ?></td>
                                <td><?= $GetAllDataResults['jathakamType'] ?></td>
                                <td><?= $GetAllDataResults['monthlyIncome'] ?> INR</td>
                                <td><?= $GetAllDataResults['financialStatus'] ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <!-- <div class="row my-1 mx-1">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-2">
                                                    <button type="button" id="clearAll" class="btn DeleteProfile filterButtons"><i class="ri-delete-bin-6-line"></i></button>
                                                </div>
                                                <div class="col-2">
                                                    <div class=""><button class="linkBtn">LINK</button><br></div>
                                                </div>
                                                <div class="col-2">
                                                    <a href="" class=""><img src="../IMAGES/mailImg.png" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                    <a href="mailto:test@gmail.com" class=""><img src="../IMAGES/printerImg.jpg" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                    <a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a>
                                                </div>
                                                <div class="col-2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="form-control btnFeedback <?= $FeedbackButtonClass ?>" id="" value="<?= $GetAllDataResults['custId'] ?>">Feedback</button>
                                        </div>
                                    </div> -->

                                    Assigned To :- 
                                    
                                    <?php
                                        $AssignedStaffId = $GetAllDataResults['assignedTo'];
                                        if($AssignedStaffId != 0){
                                            $FindStaffName =  mysqli_query($con, "SELECT staffName FROM staff WHERE sId = '$AssignedStaffId'");
                                            foreach($FindStaffName as $FindStaffNameResult){
                                                echo $StaffName = $FindStaffNameResult['staffName'];
                                            }
                                        }else{

                                        }
                                    ?> 
                                </td>
                                <td colspan="3"><?= $GetAllDataResults['lookingFor'] ?></td>
                                <td colspan="3"><?= $GetAllDataResults['candidateShare'] ?></td>
                                <td><?= $GetAllDataResults['serviceCharge'] ?></td>

                            </tr>
                        </tbody>
                    </table>

                </div>



                <!-- Mobile View -->
                <div class="bg-white Section mb-3 MobileDisplay">
                    <div class="">
                        <div class="container px-3">
                            <div class="row g-0 ImageBox">
                                <div class="col-10 ">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/boy.png" class="img-fluid custmobileimg" /></object>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="img-fluid custmobileimg"><img src="../IMAGES/girl.png" class=" img-fluid custmobileimg" /></object>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-2 SideMiniMenu">
                                    <ul class="list-unstyled text-center">
                                        <li><button class="linkBtn">LINK</button></li>
                                        <li><a href="" class=""><img src="../IMAGES/mailImg.png" alt="" class="lapviewImg"></a></li>
                                        <li><a href="https://wa.me/91<?= $GetAllDataResults['whatsappNumber'] ?>" target="_blank" class=""><img src="../IMAGES/whatsappImg.png" alt="" class="lapviewImg"></a></li>
                                        <li> <input class="form-check-input" type="checkbox" id="" value=""></li>
                                        <li> <button class="btn m-0 p-0"><i class="ri-menu-fill"></i></button> </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row g-0 ViewDetailsContainer">

                                <div class="col-6 ViewDetails">
                                    <p class="me-1 CustomerNameField"> <?= ($GetAllDataResults['fullName'] != '') ? $GetAllDataResults['fullName'] : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1 CustomerIdField"> <?= ($GetAllDataResults['profileId'] != '') ? $GetAllDataResults['profileId'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['religionName'] != '') ? $GetAllDataResults['religionName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['casteName'] != '') ? $GetAllDataResults['casteName'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?php echo ($GetAllDataResults['dob'] != '') ? (date('Y') - date('Y', strtotime($GetAllDataResults['dob']))) : ""; ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['complexion'] != '') ? $GetAllDataResults['complexion'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class=" me-1"> <?= (substr($GetAllDataResults['height'], 0, 7) != '') ? substr($GetAllDataResults['height'], 0, 7) : "&nbsp;";  ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['maritalStatus'] != '') ? $GetAllDataResults['maritalStatus'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['nativePlace'] != '') ? $GetAllDataResults['nativePlace'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['STARNAME'] != '') ? $GetAllDataResults['STARNAME'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> <?= ($GetAllDataResults['educationCategory'] != '') ? $GetAllDataResults['educationCategory'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> <?= ($GetAllDataResults['jobCategory'] != '') ? $GetAllDataResults['jobCategory'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['lookingFor'] != '') ? $GetAllDataResults['lookingFor'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['registeredNumber'] != '') ? $GetAllDataResults['registeredNumber'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['whatsappNumber'] != '') ? $GetAllDataResults['whatsappNumber'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> <?= ($GetAllDataResults['contactPerson'] != '') ? $GetAllDataResults['contactPerson'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= ($GetAllDataResults['contactPerson'] != '') ? $GetAllDataResults['contactPerson'] : "&nbsp;" ?> </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="me-1"> Status </p>
                                </div>
                                <div class="col-6 ViewDetails">
                                    <p class="ms-1"> <?= (date('d,m.Y - H A', strtotime($GetAllDataResults['createdDate'])) != '') ? date('d,m.Y - H A', strtotime($GetAllDataResults['createdDate'])) : "&nbsp;"  ?> </p>
                                </div>
                                <div class="col-12 ViewDetails">
                                    <p class=""> I will pay tommorrow </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            
            <?php
            }
        }



        $StartPage = 1 + $Offset;

        if ($PageLength > $TotalResult) {
            $PageLength = $TotalResult;
        }

        if ($LimitedRows < $Offset) {
            $EndPage = $Offset + $LimitedRows;
        } else {
            $EndPage = $PageLength + $Offset;
        }

        $PageString = $StartPage . '-' . $EndPage . '/' . $TotalResult;

        ?>

        <!-- <p>Offset = <?= $PageString; ?></p>  -->

        <div class="" id="Pagination">
            <nav aria-label="">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <button class="page-link <?php echo ($PageNumber == '1') ? 'disabled' : '' ?>" value="<?= ($PageNumber - 1) ?>">Previous</button>
                    </li>
                    <?php
                    for ($Page = 1; $Page <= $TotalPages; $Page++) {
                    ?>
                        <li class="page-item <?php echo ($PageNumber == $Page) ? 'active' : ""  ?>"><button class="page-link" value="<?= $Page ?>"><?= $Page ?></button></li>
                    <?php
                    }
                    ?>
                    <li class="page-item">
                        <button class="page-link <?php echo ($PageNumber == $TotalPages) ? 'disabled' : '' ?>" value="<?= ($PageNumber + 1) ?>">Next</button>
                    </li>
                </ul>
            </nav>
        </div>


        <?php
    }
}



?>


<script>
    $(document).ready(function() {
        $('#PageResult').html('<?php echo $PageString; ?>');
        $('#temp_data_type').val('<?php echo $DataValue; ?>');
    });

    $('#Pagination .page-link').click(function(f) {
        f.preventDefault();
        var PageNumber = $(this).val();
        console.log(PageNumber);
        $('#PageNumber').val(PageNumber);
        $('#FilterData').submit();

    });
</script>
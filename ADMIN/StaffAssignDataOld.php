<?php

include '../MAIN/Dbconfig.php';








if (isset($_POST['Search'])) {


    $FilterGender = $_POST['MemberBride'];
    $FilterReligion = $_POST['MemberReligion'];


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



    // if (isset($_POST['MemberStar'])) {
    //     foreach ($_POST['MemberStar'] as $StarCheck) {
    //         if ($StarCheck != '') {
    //             $FilterStarLength = count($_POST['MemberStar']);
    //             $FilterStar = ltrim(implode(",", $_POST['MemberStar']), ',');
    //         } else {
    //             $FilterStar = "''";
    //             $FilterStarLength = 0;
    //         }
    //     }
    // } else {
    // }


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
            $HeightFrom = '100';
            $HeightTo = $_POST['MemberHeightto'];
        } elseif ($_POST['MemberHeightfrom'] != '' && $_POST['MemberHeightto'] != '') {
            $HeightFrom = $_POST['MemberHeightfrom'];
            $HeightTo = $_POST['MemberHeightto'];
        } else {
            $HeightFrom = '100';
            $HeightTo = '300';
        }
    } else {
    }

   
    //Star Filter
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




    if (isset($_POST['Assigned'])) {
        if (!empty($_POST['MemberSend'])) {
            $Assigned = $_POST['MemberSend'];
        } else {
            $Assigned = 700000;
        }
    } else {
        $Assigned = 0;
    }




    //echo $Assigned;


    // print_r($_POST);



    if (isset($_POST['MemberData'])) {


        $DataValue = $_POST['MemberData'];

        //Check data is bulk
        if ($DataValue == 'BD') {
            $query = "SELECT * FROM bulkdata WHERE assignedTo = $Assigned";
        } elseif ($DataValue == 'LD') {
            $query = "SELECT * FROM leaddata WHERE assignedTo = $Assigned";
        } elseif($DataValue == 'PD'){
            $query = "SELECT cdata.*,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,PARTEDCAT.educationCategory AS partnerEducationCategory,PARTEDTY.educationType AS partnerEducationType,PARTJOBCAT.jobCategory AS partnerJobCategory,PARTJOBTY.jobType AS partnerJobType,PARTCASTE.casteName AS partnerCaste,PARTCOUNTRY.countryName AS partnerJobCountry,PARTCITY.cityName AS partnerCity, STAR.starName AS STARNAME,STAFF.staffName AS STAFFNAME FROM paiddata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN religion PARTRELIGION ON cdata.partnerReligion = PARTRELIGION.rId LEFT JOIN caste PARTCASTE ON cdata.partnerCaste = PARTCASTE.casId LEFT JOIN educationcategory PARTEDCAT ON cdata.partnerEduCat = PARTEDCAT.edcatId LEFT JOIN educationtype PARTEDTY ON cdata.partnerEduType = PARTEDTY.edTyId LEFT JOIN jobcategory PARTJOBCAT ON cdata.partnerJobCat = PARTJOBCAT.jbcatId LEFT JOIN jobtype PARTJOBTY ON cdata.partnerJobType = PARTJOBTY.jbTyId LEFT JOIN country PARTCOUNTRY ON cdata.partnerCountry = PARTCOUNTRY.cId LEFT JOIN state PARTSTATE ON cdata.partnerState = PARTSTATE.sId LEFT JOIN district PARTDISTRICT ON cdata.partnerDistrict = PARTDISTRICT.dId LEFT JOIN city PARTCITY ON cdata.partnerCity = PARTCITY.citId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN staff STAFF ON cdata.assignedTo = STAFF.sId WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.religion = CASE WHEN '$FilterReligion' <> '' THEN '$FilterReligion'  ELSE cdata.religion END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND assignedTo = $Assigned";
        }elseif($DataValue == 'MD'){
            $query = "SELECT cdata.*,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,PARTEDCAT.educationCategory AS partnerEducationCategory,PARTEDTY.educationType AS partnerEducationType,PARTJOBCAT.jobCategory AS partnerJobCategory,PARTJOBTY.jobType AS partnerJobType,PARTCASTE.casteName AS partnerCaste,PARTCOUNTRY.countryName AS partnerJobCountry,PARTCITY.cityName AS partnerCity, STAR.starName AS STARNAME,STAFF.staffName AS STAFFNAME FROM marriagedata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN religion PARTRELIGION ON cdata.partnerReligion = PARTRELIGION.rId LEFT JOIN caste PARTCASTE ON cdata.partnerCaste = PARTCASTE.casId LEFT JOIN educationcategory PARTEDCAT ON cdata.partnerEduCat = PARTEDCAT.edcatId LEFT JOIN educationtype PARTEDTY ON cdata.partnerEduType = PARTEDTY.edTyId LEFT JOIN jobcategory PARTJOBCAT ON cdata.partnerJobCat = PARTJOBCAT.jbcatId LEFT JOIN jobtype PARTJOBTY ON cdata.partnerJobType = PARTJOBTY.jbTyId LEFT JOIN country PARTCOUNTRY ON cdata.partnerCountry = PARTCOUNTRY.cId LEFT JOIN state PARTSTATE ON cdata.partnerState = PARTSTATE.sId LEFT JOIN district PARTDISTRICT ON cdata.partnerDistrict = PARTDISTRICT.dId LEFT JOIN city PARTCITY ON cdata.partnerCity = PARTCITY.citId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN staff STAFF ON cdata.assignedTo = STAFF.sId WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.religion = CASE WHEN '$FilterReligion' <> '' THEN '$FilterReligion'  ELSE cdata.religion END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND assignedTo = $Assigned";
        }elseif($DataValue == 'WD'){
            $query = "SELECT cdata.*,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,PARTEDCAT.educationCategory AS partnerEducationCategory,PARTEDTY.educationType AS partnerEducationType,PARTJOBCAT.jobCategory AS partnerJobCategory,PARTJOBTY.jobType AS partnerJobType,PARTCASTE.casteName AS partnerCaste,PARTCOUNTRY.countryName AS partnerJobCountry,PARTCITY.cityName AS partnerCity, STAR.starName AS STARNAME,STAFF.staffName AS STAFFNAME FROM weddingdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN religion PARTRELIGION ON cdata.partnerReligion = PARTRELIGION.rId LEFT JOIN caste PARTCASTE ON cdata.partnerCaste = PARTCASTE.casId LEFT JOIN educationcategory PARTEDCAT ON cdata.partnerEduCat = PARTEDCAT.edcatId LEFT JOIN educationtype PARTEDTY ON cdata.partnerEduType = PARTEDTY.edTyId LEFT JOIN jobcategory PARTJOBCAT ON cdata.partnerJobCat = PARTJOBCAT.jbcatId LEFT JOIN jobtype PARTJOBTY ON cdata.partnerJobType = PARTJOBTY.jbTyId LEFT JOIN country PARTCOUNTRY ON cdata.partnerCountry = PARTCOUNTRY.cId LEFT JOIN state PARTSTATE ON cdata.partnerState = PARTSTATE.sId LEFT JOIN district PARTDISTRICT ON cdata.partnerDistrict = PARTDISTRICT.dId LEFT JOIN city PARTCITY ON cdata.partnerCity = PARTCITY.citId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN staff STAFF ON cdata.assignedTo = STAFF.sId WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.religion = CASE WHEN '$FilterReligion' <> '' THEN '$FilterReligion'  ELSE cdata.religion END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND assignedTo = $Assigned";
        } else {
            $query = "SELECT cdata.*,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,PARTEDCAT.educationCategory AS partnerEducationCategory,PARTEDTY.educationType AS partnerEducationType,PARTJOBCAT.jobCategory AS partnerJobCategory,PARTJOBTY.jobType AS partnerJobType,PARTCASTE.casteName AS partnerCaste,PARTCOUNTRY.countryName AS partnerJobCountry,PARTCITY.cityName AS partnerCity, STAR.starName AS STARNAME,STAFF.staffName AS STAFFNAME FROM custdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN religion PARTRELIGION ON cdata.partnerReligion = PARTRELIGION.rId LEFT JOIN caste PARTCASTE ON cdata.partnerCaste = PARTCASTE.casId LEFT JOIN educationcategory PARTEDCAT ON cdata.partnerEduCat = PARTEDCAT.edcatId LEFT JOIN educationtype PARTEDTY ON cdata.partnerEduType = PARTEDTY.edTyId LEFT JOIN jobcategory PARTJOBCAT ON cdata.partnerJobCat = PARTJOBCAT.jbcatId LEFT JOIN jobtype PARTJOBTY ON cdata.partnerJobType = PARTJOBTY.jbTyId LEFT JOIN country PARTCOUNTRY ON cdata.partnerCountry = PARTCOUNTRY.cId LEFT JOIN state PARTSTATE ON cdata.partnerState = PARTSTATE.sId LEFT JOIN district PARTDISTRICT ON cdata.partnerDistrict = PARTDISTRICT.dId LEFT JOIN city PARTCITY ON cdata.partnerCity = PARTCITY.citId LEFT JOIN star STAR ON cdata.star = STAR.starId LEFT JOIN staff STAFF ON cdata.assignedTo = STAFF.sId WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.religion = CASE WHEN '$FilterReligion' <> '' THEN '$FilterReligion'  ELSE cdata.religion END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND assignedTo = $Assigned";
        }
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


    //Show Free Data
    if ($DataValue == 'FD') {

        foreach ($GetAllDataQuery as $GetAllDataResults) {
        ?>
            <div class="lapView table-responsive">
                <table class="table table-bordered bg-white tableSize tableBorder">
                    <tbody>
                        <tr>
                            <td rowspan="5" class="ps-0">
                                <div class="d-flex">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/boy.png" class="BrideAndGroomImg mx-auto" /></object>
                                        <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/girl.png" class="BrideAndGroomImg mx-auto" /></object>
                                        <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="tableHead tableHeadBg1 headSize2 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">
                                <div class="d-flex justify-content-between custFullName">
                                    <?= $GetAllDataResults['fullName'] ?>
                                    <input class="form-check-input me-2 customersSelect" type="checkbox" id="<?php echo $GetAllDataResults["custId"] ?>" value="<?php echo $GetAllDataResults["custId"] ?>">
                                </div>

                            </td>

                            <td class="tableHead tableHeadBg1 profileIdSize <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"> <?= $GetAllDataResults['profileId'] ?> </td>
                            <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Religion</td>
                            <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Profession</td>
                            <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Family</td>
                            <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Address</td>
                            <td class="tableHead tableHead2 headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Preference</td>
                            <td class="tableHead tableHead2 headBorder headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Looking</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['profileFor'] ?></div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?php if ($GetAllDataResults['dob'] != '') {
                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                            } else {
                                                            }  ?> Yr </div>
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
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerAgeFrom'] ?> - <?= $GetAllDataResults['partnerAgeTo'] ?></div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['package'] ?>Premium Plus</div>
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
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerHeightFrom'] ?> cm - <?= $GetAllDataResults['partnerHeightTo'] ?> cm</div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust">12.10.2022/ 10 am</div>
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
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerJobCategory'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><button class="statusBtn ms-4 px-3 mt-1"><?php //$GetAllDataResults['status']
                                                                            ?>Call Later</button></td>
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
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerJobType'] ?></div>
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
                            <td><?= $GetAllDataResults['partnerCaste'] ?></td>
                            <td><?= $GetAllDataResults['partnerJobCountry'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="mobileNoBg1"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                            </td>
                            <td>
                                <span class="mobileNoBg2"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                            </td>
                            <!-- Mobile View -->
                            <!-- <td>
                                        <span class="mobileNoBg1"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>
                                    <td>
                                        <span class="mobileNoBg2"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>  -->
                            <!-- Mobile View -->
                            <td><?= $GetAllDataResults['maritalStatus'] ?></td>
                            <td><?= $GetAllDataResults['chovvaDosham'] ?></td>
                            <td><?= $GetAllDataResults['jobCity'] ?></td>
                            <td><?= $GetAllDataResults['motherJob'] ?></td>
                            <td><?= $GetAllDataResults['residentialStatus'] ?></td>
                            <td><?= $GetAllDataResults['matchingStars'] ?></td>
                            <td><?= $GetAllDataResults['partnerCity'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Call Tomorrow, I will pay on Monday</td>
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
                               Assigned To :- <?= $GetAllDataResults['STAFFNAME']  ?>
                            </td>
                            <td colspan="3"><?= $GetAllDataResults['lookingFor'] ?></td>
                            <td colspan="5"><?= $GetAllDataResults['candidateShare'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mobileView bg-white Section mb-3 lapviewMobileBorder" style="display: none;">
                <div class="row pb-2">
                    <div class="col-xl-3 col-lg-3 col-12">
                        <div class="text-center mt-1 d-none d-md-block">
                            <p class="m-0 fs-5 d-none d-md-block profileIdLapFont profileIdSize fs-6 pt-2"><?= $GetAllDataResults['profileId'] ?></p>
                            <?php
                            if ($GetAllDataResults['gender'] == 'Male') {
                            ?>
                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/boy.png" class="loginBrideGroomImg" /></object>
                            <?php
                            } else {
                            ?>
                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/girl.png" class="loginBrideGroomImg" /></object>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-------- MobileView Image-------->
                    <div class="container-fluid d-md-none">
                        <div class="d-flex justify-content-center">
                            <div class="card loginPageCard" style="width: 23rem;">
                                <?php
                                if ($GetAllDataResults['gender'] == 'Male') {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/boy.png" class="card-img-top loginPageImg" /></object>
                                <?php
                                } else {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/girl.png" class="card-img-top loginPageImg" /></object>
                                <?php
                                }
                                ?>
                                <!-- <img src="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults['photo1'] ?>" class="card-img-top loginPageImg" alt="..."> -->
                                <div class="card-body p-0 m-0">
                                    <div class="cardText">
                                        <div class="row m-0 p-0">
                                            <div class="col-4 text-center">
                                                <a href=""><i class="ri-heart-3-fill heartIcon p-0 m-0"></i></a>
                                            </div>
                                            <div class="col-4 text-center">
                                                <a href=""><i class="material-icons closeIcon p-0 mt-2">cancel</i>
                                                </a>
                                            </div>
                                            <div class="col-4 text-center">
                                                <a href=""><i class="ri-star-s-fill pinkStarMobile p-0 m-0"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-12">
                        <div class="row">
                            <div class="col-12 text-end d-none d-md-block">
                                <h6 class="me-5 position-relative">

                                    <span class="position-absolute start-100 p-2 bg-success border border-light rounded-circle pt-2">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                    Online
                                </h6>
                            </div>
                            <div class="col-12 text-end pe-5 d-none d-md-flex">
                                <p>I have Bachelor's - Engineering/ Computers/ Others and I am Employed in IT & Engineering as a <a href="">See More..</a></p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6 pe-1">
                                <p class="d-md-none mobileviewName bridendGroomName ps-2 mt-3 ms-1"> <?= $GetAllDataResults['fullName'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?= $GetAllDataResults['religionName'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?php if ($GetAllDataResults['dob'] != '') {
                                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                                            } else {
                                                                            } ?> </p>
                                <p class="personDetails ps-2 d-md-none ms-1 pt-0"> <?= $GetAllDataResults['height'] ?> </p>
                                <p class="personDetails ps-2 ms-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['complexion'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?= $GetAllDataResults['nativePlace'] ?> </p>
                                <p class="personDetails ps-2 ms-1 d-md-none pt-0"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6 ps-1">
                                <p class="d-md-none mobileviewID bridendGroomID profileIdMobile ps-2 mt-3 me-1"> <?= $GetAllDataResults['profileId'] ?> </p>
                                <p class="personDetails ps-2 me-1 pt-0"> <?= $GetAllDataResults['casteName'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['complexion'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['weight'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['height'] ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                <p class="personDetails ps-2 me-1 pt-0"> <?= $GetAllDataResults['maritalStatus'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['jobCategory'] ?> </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-md-flex">
                                <div class="row rigtIconPaddng">
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="iconBorder text-center">
                                            <div class="py-1"><i class="ri-heart-3-fill heartIcon py-2"></i></div>

                                            <p class="fs-6 mb-0">Like</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="iconBorder text-center">
                                            <img src="../IMAGES/loginpgeAvatar.png" alt="" class="pt-2 py-1">
                                            <p class="fs-6 mb-0">Assist</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                        <div class="iconBorder text-center">
                                            <div class="py-1">
                                                <i class="ri-star-s-fill starIcon"></i>
                                            </div>
                                            <p class="fs-6 mb-0">Shortlist</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                        <div class="iconBorder text-center">
                                            <div class="py-1">
                                                <i class="ri-eye-line eyeIcon"></i>
                                            </div>
                                            <p class="fs-6 mb-0">Full Profile</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }


    //Show Paid Data
    if ($DataValue == 'PD') {

        foreach ($GetAllDataQuery as $GetAllDataResults) {
        ?>
            <div class="lapView table-responsive">
                <table class="table table-bordered bg-white tableSize tableBorder">
                    <tbody>
                        <tr>
                            <td rowspan="5" class="ps-0">
                                <div class="d-flex">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/boy.png" class="BrideAndGroomImg mx-auto" /></object>
                                        <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/girl.png" class="BrideAndGroomImg mx-auto" /></object>
                                        <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="tableHead tableHeadBg1 headSize2 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">
                                <div class="d-flex justify-content-between custFullName">
                                    <?= $GetAllDataResults['fullName'] ?>
                                    <input class="form-check-input me-2 customersSelect" type="checkbox" id="<?php echo $GetAllDataResults["custId"] ?>" value="<?php echo $GetAllDataResults["custId"] ?>">
                                </div>

                            </td>

                            <td class="tableHead tableHeadBg1 profileIdSize <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"> <?= $GetAllDataResults['profileId'] ?> </td>
                            <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Religion</td>
                            <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Profession</td>
                            <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Family</td>
                            <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Address</td>
                            <td class="tableHead tableHead2 headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Preference</td>
                            <td class="tableHead tableHead2 headBorder headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Looking</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['profileFor'] ?></div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?php if ($GetAllDataResults['dob'] != '') {
                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                            } else {
                                                            }  ?> Yr </div>
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
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerAgeFrom'] ?> - <?= $GetAllDataResults['partnerAgeTo'] ?></div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['package'] ?>Premium Plus</div>
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
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerHeightFrom'] ?> cm - <?= $GetAllDataResults['partnerHeightTo'] ?> cm</div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust">12.10.2022/ 10 am</div>
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
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerJobCategory'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><button class="statusBtn ms-4 px-3 mt-1"><?php //$GetAllDataResults['status']
                                                                            ?>Call Later</button></td>
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
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerJobType'] ?></div>
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
                            <td><?= $GetAllDataResults['partnerCaste'] ?></td>
                            <td><?= $GetAllDataResults['partnerJobCountry'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="mobileNoBg1"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                            </td>
                            <td>
                                <span class="mobileNoBg2"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                            </td>
                            <!-- Mobile View -->
                            <!-- <td>
                                        <span class="mobileNoBg1"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>
                                    <td>
                                        <span class="mobileNoBg2"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>  -->
                            <!-- Mobile View -->
                            <td><?= $GetAllDataResults['maritalStatus'] ?></td>
                            <td><?= $GetAllDataResults['chovvaDosham'] ?></td>
                            <td><?= $GetAllDataResults['jobCity'] ?></td>
                            <td><?= $GetAllDataResults['motherJob'] ?></td>
                            <td><?= $GetAllDataResults['residentialStatus'] ?></td>
                            <td><?= $GetAllDataResults['matchingStars'] ?></td>
                            <td><?= $GetAllDataResults['partnerCity'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Call Tomorrow, I will pay on Monday</td>
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
                               Assigned To :- <?= $GetAllDataResults['STAFFNAME']  ?>
                            </td>
                            <td colspan="3"><?= $GetAllDataResults['lookingFor'] ?></td>
                            <td colspan="5"><?= $GetAllDataResults['candidateShare'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mobileView bg-white Section mb-3 lapviewMobileBorder" style="display: none;">
                <div class="row pb-2">
                    <div class="col-xl-3 col-lg-3 col-12">
                        <div class="text-center mt-1 d-none d-md-block">
                            <p class="m-0 fs-5 d-none d-md-block profileIdLapFont profileIdSize fs-6 pt-2"><?= $GetAllDataResults['profileId'] ?></p>
                            <?php
                            if ($GetAllDataResults['gender'] == 'Male') {
                            ?>
                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/boy.png" class="loginBrideGroomImg" /></object>
                            <?php
                            } else {
                            ?>
                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/girl.png" class="loginBrideGroomImg" /></object>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-------- MobileView Image-------->
                    <div class="container-fluid d-md-none">
                        <div class="d-flex justify-content-center">
                            <div class="card loginPageCard" style="width: 23rem;">
                                <?php
                                if ($GetAllDataResults['gender'] == 'Male') {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/boy.png" class="card-img-top loginPageImg" /></object>
                                <?php
                                } else {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/girl.png" class="card-img-top loginPageImg" /></object>
                                <?php
                                }
                                ?>
                                <!-- <img src="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults['photo1'] ?>" class="card-img-top loginPageImg" alt="..."> -->
                                <div class="card-body p-0 m-0">
                                    <div class="cardText">
                                        <div class="row m-0 p-0">
                                            <div class="col-4 text-center">
                                                <a href=""><i class="ri-heart-3-fill heartIcon p-0 m-0"></i></a>
                                            </div>
                                            <div class="col-4 text-center">
                                                <a href=""><i class="material-icons closeIcon p-0 mt-2">cancel</i>
                                                </a>
                                            </div>
                                            <div class="col-4 text-center">
                                                <a href=""><i class="ri-star-s-fill pinkStarMobile p-0 m-0"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-12">
                        <div class="row">
                            <div class="col-12 text-end d-none d-md-block">
                                <h6 class="me-5 position-relative">

                                    <span class="position-absolute start-100 p-2 bg-success border border-light rounded-circle pt-2">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                    Online
                                </h6>
                            </div>
                            <div class="col-12 text-end pe-5 d-none d-md-flex">
                                <p>I have Bachelor's - Engineering/ Computers/ Others and I am Employed in IT & Engineering as a <a href="">See More..</a></p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6 pe-1">
                                <p class="d-md-none mobileviewName bridendGroomName ps-2 mt-3 ms-1"> <?= $GetAllDataResults['fullName'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?= $GetAllDataResults['religionName'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?php if ($GetAllDataResults['dob'] != '') {
                                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                                            } else {
                                                                            } ?> </p>
                                <p class="personDetails ps-2 d-md-none ms-1 pt-0"> <?= $GetAllDataResults['height'] ?> </p>
                                <p class="personDetails ps-2 ms-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['complexion'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?= $GetAllDataResults['nativePlace'] ?> </p>
                                <p class="personDetails ps-2 ms-1 d-md-none pt-0"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6 ps-1">
                                <p class="d-md-none mobileviewID bridendGroomID profileIdMobile ps-2 mt-3 me-1"> <?= $GetAllDataResults['profileId'] ?> </p>
                                <p class="personDetails ps-2 me-1 pt-0"> <?= $GetAllDataResults['casteName'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['complexion'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['weight'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['height'] ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                <p class="personDetails ps-2 me-1 pt-0"> <?= $GetAllDataResults['maritalStatus'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['jobCategory'] ?> </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-md-flex">
                                <div class="row rigtIconPaddng">
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="iconBorder text-center">
                                            <div class="py-1"><i class="ri-heart-3-fill heartIcon py-2"></i></div>

                                            <p class="fs-6 mb-0">Like</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="iconBorder text-center">
                                            <img src="../IMAGES/loginpgeAvatar.png" alt="" class="pt-2 py-1">
                                            <p class="fs-6 mb-0">Assist</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                        <div class="iconBorder text-center">
                                            <div class="py-1">
                                                <i class="ri-star-s-fill starIcon"></i>
                                            </div>
                                            <p class="fs-6 mb-0">Shortlist</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                        <div class="iconBorder text-center">
                                            <div class="py-1">
                                                <i class="ri-eye-line eyeIcon"></i>
                                            </div>
                                            <p class="fs-6 mb-0">Full Profile</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }


    //Show Marriage Data
    if ($DataValue == 'MD') {

        foreach ($GetAllDataQuery as $GetAllDataResults) {
        ?>
            <div class="lapView table-responsive">
                <table class="table table-bordered bg-white tableSize tableBorder">
                    <tbody>
                        <tr>
                            <td rowspan="5" class="ps-0">
                                <div class="d-flex">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/boy.png" class="BrideAndGroomImg mx-auto" /></object>
                                        <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/girl.png" class="BrideAndGroomImg mx-auto" /></object>
                                        <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="tableHead tableHeadBg1 headSize2 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">
                                <div class="d-flex justify-content-between custFullName">
                                    <?= $GetAllDataResults['fullName'] ?>
                                    <input class="form-check-input me-2 customersSelect" type="checkbox" id="<?php echo $GetAllDataResults["custId"] ?>" value="<?php echo $GetAllDataResults["custId"] ?>">
                                </div>

                            </td>

                            <td class="tableHead tableHeadBg1 profileIdSize <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"> <?= $GetAllDataResults['profileId'] ?> </td>
                            <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Religion</td>
                            <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Profession</td>
                            <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Family</td>
                            <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Address</td>
                            <td class="tableHead tableHead2 headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Preference</td>
                            <td class="tableHead tableHead2 headBorder headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Looking</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['profileFor'] ?></div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?php if ($GetAllDataResults['dob'] != '') {
                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                            } else {
                                                            }  ?> Yr </div>
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
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerAgeFrom'] ?> - <?= $GetAllDataResults['partnerAgeTo'] ?></div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['package'] ?>Premium Plus</div>
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
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerHeightFrom'] ?> cm - <?= $GetAllDataResults['partnerHeightTo'] ?> cm</div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust">12.10.2022/ 10 am</div>
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
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerJobCategory'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><button class="statusBtn ms-4 px-3 mt-1"><?php //$GetAllDataResults['status']
                                                                            ?>Call Later</button></td>
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
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerJobType'] ?></div>
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
                            <td><?= $GetAllDataResults['partnerCaste'] ?></td>
                            <td><?= $GetAllDataResults['partnerJobCountry'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="mobileNoBg1"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                            </td>
                            <td>
                                <span class="mobileNoBg2"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                            </td>
                            <!-- Mobile View -->
                            <!-- <td>
                                        <span class="mobileNoBg1"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>
                                    <td>
                                        <span class="mobileNoBg2"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>  -->
                            <!-- Mobile View -->
                            <td><?= $GetAllDataResults['maritalStatus'] ?></td>
                            <td><?= $GetAllDataResults['chovvaDosham'] ?></td>
                            <td><?= $GetAllDataResults['jobCity'] ?></td>
                            <td><?= $GetAllDataResults['motherJob'] ?></td>
                            <td><?= $GetAllDataResults['residentialStatus'] ?></td>
                            <td><?= $GetAllDataResults['matchingStars'] ?></td>
                            <td><?= $GetAllDataResults['partnerCity'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Call Tomorrow, I will pay on Monday</td>
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
                               Assigned To :- <?= $GetAllDataResults['STAFFNAME']  ?>
                            </td>
                            <td colspan="3"><?= $GetAllDataResults['lookingFor'] ?></td>
                            <td colspan="5"><?= $GetAllDataResults['candidateShare'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mobileView bg-white Section mb-3 lapviewMobileBorder" style="display: none;">
                <div class="row pb-2">
                    <div class="col-xl-3 col-lg-3 col-12">
                        <div class="text-center mt-1 d-none d-md-block">
                            <p class="m-0 fs-5 d-none d-md-block profileIdLapFont profileIdSize fs-6 pt-2"><?= $GetAllDataResults['profileId'] ?></p>
                            <?php
                            if ($GetAllDataResults['gender'] == 'Male') {
                            ?>
                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/boy.png" class="loginBrideGroomImg" /></object>
                            <?php
                            } else {
                            ?>
                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/girl.png" class="loginBrideGroomImg" /></object>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-------- MobileView Image-------->
                    <div class="container-fluid d-md-none">
                        <div class="d-flex justify-content-center">
                            <div class="card loginPageCard" style="width: 23rem;">
                                <?php
                                if ($GetAllDataResults['gender'] == 'Male') {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/boy.png" class="card-img-top loginPageImg" /></object>
                                <?php
                                } else {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/girl.png" class="card-img-top loginPageImg" /></object>
                                <?php
                                }
                                ?>
                                <!-- <img src="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults['photo1'] ?>" class="card-img-top loginPageImg" alt="..."> -->
                                <div class="card-body p-0 m-0">
                                    <div class="cardText">
                                        <div class="row m-0 p-0">
                                            <div class="col-4 text-center">
                                                <a href=""><i class="ri-heart-3-fill heartIcon p-0 m-0"></i></a>
                                            </div>
                                            <div class="col-4 text-center">
                                                <a href=""><i class="material-icons closeIcon p-0 mt-2">cancel</i>
                                                </a>
                                            </div>
                                            <div class="col-4 text-center">
                                                <a href=""><i class="ri-star-s-fill pinkStarMobile p-0 m-0"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-12">
                        <div class="row">
                            <div class="col-12 text-end d-none d-md-block">
                                <h6 class="me-5 position-relative">

                                    <span class="position-absolute start-100 p-2 bg-success border border-light rounded-circle pt-2">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                    Online
                                </h6>
                            </div>
                            <div class="col-12 text-end pe-5 d-none d-md-flex">
                                <p>I have Bachelor's - Engineering/ Computers/ Others and I am Employed in IT & Engineering as a <a href="">See More..</a></p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6 pe-1">
                                <p class="d-md-none mobileviewName bridendGroomName ps-2 mt-3 ms-1"> <?= $GetAllDataResults['fullName'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?= $GetAllDataResults['religionName'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?php if ($GetAllDataResults['dob'] != '') {
                                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                                            } else {
                                                                            } ?> </p>
                                <p class="personDetails ps-2 d-md-none ms-1 pt-0"> <?= $GetAllDataResults['height'] ?> </p>
                                <p class="personDetails ps-2 ms-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['complexion'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?= $GetAllDataResults['nativePlace'] ?> </p>
                                <p class="personDetails ps-2 ms-1 d-md-none pt-0"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6 ps-1">
                                <p class="d-md-none mobileviewID bridendGroomID profileIdMobile ps-2 mt-3 me-1"> <?= $GetAllDataResults['profileId'] ?> </p>
                                <p class="personDetails ps-2 me-1 pt-0"> <?= $GetAllDataResults['casteName'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['complexion'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['weight'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['height'] ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                <p class="personDetails ps-2 me-1 pt-0"> <?= $GetAllDataResults['maritalStatus'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['jobCategory'] ?> </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-md-flex">
                                <div class="row rigtIconPaddng">
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="iconBorder text-center">
                                            <div class="py-1"><i class="ri-heart-3-fill heartIcon py-2"></i></div>

                                            <p class="fs-6 mb-0">Like</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="iconBorder text-center">
                                            <img src="../IMAGES/loginpgeAvatar.png" alt="" class="pt-2 py-1">
                                            <p class="fs-6 mb-0">Assist</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                        <div class="iconBorder text-center">
                                            <div class="py-1">
                                                <i class="ri-star-s-fill starIcon"></i>
                                            </div>
                                            <p class="fs-6 mb-0">Shortlist</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                        <div class="iconBorder text-center">
                                            <div class="py-1">
                                                <i class="ri-eye-line eyeIcon"></i>
                                            </div>
                                            <p class="fs-6 mb-0">Full Profile</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }



    //Show Wedding Data
    if ($DataValue == 'WD') {

        foreach ($GetAllDataQuery as $GetAllDataResults) {
        ?>
            <div class="lapView table-responsive">
                <table class="table table-bordered bg-white tableSize tableBorder">
                    <tbody>
                        <tr>
                            <td rowspan="5" class="ps-0">
                                <div class="d-flex">
                                    <?php
                                    if ($GetAllDataResults['gender'] == 'Male') {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/boy.png" class="BrideAndGroomImg mx-auto" /></object>
                                        <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                    <?php
                                    } else {
                                    ?>
                                        <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="BrideAndGroomImg mx-auto"><img src="../IMAGES/girl.png" class="BrideAndGroomImg mx-auto" /></object>
                                        <?= ($GetAllDataResults["verified"] == 'Y') ? "<i class='material-icons VerifiedIcon'> verified </i>" : "" ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="tableHead tableHeadBg1 headSize2 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">
                                <div class="d-flex justify-content-between custFullName">
                                    <?= $GetAllDataResults['fullName'] ?>
                                    <input class="form-check-input me-2 customersSelect" type="checkbox" id="<?php echo $GetAllDataResults["custId"] ?>" value="<?php echo $GetAllDataResults["custId"] ?>">
                                </div>

                            </td>

                            <td class="tableHead tableHeadBg1 profileIdSize <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>"> <?= $GetAllDataResults['profileId'] ?> </td>
                            <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Religion</td>
                            <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Profession</td>
                            <td class="tableHead tableHeadBg1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Family</td>
                            <td class="tableHead tableHeadBg1 headSize1 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Address</td>
                            <td class="tableHead tableHead2 headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Preference</td>
                            <td class="tableHead tableHead2 headBorder headSize3 <?php echo ($GetAllDataResults['gender'] == 'Male') ? "maleHeader" : "femaleHeader" ?>">Looking</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['profileFor'] ?></div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?php if ($GetAllDataResults['dob'] != '') {
                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                            } else {
                                                            }  ?> Yr </div>
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
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerAgeFrom'] ?> - <?= $GetAllDataResults['partnerAgeTo'] ?></div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['package'] ?>Premium Plus</div>
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
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerHeightFrom'] ?> cm - <?= $GetAllDataResults['partnerHeightTo'] ?> cm</div>
                            </td>
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerEducationType'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="heightAdjust">12.10.2022/ 10 am</div>
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
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerJobCategory'] ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><button class="statusBtn ms-4 px-3 mt-1"><?php //$GetAllDataResults['status']
                                                                            ?>Call Later</button></td>
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
                            <td>
                                <div class="heightAdjust"><?= $GetAllDataResults['partnerJobType'] ?></div>
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
                            <td><?= $GetAllDataResults['partnerCaste'] ?></td>
                            <td><?= $GetAllDataResults['partnerJobCountry'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="mobileNoBg1"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                            </td>
                            <td>
                                <span class="mobileNoBg2"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                            </td>
                            <!-- Mobile View -->
                            <!-- <td>
                                        <span class="mobileNoBg1"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>
                                    <td>
                                        <span class="mobileNoBg2"><?= $GetAllDataResults['registeredNumber'] ?> &nbsp;&nbsp; <a href="tel:+91<?= $GetAllDataResults['registeredNumber'] ?>"></span> &nbsp;&nbsp;<i class="ri-phone-fill callIcon"></i>
                                    </td>  -->
                            <!-- Mobile View -->
                            <td><?= $GetAllDataResults['maritalStatus'] ?></td>
                            <td><?= $GetAllDataResults['chovvaDosham'] ?></td>
                            <td><?= $GetAllDataResults['jobCity'] ?></td>
                            <td><?= $GetAllDataResults['motherJob'] ?></td>
                            <td><?= $GetAllDataResults['residentialStatus'] ?></td>
                            <td><?= $GetAllDataResults['matchingStars'] ?></td>
                            <td><?= $GetAllDataResults['partnerCity'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Call Tomorrow, I will pay on Monday</td>
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
                               Assigned To :- <?= $GetAllDataResults['STAFFNAME']  ?>
                            </td>
                            <td colspan="3"><?= $GetAllDataResults['lookingFor'] ?></td>
                            <td colspan="5"><?= $GetAllDataResults['candidateShare'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mobileView bg-white Section mb-3 lapviewMobileBorder" style="display: none;">
                <div class="row pb-2">
                    <div class="col-xl-3 col-lg-3 col-12">
                        <div class="text-center mt-1 d-none d-md-block">
                            <p class="m-0 fs-5 d-none d-md-block profileIdLapFont profileIdSize fs-6 pt-2"><?= $GetAllDataResults['profileId'] ?></p>
                            <?php
                            if ($GetAllDataResults['gender'] == 'Male') {
                            ?>
                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/boy.png" class="loginBrideGroomImg" /></object>
                            <?php
                            } else {
                            ?>
                                <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="loginBrideGroomImg"><img src="../IMAGES/girl.png" class="loginBrideGroomImg" /></object>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-------- MobileView Image-------->
                    <div class="container-fluid d-md-none">
                        <div class="d-flex justify-content-center">
                            <div class="card loginPageCard" style="width: 23rem;">
                                <?php
                                if ($GetAllDataResults['gender'] == 'Male') {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/boy.png" class="card-img-top loginPageImg" /></object>
                                <?php
                                } else {
                                ?>
                                    <object data="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults["photo1"] ?>" type="image/jpeg" class="card-img-top loginPageImg"><img src="../IMAGES/girl.png" class="card-img-top loginPageImg" /></object>
                                <?php
                                }
                                ?>
                                <!-- <img src="../CUSTOMERIMAGES/PROFILE/<?= $GetAllDataResults['photo1'] ?>" class="card-img-top loginPageImg" alt="..."> -->
                                <div class="card-body p-0 m-0">
                                    <div class="cardText">
                                        <div class="row m-0 p-0">
                                            <div class="col-4 text-center">
                                                <a href=""><i class="ri-heart-3-fill heartIcon p-0 m-0"></i></a>
                                            </div>
                                            <div class="col-4 text-center">
                                                <a href=""><i class="material-icons closeIcon p-0 mt-2">cancel</i>
                                                </a>
                                            </div>
                                            <div class="col-4 text-center">
                                                <a href=""><i class="ri-star-s-fill pinkStarMobile p-0 m-0"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-12">
                        <div class="row">
                            <div class="col-12 text-end d-none d-md-block">
                                <h6 class="me-5 position-relative">

                                    <span class="position-absolute start-100 p-2 bg-success border border-light rounded-circle pt-2">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                    Online
                                </h6>
                            </div>
                            <div class="col-12 text-end pe-5 d-none d-md-flex">
                                <p>I have Bachelor's - Engineering/ Computers/ Others and I am Employed in IT & Engineering as a <a href="">See More..</a></p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6 pe-1">
                                <p class="d-md-none mobileviewName bridendGroomName ps-2 mt-3 ms-1"> <?= $GetAllDataResults['fullName'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?= $GetAllDataResults['religionName'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?php if ($GetAllDataResults['dob'] != '') {
                                                                                echo (date('Y') - date('Y', strtotime($GetAllDataResults['dob'])));
                                                                            } else {
                                                                            } ?> </p>
                                <p class="personDetails ps-2 d-md-none ms-1 pt-0"> <?= $GetAllDataResults['height'] ?> </p>
                                <p class="personDetails ps-2 ms-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['complexion'] ?> </p>
                                <p class="personDetails ps-2 ms-1 pt-0"> <?= $GetAllDataResults['nativePlace'] ?> </p>
                                <p class="personDetails ps-2 ms-1 d-md-none pt-0"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-6 ps-1">
                                <p class="d-md-none mobileviewID bridendGroomID profileIdMobile ps-2 mt-3 me-1"> <?= $GetAllDataResults['profileId'] ?> </p>
                                <p class="personDetails ps-2 me-1 pt-0"> <?= $GetAllDataResults['casteName'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['complexion'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['weight'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['height'] ?> / <?= $GetAllDataResults['weight'] ?> </p>
                                <p class="personDetails ps-2 me-1 pt-0"> <?= $GetAllDataResults['maritalStatus'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-none d-md-block pt-0"> <?= $GetAllDataResults['educationCategory'] ?> </p>
                                <p class="personDetails ps-2 me-1 d-md-none pt-0"> <?= $GetAllDataResults['jobCategory'] ?> </p>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-md-flex">
                                <div class="row rigtIconPaddng">
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="iconBorder text-center">
                                            <div class="py-1"><i class="ri-heart-3-fill heartIcon py-2"></i></div>

                                            <p class="fs-6 mb-0">Like</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6">
                                        <div class="iconBorder text-center">
                                            <img src="../IMAGES/loginpgeAvatar.png" alt="" class="pt-2 py-1">
                                            <p class="fs-6 mb-0">Assist</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                        <div class="iconBorder text-center">
                                            <div class="py-1">
                                                <i class="ri-star-s-fill starIcon"></i>
                                            </div>
                                            <p class="fs-6 mb-0">Shortlist</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 mt-3">
                                        <div class="iconBorder text-center">
                                            <div class="py-1">
                                                <i class="ri-eye-line eyeIcon"></i>
                                            </div>
                                            <p class="fs-6 mb-0">Full Profile</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }



    //Show Bulkdata
    if ($DataValue == 'BD') {

        ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="bulkDataHead mt-3 text-center mx-xl-4">
                    <h4 class="">BULK DATA &nbsp; - &nbsp; <?= $LimitedRows ?></h4>
                </div>
                <div class="table-responsive mt-4 mx-xl-4 d-none d-md-flex">
                    <table class="table table-bordered bulkDataBorder">
                        <thead class="bg-info">
                            <tr class="text-center">
                                <td scope="col" class="bulklTableText">  </td>
                                <td scope="col" class="bulklTableText">Sl No</td>
                                <td scope="col" class="bulklTableText">Mobile</td>
                                <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
                                <td scope="col" class="bulklTableText" colspan="2">Name</td>

                                <td scope="col" class="bulklTableText">Ref. Mobile</td>
                                <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
                                <td scope="col" class="bulklTableText">Ref. Name</td>
                                <td scope="col" class="bulklTableText">Feed Back</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($GetAllDataQuery as $GetAllDataResults) {
                            ?>
                                <tr>
                                    <td class="py-2"><input class="form-check-input me-2 bulkSelect" type="checkbox" id="<?php echo $GetAllDataResults["bulkId"] ?>" value="<?php echo $GetAllDataResults["bulkId"] ?>"></td>
                                    <td class="py-2 px-4"><?= $GetAllDataResults['bulkId'] ?></td>
                                    <td class="py-2 px-2"><input type="checkbox" class="form-check-input bulkCheckbox"> <?= $GetAllDataResults['bulkPhone'] ?></td>
                                    <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['bulkPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a></td>
                                    <td class="py-2 px-2" colspan="2"><?= $GetAllDataResults['bulkName'] ?></td>
                                    <td class="py-2 px-2"><input type="checkbox" class="form-check-input bulkCheckbox"> <input type="text" class="bulkTextField"></td>
                                    <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['referPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a></td>
                                    <td class="py-2 px-2"><input type="text" class="bulkTextField"></td>
                                    <td class="py-2 px-2"><input type="text" class="bulkTextField"></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
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
            <!-- <div class="col-xl-2 col-lg-2 col-12 d-none d-md-flex">
                <div class="mx-xl-3 mt-3">
                    <button type="submit" class="form-control text-white bulkPinkBtn fs-5 mb-4">FEED BACK</button>
                    <button class="greenButton form-control text-white bulkGreenBtn fs-5 mb-3">SUCCESS</button>
                    <button type="submit" class="form-control text-white bulkPinkBtn fs-5 mb-3">Unsuccessful</button>
                    <button type="submit" class="form-control text-white bulkPinkBtn fs-5 mb-3">Invalid</button>
                    <button type="submit" class="form-control text-white bulkPinkBtn fs-5 mb-3">Delete</button>
                    <button type="submit" class="form-control bulkPeachBtn fs-5 mb-3">Marriage Fix</button>
                    <button type="submit" class="form-control bulkIvoryBtn fs-5 mb-3">Link Send</button>
                    <button type="submit" class="form-control greenButton bulkGreenBtn fs-5 mb-3">Free Register</button>
                
                    <div class="row mb-3">
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">20</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">10</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">2022</option>
                                <option value="">2022</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">20</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">AM</option>
                                <option value="">PM</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-4">
                            <h6 class="reminder text-white text-center">Reminder</h6>
                        </div>
                    </div>
                    <button type="submit" class="form-control bulkBlueBtn fs-5 mb-3" id="btn_submit">SUBMIT</button>
                </div>
            </div> -->
        </div>

        <?php   

    }


    //Show Leaddata
    if ($DataValue == 'LD') {

        ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                <div class="bulkDataHead mt-3 text-center mx-xl-4">
                    <h4 class="">LEAD DATA &nbsp; - &nbsp; <?= $LimitedRows ?></h4>
                </div>
                <div class="table-responsive mt-4 mx-xl-4 d-none d-md-flex">
                    <table class="table table-bordered bulkDataBorder">
                        <thead class="bg-info">
                            <tr class="text-center">
                                <td scope="col" class="bulklTableText">  </td>
                                <td scope="col" class="bulklTableText">Sl No</td>
                                <td scope="col" class="bulklTableText">Mobile</td>
                                <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
                                <td scope="col" class="bulklTableText" colspan="2">Name</td>

                                <td scope="col" class="bulklTableText">Ref. Mobile</td>
                                <td scope="col" class="bulklTableText"><i class="ri-phone-fill callIcon"></i></td>
                                <td scope="col" class="bulklTableText">Ref. Name</td>
                                <td scope="col" class="bulklTableText">Feed Back</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($GetAllDataQuery as $GetAllDataResults) {
                            ?>
                                <tr>
                                    <td class="py-2"><input class="form-check-input me-2 bulkSelect" type="checkbox" id="<?php echo $GetAllDataResults["bulkId"] ?>" value="<?php echo $GetAllDataResults["bulkId"] ?>"></td>
                                    <td class="py-2 px-4"><?= $GetAllDataResults['bulkId'] ?></td>
                                    <td class="py-2 px-2"><input type="checkbox" class="form-check-input bulkCheckbox"> <?= $GetAllDataResults['bulkPhone'] ?></td>
                                    <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['bulkPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a></td>
                                    <td class="py-2 px-2" colspan="2"><?= $GetAllDataResults['bulkName'] ?></td>
                                    <td class="py-2 px-2"><input type="checkbox" class="form-check-input bulkCheckbox"> <input type="text" class="bulkTextField"></td>
                                    <td class="py-2 px-2"><a href="tel:+91<?= $GetAllDataResults['referPhone'] ?>"><i class="ri-phone-fill callIcon"></i></a></td>
                                    <td class="py-2 px-2"><input type="text" class="bulkTextField"></td>
                                    <td class="py-2 px-2"><input type="text" class="bulkTextField"></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
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
            <!-- <div class="col-xl-2 col-lg-2 col-12 d-none d-md-flex">
                <div class="mx-xl-3 mt-3">
                    <button type="submit" class="form-control text-white bulkPinkBtn fs-5 mb-4">FEED BACK</button>
                    <button class="greenButton form-control text-white bulkGreenBtn fs-5 mb-3">SUCCESS</button>
                    <button type="submit" class="form-control text-white bulkPinkBtn fs-5 mb-3">Unsuccessful</button>
                    <button type="submit" class="form-control text-white bulkPinkBtn fs-5 mb-3">Invalid</button>
                    <button type="submit" class="form-control text-white bulkPinkBtn fs-5 mb-3">Delete</button>
                    <button type="submit" class="form-control bulkPeachBtn fs-5 mb-3">Marriage Fix</button>
                    <button type="submit" class="form-control bulkIvoryBtn fs-5 mb-3">Link Send</button>
                    <button type="submit" class="form-control greenButton bulkGreenBtn fs-5 mb-3">Free Register</button>
                
                    <div class="row mb-3">
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">20</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">10</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">2022</option>
                                <option value="">2022</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">20</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-4">
                            <select class="form-control bulkdropDn" aria-label="Default select example">
                                <option hidden value="">AM</option>
                                <option value="">PM</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-4">
                            <h6 class="reminder text-white text-center">Reminder</h6>
                        </div>
                    </div>
                    <button type="submit" class="form-control bulkBlueBtn fs-5 mb-3" id="btn_submit">SUBMIT</button>
                </div>
            </div> -->
        </div>

        <?php   

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





/* 
SELECT cdata.*,R.religionName,C.casteName,SUBCST.subcasteName,FD.feedback,EDCAT.educationCategory,EDTY.educationType,JBCAT.jobCategory,JBTY.jobType,JBCOUNTRY.countryName AS jobCountry,JBDISTRICT.districtName AS jobDistrict,JBCITY.cityName AS jobCity,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,FATEDU.educationCategory AS fatherEducation,FATJOB.jobCategory AS fatherJob,MOTEDU.educationCategory AS motherEducation,MOTJOB.jobCategory AS motherJob,CNTRY.countryName AS country,STATE.stateName AS state,DSTRCT.districtName AS district,CITY.cityName AS city,PARTEDCAT.educationCategory AS partnerEducationCategory,PARTEDTY.educationType AS partnerEducationType,PARTJOBCAT.jobCategory AS partnerJobCategory,PARTJOBTY.jobType AS partnerJobType,PARTCASTE.casteName AS partnerCaste,PARTCOUNTRY.countryName AS partnerJobCountry,PARTCITY.cityName AS partnerCity, STAR.starName AS STARNAME  FROM custdata cdata LEFT JOIN religion R ON cdata.religion = R.rId LEFT JOIN caste C ON cdata.caste = C.casId LEFT JOIN subcaste SUBCST ON cdata.subCaste = SUBCST.scId LEFT JOIN feedback FD ON cdata.status = FD.fdId LEFT JOIN educationcategory EDCAT ON cdata.educationCat = EDCAT.edcatId LEFT JOIN educationtype EDTY ON cdata.educationType = EDTY.edTyId LEFT JOIN jobcategory JBCAT ON cdata.jobCat = JBCAT.jbcatId LEFT JOIN jobtype JBTY ON cdata.jobType = JBTY.jbTyId LEFT JOIN country JBCOUNTRY ON cdata.jobLocCountry = JBCOUNTRY.cId LEFT JOIN district JBDISTRICT ON cdata.jobLocDistrict = JBDISTRICT.dId LEFT JOIN city JBCITY ON cdata.jobLocCity = JBCITY.citId LEFT JOIN country CNTRY ON cdata.country = CNTRY.cId LEFT JOIN state STATE ON cdata.state = STATE.sId LEFT JOIN district DSTRCT ON cdata.district = DSTRCT.dId LEFT JOIN city CITY ON cdata.city = CITY.citId LEFT JOIN educationcategory FATEDU ON cdata.fatherEducation = FATEDU.edcatId LEFT JOIN jobcategory FATJOB ON cdata.fatherJob = FATJOB.jbcatId LEFT JOIN educationcategory MOTEDU ON cdata.motherEducation = MOTEDU.edcatId LEFT JOIN jobcategory MOTJOB ON cdata.fatherJob = MOTJOB.jbcatId LEFT JOIN religion PARTRELIGION ON cdata.partnerReligion = PARTRELIGION.rId LEFT JOIN caste PARTCASTE ON cdata.partnerCaste = PARTCASTE.casId LEFT JOIN educationcategory PARTEDCAT ON cdata.partnerEduCat = PARTEDCAT.edcatId LEFT JOIN educationtype PARTEDTY ON cdata.partnerEduType = PARTEDTY.edTyId LEFT JOIN jobcategory PARTJOBCAT ON cdata.partnerJobCat = PARTJOBCAT.jbcatId LEFT JOIN jobtype PARTJOBTY ON cdata.partnerJobType = PARTJOBTY.jbTyId LEFT JOIN country PARTCOUNTRY ON cdata.partnerCountry = PARTCOUNTRY.cId LEFT JOIN state PARTSTATE ON cdata.partnerState = PARTSTATE.sId LEFT JOIN district PARTDISTRICT ON cdata.partnerDistrict = PARTDISTRICT.dId LEFT JOIN city PARTCITY ON cdata.partnerCity = PARTCITY.citId LEFT JOIN star STAR ON cdata.star = STAR.starId WHERE custId <> '' AND $AgeFrom <= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND $AgeTo >= YEAR(DATE_SUB(NOW(), INTERVAL TO_DAYS(STR_TO_DATE(dob, '%d-%b-%Y')) DAY)) AND ( substring(height, 12,15) BETWEEN $HeightFrom AND $HeightTo) AND ( cdata.gender = CASE WHEN '$FilterGender' <> '' THEN '$FilterGender' ELSE cdata.gender END) AND (cdata.religion = CASE WHEN '$FilterReligion' <> '' THEN '$FilterReligion'  ELSE cdata.religion END) AND (cdata.maritalStatus = CASE WHEN $FilterMaritalStatusLength > 0 THEN ((SELECT cmarital.maritalStatus FROM custdata cmarital WHERE cmarital.maritalStatus IN($FilterMaritalStatus) AND cdata.custId = cmarital.custId )) ELSE cdata.maritalStatus END) AND (cdata.physicalStatus = CASE WHEN $FilterPhyscialStatusLength > 0 THEN ((SELECT cphysical.physicalStatus FROM custdata cphysical WHERE cphysical.physicalStatus IN($FilterPhyscialStatus) AND cdata.custId = cphysical.custId )) ELSE cdata.physicalStatus END) AND (cdata.complexion = CASE WHEN $FilterComplexionLength > 0 THEN (SELECT ccomplexion.complexion FROM custdata ccomplexion WHERE ccomplexion.complexion IN($FilterComplexion) AND cdata.custId = ccomplexion.custId) ELSE cdata.complexion END) AND (cdata.bodyType = CASE WHEN $FilterBodyTypeLength > 0 THEN (SELECT cbody.bodyType FROM custdata cbody WHERE cbody.bodyType IN($FilterBodyType) AND cdata.custId = cbody.custId) ELSE cdata.bodyType END) AND (cdata.jathakamType = CASE WHEN $FilterJathakamLength > 0 THEN (SELECT cjathakam.jathakamType FROM custdata cjathakam WHERE cjathakam.jathakamType IN($FilterJathakam) AND cdata.custId = cjathakam.custId) ELSE cdata.jathakamType END) AND (cdata.noofChild = CASE WHEN $FilterChildLength > 0 THEN (SELECT cchild.noofChild FROM custdata cchild WHERE cchild.noofChild IN($FilterChild) AND cdata.custId = cchild.custId) ELSE cdata.noofChild END) AND (cdata.financialStatus = CASE WHEN $FilterFinstatusLength > 0 THEN (SELECT cfinancial.financialStatus FROM custdata cfinancial WHERE cfinancial.financialStatus IN($FilterFinstatus) AND cdata.custId = cfinancial.custId) ELSE cdata.financialStatus END) AND (cdata.youOwn = CASE WHEN $FilterOwnLength > 0 THEN (SELECT cOwn.youOwn FROM custdata cOwn WHERE cOwn.youOwn IN($FilterOwn) AND cdata.custId = cOwn.custId) ELSE cdata.youOwn END) AND (cdata.caste = CASE WHEN $FilterCasteLength > 0 THEN (SELECT ccaste.casId FROM caste ccaste WHERE ccaste.casId IN($FilterCaste) AND cdata.caste = ccaste.casId) ELSE cdata.caste END) AND (cdata.educationCat = CASE WHEN $FilterEducationCategoryLength > 0 THEN (SELECT cedcat.edcatId FROM educationcategory cedcat WHERE cedcat.edcatId IN($FilterEducationCategory) AND cdata.educationCat = cedcat.edcatId) ELSE cdata.educationCat END) AND (cdata.educationType = CASE WHEN $FilterEduTypeLength > 0 THEN (SELECT cedtype.edTyId FROM educationtype cedtype WHERE cedtype.edTyId IN($FilterEduType) AND cdata.educationType = cedtype.edTyId) ELSE cdata.educationType END) AND (cdata.jobCat = CASE WHEN $FilterJobcategoryLength > 0 THEN (SELECT cjobcat.jbcatId FROM jobcategory cjobcat WHERE cjobcat.jbcatId IN($FilterJobcategory) AND cdata.jobCat = cjobcat.jbcatId) ELSE cdata.jobCat END) AND (cdata.jobType = CASE WHEN $FilterJobTypeLength > 0 THEN (SELECT cjobtype.jbTyId FROM jobtype cjobtype WHERE cjobtype.jbTyId IN($FilterJobType) AND cdata.jobType = cjobtype.jbTyId) ELSE cdata.jobType END) AND (cdata.district = CASE WHEN $FilterDistrictLength > 0 THEN (SELECT cdistrict.dId FROM district cdistrict WHERE cdistrict.dId IN($FilterDistrict) AND cdata.district = cdistrict.dId) ELSE cdata.district END) AND (cdata.jobLocCountry = CASE WHEN $FilterCountryLength > 0 THEN (SELECT ccountry.cId FROM country ccountry WHERE ccountry.cId IN($FilterCountry) AND cdata.jobLocCountry = ccountry.cId) ELSE cdata.jobLocCountry END) AND (cdata.jobLocState = CASE WHEN $FilterStateLength > 0 THEN (SELECT cstate.sId FROM state cstate WHERE cstate.sId IN($FilterState) AND cdata.jobLocState = cstate.sId) ELSE cdata.jobLocState END) AND (cdata.star = CASE WHEN $FilterStarLength > 0 THEN (SELECT cstar.starId FROM star cstar WHERE cstar.starId IN($MatchingStarString) AND cdata.star = cstar.starId) ELSE cdata.star END) AND assignedTo = $Assigned LIMIT $PageLength */
/* 

if(!empty($_POST['MemberMarstatus'])){
    $FilterMaritalStatusLength = count($_POST['MemberMarstatus']);
    $FilterMaritalStatus = ltrim(implode("," , $_POST['MemberMarstatus']) , ',');
}
else{
    $FilterMaritalStatus ="''";
    $FilterMaritalStatusLength = 0;
}

echo $FilterMaritalStatus;


if(!empty($_POST['MemberPhystatus'])){
    $FilterPhyscialStatusLength = count($_POST['MemberPhystatus']);
    $FilterPhyscialStatus = ltrim(implode("," , $_POST['MemberPhystatus']) , ',');
}
else{
    $FilterPhyscialStatus = "''";
    $FilterPhyscialStatusLength = 0;
}

//echo $FilterPhyscialStatus;


if(!empty($_POST['MemberStar'])){
    $FilterStarLength = count($_POST['MemberStar']);
    $FilterStar = ltrim(implode("," , $_POST['MemberStar']) , ',');
}
else{
    $FilterStar = "''";
    $FilterStarLength = 0;
}

//echo $FilterStar;

if(!empty($_POST['MemberComplexion'])){
    $FilterComplexionLength = count($_POST['MemberComplexion']);
    $FilterComplexion = ltrim(implode("," , $_POST['MemberComplexion']) , ',');
}
else{
    $FilterComplexion = "''";
    $FilterComplexionLength = 0;
}

//echo $FilterComplexion;


if(!empty($_POST['MemberBodyType'])){
    $FilterBodyTypeLength = count($_POST['MemberBodyType']);
    $FilterBodyType = ltrim(implode("," , $_POST['MemberBodyType']) , ',');
}
else{
    $FilterBodyType = "''";
    $FilterBodyTypeLength = 0;
}

//echo $FilterBodyType;

if(!empty($_POST['MemberJathakam'])){
    $FilterJathakamLength = count($_POST['MemberJathakam']);
    $FilterJathakam = ltrim(implode("," , $_POST['MemberJathakam']) , ',');
}
else{
    $FilterJathakam = "''";
    $FilterJathakamLength = 0;
}

//echo $FilterJathakam;

if(!empty($_POST['MemberChild'])){
    $FilterChildLength = count($_POST['MemberChild']);
    $FilterChild = ltrim(implode("," , $_POST['MemberChild']) , ',');
}
else{
    $FilterChild = "''";
    $FilterChildLength = 0;
}

//echo $FilterChild;
if(!empty($_POST['MemberFinstatus'])){
    $FilterFinstatusLength = count($_POST['MemberFinstatus']);
    $FilterFinstatus = ltrim(implode("," , $_POST['MemberFinstatus']) , ',');
}
else{
    $FilterFinstatus = "''";
    $FilterFinstatusLength = 0;
}

//echo $FilterFinstatus;



if(isset($_POST['MemberOwn'])){
    $FilterOwnLength = count($_POST['MemberOwn']);
    $FilterOwn = ltrim(implode("," , $_POST['MemberOwn']) , ',');
}
else{
    $FilterOwn = "''";
    $FilterOwnLength = 0;
}


if(!empty($_POST['MemberCaste'])){
    $FilterCasteLength = count($_POST['MemberCaste']);
    $FilterCaste = ltrim(implode("," , $_POST['MemberCaste']) , ',');
}
else{
    $FilterCaste = "''";
    $FilterCasteLength = 0;
}

//echo $FilterCaste;



if(!empty($_POST['MemberEducationCategory'])){
    $FilterEducationCategoryLength = count($_POST['MemberEducationCategory']);
    $FilterEducationCategory = ltrim(implode("," , $_POST['MemberEducationCategory']) , ',');
}
else{
    $FilterEducationCategory = "''";
    $FilterEducationCategoryLength = 0;
}

//echo $FilterEducationCategory;

if(!empty($_POST['MemberEduType'])){
    $FilterEduTypeLength = count($_POST['MemberEduType']);
    $FilterEduType = ltrim(implode("," , $_POST['MemberEduType']) , ',');
}
else{
    $FilterEduType = "''";
    $FilterEduTypeLength = 0;
}

//echo $FilterEduType;


if(!empty($_POST['MemberJobcategory']) && isset($_POST['MemberJobcategory'])){
    $FilterJobcategoryLength = count($_POST['MemberJobcategory']);
    $FilterJobcategory = ltrim(implode("," , $_POST['MemberJobcategory']) , ',');
}
else{
    $FilterJobcategory = "''";
    $FilterJobcategoryLength = 0;
}


//echo $FilterJobcategory;

if(!empty($_POST['MemberJobType'])){
    $FilterJobTypeLength = count($_POST['MemberJobType']);
    $FilterJobType = ltrim(implode("," , $_POST['MemberJobType']) , ',');
}
else{
    $FilterJobType = "''";
    $FilterJobTypeLength = 0;
}

//echo $FilterJobType;

if(!empty($_POST['MemberDistrict'])){
    $FilterDistrictLength = count($_POST['MemberDistrict']);
    $FilterDistrict = ltrim(implode("," , $_POST['MemberDistrict']) , ',');
}
else{
    $FilterDistrict = "''";
    $FilterDistrictLength = 0;
}

//echo $FilterDistrict;

if(!empty($_POST['MemberCountry'])){
    $FilterCountryLength = count($_POST['MemberCountry']);
    $FilterCountry = ltrim(implode("," , $_POST['MemberCountry']) , ',');
}
else{
    $FilterCountry = "''";
    $FilterCountryLength = 0;
}

//echo $FilterCountry;

if(!empty($_POST['MemberState'])){
    $FilterStateLength = count($_POST['MemberState']);
    $FilterState = ltrim(implode("," , $_POST['MemberState']) , ',');
}
else{
    $FilterState = "''";
    $FilterStateLength = 0;
}

//echo $FilterState;
 */


?>



<script>
    $(document).ready(function() {
        $('#PageResult').html('<?php echo $PageString; ?>');
    });

    $('#Pagination .page-link').click(function(f) {
        f.preventDefault();
        var PageNumber = $(this).val();
        console.log(PageNumber);
        $('#PageNumber').val(PageNumber);
        $('#FilterData').submit();

    });
</script>